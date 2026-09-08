<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Materi 1 | Ekosistem</title>
  <link rel="stylesheet" href="{{ asset('css/style_materi1.css') }}" />
  <script defer src="{{ asset('js/script_materi1.js?v=' . time()) }}"></script>
</head>
<body data-page="materi-abiotik">
<aside class="sidebar">
  <button class="btn-back" onclick="window.location.href='{{ url('/materi/daftar') }}'">⬅ Kembali</button>
  <h2>🌿 <br><span>Materi 1:</span><br>Ekosistem</h2>
  <nav class="nav-menu">
    <a href="{{ url('/materi1/tujuan') }}" class="nav-item">🎯 Tujuan & Pengantar</a>
    <a href="{{ url('/materi1/biotik') }}" class="nav-item">📘 Materi Biotik</a>
    <a href="{{ url('/materi1/abiotik') }}" class="nav-item active">📘 Materi Abiotik</a>
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

<!-- ===== KOMponen BIOTIK (GANTI BAGIAN LAMA DENGAN INI) ===== -->
<section class="biotik-section content-box" id="bagian-abiotik">
  <h3>💧 Komponen Abiotik</h3>

  <p class="lead">
    Komponen abiotik adalah segala sesuatu yang <em>tidak hidup</em> namun memengaruhi kehidupan organisme di dalam ekosistem.  
    Tanpa komponen abiotik, organisme tidak dapat hidup dengan baik. Berikut beberapa contoh faktor abiotik:
  </p>

<div class="materi-stack">

  <!-- 1 -->
  <article class="materi-block">
    <div class="materi-image">
      <img src="../img/matahari.jpg" alt="Matahari">
    </div>
    <div class="materi-text">
<h4>☀️ Cahaya Matahari</h4>

<p>
  Cahaya matahari merupakan sumber energi utama bagi kehidupan di bumi. 
  Tanpa cahaya matahari, hampir semua makhluk hidup tidak dapat bertahan hidup.
</p>

<p>
  Tumbuhan memanfaatkan cahaya matahari untuk melakukan fotosintesis, yaitu proses 
  pembuatan makanan dengan bantuan air dan karbon dioksida. Dari proses ini 
  dihasilkan makanan dan oksigen yang sangat penting bagi makhluk hidup lain.
</p>

<p>
  Cahaya matahari juga membantu mengatur suhu bumi serta menentukan waktu aktivitas 
  makhluk hidup, misalnya hewan yang aktif di siang hari dan hewan yang aktif di malam hari.
</p>

<ul>
  <li>Membantu proses fotosintesis.</li>
  <li>Menghasilkan energi bagi rantai makanan.</li>
  <li>Mengatur suhu dan waktu aktivitas makhluk hidup.</li>
</ul>

<p class="example">
  Contoh: Tanaman yang kekurangan cahaya matahari akan tumbuh lebih lambat dan daunnya pucat.
</p>
    </div>
  </article>

  <!-- 2 -->
  <article class="materi-block reverse">
    <div class="materi-image">
      <img src="../img/air.jpg" alt="Air">
    </div>
    <div class="materi-text">
<h4>💧 Air</h4>

<p>
  Air merupakan komponen penting bagi semua makhluk hidup. 
  Tubuh manusia, hewan, dan tumbuhan sebagian besar tersusun atas air.
</p>

<p>
  Air dibutuhkan untuk proses metabolisme, membantu mengangkut zat makanan dalam tubuh,
  serta berperan dalam fotosintesis pada tumbuhan.
</p>

<p>
  Selain itu, banyak makhluk hidup yang menjadikan air sebagai habitat, seperti ikan,
  udang, dan berbagai jenis tumbuhan air.
</p>

<ul>
  <li>Membantu proses metabolisme tubuh.</li>
  <li>Menjadi habitat bagi organisme air.</li>
  <li>Menjaga kestabilan suhu tubuh.</li>
</ul>

<p class="example">
  Contoh: Saat musim kemarau panjang, banyak tanaman yang layu karena kekurangan air.
</p>
    </div>
  </article>

  <!-- 3 -->
  <article class="materi-block">
    <div class="materi-image">
      <img src="../img/udara.jpg" alt="Udara">
    </div>
    <div class="materi-text">
<h4>🌬️ Udara</h4>

<p>
  Udara adalah campuran berbagai gas yang menyelimuti bumi. 
  Udara mengandung oksigen, karbon dioksida, dan nitrogen yang sangat penting 
  bagi kehidupan.
</p>

<p>
  Oksigen dibutuhkan manusia dan hewan untuk bernapas. 
  Karbon dioksida dibutuhkan tumbuhan untuk fotosintesis. 
  Nitrogen membantu menyuburkan tanah melalui proses tertentu.
</p>

<p>
  Udara juga berperan dalam penyebaran biji tanaman dan membantu proses penyerbukan.
</p>

<ul>
  <li>Oksigen untuk pernapasan.</li>
  <li>Karbon dioksida untuk fotosintesis.</li>
  <li>Membantu penyebaran biji dan penyerbukan.</li>
</ul>

<p class="example">
  Contoh: Udara yang tercemar dapat menyebabkan gangguan pernapasan pada manusia.
</p>
    </div>
  </article>

  <!-- 4 -->
  <article class="materi-block reverse">
    <div class="materi-image">
      <img src="../img/suhu.jpg" alt="Suhu">
    </div>
    <div class="materi-text">
<h4>🌡️ Suhu</h4>

<p>
  Suhu adalah tingkat panas atau dinginnya suatu lingkungan. 
  Setiap makhluk hidup memiliki batas toleransi suhu tertentu untuk dapat bertahan hidup.
</p>

<p>
  Suhu memengaruhi pertumbuhan, aktivitas, dan penyebaran makhluk hidup. 
  Hewan dan tumbuhan akan beradaptasi sesuai dengan suhu lingkungannya.
</p>

<p>
  Jika suhu berubah secara ekstrem, beberapa makhluk hidup mungkin tidak dapat bertahan.
</p>

<ul>
  <li>Mempengaruhi pertumbuhan dan aktivitas makhluk hidup.</li>
  <li>Menentukan jenis organisme yang dapat hidup di suatu wilayah.</li>
  <li>Mempengaruhi proses kimia dalam tubuh.</li>
</ul>

<p class="example">
  Contoh: Beruang kutub hidup di daerah dingin, sedangkan unta hidup di gurun yang panas.
</p>
    </div>
  </article>

  <!-- 5 -->
  <article class="materi-block">
    <div class="materi-image">
      <img src="../img/tanah.jpg" alt="Tanah">
    </div>
    <div class="materi-text">
<h4>🌾 Tanah</h4>

<p>
  Tanah adalah tempat tumbuhnya tumbuhan dan habitat bagi berbagai organisme kecil. 
  Tanah mengandung air, udara, mineral, dan bahan organik.
</p>

<p>
  Kesuburan tanah dipengaruhi oleh kandungan unsur hara di dalamnya. 
  Tanah yang subur akan menghasilkan tanaman yang tumbuh dengan baik.
</p>

<p>
  Tanah juga menjadi tempat hidup bagi cacing, serangga, dan mikroorganisme 
  yang membantu menjaga keseimbangan ekosistem.
</p>

<ul>
  <li>Tempat tumbuh tumbuhan.</li>
  <li>Menyediakan unsur hara.</li>
  <li>Menjadi habitat organisme kecil.</li>
</ul>

<p class="example">
  Contoh: Tanah yang tercemar limbah dapat menghambat pertumbuhan tanaman.
</p>
    </div>
  </article>

  <!-- 6 -->
  <article class="materi-block reverse">
    <div class="materi-image">
      <img src="../img/minerals (1).png" alt="Mineral">
    </div>
    <div class="materi-text">
<h4>🪨 Mineral</h4>

<p>
  Mineral adalah unsur anorganik yang dibutuhkan makhluk hidup dalam jumlah tertentu. 
  Mineral biasanya terdapat di dalam tanah dan air.
</p>

<p>
  Tumbuhan menyerap mineral dari tanah untuk membantu pertumbuhan dan pembentukan jaringan. 
  Hewan dan manusia memperoleh mineral dari makanan.
</p>

<p>
  Mineral berperan penting dalam menjaga kesehatan dan keseimbangan tubuh.
</p>

<ul>
  <li>Kalsium untuk tulang dan gigi.</li>
  <li>Fosfor untuk pertumbuhan.</li>
  <li>Kalium untuk membantu proses metabolisme.</li>
</ul>

<p class="example">
  Contoh: Kekurangan mineral dapat menyebabkan gangguan pertumbuhan pada tumbuhan dan manusia.
</p>
    </div>
  </article>

  <!-- ===== 📺 TAMBAHAN VIDEO PENGANTAR (TEPAT DI BAWAH MINERAL) ===== -->
  <article class="materi-block video-block" style="flex-direction: column; align-items: stretch; background: linear-gradient(135deg, #f0fdf4, #bbf7d0); border: 2px dashed #16a34a;">
    <div class="materi-text" style="margin-bottom: 15px; text-align: center; width: 100%;">
      <h4 style="font-size: 20px; color: #065f46;">📺 Video Penjelasan: Komponen Biotik & Abiotik</h4>
      <p style="font-size: 14px; color: #155e4b;">Silakan tonton video rangkuman ceria ini sampai selesai tanpa dicepatkan untuk mempersiapkan latihan!</p>
    </div>
    
<div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
    <iframe 
        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
        src="https://www.youtube.com/embed/CL7dl0Si0ZY?rel=0" 
        title="Video Pembelajaran Ekosistem" 
        frameborder="0" 
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
        allowfullscreen>
    </iframe>
</div>
  </article>

</div> <!-- 👈 Ini penutup dari .materi-stack bawaan kodemu -->

  <div class="done-section done-section-dual">
    <a href="{{ url('/materi1/biotik') }}" class="btn-selesai btn-outline">⬅️ Kembali ke Materi Biotik</a>
    <a href="{{ url('/materi1/petunjuk-latihan') }}" class="btn-selesai btn-finish">Selesaikan Materi ➡️</a>
  </div>
</main>
</body>
</html>