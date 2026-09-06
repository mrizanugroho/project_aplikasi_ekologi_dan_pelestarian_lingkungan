<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beranda Pembelajaran | Ekosistem</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <script defer src="{{ asset('js/script.js') }}"></script>
</head>
<body class="kompetensi-body">
  <!-- Tambahkan style position: relative di header agar tombol tidak lari dari area hijau -->
  <header class="kompetensi-header" style="position: relative;">
    
    <h1>🌿 EKOSISTEM</h1>
    <p>Media Pembelajaran Interaktif Berbasis Web</p>
    <p class="kelas-info">SMP Kelas 7 | Semester Genap</p>

<!-- WRAPPER DROPDOWN -->
<div class="dropdown-profil-wrapper">
  <button class="btn-profil" onclick="toggleDropdown()">
    <svg class="icon-siluet" fill="currentColor" viewBox="0 0 24 24">
      <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
    </svg>
    <span class="nama-user">{{ session('nama_lengkap') ?? 'Profil Saya' }}</span>
  </button>
  
  <!-- ISI DROPDOWN -->
  <div class="dropdown-content" id="profilDropdown">
    <a href="{{ url('/profil') }}">👤 Lihat Profil</a>
    <a href="{{ url('/logout') }}" class="text-danger">🚪 Sign Out</a>
  </div>
</div>

<!-- SCRIPT TOGGLE DROPDOWN (Taruh di bawah sebelum </body>) -->
<script>
  function toggleDropdown() {
    document.getElementById("profilDropdown").classList.toggle("show");
  }

  // Tutup otomatis kalau user klik di luar area dropdown
  window.onclick = function(event) {
    if (!event.target.closest('.dropdown-profil-wrapper')) {
      let dropdown = document.getElementById("profilDropdown");
      if (dropdown && dropdown.classList.contains('show')) {
        dropdown.classList.remove('show');
      }
    }
  }
</script>

  </header>

  <main class="kompetensi-container">
    <div class="card-grid">
      <div class="menu-card active" onclick="window.location.href='{{ url('/materi/cp') }}'">
        <img src="{{ asset('img/target.png') }}" alt="Kompetensi Dasar">
        <h2>CAPAIAN<br>PEMBELAJARAN</h2>
      </div>

      <div class="menu-card active" onclick="window.location.href='{{ url('/materi/daftar') }}'">
        <img src="{{ asset('img/book.png') }}" alt="Materi">
        <h2>MATERI</h2>
      </div>

      <div class="menu-card active" onclick="window.location.href='{{ url('/materi/informasi') }}'">
        <img src="{{ asset('img/information.png') }}" alt="Informasi">
        <h2>INFORMASI<br>PENGEMBANG</h2>
      </div>
    </div>
  </main>
</body>
</html>