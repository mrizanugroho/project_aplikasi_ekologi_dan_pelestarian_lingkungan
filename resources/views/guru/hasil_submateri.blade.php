<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Kuis - Eko-Guru Panel</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/dashboard_guru.css">
    <script>
    // Over data real ke JS
    const dataRealSiswa = @json($siswaList);
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
                <a href="{{ url('/guru/hasil-submateri') }}" class="menu-item active">
                    <i class="fa-solid fa-book-open"></i>
                    <span>Hasil Kuis</span>
                </a>
                <a href="{{ url('/guru/evaluasi') }}" class="menu-item  ">
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
                    <h1 class="header-title">Hasil Kuis Siswa</h1>
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
                        <h3><i class="fa-solid fa-graduation-cap"></i> Nilai Submateri</h3>
                        <div class="action-tools">
                            <div class="action-tools">
                                <form action="{{ url('/guru/hasil-submateri') }}" method="GET" id="formFilterKelas">
                                    <select name="kelas" class="filter-kelas" onchange="document.getElementById('formFilterKelas').submit()">
                                        <option value="7A" {{ $kelasFilter == '7A' ? 'selected' : '' }}>Kelas 7A</option>
                                        <option value="7B" {{ $kelasFilter == '7B' ? 'selected' : '' }}>Kelas 7B</option>
                                        <option value="7C" {{ $kelasFilter == '7C' ? 'selected' : '' }}>Kelas 7C</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>Rekap Nilai Kuis (Materi 1 - 4)</th>
                                    <th style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($siswaList as $index => $siswa)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><strong>{{ $siswa->nama_lengkap }}</strong> <br><small class="text-muted">{{ $siswa->username }}</small></td>
                                    <td>
                                        <!-- List Nilai 1 sampai 4 bertumpuk -->
                                        <div style="display: flex; flex-direction: column; gap: 4px; font-size: 13px;">
                                            <span><strong>Kuis 1:</strong> {!! $siswa->kuis_1 ? '<span style="color:#16a34a;">'.$siswa->kuis_1->skor.'</span>' : '<span style="color:#94a3b8;">Belum</span>' !!}</span>
                                            <span><strong>Kuis 2:</strong> {!! $siswa->kuis_2 ? '<span style="color:#16a34a;">'.$siswa->kuis_2->skor.'</span>' : '<span style="color:#94a3b8;">Belum</span>' !!}</span>
                                            <span><strong>Kuis 3:</strong> {!! $siswa->kuis_3 ? '<span style="color:#16a34a;">'.$siswa->kuis_3->skor.'</span>' : '<span style="color:#94a3b8;">Belum</span>' !!}</span>
                                            <span><strong>Kuis 4:</strong> {!! $siswa->kuis_4 ? '<span style="color:#16a34a;">'.$siswa->kuis_4->skor.'</span>' : '<span style="color:#94a3b8;">Belum</span>' !!}</span>
                                        </div>
                                    </td>
                                    <td style="text-align: center;">
                                        <button class="btn-action view" onclick="bukaDetailKuisSiswa('{{ $siswa->id }}')" title="Lihat Analisis">
                                            <i class="fa-solid fa-eye"></i> Detail
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

<div id="modalDetailSiswa" class="modal-overlay-guru">
        <div class="modal-content-guru">
            
            <button class="btn-close-modal" onclick="tutupDetailSiswa()">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <h3 style="color: var(--text-dark); font-size: 18px; margin-bottom: 20px;">
                <i class="fa-solid fa-user-check" style="color: var(--primary-green);"></i> 
                Analisis Capaian: <span id="namaSiswaTerpilih" style="color: var(--primary-green);">Nama Siswa</span>
            </h3>

            <div class="grid-submateri-select">
                <button class="btn-sub-tab active" onclick="gantiSubmateri(1, this)">Submateri 1</button>
                <button class="btn-sub-tab" onclick="gantiSubmateri(2, this)">Submateri 2</button>
                <button class="btn-sub-tab" onclick="gantiSubmateri(3, this)">Submateri 3</button>
                <button class="btn-sub-tab" onclick="gantiSubmateri(4, this)">Submateri 4</button>
            </div>

            <div class="score-summary-row" style="justify-content: center;">
                <!-- Kotak Latihan Dihapus Total -->

                <!-- Sisa Kotak Kuis (Dibuat agak lebar biar rapi di tengah) -->
<!-- Sisa Kotak Kuis (Rapi di Tengah) -->
                <div class="score-sub-card" style="width: 100%; max-width: 650px; text-align: center;">
                    <h4 style="font-size: 14px; color: var(--text-muted); margin-bottom: 8px;"><i class="fa-solid fa-trophy"></i> Skor Bagian Kuis</h4>
                    
                    <!-- Bungkus skor dan info benar/salah pakai flex column center biar sejajar rapi di tengah -->
                    <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; margin-bottom: 15px;">
                        <div class="score-badge-big kuis-color" id="skorKuis" style="font-size: 32px; font-weight: 700; margin-bottom: 4px;">0</div>
                        <p style="font-size: 13px; color: var(--text-muted);" id="detailKuis">✔️ Benar: 0 | ❌ Salah: 0</p>
                    </div>
                    
                    <p style="font-size: 14px; font-weight: 600; margin-top: 25px; color: #475569; border-bottom: 2px solid #e2e8f0; padding-bottom: 8px; text-align: left;">Detail Analisis Soal:</p>
                    <!-- Ini wadah list soalnya -->
                    <div id="listKuisDetail" style="margin-top: 15px; display: flex; flex-direction: column; gap: 12px; text-align: left;"></div>
                </div>
            </div>
    <script src="../js/script_guru.js"></script>
</body>
</html>