<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Materi 2 | Ekosistem</title>
  <link rel="stylesheet" href="{{ asset('css/style_materi2.css') }}" />
  <script defer src="{{ asset('js/script_materi1.js?v=' . time()) }}"></script>
</head>
<body data-page="materi">
<aside class="sidebar">
  <button class="btn-back" onclick="window.location.href='{{ url('/materi2/tujuan') }}'">⬅ Kembali</button>
  <h2>🌿 <br><span>Materi 2:</span><br>Tingkatan Organisasi Kehidupan</h2>
  <nav class="nav-menu">
    <a href="{{ url('/materi2/tujuan') }}" class="nav-item">🎯 Tujuan & Apersepsi</a>
    <a href="{{ url('/materi2/ekosistem') }}" class="nav-item active">📘 Ekosistem</a>
    <a href="{{ url('/materi2/alur-energi') }}" class="nav-item">📘 Alur Energi</a>
    <a href="{{ url('/materi2/daur-biogeokimia') }}" class="nav-item">📘 Daur Biogeokimia</a>
    <a href="{{ url('/materi2/petunjuk-latihan') }}" class="nav-item locked">🧩 Latihan 🔒</a>
    <a href="{{ url('/materi2/petunjuk-kuis') }}" class="nav-item locked">🧩 Kuis 🔒</a>
    <a href="{{ url('/materi2/refleksi') }}" class="nav-item locked">💭 Refleksi 🔒</a>
  </nav>
</aside>

  <main class="content">
    <header class="header">
      <h1>🌿 Ekosistem dan Komponennya</h1>
    </header>
<section class="biotik-story">

<!-- ================= PENGERTIAN EKOSISTEM ================= -->
<article class="materi-block fade-section">
  <div class="materi-image">
    <img src="../img/materi_2/Ekosistem.png" alt="Ekosistem Kolam">
  </div>

  <div class="materi-text">
    <h4>🌍 Apa itu Ekosistem?</h4>

    <p>
      Pernahkah kamu mengamati kolam, taman, atau kebun di sekitar sekolah?
      Di sana terdapat tumbuhan, hewan, air, tanah, dan cahaya Matahari.
      Semua komponen tersebut saling berhubungan dan membentuk suatu sistem.
    </p>

    <p>
      <strong>Ekosistem</strong> adalah hubungan saling ketergantungan
      antara makhluk hidup (komponen biotik) dan benda tak hidup
      (komponen abiotik) dalam suatu lingkungan.
    </p>

    <p>
      Jika salah satu komponen terganggu,
      maka keseimbangan ekosistem juga dapat terganggu.
    </p>
  </div>
</article>


<!-- ================= KOMPONEN EKOSISTEM ================= -->
<article class="materi-block reverse fade-section">
  <div class="materi-image">
    <img src="../img/materi_2/Ekosistem2.png" alt="Komponen Ekosistem">
  </div>

  <div class="materi-text">
    <h4>🌿 Komponen Penyusun Ekosistem</h4>

    <p>
      Ekosistem tersusun atas dua komponen utama:
    </p>

    <ul>
      <li><strong>Biotik</strong> → makhluk hidup seperti tumbuhan, hewan, manusia, jamur, dan bakteri.</li>
      <li><strong>Abiotik</strong> → benda tak hidup seperti air, tanah, udara, suhu, cahaya Matahari, dan batu.</li>
    </ul>

    <p>
      Tumbuhan membutuhkan cahaya Matahari dan air untuk membuat makanan.
      Hewan membutuhkan tumbuhan atau hewan lain sebagai sumber energi.
      Inilah contoh hubungan dalam ekosistem.
    </p>
  </div>
</article>


<!-- ================= TINGKATAN ORGANISASI ================= -->
<section class="content-box">

  <h3>📘 Tingkatan Organisasi Kehidupan</h3>

  <p class="lead">
    Dalam ekologi terdapat beberapa tingkatan kehidupan.
    Semakin tinggi tingkatannya, semakin luas cakupan wilayahnya.
  </p>

  <!-- ================= INDIVIDU ================= -->
  <article class="materi-block fade-section">
    <div class="materi-image">
      <img src="../img/materi_2/Individu.png" alt="Individu">
    </div>

    <div class="materi-text">
      <h4>1️⃣ Individu</h4>
      <p>
        Individu adalah satu makhluk hidup tunggal.
        Contohnya seekor burung, sebatang pohon mangga,
        atau seekor kucing.
      </p>
    </div>
  </article>

  <!-- ================= POPULASI ================= -->
  <article class="materi-block reverse fade-section">
    <div class="materi-image">
      <img src="../img/materi_2/Populasi.png" alt="Populasi">
    </div>

    <div class="materi-text">
      <h4>2️⃣ Populasi</h4>
      <p>
        Populasi adalah sekumpulan makhluk hidup sejenis
        yang hidup di tempat dan waktu yang sama.
        Contohnya sekumpulan kambing di padang rumput.
      </p>
    </div>
  </article>

  <!-- ================= KOMUNITAS ================= -->
  <article class="materi-block fade-section">
    <div class="materi-image">
      <img src="../img/materi_2/Komunitas.png" alt="Komunitas">
    </div>

    <div class="materi-text">
      <h4>3️⃣ Komunitas</h4>
      <p>
        Komunitas adalah kumpulan berbagai populasi
        yang hidup bersama dan saling berinteraksi.
        Misalnya tumbuhan, serangga, dan burung di sawah.
      </p>
    </div>
  </article>

  <!-- ================= EKOSISTEM ================= -->
  <article class="materi-block reverse fade-section">
    <div class="materi-image">
      <img src="../img/materi_2/Ekosistem.png" alt="Ekosistem">
    </div>

    <div class="materi-text">
      <h4>4️⃣ Ekosistem</h4>
      <p>
        Ekosistem adalah hubungan antara komunitas
        makhluk hidup dengan lingkungan tak hidupnya,
        seperti air, tanah, dan cahaya Matahari.
      </p>
    </div>
  </article>

  <!-- ================= BIOMA ================= -->
  <article class="materi-block fade-section">
    <div class="materi-image">
      <img src="../img/materi_2/Bioma.png" alt="Bioma">
    </div>

    <div class="materi-text">
      <h4>5️⃣ Bioma</h4>
      <p>
        Bioma adalah ekosistem yang sangat luas
        dan memiliki ciri khas tertentu,
        seperti hutan hujan tropis atau gurun.
      </p>
    </div>
  </article>

  <!-- ================= BIOSFER ================= -->
  <article class="materi-block reverse fade-section">
    <div class="materi-image">
      <img src="../img/materi_2/Biosfer.png" alt="Biosfer">
    </div>

    <div class="materi-text">
      <h4>6️⃣ Biosfer</h4>
      <p>
        Biosfer adalah seluruh wilayah di Bumi
        yang terdapat kehidupan.
        Ini merupakan tingkatan paling luas.
      </p>
    </div>
  </article>

</section>


<!-- ================= CONTOH EKOSISTEM ================= -->
<section class="content-box">

  <h3>🌳 Contoh Ekosistem</h3>

  <p class="lead">
    Ekosistem dapat ditemukan di berbagai tempat.
    Setiap ekosistem memiliki komponen biotik dan abiotik
    yang saling berinteraksi menjaga keseimbangan alam.
  </p>

  <!-- ================= KOLOM ================= -->
  <article class="materi-block fade-section">
    <div class="materi-image">
      <img src="../img/materi_2/EkosistemKolam.png" alt="Ekosistem Kolam">
    </div>

    <div class="materi-text">
      <h4>1️⃣ Ekosistem Kolam</h4>
      <p>
        Di dalam kolam terdapat ikan, tumbuhan air, katak,
        dan mikroorganisme. Semua makhluk hidup ini
        bergantung pada air, cahaya Matahari, dan oksigen.
      </p>
    </div>
  </article>

  <!-- ================= SAWAH ================= -->
  <article class="materi-block reverse fade-section">
    <div class="materi-image">
      <img src="../img/materi_2/EkosistemSawah.png" alt="Ekosistem Sawah">
    </div>

    <div class="materi-text">
      <h4>2️⃣ Ekosistem Sawah</h4>
      <p>
        Sawah memiliki padi sebagai produsen,
        serta belalang, tikus, katak, dan ular.
        Interaksi antar makhluk hidup membentuk rantai makanan.
      </p>
    </div>
  </article>

  <!-- ================= HUTAN ================= -->
  <article class="materi-block fade-section">
    <div class="materi-image">
      <img src="../img/materi_2/EkosistemHutan.png" alt="Ekosistem Hutan">
    </div>

    <div class="materi-text">
      <h4>3️⃣ Ekosistem Hutan</h4>
      <p>
        Hutan memiliki keanekaragaman makhluk hidup
        yang sangat tinggi, seperti pohon besar,
        burung, serangga, dan hewan liar.
        Cahaya Matahari dan tanah menjadi faktor penting.
      </p>
    </div>
  </article>

  <!-- ================= LAUT ================= -->
  <article class="materi-block reverse fade-section">
    <div class="materi-image">
      <img src="../img/materi_2/EkosistemLaut.png" alt="Ekosistem Laut">
    </div>

    <div class="materi-text">
      <h4>4️⃣ Ekosistem Laut</h4>
      <p>
        Laut merupakan ekosistem yang sangat luas.
        Di dalamnya terdapat ikan, terumbu karang,
        plankton, dan berbagai organisme laut lainnya.
      </p>
    </div>
  </article>
</section>


</section>

  <div class="done-section">
    <a href="{{ url('/materi2/alur-energi') }}" class="btn-selesai">➡️ Lanjut ke Alur Energi</a>
  </div>
</main>
</body>
</html>