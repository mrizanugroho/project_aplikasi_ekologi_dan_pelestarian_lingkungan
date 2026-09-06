<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Materi 1 | Petunjuk Kuis</title>
  <link rel="stylesheet" href="{{ asset('css/style_materi1.css') }}" />
  <script defer src="{{ asset('js/script_materi1.js') }}"></script>
</head>
<body>
<aside class="sidebar">
  <button class="btn-back" onclick="window.location.href='{{ url('/materi1/latihan') }}'">⬅ Kembali</button>
  <h2>🌿 <br><span>Materi 1:</span><br>Ekosistem</h2>
  <nav class="nav-menu">
    <a href="{{ url('/materi1/tujuan') }}" class="nav-item">🎯 Tujuan & Pengantar</a>
    <a href="{{ url('/materi1/biotik') }}" class="nav-item">📘 Materi Biotik</a>
    <a href="{{ url('/materi1/abiotik') }}" class="nav-item">📘 Materi Abiotik</a>
    <a href="{{ url('/materi1/latihan') }}" class="nav-item">🧩 Latihan</a>
    <a href="{{ url('/materi1/petunjuk-kuis') }}" class="nav-item active">🧩 Kuis</a>
        <a href="{{ url('/materi1/refleksi') }}" class="nav-item locked">💭 Refleksi 🔒</a>
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
    Pada bagian ini, kamu akan mengerjakan <strong>kuis pilihan ganda</strong>
    untuk mengukur pemahamanmu setelah mempelajari materi sebelumnya.
  </p>

  <h4>🧪 Kuis – Pilihan Ganda</h4>
  <ol>
    <li>Kuis terdiri dari <strong>10 soal pilihan ganda</strong>.</li>
    <li>Soal ditampilkan <strong>satu per satu</strong>, seperti pada ujian berbasis komputer (CBT).</li>
    <li>Gunakan <strong>nomor soal</strong> di bagian atas untuk berpindah soal.</li>
    <li>Pilih <strong>satu jawaban yang paling tepat</strong> pada setiap soal.</li>
    <li>
      Kamu dapat menekan tombol <strong>“Tandai Ragu-ragu”</strong> jika masih belum yakin.
    </li>
    <li>
      Soal yang sudah dijawab akan ditandai dengan <strong>warna hijau</strong>,
      sedangkan soal ragu-ragu dengan <strong>warna oranye</strong>.
    </li>
    <li>
      Tombol <strong>“Selesai Menjawab”</strong> hanya dapat diklik jika semua soal telah dijawab.
    </li>
  </ol>

  <p>
    Kerjakan kuis dengan <strong>teliti, jujur, dan mandiri</strong>.
    Kuis ini bertujuan untuk mengetahui sejauh mana pemahamanmu terhadap materi.
  </p>

</section>
  <div class="done-section">
    <a href="{{ url('/materi1/kuis') }}" class="btn-selesai">Mulai Kuis Sekarang! ✍️</a>
  </div>
</main>
</body>
</html>