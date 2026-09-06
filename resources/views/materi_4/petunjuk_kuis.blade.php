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
    <a href="{{ url('/materi4/materi2') }}" class="nav-item ">📘 Metode Konservasi</a>
    <a href="{{ url('/materi4/petunjuk-latihan') }}" class="nav-item">🧩 Latihan </a>
    <a href="{{ url('/materi4/petunjuk-kuis') }}" class="nav-item active">🧩 Kuis 🔒</a>
    <a href="{{ url('/materi4/refleksi') }}" class="nav-item locked">💭 Refleksi 🔒</a>
  </nav>
</aside>

<!-- ===== KONTEN ===== -->
<main class="content">

<header class="header">
  <h1>📝 Petunjuk Mengerjakan Kuis</h1>
</header>

<section class="content-box">

  <h3>📌 Petunjuk Mengerjakan Kuis</h3>

  <p class="lead">
    Setelah mempelajari materi dan mengerjakan latihan, kamu akan mengerjakan
    <strong>kuis evaluasi</strong> untuk mengetahui pemahamanmu tentang
    <strong>konservasi dan pelestarian lingkungan</strong>.
  </p>

  <!-- ================= KUIS ================= -->
  <h4>🧩 Kuis – Pilihan Ganda</h4>
  <ol>
    <li>Kuis terdiri dari <strong>10 soal pilihan ganda</strong>.</li>
    <li>Soal ditampilkan <strong>satu per satu</strong> seperti ujian berbasis komputer (CBT).</li>
    <li>
      Gunakan <strong>nomor soal</strong> di samping untuk berpindah antar soal.
    </li>
    <li>
      Pilih <strong>satu jawaban yang paling tepat</strong> untuk setiap soal.
    </li>
    <li>
      Kamu dapat menandai soal yang belum yakin dengan tombol
      <strong>“Tandai Ragu-ragu”</strong>.
    </li>
    <li>
      Soal yang sudah dijawab akan berwarna <strong>hijau</strong>,
      sedangkan soal ragu-ragu akan berwarna <strong>kuning/oranye</strong>.
    </li>
    <li>
      Tombol <strong>“Selesai”</strong> dapat digunakan setelah semua soal dikerjakan.
    </li>
  </ol>

  <!-- ================= TIMER ================= -->
  <h4>⏱️ Waktu Pengerjaan</h4>
  <ul>
    <li>Kamu memiliki waktu <strong>10 menit</strong> untuk mengerjakan kuis.</li>
    <li>Perhatikan waktu yang ditampilkan di bagian atas.</li>
    <li>
      Jika waktu habis, sistem akan <strong>mengumpulkan jawaban secara otomatis</strong>.
    </li>
  </ul>

  <!-- ================= PERHATIAN ================= -->
  <h4>⚠️ Perhatian</h4>
  <ul>
    <li>Bacalah setiap soal dengan teliti.</li>
    <li>
      Gunakan pemahamanmu tentang:
      <ul>
        <li>Konservasi</li>
        <li>In-situ dan Eks-situ</li>
        <li>Manfaat konservasi</li>
      </ul>
    </li>
    <li>Kerjakan secara jujur dan mandiri.</li>
  </ul>

  <p>
    Kuis ini bertujuan untuk mengevaluasi pemahamanmu.
    Kerjakan dengan sungguh-sungguh agar kamu mengetahui kemampuanmu sendiri 💪😊
  </p>

</section>

  <div class="done-section">
    <a href="{{ url('/materi4/kuis') }}" class="btn-selesai">▶️ Mulai Kuis</a>
  </div>

</main>
</body>
</html>