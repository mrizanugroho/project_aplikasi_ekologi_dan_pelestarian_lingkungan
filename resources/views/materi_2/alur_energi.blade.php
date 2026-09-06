<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Materi 2 | Alur Energi</title>
  <link rel="stylesheet" href="{{ asset('css/style_materi2.css') }}" />
  <script defer src="{{ asset('js/script_materi1.js?v=' . time()) }}"></script>
</head>
<body data-page="materi">
<aside class="sidebar">
  <button class="btn-back" onclick="window.location.href='{{ url('/materi2/ekosistem') }}'">⬅ Kembali</button>
  <h2>🌿 <br><span>Materi 2:</span><br>Tingkatan Organisasi Kehidupan</h2>
  <nav class="nav-menu">
    <a href="{{ url('/materi2/tujuan') }}" class="nav-item">🎯 Tujuan & Apersepsi</a>
    <a href="{{ url('/materi2/ekosistem') }}" class="nav-item">📘 Ekosistem</a>
    <a href="{{ url('/materi2/alur-energi') }}" class="nav-item active">📘 Alur Energi</a>
    <a href="{{ url('/materi2/daur-biogeokimia') }}" class="nav-item">📘 Daur Biogeokimia</a>
    <a href="{{ url('/materi2/petunjuk-latihan') }}" class="nav-item locked">🧩 Latihan 🔒</a>
    <a href="{{ url('/materi2/petunjuk-kuis') }}" class="nav-item locked">🧩 Kuis 🔒</a>
    <a href="{{ url('/materi2/refleksi') }}" class="nav-item locked">💭 Refleksi 🔒</a>
  </nav>
</aside>

  <!-- ===== KONTEN ===== -->
  <main class="content">
    <header class="header">
      <h1>🌿 Ekosistem dan Komponennya</h1>
    </header>
<!-- ================= ALIRAN ENERGI ================= -->
<section class="biotik-story">

<!-- ================= PENGANTAR ================= -->
<article class="materi-block fade-section">

  <div class="materi-text">
    <h4>⚡ Aliran Energi dalam Ekosistem</h4>

    <p>
      Dalam suatu ekosistem, makhluk hidup membutuhkan energi untuk
      bertahan hidup, tumbuh, dan berkembang.
      Energi tersebut tidak muncul begitu saja,
      tetapi berasal dari sumber tertentu dan mengalir
      dari satu makhluk hidup ke makhluk hidup lainnya.
    </p>

    <p>
      Proses perpindahan energi dari satu organisme ke organisme lain
      disebut <strong>aliran energi</strong>.
      Energi biasanya berpindah melalui proses makan dan dimakan.
    </p>

    <p>
      Misalnya, tumbuhan dimakan oleh belalang,
      belalang dimakan oleh katak,
      kemudian katak dimakan oleh ular.
      Proses ini menunjukkan bagaimana energi
      berpindah dalam ekosistem.
    </p>
  </div>
</article>


<!-- ================= MATAHARI ================= -->
<article class="materi-block reverse fade-section">
  <div class="materi-image">
    <img src="../img/matahari.jpg" alt="Matahari">
  </div>

  <div class="materi-text">
    <h4>☀️ Matahari sebagai Sumber Energi</h4>

    <p>
      Sumber energi utama bagi hampir semua kehidupan di Bumi
      adalah Matahari.
      Energi cahaya Matahari digunakan oleh tumbuhan
      untuk membuat makanan melalui proses fotosintesis.
    </p>

    <p>
      Melalui proses ini, tumbuhan menghasilkan makanan
      yang menjadi sumber energi bagi makhluk hidup lainnya.
      Tanpa Matahari, tumbuhan tidak dapat membuat makanan
      dan kehidupan di Bumi akan terganggu.
    </p>
  </div>
</article>


<!-- ================= PRODUSEN ================= -->
<article class="materi-block fade-section">
  <div class="materi-image">
    <img src="../img/pohon.jpg" alt="Produsen">
  </div>

  <div class="materi-text">
    <h4>🌿 Produsen</h4>

    <p>
      Produsen adalah makhluk hidup yang dapat
      membuat makanannya sendiri.
      Contohnya tumbuhan hijau seperti rumput, padi, dan pohon.
    </p>

    <p>
      Tumbuhan menggunakan cahaya Matahari,
      air, dan karbon dioksida untuk membuat makanan
      melalui fotosintesis.
    </p>

    <p>
      Karena dapat menghasilkan makanan sendiri,
      produsen menjadi sumber energi utama
      bagi makhluk hidup lainnya dalam ekosistem.
    </p>
  </div>
</article>


<!-- ================= KONSUMEN ================= -->
<article class="materi-block reverse fade-section">
  <div class="materi-image">
    <img src="../img/konsumen.jpg" alt="Konsumen">
  </div>

  <div class="materi-text">
    <h4>🐾 Konsumen</h4>

    <p>
      Konsumen adalah makhluk hidup yang tidak dapat
      membuat makanan sendiri.
      Mereka mendapatkan energi dengan memakan
      makhluk hidup lain.
    </p>

    <p>
      Konsumen dibagi menjadi beberapa jenis, yaitu:
    </p>

    <ul>
      <li><strong>Konsumen tingkat I</strong> → memakan tumbuhan (contoh: belalang).</li>
      <li><strong>Konsumen tingkat II</strong> → memakan hewan lain (contoh: katak).</li>
      <li><strong>Konsumen tingkat III</strong> → pemangsa tingkat tinggi (contoh: ular atau elang).</li>
    </ul>

  </div>
</article>


<!-- ================= PENGURAI ================= -->
<article class="materi-block fade-section">
  <div class="materi-image">
    <img src="../img/dekomposer.jpg" alt="Pengurai">
  </div>

  <div class="materi-text">
    <h4>🍄 Pengurai</h4>

    <p>
      Pengurai adalah organisme yang berperan
      menguraikan sisa makhluk hidup yang telah mati.
      Contohnya bakteri dan jamur.
    </p>

    <p>
      Pengurai mengubah sisa organisme menjadi
      zat hara yang dapat digunakan kembali oleh tumbuhan.
      Dengan demikian, materi di dalam ekosistem
      dapat terus berputar.
    </p>
  </div>
</article>


<!-- ================= RANTAI MAKANAN ================= -->
<article class="materi-block reverse fade-section">

  <div class="materi-text">
    <h4>🔗 Rantai Makanan</h4>

    <p>
      Rantai makanan adalah hubungan makan dan dimakan
      antar makhluk hidup dalam suatu ekosistem.
    </p>

    <p>
      Contoh rantai makanan di ekosistem sawah:
    </p>

    <p>
      <strong>Padi → Belalang → Katak → Ular → Elang</strong>
    </p>

    <p>
      Melalui rantai makanan, energi dari Matahari
      berpindah dari produsen ke konsumen.
    </p>
  </div>
</article>

<!-- ================= RANTAI MAKANAN INTERAKTIF ================= -->
<section class="foodchain-section fade-section">

  <h3>🔗 Contoh Rantai Makanan</h3>

  <p class="foodchain-desc">
    Energi dalam ekosistem berpindah dari satu makhluk hidup ke makhluk hidup lainnya
    melalui proses makan dan dimakan. Perhatikan contoh rantai makanan berikut.
  </p>

<div class="foodchain-container">

  <!-- PADI -->
  <div class="foodchain-item">
    <div class="food-icon">🌾</div>
    <p>Padi<br><span>(Produsen)</span></p>
    <div class="tooltip-box">
      Padi adalah produsen yang membuat makanan sendiri menggunakan energi matahari.
    </div>
  </div>

  <div class="food-arrow">➜</div>

  <!-- BELALANG -->
  <div class="foodchain-item">
    <div class="food-icon">🦗</div>
    <p>Belalang<br><span>(Konsumen I)</span></p>
    <div class="tooltip-box">
      Belalang memakan tumbuhan sehingga disebut konsumen tingkat pertama.
    </div>
  </div>

  <div class="food-arrow">➜</div>

  <!-- KATAK -->
  <div class="foodchain-item">
    <div class="food-icon">🐸</div>
    <p>Katak<br><span>(Konsumen II)</span></p>
    <div class="tooltip-box">
      Katak memakan serangga seperti belalang untuk mendapatkan energi.
    </div>
  </div>

  <div class="food-arrow">➜</div>

  <!-- ULAR -->
  <div class="foodchain-item">
    <div class="food-icon">🐍</div>
    <p>Ular<br><span>(Konsumen III)</span></p>
    <div class="tooltip-box">
      Ular adalah predator yang memakan katak atau hewan kecil lainnya.
    </div>
  </div>

  <div class="food-arrow">➜</div>

  <!-- ELANG -->
  <div class="foodchain-item">
    <div class="food-icon">🦅</div>
    <p>Elang<br><span>(Predator)</span></p>
    <div class="tooltip-box">
      Elang adalah predator puncak yang berada di tingkat tertinggi rantai makanan.
    </div>
  </div>

</div>

</section>


<!-- ================= JARING MAKANAN ================= -->
<article class="materi-block fade-section">
  <div class="materi-text">
    <h4>🕸️ Jaring-jaring Makanan</h4>

    <p>
      Dalam kenyataannya, satu makhluk hidup
      dapat memakan lebih dari satu jenis makanan.
      Oleh karena itu, beberapa rantai makanan
      dapat saling berhubungan membentuk
      <strong>jaring-jaring makanan</strong>.
    </p>

    <p>
      Jaring makanan menunjukkan hubungan yang lebih kompleks
      antara makhluk hidup dalam suatu ekosistem.
    </p>
  </div>
</article>


<!-- ================= PIRAMIDA ENERGI ================= -->
<!-- ================= PIRAMIDA ENERGI INTERAKTIF ================= -->
<section class="energy-pyramid-section">

  <h3>🔺 Piramida Energi</h3>

  <p class="pyramid-desc">
    Energi dalam ekosistem berkurang pada setiap tingkat trofik.
    Semakin ke atas piramida, jumlah energi yang tersedia semakin sedikit.
    Arah panah menunjukkan aliran energi dari produsen menuju konsumen puncak.
  </p>

  <div class="energy-pyramid">

  <div class="energy-flow-line"></div>

    <!-- KONSUMEN PUNCAK -->
    <div class="pyramid-level level-5 tooltip-left">
      <div class="level-icon">🦅</div>
      <div class="level-label">Konsumen Puncak</div>
      <div class="level-tooltip">
        Konsumen puncak berada pada tingkat tertinggi piramida energi.
        Energi yang tersedia pada tingkat ini sangat sedikit.
      </div>
    </div>

    <!-- KONSUMEN III -->
    <div class="pyramid-level level-4 tooltip-right">
      <div class="level-icon">🐍</div>
      <div class="level-label">Konsumen III</div>
      <div class="level-tooltip">
        Konsumen tingkat tiga memakan konsumen tingkat dua.
        Energi yang tersedia sudah jauh berkurang.
      </div>
    </div>

    <!-- KONSUMEN II -->
    <div class="pyramid-level level-3 tooltip-left">
      <div class="level-icon">🐸</div>
      <div class="level-label">Konsumen II</div>
      <div class="level-tooltip">
        Konsumen tingkat dua memakan konsumen tingkat satu.
        Contohnya katak yang memakan serangga.
      </div>
    </div>

    <!-- KONSUMEN I -->
    <div class="pyramid-level level-2 tooltip-right">
      <div class="level-icon">🦗</div>
      <div class="level-label">Konsumen I</div>
      <div class="level-tooltip">
        Konsumen tingkat satu adalah hewan yang memakan tumbuhan.
        Contohnya belalang yang memakan padi.
      </div>
    </div>

    <!-- PRODUSEN -->
    <div class="pyramid-level level-1 tooltip-left">
      <div class="level-icon">🌾</div>
      <div class="level-label">Produsen</div>
      <div class="level-tooltip">
        Produsen memiliki energi paling besar karena langsung
        memperoleh energi dari matahari melalui fotosintesis.
      </div>
    </div>

  </div>

</section>


</section>

  <div class="done-section">
    <a href="{{ url('/materi2/daur-biogeokimia') }}" class="btn-selesai">➡️ Lanjut ke Daur Biogeokimia</a>
  </div>
</main>
</body>
</html>