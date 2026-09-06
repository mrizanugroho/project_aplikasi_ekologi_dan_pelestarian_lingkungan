<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KuisSubmateri extends Model
{
    use HasFactory;

    // 1. Kasih tau Laravel kalau model ini memegang tabel kuis_submateri
    protected $table = 'kuis_submateri';

    // 2. Buka gembok kolom agar bisa diisi data secara massal
    protected $fillable = [
        'user_id',
        'materi_id',
        'jenis_tugas',
        'skor',
    ];
}