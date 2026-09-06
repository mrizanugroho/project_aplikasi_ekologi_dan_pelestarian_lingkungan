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
    <a href="{{ url('/materi3/petunjuk-latihan') }}" class="nav-item">🧩 Latihan</a>
    <a href="{{ url('/materi3/petunjuk-kuis') }}" class="nav-item active">🧩 Kuis</a>
    <a href="{{ url('/materi3/refleksi') }}" class="nav-item locked">💭 Refleksi 🔒</a>
  </nav>
</aside>

<!-- ===== KONTEN UTAMA ===== -->
<main class="content">

  <!-- HEADER -->
  <header class="header">
    <h1>📝 Petunjuk Mengerjakan Kuis</h1>
  </header>

  <!-- ===== PETUNJUK ===== -->
<section class="content-box">
  <h3>📌 Petunjuk Mengerjakan Kuis</h3>

  <p class="lead">
    Setelah mempelajari materi dan mengerjakan latihan, kamu akan mengerjakan
    <strong>kuis evaluasi</strong> untuk mengetahui sejauh mana pemahamanmu
    tentang pengaruh aktivitas manusia terhadap lingkungan.
  </p>

  <h4>🧩 Kuis – Pilihan Ganda</h4>
  <ol>
    <li>Kuis terdiri dari <strong>10 soal pilihan ganda</strong>.</li>
    <li>Soal ditampilkan <strong>satu per satu</strong> seperti pada ujian berbasis komputer (CBT).</li>
    <li>Gunakan <strong>navigasi nomor soal</strong> untuk berpindah antar soal.</li>
    <li>Pilih <strong>satu jawaban yang paling tepat</strong> pada setiap soal.</li>
    <li>
      Kamu dapat menandai soal yang belum yakin dengan fitur
      <strong>“Ragu-ragu”</strong>.
    </li>
    <li>
      Soal yang sudah dijawab akan ditandai dengan <strong>warna hijau</strong>,
      sedangkan soal ragu-ragu ditandai dengan <strong>warna oranye</strong>.
    </li>
    <li>
      Tombol <strong>“Selesai Menjawab”</strong> hanya aktif jika semua soal telah dijawab.
    </li>
  </ol>

  <h4>⚠️ Perhatian</h4>
  <ul>
    <li>
      Bacalah setiap soal dengan teliti sebelum memilih jawaban.
    </li>
    <li>
      Gunakan pemahamanmu tentang <strong>dampak positif dan negatif aktivitas manusia</strong>.
    </li>
    <li>
      Kerjakan kuis secara <strong>mandiri dan jujur</strong>.
    </li>
  </ul>

  <p>
    Kuis ini bertujuan untuk mengevaluasi pemahamanmu setelah belajar.
    Lakukan dengan sungguh-sungguh agar kamu mengetahui kemampuanmu sendiri 💪😊
  </p>
</section>

  <div class="done-section">
    <a href="{{ url('/materi3/kuis') }}" class="btn-selesai">▶️ Mulai Kuis</a>
  </div>

</main>
</body>
</html>