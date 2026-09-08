<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Materi 2 | Daur Biogeokimia</title>
  <link rel="stylesheet" href="{{ asset('css/style_materi2.css') }}" />
  <script defer src="{{ asset('js/script_materi1.js?v=' . time()) }}"></script>
</head>
<body data-page="materi">
<aside class="sidebar">
  <button class="btn-back" onclick="window.location.href='{{ url('/materi2/alur-energi') }}'">⬅ Kembali</button>
  <h2>🌿 <br><span>Materi 2:</span><br>Tingkatan Organisasi Kehidupan</h2>
  <nav class="nav-menu">
    <a href="{{ url('/materi2/tujuan') }}" class="nav-item">🎯 Tujuan & Apersepsi</a>
    <a href="{{ url('/materi2/ekosistem') }}" class="nav-item">📘 Ekosistem</a>
    <a href="{{ url('/materi2/alur-energi') }}" class="nav-item">📘 Alur Energi</a>
    <a href="{{ url('/materi2/daur-biogeokimia') }}" class="nav-item active">📘 Daur Biogeokimia</a>
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

<!-- ================= DAUR BIOGEOKIMIA ================= -->
<section class="biotik-story">

<!-- ================= PENGANTAR ================= -->
<article class="materi-block fade-section">
  <div class="materi-text">
    <h4>🌍 Daur Biogeokimia</h4>
    <p>
      Di dalam ekosistem, makhluk hidup membutuhkan berbagai unsur penting
      seperti air, karbon, oksigen, nitrogen, dan mineral lainnya untuk
      bertahan hidup. Unsur-unsur tersebut tidak selalu berada di satu tempat,
      tetapi terus bergerak dan berpindah antara lingkungan dan makhluk hidup.
    </p>
    <p>
      Pergerakan unsur-unsur tersebut disebut <strong>daur biogeokimia</strong>.
      Melalui proses ini, unsur kimia berpindah dari lingkungan ke makhluk hidup
      dan kembali lagi ke lingkungan secara terus-menerus.
    </p>
    <p>
      Kata biogeokimia berasal dari tiga kata, yaitu
      <strong>bio</strong> (makhluk hidup),
      <strong>geo</strong> (bumi atau lingkungan),
      dan <strong>kimia</strong> (unsur atau zat).
      Dengan adanya daur biogeokimia, unsur-unsur penting di alam
      tidak akan habis dan keseimbangan ekosistem dapat terjaga.
    </p>
  </div>
</article>

<!-- ================= DAUR AIR ================= -->
<article class="materi-block reverse fade-section">
  <div class="materi-image">
    <img src="../img/materi_2/DaurAir.png" alt="Daur Air">
  </div>
  <div class="materi-text">
    <h4>💧 Daur Air</h4>
    <p>
      Air merupakan komponen penting bagi kehidupan makhluk hidup.
      Air digunakan untuk berbagai proses seperti metabolisme,
      fotosintesis, serta menjaga keseimbangan tubuh makhluk hidup.
    </p>
    <p>
      Air di bumi selalu mengalami perputaran yang disebut
      <strong>daur air</strong>. Proses ini terjadi melalui beberapa tahap.
    </p>
    <p>
      Pertama adalah <strong>penguapan (evaporasi)</strong>, yaitu perubahan
      air menjadi uap karena panas Matahari. Uap air kemudian naik ke
      atmosfer dan mengalami <strong>kondensasi</strong> sehingga membentuk awan.
    </p>
    <p>
      Ketika awan sudah jenuh oleh uap air, air akan turun kembali ke
      bumi dalam bentuk hujan yang disebut
      <strong>presipitasi</strong>. Air hujan kemudian meresap ke dalam tanah
      atau mengalir kembali ke sungai dan laut.
    </p>
  </div>
</article>

<!-- ================= SIKLUS AIR INTERAKTIF ================= -->
<section class="water-cycle-section fade-section">
<h3 class="section-title">💧 Animasi Siklus Air</h3>
<p class="section-desc">
Siklus air adalah perputaran air dari bumi ke atmosfer dan kembali lagi ke bumi.
Proses ini melibatkan penguapan, pembentukan awan, hujan, dan aliran air kembali ke laut.
</p>
<div class="water-cycle-container">
    <div class="sun">☀</div>
    <div class="ocean"></div>
    <div class="evaporation">
        <span>☁️</span><span>☁️</span><span>☁️</span>
    </div>
    <div class="cloud">☁</div>
    <div class="rain">
        <span>💧</span><span>💧</span><span>💧</span><span>💧</span>
    </div>
</div>

<p class="cycle-title">🌊 Tahapan Siklus Air</p>
<p class="cycle-subtitle">Perhatikan animasi di atas. Setiap bagian menunjukkan tahapan dalam siklus air yang terjadi di alam.</p>
<div class="cycle-explanation">
  <div class="cycle-step">
    <h4>1. Evaporasi</h4>
    <p>Ketika Matahari memanaskan permukaan laut, danau, atau sungai, air akan berubah menjadi uap air.</p>
  </div>
  <div class="cycle-step">
    <h4>2. Kondensasi</h4>
    <p>Uap air yang naik ke atmosfer akan mengalami pendinginan dan membentuk awan.</p>
  </div>
  <div class="cycle-step">
    <h4>3. Presipitasi</h4>
    <p>Jika awan sudah penuh dengan butiran air, air tersebut akan jatuh sebagai hujan.</p>
  </div>
  <div class="cycle-step">
    <h4>4. Infiltrasi & Aliran Air</h4>
    <p>Air hujan meresap ke tanah atau mengalir di permukaan menuju laut untuk mengulang siklus.</p>
  </div>
</div>
</section>

<!-- ================= DAUR KARBON ================= -->
<article class="materi-block fade-section">
  <div class="materi-image">
    <img src="../img/materi_2/DaurKarbon.png" alt="Daur Karbon">
  </div>
  <div class="materi-text">
    <h4>🌿 Daur Karbon dan Oksigen</h4>
    <p>
      Karbon dan oksigen merupakan unsur yang sangat penting bagi kehidupan.
      Kedua unsur ini saling berkaitan dalam suatu proses yang disebut
      <strong>daur karbon dan oksigen</strong>.
    </p>
    <p>
      Dalam proses <strong>fotosintesis</strong>, tumbuhan menyerap karbon
      dioksida dari udara dan menghasilkan oksigen yang dilepaskan ke udara.
    </p>
    <p>
      Makhluk hidup seperti manusia dan hewan menggunakan oksigen untuk
      bernapas, menghasilkan karbon dioksida yang kembali ke atmosfer.
    </p>
  </div>
</article>

<!-- ================= DAUR NITROGEN ================= -->
<article class="materi-block reverse fade-section">
  <div class="materi-image">
    <img src="../img/materi_2/Nitrogen.png" alt="Daur Nitrogen">
  </div>
  <div class="materi-text">
    <h4>🌱 Daur Nitrogen</h4>
    <p>
      Nitrogen merupakan unsur penting bagi makhluk hidup karena digunakan
      untuk membentuk protein di dalam tubuh.
    </p>
    <p>
      Sebagian besar nitrogen berada di udara dalam bentuk gas (N₂), yang tidak
      bisa langsung digunakan oleh hewan/tumbuhan.
    </p>
    <p>
      Nitrogen harus melalui <strong>fiksasi</strong> oleh bakteri,
      <strong>nitrifikasi</strong>, dan <strong>asimilasi</strong> oleh tumbuhan.
    </p>
  </div>
</article>

<!-- ================= DAUR KARBON INTERAKTIF ================= -->
<section class="carbon-flow-section fade-section">
<h3 class="section-title">🌿 Alur Daur Karbon</h3>
<p class="section-desc">
Karbon berpindah dari atmosfer ke makhluk hidup melalui fotosintesis,
kemudian kembali lagi ke atmosfer melalui respirasi dan proses penguraian.
</p>
<div class="carbon-flow-image">
  <img src="../img/materi_2/AlurDaurKarbon.png" alt="Diagram Daur Karbon">
</div>
</section>

<!-- ================= PENUTUP ================= -->
<article class="materi-block fade-section">
  <div class="materi-text">
    <h4>🌏 Pentingnya Daur Biogeokimia</h4>
    <p>
      Daur biogeokimia memiliki peranan penting dalam menjaga keseimbangan
      ekosistem. Melalui proses ini, unsur-unsur yang dibutuhkan oleh
      makhluk hidup dapat terus tersedia di alam.
    </p>
    <p>
      Dengan demikian, kehidupan di bumi dapat terus berlangsung
      secara berkelanjutan dan keseimbangan alam tetap terjaga.
    </p>
  </div>
</article>

<!-- ===== 📺 TAMBAHAN VIDEO PENGANTAR ===== -->
<article class="materi-block video-block fade-section" style="flex-direction: column; align-items: stretch; background: linear-gradient(135deg, #f0fdf4, #bbf7d0); border: 2px dashed #16a34a;">
  <div class="materi-text" style="margin-bottom: 15px; text-align: center; width: 100%;">
    <h4 style="font-size: 20px; color: #065f46;">📺 Video Penjelasan: Daur Biogeokimia</h4>
    <p style="font-size: 14px; color: #155e4b;">Silakan tonton video rangkuman ceria ini sampai selesai tanpa dicepatkan untuk mempersiapkan latihan!</p>
  </div>
  
<div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
    <iframe 
        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
        src="https://www.youtube.com/embed/mp7tUgTa01M?rel=0" 
        title="Video Pembelajaran Ekosistem" 
        frameborder="0" 
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
        allowfullscreen>
    </iframe>
</div>
</article>

</section>

  <div class="done-section">
    <a href="{{ url('/materi2/petunjuk-latihan') }}" class="btn-selesai btn-finish" style="text-decoration: none; display: inline-block;">
      Selesaikan Materi ➡️
    </a>
  </div>
</main>
</body>
</html>