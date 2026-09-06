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
  <button class="btn-back" onclick="window.location.href='{{ url('/materi/daftar') }}'">⬅ Kembali</button>
  <h2>🌿 <br><span>Materi 3:</span><br>Pengaruh Manusia terhadap Ekosistem</h2>
  <nav class="nav-menu">
    <a href="{{ url('/materi3/tujuan') }}" class="nav-item active">🎯 Tujuan & Apersepsi</a>
    <a href="{{ url('/materi3/materi') }}" class="nav-item">📘 Pengaruh</a>
    <a href="{{ url('/materi3/petunjuk-latihan') }}" class="nav-item locked">🧩 Latihan 🔒</a>
    <a href="{{ url('/materi3/petunjuk-kuis') }}" class="nav-item locked">🧩 Kuis 🔒</a>
    <a href="{{ url('/materi3/refleksi') }}" class="nav-item locked">💭 Refleksi 🔒</a>
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
      <li>Menjelaskan berbagai <strong>aktivitas manusia</strong> yang dapat memengaruhi ekosistem.</li>
      <li>Menganalisis dampak kegiatan manusia terhadap lingkungan baik <strong>dampak positif maupun negatif</strong>.</li>
      <li>Mendeskripsikan contoh kerusakan lingkungan seperti <strong>kerusakan habitat dan pencemaran (polusi)</strong>.</li>
      <li>Menjelaskan hubungan aktivitas manusia dengan <strong>perubahan iklim</strong>.</li>
      <li>Menjelaskan pentingnya <strong>konservasi</strong> dalam menjaga kelestarian makhluk hidup.</li>
    </ul>

  </section>


  <!-- ===== APERSEPSI ===== -->
  <section class="content-box">

    <h3>🌿 Apersepsi</h3>

    <p class="lead">
      Sebelum memulai materi, coba perhatikan lingkungan di sekitarmu.
    </p>

    <p>
      Manusia merupakan makhluk hidup yang memiliki pengaruh besar
      terhadap lingkungan. Berbagai kegiatan manusia seperti
      bertani, membangun permukiman, menggunakan kendaraan bermotor,
      maupun membuang sampah dapat memengaruhi keseimbangan ekosistem.
    </p>

    <p>
      Beberapa kegiatan tersebut dapat memberikan manfaat,
      tetapi ada juga yang menyebabkan kerusakan lingkungan,
      seperti pencemaran air, udara, dan tanah.
      Bahkan aktivitas manusia juga dapat menyebabkan
      <strong>perubahan iklim</strong> yang berdampak pada kehidupan di Bumi.
    </p>

    <p>
      Menurut materi pada buku IPA kelas VII, manusia memiliki
      peran yang sangat dominan terhadap perubahan ekosistem
      di Bumi sehingga diperlukan kesadaran untuk menjaga
      keseimbangan lingkungan dan melindungi keanekaragaman hayati.
    </p>

    <p>
      Menurutmu, kegiatan manusia apa saja yang dapat memengaruhi
      lingkungan di sekitarmu?
    </p>

  </section>


  <!-- ===== CTA LANJUT ===== -->
  <div class="done-section">
    <a href="{{ url('/materi3/materi') }}" class="btn-selesai">▶️ Mulai Materi</a>
  </div>
  </div>

</main>
</body>
</html>