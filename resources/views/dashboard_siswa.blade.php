<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Siswa - Eko-Platform</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <script defer src="{{ asset('js/script.js') }}"></script>
</head>
<body class="welcome-body">
  <header class="header">
    <h1>🌿 Selamat Datang, {{ session('nama_lengkap') }}!</h1>
  </header>

  <main class="welcome-container">
    <div class="welcome-content">
      <h2 class="animate-title">Halo, Sahabat Alam! 🌏</h2>
      <p>
        Jelajahi keajaiban ekosistem dengan cara yang interaktif dan menyenangkan.
        Temukan bagaimana makhluk hidup saling bergantung dalam keseimbangan alam.
      </p>
      
      <div class="button-group" style="display: flex; flex-direction: column; gap: 10px; align-items: center;">
        <button class="start-btn" onclick="window.location.href='{{ url('/materi') }}'">
          📘 Mulai Belajar Materi
        </button>
      </div>
    </div>
  </main>

  <footer class="footer">
    <p>© 2026 Eko-Platform | Media Pembelajaran Ekosistem</p>
  </footer>
</body>
</html>