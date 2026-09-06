<?php

namespace App\Http\Controllers;

// 1. SEMUA IMPORT 'USE' DIKUMPULIN DI PALING ATAS SINI
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
/* ===================================================
       FUNGSI REGISTER (PENDAFTARAN AKUN)
    =================================================== */
    public function register(Request $request)
    {
        // 1. Validasi inputan form dari user
        $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'username'     => 'required|string|max:50|unique:users,username',
            'password'     => 'required|string|min:6',
            'role'         => 'required|in:siswa,guru',
            // 🔥 TAMBAHIN INI: Validasi kelas (nullable karena guru gak ngisi kelas)
            'kelas'        => 'nullable|string|in:7A,7B,7C', 
        ]);

        // 2. Cek Logika Token kalau dia milih jadi GURU
        if ($request->role === 'guru') {
            $tokenRahasia = 'GURU-EKO-2026'; // Token rahasia kamu
            
            if ($request->token_guru !== $tokenRahasia) {
                return redirect()->back()->withErrors(['token_guru' => 'Token Guru salah bro! Akses ditolak.'])->withInput();
            }
        }

        // 3. Masukkan data ke database tabel 'users'
        DB::table('users')->insert([
            'nama_lengkap' => $request->nama_lengkap,
            'username'     => $request->username,
            'password'     => Hash::make($request->password), // Password di-hash
            'role'         => $request->role,
            // 🔥 TAMBAHIN INI: Logika penyimpanan kelas
            'kelas'        => $request->role === 'siswa' ? $request->kelas : null,
            'created_at'   => now()
        ]);

        // 4. Kalau sukses, lempar ke halaman login
        return redirect('/login')->with('sukses', 'Akun berhasil dibuat! Silakan login.');
    }

    /* ===================================================
       FUNGSI LOGIN (MASUK APLIKASI)
    =================================================== */
    public function login(Request $request)
    {
        // 1. Validasi input form login
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // 2. Ambil data user berdasarkan username dari database
        $user = DB::table('users')->where('username', $request->username)->first();

        // 3. Cek apakah usernya ada dan password-nya cocok
        if ($user && Hash::check($request->password, $user->password)) {
            
            // Simpan data login ke session bawaan Laravel
            session([
                'user_id' => $user->id,
                'nama_lengkap' => $user->nama_lengkap,
                'role' => $user->role
            ]);

            // 4. Arahkan ke halaman utama/dashboard sesuai role-nya
            return redirect('/dashboard')->with('welcome', 'Halo, selamat datang kembali!');
        }

        // 5. Kalau gagal, balikin ke login dengan pesan error
        return redirect()->back()->withErrors(['login_error' => 'Username atau Password kamu salah, bro!'])->withInput();
    }
}