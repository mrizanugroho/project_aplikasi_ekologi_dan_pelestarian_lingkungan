<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\EvaluasiAkhir; 
// Pastikan model Kuis dan Refleksi juga ada, kalau nggak pakai DB facade aja kayak di bawah

class ProfilSiswaController extends Controller
{
    public function index()
    {
        // 1. Cek login pakai Session (mirip EvaluasiController kamu)
        if (!session()->has('user_id')) {
            return redirect('/login')->withErrors(['login_error' => 'Login dulu bro!']);
        }

        $userId = session('user_id');

        // 2. Ambil data siswa (asumsi tabel users, sesuaikan kalau namanya tabel siswa)
        $user = DB::table('users')->where('id', $userId)->first();

        // 3. Ambil data Kuis Submateri yang udah selesai
        $kuis = DB::table('kuis_submateri')->where('user_id', $userId)->get();

        // 4. Ambil data Refleksi (sesuaikan nama tabelmu)
        $refleksi = DB::table('refleksi_siswa')->where('user_id', $userId)->get();

        // 5. Ambil data Evaluasi Akhir
        $evaluasi = DB::table('evaluasi_akhir')->where('user_id', $userId)->first(); 

        return view('profil', compact('user', 'kuis', 'refleksi', 'evaluasi'));
    }
}