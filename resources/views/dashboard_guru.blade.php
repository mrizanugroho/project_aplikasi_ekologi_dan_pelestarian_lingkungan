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
<script>
    const dataGrafik = {
        materi_1: {
            kuis: {{ \Illuminate\Support\Facades\DB::table('kuis_submateri')->where('submateri', '1')->count() }}
        },
        materi_2: {
            kuis: {{ \Illuminate\Support\Facades\DB::table('kuis_submateri')->where('submateri', '2')->count() }}
        },
        materi_3: {
            kuis: {{ \Illuminate\Support\Facades\DB::table('kuis_submateri')->where('submateri', '3')->count() }}
        },
        materi_4: {
            kuis: {{ \Illuminate\Support\Facades\DB::table('kuis_submateri')->where('submateri', '4')->count() }}
        },
        
        total_siswa: {
            kelas_7a: {{ \Illuminate\Support\Facades\DB::table('users')->where('role', 'siswa')->where('kelas', '7A')->count() }},
            kelas_7b: {{ \Illuminate\Support\Facades\DB::table('users')->where('role', 'siswa')->where('kelas', '7B')->count() }},
            kelas_7c: {{ \Illuminate\Support\Facades\DB::table('users')->where('role', 'siswa')->where('kelas', '7C')->count() }}
        }
    };
</script>
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
                <a href="{{ url('/dashboard-guru') }}" class="menu-item active">
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
                    <h1 class="header-title">Selamat Datang, Bapak/Ibu Guru 👋</h1>
                </div>
                <div class="header-right">
                    <div class="teacher-profile">
                        <i class="fa-solid fa-circle-user"></i>
                        <span>{{ session('nama_lengkap') }}</span>
                    </div>
                </div>
            </header>

            <div class="content-body">
                
                <div class="dashboard-row grid-2">
                    
                    <div class="stat-card-summary">
                        <h3><i class="fa-solid fa-circle-info"></i> Ringkasan Kelas</h3>
                        <div class="summary-box-grid">
                            <div class="box-stat">
                                <h4>Total Kelas</h4>
                                <p>3 Kelas</p>
                            </div>
                            <div class="box-stat">
                                <h4>KKM Sains</h4>
                                <p>75</p>
                            </div>
                        </div>
                    </div>

                    <div class="chart-card">
                        <h3><i class="fa-solid fa-chart-pie"></i> Distribusi Total Siswa yang Diajar</h3>
                        <div class="chart-container pie-size">
                            <canvas id="chartTotalSiswa"></canvas>
                        </div>
                    </div>

                </div>

                <h2 class="section-title">📊 Penyelesaian Latihan & Kuis per Submateri</h2>
                
                <div class="dashboard-row grid-4">
                    
                    <div class="chart-card submateri-card">
                        <span class="badge sm-1">Submateri 1</span>
                        <h4>Ekosistem (Biotik & Abiotik)</h4>
                        <div class="chart-container">
                            <canvas id="chartSub1"></canvas>
                        </div>
                    </div>

                    <div class="chart-card submateri-card">
                        <span class="badge sm-2">Submateri 2</span>
                        <h4>Alur Energi di Alam</h4>
                        <div class="chart-container">
                            <canvas id="chartSub2"></canvas>
                        </div>
                    </div>

                    <div class="chart-card submateri-card">
                        <span class="badge sm-3">Submateri 3</span>
                        <h4>Pengaruh Aktivitas Manusia</h4>
                        <div class="chart-container">
                            <canvas id="chartSub3"></canvas>
                        </div>
                    </div>

                    <div class="chart-card submateri-card">
                        <span class="badge sm-4">Submateri 4</span>
                        <h4>Metode Konservasi Alam</h4>
                        <div class="chart-container">
                            <canvas id="chartSub4"></canvas>
                        </div>
                    </div>

                </div>

            </div> </div> </div> </body>
</html>