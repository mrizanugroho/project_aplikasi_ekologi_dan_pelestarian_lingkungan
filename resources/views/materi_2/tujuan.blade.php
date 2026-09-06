<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Materi 2 | Tujuan & Apersepsi</title>
  <link rel="stylesheet" href="{{ asset('css/style_materi1.css') }}" />
  <script defer src="{{ asset('js/script_materi1.js?v=' . time()) }}"></script>
</head>
<body data-page="intro">
<aside class="sidebar">
  <button class="btn-back" onclick="window.location.href='{{ url('/materi/daftar') }}'">⬅ Kembali</button>
  <h2>🌿 <br><span>Materi 2:</span><br>Tingkatan Organisasi Kehidupan</h2>
  <nav class="nav-menu">
    <a href="{{ url('/materi2/tujuan') }}" class="nav-item active">🎯 Tujuan & Apersepsi</a>
    <a href="{{ url('/materi2/ekosistem') }}" class="nav-item">📘 Ekosistem</a>
    <a href="{{ url('/materi2/alur-energi') }}" class="nav-item">📘 Alur Energi</a>
    <a href="{{ url('/materi2/daur-biogeokimia') }}" class="nav-item">📘 Daur Biogeokimia</a>
    <a href="{{ url('/materi2/petunjuk-latihan') }}" class="nav-item locked">🧩 Latihan 🔒</a>
    <a href="{{ url('/materi2/petunjuk-kuis') }}" class="nav-item locked">🧩 Kuis 🔒</a>
    <a href="{{ url('/materi2/refleksi') }}" class="nav-item locked">💭 Refleksi 🔒</a>
  </nav>
</aside>

<main class="content">

  <!-- HEADER -->
  <header class="header">
    <h1>🌱 Tujuan Pembelajaran & Pengantar</h1>
  </header>

  <!-- ===== TUJUAN PEMBELAJARAN ===== -->
  <section class="content-box">
    <h3>🎯 Tujuan Pembelajaran</h3>
    <p class="lead">
      Setelah mempelajari materi ini, kamu diharapkan dapat:
    </p>

<ul>
  <li>Menjelaskan pengertian <strong>ekosistem</strong> dan komponen penyusunnya.</li>
  <li>Mengidentifikasi tingkatan organisasi kehidupan dalam ekologi (individu, populasi, komunitas, ekosistem, bioma, dan biosfer).</li>
  <li>Menjelaskan proses <strong>aliran energi</strong> melalui rantai dan jaring-jaring makanan.</li>
  <li>Menjelaskan proses <strong>daur biogeokimia</strong> seperti siklus air dan siklus karbon.</li>
  <li>Menganalisis berbagai bentuk <strong>interaksi antarkomponen ekosistem</strong> seperti kompetisi, predasi, herbivori, dan simbiosis.</li>
</ul>
  </section>

  <!-- ===== APERSEPSI ===== -->
  <section class="content-box">
    <h3>🌿 Pengantar</h3>
    <p class="lead">
      Sebelum mulai belajar, yuk kita pikirkan beberapa hal berikut!
    </p>

<p>
  Pernahkah kamu mengamati taman, kebun, atau kolam di sekitar sekolahmu?
  Di sana terdapat berbagai makhluk hidup seperti tumbuhan, serangga,
  burung, atau ikan yang saling berinteraksi.
</p>

<p>
  Mengapa makhluk hidup tersebut dapat hidup bersama dalam satu tempat?
  Bagaimana hubungan antara tumbuhan, hewan, air, tanah, dan cahaya Matahari?
  Apakah semua komponen tersebut saling bergantung satu sama lain?
</p>

<p>
  Pada materi ini, kamu akan mempelajari tentang <strong>tingkatan organisasi kehidupan</strong>,
  <strong>aliran energi</strong>, <strong>daur biogeokimia</strong>, serta
  berbagai bentuk <strong>interaksi dalam ekosistem</strong> yang terjadi di alam.
</p>
  </section>
  
  <div class="done-section">
    <a href="{{ url('/materi2/ekosistem') }}" class="btn-selesai">▶️ Mulai Materi</a>
  </div>
</main>
</body>
</html>