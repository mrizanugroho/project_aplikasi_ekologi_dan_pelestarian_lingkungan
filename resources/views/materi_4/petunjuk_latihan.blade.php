<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Materi 4 | Konservasi</title>
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
    <a href="{{ url('/materi4/materi2') }}" class="nav-item ">📘 Metode Konservasi</a>
    <a href="{{ url('/materi4/petunjuk-latihan') }}" class="nav-item active">🧩 Latihan</a>
    <a href="{{ url('/materi4/petunjuk-kuis') }}" class="nav-item locked">🧩 Kuis 🔒</a>
    <a href="{{ url('/materi4/refleksi') }}" class="nav-item locked">💭 Refleksi 🔒</a>
  </nav>
</aside>


<!-- ===== KONTEN UTAMA ===== -->
<main class="content">

  <!-- HEADER -->
  <header class="header">
    <h1>📝 Petunjuk Mengerjakan Latihan</h1>
  </header>

  <!-- ===== PETUNJUK ===== -->
<section class="content-box">
  <h3>📌 Petunjuk Mengerjakan Latihan</h3>

  <p class="lead">
    Pada bagian ini, kamu akan mengerjakan <strong>latihan interaktif</strong>
    untuk memahami konsep <strong>konservasi</strong> serta perbedaan
    antara metode <strong>in-situ</strong> dan <strong>eks-situ</strong>.
  </p>

  <!-- BAGIAN 1 -->
  <h4>🧲 Bagian 1 – Drag and Drop</h4>
  <ol>
    <li>
      Kamu akan mengelompokkan berbagai <strong>contoh konservasi</strong>
      ke dalam kategori <strong>In-situ</strong> dan <strong>Eks-situ</strong>.
    </li>
    <li>
      <strong>In-situ</strong> adalah pelestarian di habitat asli,
      sedangkan <strong>Eks-situ</strong> dilakukan di luar habitat asli.
    </li>
    <li>
      Seret (drag) setiap kartu ke kotak yang sesuai, lalu lepaskan (drop).
    </li>
    <li>
      Pastikan semua kartu sudah ditempatkan sebelum melanjutkan.
    </li>
  </ol>

  <!-- BAGIAN 2 -->
  <h4>✏️ Bagian 2 – Isian Singkat</h4>
  <ol>
    <li>Bacalah setiap soal dengan teliti.</li>
    <li>Isilah bagian yang kosong dengan jawaban yang tepat.</li>
    <li>
      Gunakan istilah yang sesuai dengan materi konservasi yang telah dipelajari.
    </li>
  </ol>

  <!-- PERHATIAN -->
  <h4>⚠️ Perhatian</h4>
  <ul>
    <li>
      Pastikan semua soal telah dikerjakan sebelum menekan tombol
      <strong>“Periksa Jawaban”</strong>.
    </li>
    <li>
      Jika masih ada soal yang belum diisi, akan muncul peringatan.
    </li>
    <li>
      Bacalah kembali materi jika kamu masih merasa ragu.
    </li>
  </ul>

  <p>
    Kerjakan latihan ini dengan <strong>jujur dan teliti</strong>.
    Latihan ini akan membantu kamu memahami pentingnya
    menjaga kelestarian lingkungan 🌍.
  </p>
</section>

  <div class="done-section">
    <a href="{{ url('/materi4/latihan') }}" class="btn-selesai">▶️ Mulai Latihan</a>
  </div>

</main>
</body>
</html>