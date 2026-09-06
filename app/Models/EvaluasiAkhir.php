<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluasiAkhir extends Model
{
    use HasFactory;

    // 1. Kasih tau Laravel nama tabel persis yang ada di database-mu
    protected $table = 'evaluasi_akhir';

    // 2. Daftar kolom yang BOLEH diisi dari kodingan (Mass Assignment)
protected $fillable = [
    'user_id', 
    'skor_pilgan', 
    'benar_pilgan', 
    'salah_pilgan', 
    'pola_pilgan', 
    'esai_1', 'esai_2', 'esai_3', 'esai_4', 'esai_5', 
    'komentar_guru' // <-- Tambahin ini bro
];

    // 🔥 PENTING: Cek database kamu (HeidiSQL / phpMyAdmin). 
    // Kalau di tabel evaluasi_akhir TIDAK ADA kolom 'created_at' dan 'updated_at', 
    // hapus tanda komentar (//) di baris bawah ini:
    
    // public $timestamps = false; 
}