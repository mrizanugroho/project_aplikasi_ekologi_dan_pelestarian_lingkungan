<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    /* ===================================================
       1. FUNGSI UNTUK DASHBOARD UTAMA (GRAFIK)
    =================================================== */
    public function dashboard()
    {
        $dataGrafik = [
                    'materi_1' => [
                        'kuis' => DB::table('kuis_submateri')->where('submateri', '1')->count(),
                    ],
                    'materi_2' => [
                        'kuis' => DB::table('kuis_submateri')->where('submateri', '2')->count(),
                    ],
                    'materi_3' => [
                        'kuis' => DB::table('kuis_submateri')->where('submateri', '3')->count(),
                    ],
                    'materi_4' => [
                        'kuis' => DB::table('kuis_submateri')->where('submateri', '4')->count(),
                    ],
                ];

        return view('dashboard_guru', compact('dataGrafik')); 
    }

    /* ===================================================
       2. FUNGSI DATA SISWA
    =================================================== */
    public function dataSiswa()
    {
        $siswa = DB::table('users')->where('role', 'siswa')->get();
        return view('guru.data_siswa', ['siswas' => $siswa]);
    }

/* ===================================================
       3. FUNGSI HASIL KUIS
    =================================================== */
    public function hasilKuis(Request $request)
    {
        // 1. Ambil request filter kelas dari dropdown (Default 7A kalau baru buka)
        $kelasFilter = $request->input('kelas', '7A');

        // 2. Ambil HANYA siswa yang sesuai kelas yang difilter
        $siswaList = DB::table('users')
                        ->where('role', 'siswa')
                        ->where('kelas', $kelasFilter)
                        ->get();

        // 3. Looping untuk nempelin data kuis TERAKHIR ke masing-masing siswa
        foreach ($siswaList as $siswa) {
            $siswa->kuis_1 = DB::table('kuis_submateri')->where('user_id', $siswa->id)->where('submateri', '1')->orderByDesc('id')->first();
            $siswa->kuis_2 = DB::table('kuis_submateri')->where('user_id', $siswa->id)->where('submateri', '2')->orderByDesc('id')->first();
            $siswa->kuis_3 = DB::table('kuis_submateri')->where('user_id', $siswa->id)->where('submateri', '3')->orderByDesc('id')->first();
            $siswa->kuis_4 = DB::table('kuis_submateri')->where('user_id', $siswa->id)->where('submateri', '4')->orderByDesc('id')->first();
        }

        // 4. Lempar data ke view hasil_submateri
        return view('guru.hasil_submateri', [
            'siswaList' => $siswaList,
            'kelasFilter' => $kelasFilter
        ]);
    }

    /* ===================================================
       4. FUNGSI HASIL EVALUASI AKHIR
    =================================================== */
public function hasilEvaluasi()
{
    // 1. Ambil data dari tabel evaluasi_akhir dan join ke tabel users
    $evaluasi = \DB::table('evaluasi_akhir')
        ->join('users', 'evaluasi_akhir.user_id', '=', 'users.id')
        ->select('evaluasi_akhir.*', 'users.nama_lengkap', 'users.kelas', 'users.username')
        ->get();

    // 2. Kita rapihin formatnya biar siap dibaca sama JavaScript di halaman guru
    $dataUntukJs = [];
    foreach ($evaluasi as $row) {
        $dataUntukJs[$row->nama_lengkap] = [
            'pilgan' => [
                'skor' => $row->skor_pilgan,
                'b'    => $row->benar_pilgan,
                's'    => $row->salah_pilgan,
                'pola' => json_decode($row->pola_pilgan) ?? [] 
            ],
            'esai' => [
                $row->esai_1 ?? '',
                $row->esai_2 ?? '',
                $row->esai_3 ?? '',
                $row->esai_4 ?? '',
                $row->esai_5 ?? '',
            ]
        ];
    }

    // 3. Kirim datanya ke halaman blade guru dalam bentuk JSON string
// ... (Kodingan foreach $dataUntukJs yang tadi tetep biarin aja bro, jangan dihapus) ...

        // UBAH BAGIAN RETURN VIEW INI YA BRO:
        return view('guru.halaman_evaluasi', [
            'jsonEvaluasi' => json_encode($dataUntukJs),
            'listEvaluasi' => $evaluasi // 🔥 TAMBAHKAN BARIS INI BIAR BLADE-NYA GAK ERROR LAGI!
        ]);
    }
/* ===================================================
       5. FUNGSI SIMPAN KOMENTAR DAN NILAI GURU
    =================================================== */
    public function simpanEvaluasiAkhir(Request $request)
    {
        // 1. Cari ID siswa berdasarkan namanya (karena JS mengirim nama)
        $siswa = DB::table('users')->where('nama_lengkap', $request->nama_siswa)->first();

        if (!$siswa) {
            return response()->json(['status' => 'error', 'message' => 'Siswa tidak ditemukan!']);
        }

        // 2. Update tabel evaluasi_akhir
        DB::table('evaluasi_akhir')
            ->where('user_id', $siswa->id)
            ->update([
                'komentar_guru' => $request->komentar,
                'status_esai'   => 'Sudah Dinilai' // Otomatis ubah status badge-nya
            ]);

        return response()->json([
            'status' => 'success', 
            'message' => 'Mantap, nilai dan komentar berhasil masuk database!'
        ]);
    }

    /* ===================================================
       6. FUNGSI HALAMAN REFLEKSI SISWA
    =================================================== */
    public function refleksiSiswa(Request $request)
    {
        // 1. Ambil nilai filter dari request (jika ada)
        $kelasFilter = $request->input('kelas', 'semua');
        $materiFilter = $request->input('materi', 'semua');

        // 2. Buat query dasar: gabung tabel refleksi_siswa dengan tabel users
        $query = DB::table('refleksi_siswa')
            ->join('users', 'refleksi_siswa.user_id', '=', 'users.id')
            ->select('refleksi_siswa.*', 'users.nama_lengkap', 'users.kelas')
            ->orderBy('refleksi_siswa.id', 'desc'); // Urutkan dari yang terbaru

        // 3. Terapkan filter jika tidak memilih "semua"
        if ($kelasFilter !== 'semua') {
            $query->where('users.kelas', $kelasFilter);
        }

        if ($materiFilter !== 'semua') {
            $query->where('refleksi_siswa.submateri', $materiFilter);
        }
    
        // 4. Eksekusi query
        $dataRefleksi = $query->get();

        // 5. Lempar ke view
        return view('guru.refleksi_siswa', [
            'dataRefleksi' => $dataRefleksi,
            'kelasFilter' => $kelasFilter,
            'materiFilter' => $materiFilter
        ]);
    }

    // Fungsi untuk mengacak dan membagi kelompok otomatis per kelas
    public function generateKelompok($kelas)
    {
        // 1. Ambil semua siswa di kelas tersebut (misal 7A) secara ACAK
        $siswas = DB::table('users')
            ->where('role', 'siswa')
            ->where('kelas', $kelas)
            ->inRandomOrder()
            ->get();

        if ($siswas->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada siswa di kelas ini.');
        }

        $jumlahSiswa = $siswas->count();
        $ukuranKelompok = 5;
        
        // 2. Tentukan jumlah kelompok dasar (contoh: 33 / 5 = 6 kelompok)
        $jumlahKelompok = floor($jumlahSiswa / $ukuranKelompok);

        // Jaga-jaga kalau siswanya kurang dari 5 orang, jadikan 1 kelompok aja
        if ($jumlahKelompok == 0) {
            $jumlahKelompok = 1;
        }

        // Siapkan array kosong untuk nampung kelompok
        $kelompok = array_fill(1, $jumlahKelompok, []);
        $currentIndex = 1;

        // 3. Distribusikan siswa satu per satu layaknya bagi kartu remi
        foreach ($siswas as $siswa) {
            $kelompok[$currentIndex][] = $siswa->id;
            
            $currentIndex++;
            // Kalau udah sampai kelompok terakhir, balik lagi ke kelompok 1 buat masukin sisanya
            if ($currentIndex > $jumlahKelompok) {
                $currentIndex = 1; 
            }
        }

        // 4. Update data kelompok_id tiap siswa ke database users
        foreach ($kelompok as $idKelompok => $anggota) {
            DB::table('users')->whereIn('id', $anggota)->update(['kelompok_id' => $idKelompok]);
        }

        return redirect()->back()->with('success', 'Kelompok kelas ' . $kelas . ' berhasil di-generate secara acak!');
    }
}