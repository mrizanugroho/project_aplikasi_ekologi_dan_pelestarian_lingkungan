<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Evaluasi Akhir - Eko-Guru Panel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/dashboard_guru.css">
    <script>
    // Laravel bakal ngerender ini jadi const dataEvaluasiDariDatabase = {...}; 
    // pas di browser, jadi aman banget
    const dataEvaluasiDariDatabase = @json(json_decode($jsonEvaluasi ?? '{}'));
</script>
</head>
<body>

    <div class="dashboard-wrapper">
        
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-brand">
                <i class="fa-solid fa-seedling"></i>
                <span>Eko-Guru Panel</span>
            </div>
            
            <nav class="sidebar-menu">
                <a href="{{ url('/dashboard-guru') }}" class="menu-item">
                    <i class="fa-solid fa-chart-pie"></i>
                    <span>Dashboard Utama</span>
                </a>
                <a href="{{ url('/guru/data') }}" class="menu-item">
                    <i class="fa-solid fa-users"></i>
                    <span>Data Siswa</span>
                </a>
                <a href="{{ url('/guru/hasil-submateri') }}" class="menu-item">
                    <i class="fa-solid fa-book-open"></i>
                    <span>Hasil Kuis</span>
                </a>
                <a href="{{ url('/guru/evaluasi') }}" class="menu-item active">
                    <i class="fa-solid fa-graduation-cap"></i>
                    <span>Hasil Evaluasi Akhir</span>
                </a>
                <a href="{{ url('/guru/refleksi') }}" class="menu-item">
                    <i class="fa-solid fa-comments"></i>
                    <span>Refleksi Siswa</span>
                </a>
                <a href="{{ url('/login') }}" class="menu-item logout">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Keluar</span>
                </a>
            </nav>
        </aside>

        <div class="main-content" id="mainContent">
            
            <header class="main-header">
                <div class="header-left">
                    <button id="sidebarToggle" class="btn-toggle">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <h1 class="header-title">Rekap Evaluasi Akhir (HOTS)</h1>
                </div>
                <div class="header-right">
                    <div class="teacher-profile">
                        <i class="fa-solid fa-circle-user"></i>
                        <span>{{ session('nama_lengkap') }}</span>
                    </div>
                </div>
            </header>

            <div class="content-body">
                
                <div class="chart-card data-card">
                    <div class="table-header-action">
                        <h3><i class="fa-solid fa-file-signature"></i> Nilai Ujian Siswa (Soal 1 - 25)</h3>
                        <div class="action-tools">
                            <select class="filter-kelas">
                                <option value="7a">Kelas 7A</option>
                            </select>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Skor Pilgan (1-20)</th>
                                    <th>Status Esai (21-25)</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($listEvaluasi as $index => $data)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><strong>{{ $data->nama_lengkap }}</strong></td>
                                    <td><span class="badge-kelas">{{ $data->kelas }}</span></td>
                                    <td><span class="score-badge-inline">{{ $data->skor_pilgan }} / 100</span></td>
                                    <td>
                                        @if($data->status_esai == 'Sudah Dinilai')
                                            <span class="status-badge active"><i class="fa-solid fa-circle-check"></i> Sudah Dinilai</span>
                                        @else
                                            <span class="status-badge inactive"><i class="fa-solid fa-clock"></i> Belum Diperiksa</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn-action view" onclick="bukaEvaluasiSiswa('{{ $data->nama_lengkap }}')" title="Periksa Ujian">
                                            <i class="fa-solid fa-file-pen"></i> Periksa & Detail
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div> </div> </div>

    <div id="modalEvaluasiSiswa" class="modal-overlay-guru">
        <div class="modal-content-guru evaluation-modal-size">
            
            <button class="btn-close-modal" onclick="tutupEvaluasiSiswa()">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <h3 style="color: var(--text-dark); font-size: 18px; margin-bottom: 20px; border-bottom: 2px solid var(--border-color); padding-bottom: 10px;">
                <i class="fa-solid fa-graduation-cap" style="color: var(--primary-green);"></i> 
                Lembar Jawaban Evaluasi: <span id="namaSiswaEvaluasi" style="color: var(--primary-green);">Nama Siswa</span>
            </h3>

            <div class="evaluation-section-block">
                <div class="eval-block-header">
                    <h5>Bagian A: Pilihan Ganda (Skor Otomatis)</h5>
                    <span class="eval-score-text" id="txtSkorPilgan">Skor: 0</span>
                </div>
                <p style="font-size: 12px; color: var(--text-muted); margin-bottom: 10px;" id="txtDetailPilgan">Benar: 0 | Salah: 0</p>
                <div class="question-analysis-grid" id="gridEvaluasiPilgan">
                    </div>
            </div>

            <div class="evaluation-section-block" style="margin-top: 25px;">
                <h5>Bagian B: Koreksi Jawaban Esai (Soal 21 - 25)</h5>
                <p style="font-size: 12px; color: var(--text-muted); margin-bottom: 15px;">Silakan baca jawaban analisis HOTS siswa lalu berikan nilai (skala 0 - 20) per nomor.</p>
                
                <div class="essay-review-list" id="listEvaluasiEsai">
                    </div>
            </div>

            <div class="feedback-section" style="margin-top: 25px;">
                <div class="feedback-header">
                    <div class="feedback-icon"><i class="fa-solid fa-award"></i></div>
                    <div>
                        <h4>Komentar & Evaluasi Akhir Guru</h4>
                        <p>Berikan feedback menyeluruh untuk performa siswa di bab Ekosistem ini.</p>
                    </div>
                </div>
                <div class="feedback-input-wrapper">
                    <textarea class="feedback-textarea" id="txtKomentarEvaluasi" placeholder="Ketik evaluasi akhir di sini... (Contoh: Luar biasa! Analisis dampak aktivitas manusiamu sangat tajam dan solutif.)"></textarea>
                    <div class="feedback-footer">
                        <span class="feedback-hint"><i class="fa-solid fa-circle-info"></i> Masuk ke rapor digital siswa</span>
                        <button class="btn-save-comment" onclick="simpanKoreksiEvaluasi()">
                            Simpan Semua Nilai & Catatan <i class="fa-solid fa-floppy-disk"></i>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    
    <script src="../js/script_guru.js"></script>
</body>
</html>