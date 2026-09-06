<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Materi 1 | Petunjuk Latihan</title>
  <link rel="stylesheet" href="{{ asset('css/style_materi1.css') }}" />
  <script defer src="{{ asset('js/script_materi1.js') }}"></script>
</head>
<body>
<aside class="sidebar">
  <button class="btn-back" onclick="window.location.href='{{ url('/materi1/abiotik') }}'">⬅ Kembali</button>
  <h2>🌿 <br><span>Materi 1:</span><br>Ekosistem</h2>
  <nav class="nav-menu">
    <a href="{{ url('/materi1/tujuan') }}" class="nav-item">🎯 Tujuan & Pengantar</a>
    <a href="{{ url('/materi1/biotik') }}" class="nav-item">📘 Materi Biotik</a>
    <a href="{{ url('/materi1/abiotik') }}" class="nav-item">📘 Materi Abiotik</a>
    <a href="{{ url('/materi1/petunjuk-latihan') }}" class="nav-item active">🧩 Latihan</a>
    <a href="{{ url('/materi1/petunjuk-kuis') }}" class="nav-item locked">🧩 Kuis 🔒</a>
    <a href="{{ url('/materi1/refleksi') }}" class="nav-item locked">💭 Refleksi 🔒</a>
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

  <h3>🕵️‍♂️ Petunjuk Misi Eko-Detektif</h3>

  <p class="lead">
    Halo, Detektif Lingkungan! Selamat datang di Laboratorium Inkuiri. Pada bagian latihan ini, kamu tidak hanya sekadar menjawab soal, melainkan akan diterjunkan langsung untuk memecahkan berbagai kasus misteri ekosistem!
  </p>

  <h4>📌 Tahapan Memecahkan Kasus:</h4>
  <ol style="line-height: 1.8; margin-left: 20px;">
    <li><strong>Pahami Papan Kasus:</strong> Baca bagian <em>Rumusan Masalah</em> dengan saksama untuk mengetahui misteri alam apa yang sedang terjadi.</li>
    <li><strong>Kumpulkan Bukti (Drag & Drop):</strong> Seret (<em>drag</em>) kartu barang bukti ke kotak klasifikasi yang tepat untuk mulai menyusun petunjuk.</li>
    <li><strong>Buat Laporan Analisis (Isian Singkat):</strong> Lengkapi kalimat rumpang berdasarkan bukti yang telah kamu kumpulkan untuk menarik kesimpulan awal.</li>
    <li><strong>Buka Gembok Ruang Diskusi 🔒:</strong> Klik tombol "Periksa Jawaban". Ingat, kamu <strong>wajib meraih skor minimal 70</strong> untuk bisa menghilangkan efek blur dan membuka akses ke Forum Diskusi Tim! Jika nilaimu masih di bawah 70, perbaiki lagi analisismu.</li>
    <li><strong>Rapat Bersama Tim (Chat Virtual) 💬:</strong> Setelah gembok terbuka, ketik ide dan solusi kamu di kolom <em>chat</em> untuk berdiskusi bersama teman virtualmu (Siti, Budi, Ayu, dan Doni) guna menutup kasus tersebut secara tuntas.</li>
  </ol>

  <p style="margin-top: 20px; padding: 15px; background-color: #dcfce7; border-left: 5px solid #16a34a; border-radius: 5px;">
    <strong>Siap bertugas?</strong> Kumpulkan fokusmu, pecahkan teka-tekinya, dan selamatkan ekosistem kita! 🌍✨
  </p>

</section>
  <div class="done-section">
    <a href="{{ url('/materi1/latihan') }}" class="btn-selesai">Mulai Misi Kasus! 🚀</a>
  </div>
</main>
</body>
</html>