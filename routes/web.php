<?php

// 1. SEMUA IMPORT 'USE' DI PALING ATAS
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\TeacherController;

// 2. SEMUA JALUR MASUK (GET) - HARUS DI ATAS!
// Halaman Pilihan Role
// Halaman Pilihan Role
Route::get('/login', function () {
    return view('login');
})->name('login'); // <--- TAMBAHIN INI DI UJUNGNYA BRO

// Halaman Form Login Siswa
Route::get('/login/siswa', function () {
    return view('login_siswa');
});

// Halaman Form Login Guru
Route::get('/login/guru', function () {
    return view('login_guru');
});

// Halaman Register (Tampilan Form)
Route::get('/register', function () { 
    return view('register'); 
});


// 3. SEMUA JALUR PROSES DATA (POST) - TARUH DI BAWAH!
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);


// 4. JALUR UTAMA SETELAH LOGGED IN
Route::get('/dashboard', function () {
    // Kalau belum login, usir balik ke halaman login
    if (!session()->has('user_id')) {
        return redirect('/login')->withErrors(['login_error' => 'Login dulu dong bro!']);
    }

    // Kalau yang login adalah SISWA
    if (session('role') === 'siswa') {
        return view('dashboard_siswa');
    }

    // Kalau yang login adalah GURU
    if (session('role') === 'guru') {
        return view('dashboard_guru');
    }
});

// ROUTE DUMMY MENU
Route::get('/forum', function() { return "<h1>Halaman Forum Group Chat Siswa</h1>"; });
Route::get('/materi', function() { return "<h1>Halaman Materi Pembelajaran</h1>"; });
Route::get('/guru/forum', function() { return "<h1>Halaman Forum Guru Panel</h1>"; });
Route::get('/guru/evaluasi-esai', function() { return "<h1>Halaman Koreksi Esai Guru</h1>"; });

// ===================================================
// AREA MATERI SISWA
// ===================================================

// Menu Utama Materi (kompetensi)
Route::get('/materi', function () {
    return view('kompetensi');
});

// Halaman Capaian Pembelajaran
Route::get('/materi/cp', function () {
    return view('halaman_cp');
});

// Halaman Informasi Pengembang
Route::get('/materi/informasi', function () {
    return view('halaman_informasi');
});

// Halaman Daftar 4 Submateri
Route::get('/materi/daftar', function () {
    return view('halaman_materi');
});

// ===================================================
// JALUR SAKTI ALUR SUBMATERI 1 (STUDENT SIDE)
// ===================================================

// Pintu Awal Belajar (Menu Kompetensi)
Route::get('/materi', function () { return view('kompetensi'); });
Route::get('/materi/cp', function () { return view('halaman_cp'); });
Route::get('/materi/informasi', function () { return view('halaman_informasi'); });
Route::get('/materi/daftar', function () { return view('halaman_materi'); });

// 1. Tujuan & Pengantar
Route::get('/materi1/tujuan', function () {
    return view('materi_1.tujuan_dan_apersepsi');
});

// 2. Materi Biotik
Route::get('/materi1/biotik', function () {
    return view('materi_1.biotik');
});

// 3. Materi Abiotik
Route::get('/materi1/abiotik', function () {
    return view('materi_1.abiotik');
});

// 4. Petunjuk Aktivitas Latihan
Route::get('/materi1/petunjuk-latihan', function () {
    return view('materi_1.petunjuk_latihan');
});

// 5. Ruang Misi Kasus Latihan (Drag-Drop + Chat)
Route::get('/materi1/latihan', function () {
    return view('materi_1.latihan');
});

// 6. Petunjuk Kuis CBT
Route::get('/materi1/petunjuk-kuis', function () {
    return view('materi_1.petunjuk_kuis');
});

// 7. Ujian Kuis CBT Pilihan Ganda
Route::get('/materi1/kuis', function () {
    
    // 👇 SATPAM PENJAGA URL (Mencegah Siswa Ujian 2 Kali) 👇
    $sudahKuis = \Illuminate\Support\Facades\DB::table('kuis_submateri')
                     ->where('user_id', session('user_id'))
                     ->where('submateri', '1') // Sesuaikan untuk materi 2, 3, 4
                     ->exists();

    if ($sudahKuis) {
        // Tendang balik ke halaman materi kalau udah pernah ngerjain
        return redirect('/materi1/biotik')->with('info', 'Kamu sudah mengerjakan kuis ini!');
    }
    // 👆 ------------------------------------------------ 👆

    // Kalau aman (belum ngerjain), baru tampilin soalnya
    return view('materi_1.kuis');
});

// 8. Refleksi Akhir Submateri 1
Route::get('/materi1/refleksi', function () {
    return view('materi_1.refleksi');
});

// ===================================================
// JALUR SAKTI ALUR SUBMATERI 2 (TINGKATAN ORGANISASI)
// ===================================================

Route::get('/materi2/tujuan', function () { return view('materi_2.tujuan'); });
Route::get('/materi2/ekosistem', function () { return view('materi_2.ekosistem'); });
Route::get('/materi2/alur-energi', function () { return view('materi_2.alur_energi'); });
Route::get('/materi2/daur-biogeokimia', function () { return view('materi_2.daur_biogeokimia'); });
Route::get('/materi2/petunjuk-latihan', function () { return view('materi_2.petunjuk_latihan'); });
Route::get('/materi2/latihan', function () { return view('materi_2.latihan'); });
Route::get('/materi2/petunjuk-kuis', function () { return view('materi_2.petunjuk_kuis'); });
Route::get('/materi2/kuis', function () { return view('materi_2.kuis'); });
Route::get('/materi2/refleksi', function () { return view('materi_2.refleksi'); });

// ===================================================
// JALUR SUBMATERI 3 (PENGARUH MANUSIA)
// ===================================================

Route::get('/materi3/tujuan', function () { return view('materi_3.tujuan'); });
Route::get('/materi3/materi', function () { return view('materi_3.pengaruh_manusia'); });
Route::get('/materi3/petunjuk-latihan', function () { return view('materi_3.petunjuk_latihan'); });
Route::get('/materi3/latihan', function () { return view('materi_3.latihan'); });
Route::get('/materi3/petunjuk-kuis', function () { return view('materi_3.petunjuk_kuis'); });
Route::get('/materi3/kuis', function () { return view('materi_3.kuis'); });
Route::get('/materi3/refleksi', function () { return view('materi_3.refleksi'); });

// ===================================================
// JALUR SUBMATERI 4 (KONSERVASI)
// ===================================================

Route::get('/materi4/tujuan', function () { return view('materi_4.tujuan'); });
Route::get('/materi4/materi1', function () { return view('materi_4.materi1'); });
Route::get('/materi4/materi2', function () { return view('materi_4.materi2'); });
Route::get('/materi4/petunjuk-latihan', function () { return view('materi_4.petunjuk_latihan'); });
Route::get('/materi4/latihan', function () { return view('materi_4.latihan'); });
Route::get('/materi4/petunjuk-kuis', function () { return view('materi_4.petunjuk_kuis'); });
Route::get('/materi4/kuis', function () { return view('materi_4.kuis'); });
Route::get('/materi4/refleksi', function () { return view('materi_4.refleksi'); });

// Rute Chat & Presence
Route::get('/chat/{submateri}/get', [ChatController::class, 'getMessages']);
Route::post('/chat/{submateri}/send', [ChatController::class, 'sendMessage']);
Route::post('/chat/{submateri}/clear', [ChatController::class, 'clearChat']);

// 2 RUTE BARU UNTUK ONLINE PRESENCE 👇
Route::post('/chat/{submateri}/ping', [ChatController::class, 'pingOnline']);
Route::get('/chat/{submateri}/online', [ChatController::class, 'getOnlineUsers']);

Route::get('/guru/data', function () { return view('guru.data_siswa'); });
Route::get('/guru/evaluasi', function () { return view('guru.halaman_evaluasi'); });
Route::get('/guru/hasil-submateri', function () { return view('guru.hasil_submateri'); });
Route::get('/dashboard-guru', [TeacherController::class, 'dashboard']);

// Ubah rute ini:
Route::get('/guru/data', [TeacherController::class, 'dataSiswa']);
Route::get('/guru/hasil-submateri', [TeacherController::class, 'hasilKuis']);
Route::get('/guru/evaluasi', [TeacherController::class, 'hasilEvaluasi']);

use App\Http\Controllers\NilaiController;

Route::post('/simpan-nilai', [NilaiController::class, 'simpanNilai']);

use App\Http\Controllers\EvaluasiController;

// Langsung aja rutenya, pengecekan loginnya kita pindah ke Controller
Route::get('/evaluasi', [EvaluasiController::class, 'index'])->name('evaluasi.index');
Route::post('/evaluasi/submit', [EvaluasiController::class, 'submit'])->name('evaluasi.submit');

// Tambahin di baris route lu yang lain
Route::post('/simpan-refleksi', [App\Http\Controllers\NilaiController::class, 'simpanRefleksi']);

use App\Http\Controllers\ProfilSiswaController;

Route::get('/profil', [ProfilSiswaController::class, 'index']);

Route::post('/guru/evaluasi/simpan', [App\Http\Controllers\TeacherController::class, 'simpanEvaluasiAkhir']);
Route::get('/guru/refleksi', [App\Http\Controllers\TeacherController::class, 'refleksiSiswa']);   

Route::get('/logout', function () {
    // Hapus semua data sesi (termasuk user_id)
    session()->flush(); 
    
    // Lempar balik ke login dengan pesan
    return redirect('/login')->withErrors(['login_error' => 'Anda telah berhasil keluar.']);
});

// CONTOH RUTE SETELAH DIPROTEKSI (UDAH BENER)

Route::get('/dashboard-siswa', function () {
    return view('dashboard_siswa'); 
})->middleware('anti-back'); // <--- Cukup tambahkan ini di ujung

Route::get('/profil', [ProfilSiswaController::class, 'index'])->middleware('anti-back'); // <--- Tambahkan ini juga

Route::get('/materi/cp', function () {
    return view('halaman_cp');
})->middleware('anti-back'); // <--- Dan ini juga

// Rute untuk membersihkan riwayat chat saat selesai latihan
Route::post('/chat/{submateri}/clear', [App\Http\Controllers\ChatController::class, 'clearChat']);

// Rute untuk Generate Kelompok Otomatis
Route::get('/guru/generate-kelompok/{kelas}', [\App\Http\Controllers\TeacherController::class, 'generateKelompok']);

// ===================================================
// JALUR SAKTI ALUR SUBMATERI 1
// ===================================================
Route::get('/materi1/tujuan', function () {
    // SATPAM PENJAGA MATERI 1
    $sudahSelesai = \Illuminate\Support\Facades\DB::table('kuis_submateri')
        ->where('user_id', session('user_id'))
        ->where('submateri', '1')
        ->exists();

    if ($sudahSelesai) {
        return redirect('/materi/daftar')->with('popup_prevent', 'Materi 1 (Ekosistem)');
    }

    return view('materi_1.tujuan_dan_apersepsi');
});

// ===================================================
// JALUR SAKTI ALUR SUBMATERI 2
// ===================================================
Route::get('/materi2/tujuan', function () {
    $sudahSelesai = \Illuminate\Support\Facades\DB::table('kuis_submateri')
        ->where('user_id', session('user_id'))
        ->where('submateri', '2')
        ->exists();

    if ($sudahSelesai) {
        return redirect('/materi/daftar')->with('popup_prevent', 'Materi 2 (Tingkatan Organisasi Kehidupan)');
    }

    return view('materi_2.tujuan');
});

// ===================================================
// JALUR SAKTI ALUR SUBMATERI 2
// ===================================================
Route::get('/materi3/tujuan', function () {
    $sudahSelesai = \Illuminate\Support\Facades\DB::table('kuis_submateri')
        ->where('user_id', session('user_id'))
        ->where('submateri', '3')
        ->exists();

    if ($sudahSelesai) {
        return redirect('/materi/daftar')->with('popup_prevent', 'Materi 3 (Pengaruh Manusia terhadap Ekosistem)');
    }

    return view('materi_3.tujuan');
});

// ===================================================
// JALUR SAKTI ALUR SUBMATERI 4
// ===================================================
Route::get('/materi4/tujuan', function () { // 👈 INI YANG DIGANTI
    $sudahSelesai = \Illuminate\Support\Facades\DB::table('kuis_submateri')
        ->where('user_id', session('user_id'))
        ->where('submateri', '4')
        ->exists();

    if ($sudahSelesai) {
        return redirect('/materi/daftar')->with('popup_prevent', 'Materi 4 (Konservasi)');
    }

    return view('materi_4.tujuan');
});

// Halaman Utama (Landing Page)
Route::get('/', function () {
    if (session()->has('user_id')) {
        if (session('role') === 'siswa') return redirect('/dashboard-siswa');
        if (session('role') === 'guru') return redirect('/dashboard-guru');
    }
    return view('landing');
});