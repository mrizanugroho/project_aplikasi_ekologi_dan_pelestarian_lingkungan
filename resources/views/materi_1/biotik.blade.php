<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Materi 1 | Ekosistem</title>
  <link rel="stylesheet" href="{{ asset('css/style_materi1.css') }}" />
  <script defer src="{{ asset('js/script_materi1.js') }}"></script>
</head>
<body>
  
<aside class="sidebar">
  <button class="btn-back" onclick="window.location.href='{{ url('/materi1/tujuan') }}'">⬅ Kembali</button>
  <h2>🌿 <br><span>Materi 1:</span><br>Ekosistem</h2>
  <nav class="nav-menu">
    <a href="{{ url('/materi1/tujuan') }}" class="nav-item">🎯 Tujuan & Pengantar</a>
    <a href="{{ url('/materi1/biotik') }}" class="nav-item active">📘 Materi Biotik</a>
    <a href="{{ url('/materi1/abiotik') }}" class="nav-item">📘 Materi Abiotik</a>
    <a href="{{ url('/materi1/petunjuk-latihan') }}" class="nav-item locked">🧩 Latihan 🔒</a>
    <a href="{{ url('/materi1/petunjuk-kuis') }}" class="nav-item locked">🧩 Kuis 🔒</a>
    <a href="{{ url('/materi1/refleksi') }}" class="nav-item locked">💭 Refleksi 🔒</a>
  </nav>
</aside>

  <!-- ===== KONTEN ===== -->
  <main class="content">
    <header class="header">
      <h1>🌱 Pengaruh Lingkungan terhadap Organisme</h1>
    </header>

  <section class="content-box" id="intro-materi">
    <p>
      Setiap makhluk hidup (organisme) berinteraksi dengan lingkungannya untuk dapat bertahan hidup. 
      Lingkungan terdiri dari dua komponen utama, yaitu 
      <strong>komponen biotik</strong> (makhluk hidup) dan 
      <strong>komponen abiotik</strong> (benda tak hidup). 
      Kedua komponen ini saling berhubungan dan membentuk <em>keseimbangan ekosistem</em> 
      yang membuat kehidupan di bumi dapat berlangsung secara harmonis.
    </p>

<!-- ===== KOMponen BIOTIK (GANTI BAGIAN LAMA DENGAN INI) ===== -->
<section class="biotik-section content-box" id="bagian-biotik">
  <h3>🌿 Komponen Biotik</h3>

  <p class="lead">
    Komponen biotik adalah semua makhluk hidup yang terdapat di dalam suatu ekosistem.
    Mereka berperan dalam menjaga aliran energi dan materi. Berikut beberapa peran dan contoh:
  </p>

<section class="biotik-story">

<!-- ================= PRODUSEN ================= -->
<article class="materi-block">
  <div class="materi-image">
    <img src="../img/pohon.jpg" alt="Produsen">
  </div>

  <div class="materi-text">
    <h4>🌱 Produsen</h4>

    <p>
      Produsen adalah makhluk hidup yang mampu membuat makanan sendiri.
      Sebagian besar produsen adalah tumbuhan hijau yang memiliki klorofil
      untuk melakukan fotosintesis.
    </p>

    <p>
      Fotosintesis adalah proses pembuatan makanan dengan bantuan cahaya
      matahari, air, dan karbon dioksida. Dari proses ini dihasilkan makanan
      (glukosa) dan oksigen yang sangat penting bagi kehidupan manusia dan hewan.
    </p>

    <p>
      Dalam ekosistem, produsen menjadi sumber energi utama.
      Semua makhluk hidup lain secara langsung maupun tidak langsung
      bergantung pada produsen.
    </p>

    <ul>
      <li>Contoh: rumput, padi, pohon mangga, ganggang.</li>
      <li>Menghasilkan oksigen untuk makhluk hidup lain.</li>
      <li>Menjadi dasar rantai makanan.</li>
    </ul>
  </div>
</article>


<!-- ================= KONSUMEN ================= -->
<article class="materi-block reverse">
  <div class="materi-image">
    <img src="../img/konsumen1.jpg" alt="Konsumen">
  </div>

  <div class="materi-text">
    <h4>🍽️ Konsumen</h4>

    <p>
      Konsumen adalah makhluk hidup yang tidak dapat membuat makanan sendiri.
      Mereka memperoleh energi dengan memakan makhluk hidup lain.
    </p>

    <p>
      Berdasarkan jenis makanannya, konsumen dibedakan menjadi:
    </p>

    <ul>
      <li><strong>Herbivora</strong> → pemakan tumbuhan (sapi, kambing).</li>
      <li><strong>Karnivora</strong> → pemakan daging (singa, elang).</li>
      <li><strong>Omnivora</strong> → pemakan tumbuhan dan hewan (ayam, manusia).</li>
    </ul>

    <p>
      Konsumen berperan menjaga keseimbangan populasi dalam ekosistem.
      Jika jumlah konsumen terlalu banyak atau terlalu sedikit,
      keseimbangan alam dapat terganggu.
    </p>
  </div>
</article>


<!-- ================= INTERAKSI BIOTIK ================= -->
<article class="materi-block">
  <div class="materi-image">
    <img src="../img/konsumen.jpg" alt="Interaksi Biotik">
  </div>

  <div class="materi-text">
    <h4>🤝 Interaksi Biotik</h4>

    <p>
      Interaksi biotik adalah hubungan antara makhluk hidup dalam ekosistem.
      Setiap makhluk hidup saling memengaruhi dan saling membutuhkan.
    </p>

    <ul>
      <li><strong>Predasi</strong> → hubungan pemangsa dan mangsa (ular dan tikus).</li>
      <li><strong>Mutualisme</strong> → kedua pihak diuntungkan (lebah dan bunga).</li>
      <li><strong>Komensalisme</strong> → satu diuntungkan, satu tidak dirugikan.</li>
      <li><strong>Parasitisme</strong> → satu diuntungkan, satu dirugikan.</li>
      <li><strong>Kompetisi</strong> → persaingan mendapatkan makanan atau tempat.</li>
    </ul>

    <p>
      Interaksi ini menjaga keseimbangan dalam ekosistem.
      Jika satu hubungan terganggu, maka makhluk hidup lain juga dapat terpengaruh.
    </p>
  </div>
</article>


<!-- ================= DEKOMPOSER ================= -->
<article class="materi-block reverse">
  <div class="materi-image">
    <img src="../img/dekomposer.jpg" alt="Dekomposer">
  </div>

  <div class="materi-text">
    <h4>🍄 Dekomposer</h4>

    <p>
      Dekomposer adalah makhluk hidup yang menguraikan sisa-sisa makhluk hidup
      yang telah mati menjadi zat yang lebih sederhana.
    </p>

    <p>
      Zat tersebut akan kembali ke tanah sebagai unsur hara dan
      dimanfaatkan kembali oleh tumbuhan.
    </p>

    <ul>
      <li>Contoh: jamur dan bakteri.</li>
      <li>Menguraikan bangkai dan daun kering.</li>
      <li>Membantu daur ulang materi dalam ekosistem.</li>
    </ul>

    <p>
      Tanpa dekomposer, sisa makhluk hidup akan menumpuk
      dan keseimbangan ekosistem akan terganggu.
    </p>
  </div>
</article>

</section>

    <p>
      Komponen biotik juga berinteraksi satu sama lain dalam berbagai bentuk, seperti:
    </p>

<!-- ====== INTERAKSI ANTAR KOMPONEN BIOTIK ====== -->
<h3 class="judul-interaksi">🦁 Interaksi Antar Komponen Biotik</h3>

<div class="interaksi-card">
    <div class="interaksi-gif">
        <img src="../img/cheetah_running.gif" alt="Predasi">
    </div>
    <div class="interaksi-text">
        <h4>🐅 Predasi</h4>
        <p>
            Predasi adalah interaksi antara pemangsa (<strong>predator</strong>) dan mangsa.
            Predator menangkap dan memakan organisme lain untuk mendapatkan energi dan nutrisi.
            Interaksi ini sangat penting untuk menjaga keseimbangan populasi di alam.
        </p>
        <p>
            <strong>Contoh:</strong> <em>cheetah mengejar kijang</em>, <em>harimau memangsa rusa</em>,
            atau <em>elang berburu tikus</em>.
        </p>
    </div>
</div>

<div class="interaksi-card">
    <div class="interaksi-gif">
        <img src="../img/symbiosis.gif" alt="Simbiosis">
    </div>
    <div class="interaksi-text">
        <h4>🤝 Simbiosis</h4>
        <p>
          Simbiosis adalah interaksi jangka panjang antara dua organisme berbeda spesies yang hidup berdampingan. Dalam hubungan ini, ada yang saling menguntungkan, ada yang hanya satu pihak yang untung, bahkan ada yang merugikan salah satu pihak.
          Simbiosis membantu makhluk hidup bertahan, mendapatkan makanan, atau perlindungan, sehingga menjadi bagian penting dalam keseimbangan ekosistem.
        </p>
        <p>
          <strong>Contoh:</strong> <em>Kutu Daun (Semut mendapat embun madu, Kutu Daun mendapat perlindungan)</em>.
        </p>
    </div>
</div>

<div class="interaksi-card">
    <div class="interaksi-gif">
        <img src="../img/competition.gif" alt="Kompetisi">
    </div>
    <div class="interaksi-text">
        <h4>⚔️ Kompetisi</h4>
        <p>
          Kompetisi adalah interaksi ketika dua atau lebih organisme memperebutkan sumber daya yang terbatas, seperti makanan, tempat tinggal, cahaya, air, atau pasangan.
          Dalam buku dijelaskan bahwa kompetisi terjadi jika kebutuhan organisme sama, tetapi jumlah sumber dayanya sedikit. Hal ini membantu menjaga keseimbangan populasi dan menyeleksi organisme yang paling mampu beradaptasi.
        </p>
        <p>
          <strong>Contoh:</strong> <em>Singa jantan saling berkompetisi untuk mendapatkan wilayah kekuasaan dan pasangan.
          Singa yang menang akan memimpin kelompok dan menguasai sumber daya, sedangkan yang kalah harus pergi dan mencari daerah baru.</em>.
        </p>
    </div>
</div>
  </section>

  <div class="done-section">
    <a href="{{ url('/materi1/abiotik') }}" class="btn-selesai">Lanjut ke Materi Abiotik ➡️</a>
  </div>
</main>
</body>
</html>