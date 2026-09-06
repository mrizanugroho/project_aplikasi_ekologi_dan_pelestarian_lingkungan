<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Guru - Eko-Platform</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <link rel="stylesheet" href="{{ asset('css/dashboard_guru.css') }}">
    <script defer src="{{ asset('js/script_guru.js') }}"></script>
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
                <a href="{{ url('/guru/data') }}" class="menu-item active">
                    <i class="fa-solid fa-users"></i>
                    <span>Data Siswa</span>
                </a>
                <a href="{{ url('/guru/hasil-submateri') }}" class="menu-item">
                    <i class="fa-solid fa-book-open"></i>
                    <span>Hasil Kuis</span>
                </a>
                <a href="{{ url('/guru/evaluasi') }}" class="menu-item">
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
                    <h1 class="header-title">Data Siswa Kelas 7</h1>
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
                        <h3><i class="fa-solid fa-list"></i> Daftar Siswa Terdaftar</h3>
                        
                        <div class="action-tools">
                            <select class="filter-kelas">
                                <option value="all">Semua Kelas</option>
                                <option value="7a">Kelas 7A</option>
                                <option value="7b">Kelas 7B</option>
                                <option value="7c">Kelas 7C</option>
                            </select>

                            <a href="{{ url('/guru/generate-kelompok/7A') }}" class="btn-action edit" style="text-decoration: none; display: inline-flex; align-items: center; gap: 5px; background-color: #f59e0b; color: white;">
                                <i class="fa-solid fa-shuffle"></i> Acak Kelompok 7A
                            </a>
                            <a href="{{ url('/guru/generate-kelompok/7B') }}" class="btn-action edit" style="text-decoration: none; display: inline-flex; align-items: center; gap: 5px; background-color: #f59e0b; color: white;">
                                <i class="fa-solid fa-shuffle"></i> Acak Kelompok 7B
                            </a>
                            <a href="{{ url('/guru/generate-kelompok/7C') }}" class="btn-action edit" style="text-decoration: none; display: inline-flex; align-items: center; gap: 5px; background-color: #f59e0b; color: white;">
                                <i class="fa-solid fa-shuffle"></i> Acak Kelompok 7C
                            </a>
                            
                            <div class="search-box">
                                <i class="fa-solid fa-search"></i>
                                <input type="text" placeholder="Cari nama atau NIS...">
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIS / NISN</th>
                                    <th>Nama Lengkap</th>
                                    <th>Kelas</th>
                                    <th>Status Akun</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($siswas as $index => $siswa)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $siswa->username ?? '-' }}</td> 
                                    <td>{{ $siswa->nama_lengkap ?? '-' }}</td> 
                                    <td><span class="badge-kelas">{{ $siswa->kelas ?? '-' }}</span></td> 
                                    <td><span class="status-badge active">Aktif</span></td>
                                    <td>
                                        <!-- Tombol Edit dibuang. Tombol View ditambahin event onclick buat ngirim data -->
                                        <button class="btn-action view" 
                                                onclick="bukaDetailInfoSiswa('{{ $siswa->nama_lengkap ?? '-' }}', '{{ $siswa->username ?? '-' }}', '{{ $siswa->kelas ?? '-' }}')" 
                                                title="Lihat Detail">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

            </div> </div> </div>

            <!-- Modal Detail Informasi Siswa -->
<div id="modalInfoSiswa" class="modal-overlay-guru">
    <div class="modal-content-guru" style="max-width: 450px;">
        
        <button class="btn-close-modal" onclick="tutupDetailInfoSiswa()">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <h3 style="color: var(--text-dark); font-size: 18px; margin-bottom: 20px;">
            <i class="fa-solid fa-id-card-clip" style="color: var(--primary-green);"></i> 
            Kartu Informasi Siswa
        </h3>

        <div style="background: #f8fafc; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; text-align: left;">
            <p style="margin-bottom: 12px; font-size: 14px; color: var(--text-muted);">
                <i class="fa-solid fa-user" style="width: 20px;"></i> <strong>Nama Lengkap:</strong> <br>
                <span id="infoNama" style="color: var(--text-dark); font-size: 16px; font-weight: 500; margin-left: 25px;">-</span>
            </p>
            <p style="margin-bottom: 12px; font-size: 14px; color: var(--text-muted);">
                <i class="fa-solid fa-hashtag" style="width: 20px;"></i> <strong>NIS / NISN:</strong> <br>
                <span id="infoNis" style="color: var(--text-dark); font-size: 15px; margin-left: 25px;">-</span>
            </p>
            <p style="margin-bottom: 12px; font-size: 14px; color: var(--text-muted);">
                <i class="fa-solid fa-chalkboard-user" style="width: 20px;"></i> <strong>Kelas:</strong> <br>
                <span id="infoKelas" style="color: var(--text-dark); font-size: 15px; margin-left: 25px;">-</span>
            </p>
            <p style="margin-bottom: 0; font-size: 14px; color: var(--text-muted);">
                <i class="fa-solid fa-circle-check" style="width: 20px;"></i> <strong>Status Akun:</strong> <br>
                <span class="status-badge active" style="margin-left: 25px; margin-top: 5px; display: inline-block;">Aktif</span>
            </p>
        </div>

    </div>
</div>

    <script src="../js/script_guru.js"></script>
</body>
</html>