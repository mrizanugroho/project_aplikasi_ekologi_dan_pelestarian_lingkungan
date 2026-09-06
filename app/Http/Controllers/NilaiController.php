<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    public function simpanNilai(Request $request)
    {
        $userId = session('user_id');

        if (!$userId) {
            return response()->json(['status' => 'error', 'message' => 'Sesi login tidak ditemukan'], 401);
        }

        // Ambil nomor submateri secara dinamis dari 'materi_1' -> 1
        $materiId = $request->materi_id ?? 'materi_1';
        $submateriAngka = (int) str_replace('materi_', '', $materiId);

        // Simpan atau update ke database kuis_submateri
        DB::table('kuis_submateri')->updateOrInsert(
            [
                'user_id'   => $userId,
                'submateri' => $submateriAngka,
            ],
            [
                'skor'             => $request->skor,
                'jumlah_benar'     => $request->jumlah_benar,
                'jumlah_salah'     => $request->jumlah_salah,
                'pola_jawaban'     => $request->pola_jawaban,
                'waktu_pengerjaan' => now(), // 👈 Sesuai dengan kolom database lu!
            ]
        );

        return response()->json(['status' => 'success']);
    }

    public function simpanRefleksi(Request $request)
    {
        // Validasi input
        $request->validate([
            'submateri' => 'required|integer',
            'jawaban_esai' => 'required',
            'skala_pemahaman' => 'required|integer'
        ]);

        $userId = session('user_id');

        if (!$userId) {
            return response()->json(['status' => 'error', 'message' => 'Sesi login tidak ditemukan'], 401);
        }

        // Simpan ke database
        DB::table('refleksi_siswa')->insert([
            'user_id'          => $userId,
            'submateri'        => $request->submateri,
            'jawaban_esai'     => $request->jawaban_esai,
            'skala_pemahaman'  => $request->skala_pemahaman,
            'waktu_pengerjaan' => now()
        ]);

        return response()->json([
            'status' => 'success', 
            'message' => 'Refleksi tersimpan!'
        ]);
    }
}