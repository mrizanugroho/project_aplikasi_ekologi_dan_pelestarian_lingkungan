<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refleksi Siswa - Eko-Guru Panel</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/dashboard_guru.css') }}">
</head>
<body>

    <div class="dashboard-wrapper">
        
        <!-- Sidebar -->
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
                <a href="{{ url('/guru/evaluasi') }}" class="menu-item">
                    <i class="fa-solid fa-graduation-cap"></i>
                    <span>Hasil Evaluasi Akhir</span>
                </a>
                <!-- Menu Baru -->
                <a href="{{ url('/guru/refleksi') }}" class="menu-item active">
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
                    <h1 class="header-title">Data Refleksi Siswa</h1>
                </div>
            </header>

            <div class="content-body">
                
                <div class="chart-card data-card">
                    <div class="table-header-action">
                        <h3><i class="fa-solid fa-comments"></i> Daftar Refleksi Siswa</h3>
                        
                        <!-- Form Filter -->
                        <form method="GET" action="{{ url('/guru/refleksi') }}" class="action-tools" style="display: flex; gap: 10px;">
                            
                            <!-- Tambahkan onchange disini -->
                            <select name="kelas" class="filter-kelas" onchange="this.form.submit()">
                                <option value="semua" {{ $kelasFilter == 'semua' ? 'selected' : '' }}>Semua Kelas</option>
                                <option value="7A" {{ $kelasFilter == '7A' ? 'selected' : '' }}>Kelas 7A</option>
                                <option value="7B" {{ $kelasFilter == '7B' ? 'selected' : '' }}>Kelas 7B</option>
                                <option value="7C" {{ $kelasFilter == '7C' ? 'selected' : '' }}>Kelas 7C</option>
                            </select>

                            <!-- Tambahkan onchange disini -->
                            <select name="materi" class="filter-kelas" onchange="this.form.submit()">
                                <option value="semua" {{ $materiFilter == 'semua' ? 'selected' : '' }}>Semua Materi</option>
                                <option value="1" {{ $materiFilter == '1' ? 'selected' : '' }}>Materi 1</option>
                                <option value="2" {{ $materiFilter == '2' ? 'selected' : '' }}>Materi 2</option>
                                <option value="3" {{ $materiFilter == '3' ? 'selected' : '' }}>Materi 3</option>
                                <option value="4" {{ $materiFilter == '4' ? 'selected' : '' }}>Materi 4</option>
                            </select>

                            <!-- Tombol filter bisa disembunyikan pakai style="display:none;" karena sudah otomatis, 
                                tapi kita biarin aja buat pemanis UI atau fallback -->
                            <button type="submit" class="btn-action view" style="border:none; cursor:pointer;">
                                <i class="fa-solid fa-filter"></i> Filter
                            </button>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Materi</th>
                                    <th>Jawaban Refleksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($dataRefleksi as $index => $data)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><strong>{{ $data->nama_lengkap }}</strong></td>
                                    <td><span class="badge-kelas">{{ $data->kelas }}</span></td>
                                    <td><span class="score-badge-inline">Materi {{ $data->submateri }}</span></td>
                                    <td style="max-width: 300px; white-space: normal; line-height: 1.5;">
                                        "{{ $data->jawaban_esai ?? 'Tidak ada jawaban' }}"
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" style="text-align: center; padding: 20px;">Belum ada data refleksi yang sesuai filter.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>