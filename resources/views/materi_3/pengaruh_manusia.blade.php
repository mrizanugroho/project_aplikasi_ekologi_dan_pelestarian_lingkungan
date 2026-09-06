<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Materi 3 | Tujuan & Apersepsi</title>
  <link rel="stylesheet" href="{{ asset('css/style_materi3.css') }}" />
  <script defer src="{{ asset('js/script_materi3.js?v=' . time()) }}"></script>
</head>
<body data-page="intro">
<aside class="sidebar">
  <button class="btn-back" onclick="window.location.href='{{ url('/materi3/tujuan') }}'">⬅ Kembali</button>
  <h2>🌿 <br><span>Materi 3:</span><br>Pengaruh Manusia terhadap Ekosistem</h2>
  <nav class="nav-menu">
    <a href="{{ url('/materi3/tujuan') }}" class="nav-item">🎯 Tujuan & Apersepsi</a>
    <a href="{{ url('/materi3/materi') }}" class="nav-item active">📘 Pengaruh</a>
    <a href="{{ url('/materi3/petunjuk-latihan') }}" class="nav-item locked">🧩 Latihan 🔒</a>
    <a href="{{ url('/materi3/petunjuk-kuis') }}" class="nav-item locked">🧩 Kuis 🔒</a>
    <a href="{{ url('/materi3/refleksi') }}" class="nav-item locked">💭 Refleksi 🔒</a>
  </nav>
</aside>

  <!-- 👇 Trik data-page untuk mengaktifkan JS -->
  <body data-page="materi-abiotik">

  <!-- ===== KONTEN ===== -->
  <main class="content">
    <header class="header">
      <h1>🌍 Pengaruh Manusia terhadap Ekosistem</h1>
    </header>
<section class="biotik-story">

<!-- ================= PENGANTAR ================= -->
<article class="materi-block fade-section">
  <div class="materi-image">
    <img src="../img/materi_2/DampakManusia.png" alt="Pengaruh manusia terhadap ekosistem">
  </div>
  <div class="materi-text">
    <p>Manusia merupakan makhluk hidup yang sangat memengaruhi lingkungan. Setiap aktivitas manusia dapat memberikan dampak terhadap keseimbangan ekosistem.</p>
    <p>Pengaruh manusia dapat bersifat positif maupun negatif. Aktivitas seperti pertanian, pembangunan, dan penggunaan energi dapat mengubah kondisi lingkungan dan memengaruhi kehidupan makhluk hidup lainnya.</p>
  </div>
</article>

<!-- ================= PERTANIAN ================= -->
<article class="materi-block reverse fade-section">
  <div class="materi-image">
    <img src="../img/materi_2/EkosistemSawah.png" alt="Pertanian">
  </div>
  <div class="materi-text">
    <h4>🌾 Pertanian dan Produksi Pangan</h4>
    <p>Kegiatan pertanian dilakukan manusia untuk menghasilkan bahan pangan. Namun penggunaan pupuk kimia dan pestisida secara berlebihan dapat merusak lingkungan.</p>
    <p>Pestisida dapat membunuh organisme lain yang sebenarnya tidak menjadi target. Selain itu, sistem pertanian monokultur dapat mengurangi keanekaragaman hayati di suatu wilayah.</p>
  </div>
</article>

<!-- ================= KERUSAKAN HABITAT ================= -->
<article class="materi-block fade-section">
  <div class="materi-image">
    <img src="../img/materi_2/Deforestasi.png" alt="Kerusakan habitat">
  </div>
  <div class="materi-text">
    <h4>🌳 Kerusakan Habitat</h4>
    <p>Habitat adalah tempat hidup makhluk hidup. Aktivitas manusia seperti penebangan hutan, pembangunan pemukiman, dan pertambangan dapat menyebabkan hilangnya habitat alami.</p>
    <p>Jika habitat rusak atau hilang, banyak tumbuhan dan hewan tidak dapat bertahan hidup sehingga terancam punah.</p>
  </div>
</article>

<!-- ================= POLUSI ================= -->
<article class="materi-block reverse fade-section">
  <div class="materi-image">
    <img src="../img/materi_2/Polusi.png" alt="Polusi lingkungan">
  </div>
  <div class="materi-text">
    <h4>🏭 Polusi Lingkungan</h4>
    <p>Polusi adalah masuknya zat berbahaya ke dalam lingkungan sehingga mengganggu keseimbangan alam.</p>
    <p>Polusi dapat terjadi karena asap kendaraan, limbah industri, atau pembuangan sampah sembarangan. Dampaknya dapat berupa kerusakan lingkungan, penyakit, dan gangguan pada makhluk hidup.</p>
  </div>
</article>

<!-- ================= PERUBAHAN IKLIM ================= -->
<article class="materi-block fade-section">
  <div class="materi-image">
    <img src="../img/materi_2/PerubahanIklim.png" alt="Perubahan iklim">
  </div>
  <div class="materi-text">
    <h4>🌡️ Perubahan Iklim</h4>
    <p>Aktivitas manusia seperti pembakaran bahan bakar fosil dan penebangan hutan dapat meningkatkan jumlah gas rumah kaca di atmosfer.</p>
    <p>Hal ini menyebabkan perubahan iklim global yang ditandai dengan meningkatnya suhu bumi, mencairnya es di kutub, naiknya permukaan laut, serta cuaca yang semakin ekstrem.</p>
  </div>
</article>

<!-- ================= KONSERVASI ================= -->
<article class="materi-block reverse fade-section">
  <div class="materi-image">
    <img src="../img/materi_2/Konservasi.png" alt="Konservasi lingkungan">
  </div>
  <div class="materi-text">
    <h4>🌱 Konservasi Lingkungan</h4>
    <p>Untuk menjaga keseimbangan ekosistem, manusia perlu melakukan kegiatan konservasi.</p>
    <p>Konservasi merupakan upaya melindungi dan melestarikan sumber daya alam agar tetap tersedia bagi generasi mendatang.</p>
    <p>Contoh kegiatan konservasi antara lain menanam pohon, melakukan daur ulang sampah, menggunakan energi alternatif, dan melindungi habitat hewan dan tumbuhan.</p>
  </div>
</article>

</section>

<!-- ================= SIMULASI DAMPAK MANUSIA ================= -->
<section class="content-box simulasi-box fade-section">
<h3>🧪 Simulasi Dampak Aktivitas Manusia</h3>
<p class="lead">Klik aktivitas manusia di bawah ini untuk melihat dampaknya terhadap ekosistem. Perhatikan bagaimana kondisi lingkungan berubah.</p>

<div class="simulasi-container">
  <button class="sim-btn" data-effect="polusi">🚗 Kendaraan Bermotor</button>
  <button class="sim-btn" data-effect="industri">🏭 Limbah Industri</button>
  <button class="sim-btn" data-effect="tebang">🌳 Penebangan Hutan</button>
  <button class="sim-btn good" data-effect="tanam">🌱 Menanam Pohon</button>
  <button class="sim-btn good" data-effect="daur">♻️ Daur Ulang Sampah</button>
</div>

<div class="simulasi-result">
  <h4 id="sim-title">Kondisi Ekosistem</h4>
  <p id="sim-desc">Klik salah satu aktivitas di atas untuk melihat dampaknya.</p>
  <div class="eco-bar">
    <div id="eco-level"></div>
  </div>
  <p class="eco-status" id="eco-status">🌍 Ekosistem Stabil</p>
</div>
</section>

<!-- ===== 📺 TAMBAHAN VIDEO PENGANTAR (DI BAWAH SIMULASI) ===== -->
<article class="materi-block video-block fade-section" style="flex-direction: column; align-items: stretch; background: linear-gradient(135deg, #f0fdf4, #bbf7d0); border: 2px dashed #16a34a; margin-top: 40px; padding: 30px; border-radius: 18px;">
  <div class="materi-text" style="margin-bottom: 15px; text-align: center; width: 100%;">
    <h4 style="font-size: 20px; color: #065f46;">📺 Video Penjelasan: Pengaruh Manusia terhadap Ekosistem</h4>
    <p style="font-size: 14px; color: #155e4b;">Silakan tonton video rangkuman ceria ini sampai selesai tanpa dicepatkan untuk mempersiapkan latihan!</p>
  </div>
  
  <div class="video-container" style="width: 100%; max-width: 600px; margin: 0 auto; border-radius: 12px; overflow: hidden; box-shadow: 0 8px 20px rgba(6,78,59,0.15);">
    <!-- Jangan lupa sesuaikan src dengan nama file video Sub-materi 3 -->
    <video id="materiVideo" width="100%" controls controlsList="nodownload">
      <source src="../video/Skrip 3_rev1.mp4" type="video/mp4">
      Browser kamu tidak mendukung pemutar video.
    </video>
  </div>
</article>

  <div class="done-section">
    <a href="{{ url('/materi3/petunjuk-latihan') }}" class="btn-selesai btn-finish" style="text-decoration: none; display: inline-block;">
      Selesaikan Materi ➡️
    </a>
  </div>
  </main>
</body>
</html>