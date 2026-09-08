<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="submateri-id" content="4"> 
    
    <meta name="base-url" content="{{ url('/') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/style_refleksi.css') }}" />
    <script defer src="{{ asset('js/refleksi.js') }}"></script>
    
    <title>Refleksi Submateri 4</title>
    </head>
<body data-page="intro">
<aside class="sidebar">
  <button class="btn-back" onclick="window.location.href='{{ url('/materi/daftar') }}'">⬅ Kembali</button>
  <h2>🌿 <br><span>Materi 4:</span><br>Konservasi</h2>
  <nav class="nav-menu">
    <a href="{{ url('/materi4/tujuan') }}" class="nav-item ">🎯 Tujuan & Apersepsi</a>
    <a href="{{ url('/materi4/materi1') }}" class="nav-item ">📘 Konservasi</a>
    <a href="{{ url('/materi4/materi2') }}" class="nav-item ">📘 Metode Konservasi</a>
    <a href="{{ url('/materi4/petunjuk-latihan') }}" class="nav-item">🧩 Latihan </a>
    <a href="{{ url('/materi4/petunjuk-kuis') }}" class="nav-item">🧩 Kuis</a>
    <a href="{{ url('/materi4/refleksi') }}" class="nav-item active">💭 Refleksi</a>
  </nav>
</aside>

    <body data-page="refleksi">

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
        <p>Seberapa paham kamu tentang materi <strong>Mengapa Harus Dilakukan Konservasi Keanekaragaman Hayati</strong></p>
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
        <button id="backToQuiz2" class="btn-outline" onclick="window.location.href='{{ url('/materi4/petunjuk-kuis') }}'" aria-label="Kembali ke Kuis">⬅ Kembali ke Kuis</button>
        
        <button id="backToMateri" class="btn-secondary" onclick="window.location.href='{{ url('/materi/daftar') }}'" style="background-color: #4a5568; color: white; padding: 10px 15px; border: none; border-radius: 8px; cursor: pointer; font-weight: 500;">
          📚 Menu Pilih Materi
        </button>
        
        <button id="goToEvaluasi" class="btn-primary" onclick="window.location.href='{{ url('/evaluasi') }}'" aria-label="Lanjut ke Evaluasi">Lanjut ke Evaluasi →</button>
      </div>
    </div>
  </div>
</body>
</html>