<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    
// Relasi ke tabel latihan (submateri)
    public function nilaiLatihan()
    {
        // Sesuaikan 'App\Models\Latihan' dengan nama Model latihan kamu
        return $this->hasMany(\App\Models\Latihan::class, 'user_id', 'id');
    }

    // Relasi ke tabel kuis
    public function nilaiKuis()
    {
        // Sesuaikan 'App\Models\Kuis' dengan nama Model kuis kamu
        return $this->hasMany(\App\Models\Kuis::class, 'user_id', 'id');
    }

    // Relasi ke tabel evaluasi pilihan ganda
    public function evaluasiPilgan()
    {
        return $this->hasOne(\App\Models\EvaluasiPilgan::class, 'user_id', 'id');
    }

    // Relasi ke tabel evaluasi esai
    public function evaluasiEsai()
    {
        return $this->hasOne(\App\Models\EvaluasiEsai::class, 'user_id', 'id');
    }

}
