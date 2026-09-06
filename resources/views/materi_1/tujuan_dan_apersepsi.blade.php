<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Materi 1 | Tujuan & Apersepsi</title>
  <link rel="stylesheet" href="{{ asset('css/style_materi1.css') }}" />
  <script defer src="{{ asset('js/script_materi1.js') }}"></script>
</head>
<body data-page="intro">
<aside class="sidebar">
  <button class="btn-back" onclick="window.location.href='{{ url('/materi/daftar') }}'">⬅ Kembali</button>
  <h2>🌿 <br><span>Materi 1:</span><br>Ekosistem</h2>
  <nav class="nav-menu">
    <a href="{{ url('/materi1/tujuan') }}" class="nav-item active">🎯 Tujuan & Pengantar</a>
    <a href="{{ url('/materi1/biotik') }}" class="nav-item">📘 Materi Biotik</a>
    <a href="{{ url('/materi1/abiotik') }}" class="nav-item">📘 Materi Abiotik</a>
    <a href="{{ url('/materi1/petunjuk-latihan') }}" class="nav-item locked">🧩 Latihan 🔒</a>
    <a href="{{ url('/materi1/petunjuk-kuis') }}" class="nav-item locked">🧩 Kuis 🔒</a>
    <a href="{{ url('/materi1/refleksi') }}" class="nav-item locked">💭 Refleksi 🔒</a>
  </nav>
</aside>

<!-- ===== KONTEN UTAMA ===== -->
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
      <li>Menjelaskan apa yang dimaksud dengan <strong>ekosistem</strong>.</li>
      <li>Membedakan <strong>komponen biotik</strong> dan <strong>komponen abiotik</strong>.</li>
      <li>Memberikan contoh komponen biotik dan abiotik di lingkungan sekitar.</li>
      <li>Menjelaskan pengaruh lingkungan terhadap kehidupan makhluk hidup.</li>
    </ul>
  </section>

  <!-- ===== APERSEPSI ===== -->
  <section class="content-box">
    <h3>🌿 Pengantar</h3>
    <p class="lead">
      Sebelum mulai belajar, yuk kita pikirkan beberapa hal berikut!
    </p>

    <p>
      Pernahkah kamu melihat tanaman yang tumbuh subur di satu tempat,
      tetapi sulit tumbuh di tempat lain?
      Atau mengapa ikan hanya bisa hidup di air,
      sedangkan burung dapat terbang di udara?
    </p>

    <p>
      Semua itu berkaitan dengan <strong>lingkungan</strong> dan
      bagaimana makhluk hidup menyesuaikan diri dengan tempat tinggalnya.
      Pada materi ini, kamu akan mempelajari hubungan antara makhluk hidup
      dan lingkungannya dalam suatu <em>ekosistem</em>.
    </p>
  </section>

  <div class="done-section">
    <a href="{{ url('/materi1/biotik') }}" class="btn-selesai">Mulai Belajar ➡️</a>
  </div>
</main>
</body>
</html>