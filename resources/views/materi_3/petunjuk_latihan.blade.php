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
  <button class="btn-back" onclick="window.location.href='{{ url('/materi3/materi') }}'">⬅ Kembali</button>
  <h2>🌿 <br><span>Materi 3:</span><br>Pengaruh Manusia terhadap Ekosistem</h2>
  <nav class="nav-menu">
    <a href="{{ url('/materi3/tujuan') }}" class="nav-item">🎯 Tujuan & Apersepsi</a>
    <a href="{{ url('/materi3/materi') }}" class="nav-item">📘 Pengaruh</a>
    <a href="{{ url('/materi3/petunjuk-latihan') }}" class="nav-item active">🧩 Latihan</a>
    <a href="{{ url('/materi3/petunjuk-kuis') }}" class="nav-item locked">🧩 Kuis 🔒</a>
    <a href="{{ url('/materi3/refleksi') }}" class="nav-item locked">💭 Refleksi 🔒</a>
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
    untuk memahami pengaruh aktivitas manusia terhadap lingkungan.
    Bacalah petunjuk berikut dengan teliti sebelum memulai.
  </p>

  <h4>🧲 Bagian 1 – Drag and Drop</h4>
  <ol>
    <li>
      Kamu akan mengelompokkan berbagai <strong>aktivitas manusia</strong>
      ke dalam kategori <strong>Dampak Positif</strong> dan <strong>Dampak Negatif</strong>.
    </li>
    <li>
      Seret (drag) setiap kartu ke kotak yang sesuai, lalu lepaskan (drop).
    </li>
    <li>
      Pastikan semua kartu sudah ditempatkan pada kategori yang benar.
    </li>
  </ol>

  <h4>✏️ Bagian 2 – Isian Singkat</h4>
  <ol>
    <li>
      Bacalah setiap kalimat dengan teliti.
    </li>
    <li>
      Isilah bagian yang kosong dengan <strong>jawaban yang tepat</strong>.
    </li>
    <li>
      Gunakan istilah yang sesuai dengan materi yang telah dipelajari.
    </li>
  </ol>

  <h4>⚠️ Perhatian</h4>
  <ul>
    <li>
      Pastikan semua soal sudah dikerjakan sebelum menekan tombol 
      <strong>“Periksa Jawaban”</strong>.
    </li>
    <li>
      Jika masih ada yang belum dikerjakan, akan muncul peringatan.
    </li>
    <li>
      Bacalah kembali materi jika masih merasa ragu.
    </li>
  </ul>

  <p>
    Kerjakan latihan ini dengan <strong>jujur dan teliti</strong>.
    Latihan ini akan membantumu memahami bagaimana aktivitas manusia
    dapat memberikan dampak terhadap lingkungan 🌍.
  </p>
</section>

  <div class="done-section">
    <a href="{{ url('/materi3/latihan') }}" class="btn-selesai">▶️ Mulai Latihan</a>
  </div>
</main>
</body>
</html>