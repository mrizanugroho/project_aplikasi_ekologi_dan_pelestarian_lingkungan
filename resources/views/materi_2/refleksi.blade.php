<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="submateri-id" content="2"> 
    
    <meta name="base-url" content="{{ url('/') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/style_refleksi.css') }}" />
    <script defer src="{{ asset('js/refleksi.js') }}"></script>
    
    <title>Refleksi Submateri 2</title>
    </head>
<body>

  <div class="wrapper">
    <aside class="sidebar">
      <button class="btn-back" onclick="window.location.href='{{ url('/materi2/petunjuk-kuis') }}'">⬅ Kembali</button>
      <h2>🌿 <br><span>Materi 2:</span><br>Tingkatan Organisasi Kehidupan</h2>
      <nav class="nav-menu">
        <a href="{{ url('/materi2/tujuan') }}" class="nav-item">🎯 Tujuan & Apersepsi</a>
        <a href="{{ url('/materi2/ekosistem') }}" class="nav-item">📘 Ekosistem</a>
        <a href="{{ url('/materi2/alur-energi') }}" class="nav-item">📘 Alur Energi</a>
        <a href="{{ url('/materi2/daur-biogeokimia') }}" class="nav-item">📘 Daur Biogeokimia</a>
        <a href="{{ url('/materi2/latihan') }}" class="nav-item">🧩 Latihan</a>
        <a href="{{ url('/materi2/kuis') }}" class="nav-item">🧩 Kuis</a>
        <a href="{{ url('/materi2/refleksi') }}" class="nav-item active">💭 Refleksi</a>
      </nav>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="main-content">
      <header class="page-header">
        <h1>💭 Refleksi Pembelajaran</h1>
      </header>

      <section class="card">
        <h2>✍️ Refleksi Diri</h2>
        <p>Bagaimana pendapatmu tentang kegiatan pembelajaran hari ini?</p>
        <textarea id="jawaban_esai" rows="5" placeholder="Tuliskan pendapatmu di sini..."></textarea>
      </section>

      <section class="card">
        <h2>😊 Penilaian Pemahaman</h2>
        <p>Seberapa paham kamu tentang materi <strong>Ekosistem dan Pengaruh Lingkungan terhadap Organisme?</strong></p>
<div class="rating-box">
  <p><strong>Pilih tingkat pemahaman kamu (1–10):</strong></p>

  <div class="rating-grid" id="ratingGrid">
    <span class="rating-item" data-value="1">1</span>
    <span class="rating-item" data-value="2">2</span>
    <span class="rating-item" data-value="3">3</span>
    <span class="rating-item" data-value="4">4</span>
    <span class="rating-item" data-value="5">5</span>
    <span class="rating-item" data-value="6">6</span>
    <span class="rating-item" data-value="7">7</span>
    <span class="rating-item" data-value="8">8</span>
    <span class="rating-item" data-value="9">9</span>
    <span class="rating-item" data-value="10">10</span>
  </div>

  <p>Nilai yang kamu pilih: <strong id="ratingValue">-</strong></p>
</div>

      </section>
      <button id="btnSubmitRefleksi" class="btn-primary" style="margin-top: 20px; width: 100%;" disabled>Kirim Refleksi</button>
    </main>
  </div>
  </div>

  <div class="popup-selesai" id="popupResult">
    <div class="popup-card">
      <h2>🎉 Refleksimu Terkirim!</h2>
      <p id="popupFeedback"></p>
      <div class="popup-actions">
        <button id="backToQuiz2" class="btn-outline" onclick="window.location.href='{{ url('/materi/daftar') }}'">
          🏁 Selesai & Kembali ke Menu Materi
        </button>
      </div>
    </div>
  </div>

</body>
</html>