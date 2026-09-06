<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Materi 4 | Tujuan & Apersepsi</title>
  <link rel="stylesheet" href="{{ asset('css/style_materi4.css') }}" />
  <script defer src="{{ asset('js/script_materi4.js?v=' . time()) }}"></script>
</head>
<body data-page="intro">
<aside class="sidebar">
  <button class="btn-back" onclick="window.location.href='{{ url('/materi/daftar') }}'">⬅ Kembali</button>
  <h2>🌿 <br><span>Materi 4:</span><br>Konservasi</h2>
  <nav class="nav-menu">
    <a href="{{ url('/materi4/tujuan') }}" class="nav-item active">🎯 Tujuan & Apersepsi</a>
    <a href="{{ url('/materi4/materi1') }}" class="nav-item">📘 Konservasi</a>
    <a href="{{ url('/materi4/materi2') }}" class="nav-item">📘 Metode Konservasi</a>
    <a href="{{ url('/materi4/petunjuk-latihan') }}" class="nav-item locked">🧩 Latihan 🔒</a>
    <a href="{{ url('/materi4/petunjuk-kuis') }}" class="nav-item locked">🧩 Kuis 🔒</a>
    <a href="{{ url('/materi4/refleksi') }}" class="nav-item locked">💭 Refleksi 🔒</a>
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
      <li>Menjelaskan pengertian <strong>konservasi keanekaragaman hayati</strong>.</li>
      <li>Menganalisis alasan mengapa konservasi penting bagi keberlangsungan kehidupan di Bumi.</li>
      <li>Mendeskripsikan manfaat konservasi dari aspek <strong>ekologi</strong> dan <strong>ekonomi</strong>.</li>
      <li>Menjelaskan berbagai metode konservasi seperti <strong>in-situ</strong> dan <strong>ex-situ</strong>.</li>
      <li>Menunjukkan sikap peduli terhadap lingkungan melalui tindakan menjaga kelestarian alam.</li>
    </ul>

  </section>


  <!-- ===== APERSEPSI ===== -->
  <section class="content-box">

    <h3>🌿 Apersepsi</h3>

    <p class="lead">
      Coba bayangkan jika suatu hewan atau tumbuhan tiba-tiba hilang dari Bumi.
    </p>

    <p>
      Pernahkah kamu mendengar tentang <strong>Harimau Jawa</strong>? 
      Hewan tersebut dahulu hidup di Pulau Jawa, namun kini telah punah 
      akibat perburuan dan kerusakan habitat.
    </p>

    <p>
      Kepunahan suatu spesies dapat memberikan dampak besar terhadap 
      keseimbangan ekosistem. Jika satu spesies hilang, maka rantai makanan 
      dan hubungan antar makhluk hidup di alam dapat terganggu.
    </p>

    <p>
      Oleh karena itu, manusia perlu melakukan berbagai upaya untuk 
      menjaga kelestarian alam melalui kegiatan <strong>konservasi</strong>. 
      Konservasi bertujuan untuk melindungi keanekaragaman hayati 
      agar tetap lestari dan dapat dimanfaatkan secara berkelanjutan.
    </p>

    <p>
      Menurutmu, mengapa manusia harus menjaga dan melestarikan 
      makhluk hidup di Bumi?
    </p>

  </section>


  <!-- ===== CTA LANJUT ===== -->
  <div class="done-section">
    <a href="{{ url('/materi4/materi1') }}" class="btn-selesai">▶️ Mulai Materi</a>
  </div>
  </div>

</main>
</body>
</html>