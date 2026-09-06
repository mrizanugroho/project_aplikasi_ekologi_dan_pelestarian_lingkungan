<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Belajarku | Ekosistem</title>
    
    <!-- Panggil CSS Profil -->
    <link rel="stylesheet" href="{{ asset('css/profil-siswa.css') }}">
    
    <!-- Kalau mau sekalian manggil CSS utama kamu, uncomment kode di bawah ini -->
    <!-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> -->
</head>
<body style="background-color: #f4fcf4;"> <!-- Background hijau tipis -->

    <div class="profil-wrapper fade-in-up">
        <!-- Tombol Kembali -->
        <div style="margin-bottom: 20px;">
            <a href="{{ url('/materi') }}" style="text-decoration: none; color: #ffffff; font-weight: bold; text-shadow: 0 1px 3px rgba(0,0,0,0.3);">
                ⬅ Kembali ke Beranda
            </a>
        </div>

        <div class="profil-header">
            <div class="header-content">
                <h2>Halo, {{ $user->nama_lengkap ?? 'Siswa' }}! 🌱</h2>
                
                <!-- === TAMBAHAN: BADGE NIM & KELAS === -->
                <div style="margin: 15px 0; display: flex; justify-content: center; gap: 15px;">
                    <span style="background: rgba(16, 185, 129, 0.15); color: #047857; padding: 6px 18px; border-radius: 20px; font-weight: 600; font-size: 14px; border: 1px solid rgba(16, 185, 129, 0.3);">
                        🎓 NIM: {{ $user->username ?? '-' }}
                    </span>
                    <span style="background: rgba(16, 185, 129, 0.15); color: #047857; padding: 6px 18px; border-radius: 20px; font-weight: 600; font-size: 14px; border: 1px solid rgba(16, 185, 129, 0.3);">
                        🏫 Kelas: {{ $user->kelas ?? '-' }}
                    </span>
                </div>
                <!-- =================================== -->

                <p>Ini adalah rekam jejak perjalanan belajarmu di Eko-Platform.</p>
            </div>
        </div>

        <div class="profil-grid">
            <!-- Card Kuis -->
            <div class="profil-card">
                <div class="card-title">📝 Riwayat Kuis Submateri</div>
                <div class="card-body">
                    @if($kuis->count() > 0)
                        <ul class="list-item">
                            @foreach($kuis as $k)
                                <li>
                                    <!-- KODE BARU -->
                                    <span class="modul-badge">Materi {{ $k->submateri ?? '-' }}</span>
                                    <span class="modul-score">Skor: {{ $k->skor ?? '0' }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="empty-state">Belum ada kuis yang diselesaikan.</p>
                    @endif
                </div>
            </div>

<!-- Card Refleksi -->
<div class="profil-card">
    <div class="card-title">💡 Catatan Refleksi</div>
    <div class="card-body">
        @if($refleksi->count() > 0)
            <ul class="list-item">
                @foreach($refleksi as $r)
                    <li style="flex-direction: column; align-items: flex-start; gap: 10px;">
                        
                        <!-- 🔥 Ganti ke kolom 'submateri' -->
                        <span class="modul-badge">Materi {{ $r->submateri ?? '-' }}</span>
                        
                        <!-- Sesuaikan dengan kolom jawabanmu, misal: jawaban_esai -->
                        <span class="refleksi-text">"{{ $r->jawaban_esai ?? 'Tidak ada jawaban' }}"</span>
                        
                    </li>
                @endforeach
            </ul>
        @else
            <p class="empty-state">Belum ada refleksi yang kamu tulis.</p>
        @endif
    </div>
</div>

        <!-- Card Evaluasi Akhir -->
        <div class="profil-card highlight-card">
            <div class="card-title">🏆 Hasil Evaluasi Akhir</div>
            <div class="card-body">
                @if($evaluasi)
                    <div class="evaluasi-stats">
                        <div class="stat-box">
                            <span>Skor Pilihan Ganda</span>
                            <strong>{{ $evaluasi->skor_pilgan }}</strong>
                        </div>
                        <div class="stat-box">
                            <span>Status Esai</span>
                            <strong>{{ $evaluasi->status_esai }}</strong>
                        </div>
                    </div>
                    
                    <div class="komentar-guru">
                        <h4>Komentar Guru:</h4>
                        @if($evaluasi->komentar_guru)
                            <blockquote>"{{ $evaluasi->komentar_guru }}"</blockquote>
                        @else
                            <p class="empty-state">Menunggu evaluasi dan komentar dari guru...</p>
                        @endif
                    </div>
                @else
                    <p class="empty-state">Kamu belum mengerjakan Evaluasi Akhir.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Panggil JS Profil -->
    <script src="{{ asset('js/profil-siswa.js') }}"></script>
</body>
</html>