<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Materi 4 | Metode Konservasi</title>
  <link rel="stylesheet" href="{{ asset('css/style_materi4.css') }}" />
  <script defer src="{{ asset('js/script_materi4.js?v=' . time()) }}"></script>
</head>
<body data-page="intro">
<aside class="sidebar">
  <button class="btn-back" onclick="window.location.href='{{ url('/materi/daftar') }}'">⬅ Kembali</button>
  <h2>🌿 <br><span>Materi 4:</span><br>Konservasi</h2>
  <nav class="nav-menu">
    <a href="{{ url('/materi4/tujuan') }}" class="nav-item ">🎯 Tujuan & Apersepsi</a>
    <a href="{{ url('/materi4/materi1') }}" class="nav-item ">📘 Konservasi</a>
    <a href="{{ url('/materi4/materi2') }}" class="nav-item active">📘 Metode Konservasi</a>
    <a href="{{ url('/materi4/petunjuk-latihan') }}" class="nav-item locked">🧩 Latihan 🔒</a>
    <a href="{{ url('/materi4/petunjuk-kuis') }}" class="nav-item locked">🧩 Kuis 🔒</a>
    <a href="{{ url('/materi4/refleksi') }}" class="nav-item locked">💭 Refleksi 🔒</a>
  </nav>
</aside>

  <body data-page="materi">

  <!-- ===== KONTEN ===== -->
  <main class="content">
    <header class="header">
      <h1>🌿 Ekosistem dan Komponennya</h1>
    </header>
<section class="biotik-story">

  <!-- ================= PENGANTAR ================= -->
  <article class="materi-block fade-section">
    <div class="materi-image">
      <img src="../img/materi_2/Konservasi.png" alt="Konservasi Alam">
    </div>

    <div class="materi-text">
      <h4>🌿 Metode Konservasi</h4>

      <p>
        Untuk menjaga kelestarian keanekaragaman hayati, manusia perlu melakukan berbagai cara pelestarian yang disebut metode konservasi.
      </p>

      <p>
        Metode konservasi merupakan upaya yang dilakukan untuk melindungi dan menjaga makhluk hidup agar tidak mengalami kepunahan.
      </p>

      <p>
        Secara umum terdapat dua metode konservasi utama, yaitu
        <strong>konservasi in-situ</strong> dan
        <strong>konservasi ex-situ</strong>.
      </p>
    </div>
  </article>


  <!-- ================= KONSERVASI IN SITU ================= -->
  <article class="materi-block reverse fade-section">
    <div class="materi-image">
      <img src="../img/materi_2/TamanNasional.png" alt="Taman Nasional">
    </div>

    <div class="materi-text">
      <h4>🌳 Konservasi In-situ</h4>

      <p>
        Konservasi <strong>in-situ</strong> adalah upaya pelestarian makhluk hidup
        yang dilakukan di habitat aslinya.
      </p>

      <p>
        Dengan metode ini, tumbuhan dan hewan tetap hidup di lingkungan alami mereka
        sehingga hubungan dalam ekosistem tetap terjaga.
      </p>

      <p>
        Metode ini dianggap sangat efektif karena makhluk hidup dapat berkembang
        secara alami tanpa harus dipindahkan dari habitatnya.
      </p>
    </div>
  </article>


  <!-- ================= CONTOH IN SITU ================= -->
  <section class="content-box">

    <h3>🌿 Contoh Konservasi In-situ</h3>

    <p class="lead">
      Beberapa kawasan konservasi dibentuk untuk melindungi makhluk hidup
      di habitat aslinya. Arahkan kursor pada ikon untuk melihat penjelasannya.
    </p>

    <div class="konservasi-grid">

      <div class="konservasi-item">
        🌳
        <h4>Taman Nasional</h4>
        <div class="info-box">
          Kawasan pelestarian alam yang memiliki ekosistem asli dan dikelola
          untuk penelitian, pendidikan, dan pariwisata alam.
        </div>
      </div>

      <div class="konservasi-item">
        🦌
        <h4>Suaka Margasatwa</h4>
        <div class="info-box">
          Kawasan yang digunakan untuk melindungi berbagai jenis satwa liar
          agar tidak punah.
        </div>
      </div>

      <div class="konservasi-item">
        🌱
        <h4>Cagar Alam</h4>
        <div class="info-box">
          Kawasan yang melindungi tumbuhan, hewan, dan ekosistem tertentu
          yang memiliki nilai penting bagi ilmu pengetahuan.
        </div>
      </div>

    </div>
  </section>


  <!-- ================= KONSERVASI EX SITU ================= -->
  <article class="materi-block fade-section">
    <div class="materi-image">
      <img src="../img/materi_2/KebunBinatang.png" alt="Kebun Binatang">
    </div>

    <div class="materi-text">
      <h4>🦁 Konservasi Ex-situ</h4>

      <p>
        Konservasi <strong>ex-situ</strong> adalah pelestarian makhluk hidup
        yang dilakukan di luar habitat aslinya.
      </p>

      <p>
        Metode ini biasanya dilakukan apabila habitat asli makhluk hidup
        telah rusak atau jumlah populasinya sangat sedikit.
      </p>

      <p>
        Makhluk hidup akan dipelihara, dikembangbiakkan, dan dilindungi
        di tempat khusus dengan pengawasan manusia.
      </p>
    </div>
  </article>


  <!-- ================= CONTOH EX SITU ================= -->
  <section class="content-box">

    <h3>🌏 Contoh Konservasi Ex-situ</h3>

    <p class="lead">
      Beberapa tempat konservasi dibuat untuk melindungi dan
      mengembangbiakkan makhluk hidup di luar habitat aslinya.
    </p>

    <div class="konservasi-grid">

      <div class="konservasi-item">
        🦓
        <h4>Kebun Binatang</h4>
        <div class="info-box">
          Tempat pelestarian berbagai jenis hewan yang dirawat dan
          dipelihara oleh manusia.
        </div>
      </div>

      <div class="konservasi-item">
        🌿
        <h4>Kebun Raya</h4>
        <div class="info-box">
          Tempat pelestarian berbagai jenis tumbuhan dari berbagai daerah.
        </div>
      </div>

      <div class="konservasi-item">
        🐢
        <h4>Penangkaran</h4>
        <div class="info-box">
          Program pengembangbiakan hewan langka untuk meningkatkan
          jumlah populasinya.
        </div>
      </div>

    </div>
  </section>


  <!-- ================= PENUTUP ================= -->
  <article class="materi-block reverse fade-section">
    <div class="materi-image">
      <img src="../img/materi_2/Konservasi.png" alt="Menjaga Alam">
    </div>

    <div class="materi-text">
      <h4>🌍 Pentingnya Konservasi</h4>

      <p>
        Konservasi membantu menjaga keseimbangan ekosistem serta
        melindungi berbagai spesies dari ancaman kepunahan.
      </p>

      <p>
        Dengan melakukan konservasi, manusia dapat memanfaatkan
        sumber daya alam secara bijaksana tanpa merusak lingkungan.
      </p>

      <p>
        Setiap orang dapat ikut berperan dalam konservasi, misalnya
        dengan menjaga kebersihan lingkungan, menanam pohon,
        serta melindungi makhluk hidup.
      </p>
    </div>
  </article>


<article class="materi-block video-block fade-section" style="flex-direction: column; align-items: stretch; background: linear-gradient(135deg, #f0fdf4, #bbf7d0); border: 2px dashed #16a34a; margin-top: 40px; padding: 30px; border-radius: 18px;">
        <div class="materi-text" style="margin-bottom: 15px; text-align: center; width: 100%;">
          <h4 style="font-size: 20px; color: #065f46;">📺 Video Penjelasan: Konservasi</h4>
          <p style="font-size: 14px; color: #155e4b;">Silakan tonton video penutup ini sampai selesai tanpa dicepatkan untuk mempersiapkan ke Evaluasi Akhir!</p>
        </div>
        
        <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
            <iframe 
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                src="https://www.youtube.com/embed/I41w1ntyt9E?rel=0" 
                title="Video Pembelajaran Ekosistem" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                allowfullscreen>
            </iframe>
        </div>
      </article>

  <div class="done-section">
    <a href="{{ url('/materi4/petunjuk-latihan') }}" class="btn-selesai btn-finish" style="text-decoration: none; display: inline-block;">
      Selesaikan Materi ➡️
    </a>
  </div>

</section>

</body>
</html>
