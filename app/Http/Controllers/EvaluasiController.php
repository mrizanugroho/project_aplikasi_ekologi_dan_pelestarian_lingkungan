<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\EvaluasiAkhir; // Wajib dipanggil biar bisa nyambung ke database

class EvaluasiController extends Controller
{
// 1. Menampilkan Halaman Evaluasi Siswa
    public function index()
    {
        // Pengecekan: Usir ke login kalau belum login
        if (!session()->has('user_id')) {
            return redirect('/login')->withErrors(['login_error' => 'Login dulu bro!']);
        }

        // 🔒 SATPAM: Cek jumlah kuis yang sudah selesai
        $kuisSelesai = DB::table('kuis_submateri')
                         ->where('user_id', session('user_id'))
                         ->count();

        // Kalau kuis yang selesai masih kurang dari 4, tendang balik!
        if ($kuisSelesai < 4) {
            return redirect()->back()->with('error', 'Akses ditolak! Selesaikan 4 kuis terlebih dahulu.');
        }

        return view('halaman_evaluasi'); // Pastikan nama file blade-mu bener
    }

    // 2. Menerima Data Kiriman dari JavaScript Siswa
    public function submit(Request $request)
    {
        // Pastikan login dulu sebelum bisa ngirim nilai
        if (!session()->has('user_id')) {
            return response()->json(['status' => 'error', 'message' => 'Belum login!'], 401);
        }

        $userId = session('user_id');

        // Proses simpan atau update ke tabel evaluasi_akhir
        EvaluasiAkhir::updateOrCreate(
            ['user_id' => $userId],
            [
                'skor_pilgan'  => $request->nilai,
                'benar_pilgan' => $request->benar,
                'salah_pilgan' => $request->salah,
                'pola_pilgan'  => $request->pola,
                'esai_1'       => $request->esai_1,
                'esai_2'       => $request->esai_2,
                'esai_3'       => $request->esai_3,
                'esai_4'       => $request->esai_4,
                'esai_5'       => $request->esai_5,
            ]
        );

        return response()->json([
            'status' => 'success',
            'message' => 'Mantap! Nilai dan Esai berhasil masuk database.'
        ]);
    }
}