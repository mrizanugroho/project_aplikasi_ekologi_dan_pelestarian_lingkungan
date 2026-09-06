<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Latihan - Drag & Drop</title>
  <!-- Pastikan file CSS dan JS nya pakai yg versi 3 dan aktivitas 2 ini -->
  <link rel="stylesheet" href="{{ asset('css/style_kuis3.css') }}" />
  <script defer src="{{ asset('js/aktivitas_2.js?v=' . time()) }}"></script>
</head>
<body>
<aside class="sidebar">
  <button class="btn-back" onclick="window.location.href='{{ url('/materi2/petunjuk-latihan') }}'">⬅ Kembali</button>
  <h2>🌿 <br><span>Materi 2:</span><br>Tingkatan Organisasi Kehidupan</h2>
  <nav class="nav-menu">
    <a href="{{ url('/materi2/tujuan') }}" class="nav-item">🎯 Tujuan & Apersepsi</a>
    <a href="{{ url('/materi2/ekosistem') }}" class="nav-item">📘 Ekosistem</a>
    <a href="{{ url('/materi2/alur-energi') }}" class="nav-item">📘 Alur Energi</a>
    <a href="{{ url('/materi2/daur-biogeokimia') }}" class="nav-item">📘 Daur Biogeokimia</a>
    <a href="{{ url('/materi2/latihan') }}" class="nav-item active">🧩 Latihan</a>
    <a href="{{ url('/materi2/petunjuk-kuis') }}" class="nav-item locked">🧩 Kuis 🔒</a>
    <a href="{{ url('/materi2/refleksi') }}" class="nav-item locked">💭 Refleksi 🔒</a>
  </nav>
</aside>

<!-- ===== KONTEN ===== -->
<main class="content">

<header class="header sticky">
<h1>🧩 Latihan – Tingkatan Organisasi Kehidupan</h1>
</header>


<section class="content-box">

<div class="inquiry-board">
    <div class="inquiry-header">
        <span class="icon">📁</span>
        <h2>Laboratorium Inkuiri: Kasus Gagal Panen Desa Makmur</h2>
        <span class="status-badge">KASUS TERBUKA</span>
    </div>
    
    <div class="inquiry-body">
        <div class="problem-statement">
            <strong>🔴 Rumusan Masalah:</strong>
            <p>"Tahun ini, petani di Desa Makmur menangis karena padinya habis diserang ribuan hama tikus. Padahal, tahun lalu panen melimpah. Setelah diselidiki, ternyata akhir-akhir ini warga desa sering berburu ular sawah untuk dijual kulitnya. Sebagai detektif, mari kita selidiki apa kaitan hilangnya ular dengan meledaknya populasi tikus!"</p>
        </div>

        <div class="inquiry-steps">
            <div class="step-card">
                <div class="step-number">1</div>
                <div class="step-text">
                    <strong>Tahap Pengumpulan Bukti (Rantai Makanan)</strong>
                    <p>Seret kartu organisme di bawah ini ke peran/tingkatan trofik yang tepat di sawah untuk melihat aliran energinya.</p>
                </div>
            </div>
            <div class="step-card">
                <div class="step-number">2</div>
                <div class="step-text">
                    <strong>Tahap Analisis Kasus</strong>
                    <p>Setelah rantai makanan tersusun, isi laporan forensik untuk menyimpulkan penyebab meledaknya hama tikus.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="drag-area" id="dragArea">
    <div class="draggable" draggable="true" data-type="produsen">🌾 Tanaman Padi</div>
    <div class="draggable" draggable="true" data-type="konsumen1">🐀 Tikus Sawah</div>
    <div class="draggable" draggable="true" data-type="konsumen2">🐍 Ular Sawah</div>
    <div class="draggable" draggable="true" data-type="puncak">🦅 Burung Elang</div>
</div>

<div class="drop-zone-container">
    <div class="drop-zone" id="produsenZone"><h3>🌿 Produsen</h3></div>
    <div class="drop-zone" id="konsumen1Zone"><h3>🐁 Konsumen I</h3></div> <div class="drop-zone" id="konsumen2Zone"><h3>🐍 Konsumen II</h3></div> <div class="drop-zone" id="puncakZone"><h3>🦅 Konsumen Puncak</h3></div>
</div>

<div class="fill-blank-section report-card" style="margin-top: 40px;">
    <h3>📝 Tahap 2: Laporan Analisis Forensik</h3>
    <p class="instruction-text">Lengkapi rumpang di bawah ini berdasarkan rantai makanan yang telah kamu susun!</p>
    
    <div class="report-content">
        <p>1. Dalam ekosistem sawah, Tanaman Padi bertindak sebagai penghasil makanan atau <input type="text" id="fill1" data-answer="produsen" class="inline-input" autocomplete="off">.</p>
        
        <p>2. Tikus mendapatkan energi dengan memakan padi, sehingga tikus disebut sebagai <input type="text" id="fill2" data-answer="konsumen" class="inline-input" autocomplete="off"> tingkat pertama.</p>
        
        <p>3. Populasi tikus di Desa Makmur meledak karena warga terus-menerus memburu <input type="text" id="fill3" data-answer="ular" class="inline-input" autocomplete="off"> sawah.</p>
        
        <p class="conclusion-text"><strong>📌 Kesimpulan Kasus:</strong> Hilangnya ular sebagai <input type="text" id="fill4" data-answer="predator" class="inline-input" autocomplete="off"> alami menyebabkan tidak ada yang memangsa tikus, sehingga rantai makanan dan ekosistem menjadi <input type="text" id="fill5" data-answer="rusak" class="inline-input" autocomplete="off"> (tidak seimbang).</p>
    </div>
</div>

<div class="done-section" style="margin-top: 30px; margin-bottom: 40px; text-align: center;">
    <button id="checkAnswer" class="btn-selesai" style="margin: 0 auto; display: block; width: 100%; max-width: 600px; padding: 15px; font-size: 16px;">
        ✅ Periksa Analisis Detektif
    </button>
</div>

<div class="mission-briefing">
    <h3>🕵️‍♂️ Misi Eko-Detektif: Diskusi Tim Virtual!</h3>
    <p>Halo, Detektif Lingkungan! Kasus gagal panen sudah terpecahkan. Sekarang mari kita bahas solusinya bersama tim di <strong>Forum Diskusi</strong>.</p>
</div>

<div class="chat-wrapper" style="position: relative; margin-top: 20px;">
    
    <div id="chatLockOverlay" class="chat-lock-overlay">
        <div style="font-size: 50px; margin-bottom: 10px;">🔒</div>
        <h3 style="color: #064e3b; margin-bottom: 5px;">Area Diskusi Terkunci</h3>
        <p style="color: #065f46; font-size: 14px; max-width: 80%;">Selesaikan laporan analisis dan dapatkan skor minimal 70 untuk membuka akses diskusi tim!</p>
    </div>

    <div class="chat-container" id="mainChatContainer" style="margin-top: 0;">
        <div class="chat-header">
            <div class="chat-title">🌿 Tim Detektif</div>
            <div class="chat-subtitle" id="onlineUsersList">Menghubungkan...</div>
        </div>
        
        <div class="chat-body" id="chatBody">
            <div class="message received">
                <span class="sender-name">Siti (Ketua Tim)</span>
                <div class="bubble">
                    Halo tim! Laporannya udah valid nih. Gagal panen terjadi karena tikusnya kebanyakan setelah ular diburu. Biar panen tahun depan aman, solusi paling tepat yang bisa kita sarankan ke warga desa apa ya?
                </div>
            </div>
        </div>

        <div class="typing-indicator" id="typingIndicator" style="display: none;">
            Teman sedang mengetik...
        </div>
        
        <div class="chat-footer">
            <input type="text" id="chatInput" placeholder="Ketik pesan diskusi di sini..." autocomplete="off">
            <button id="sendBtn">Kirim</button>
        </div>
    </div>
</div>
<!-- ================= POPUP HASIL ================= -->
<div id="popupResult" class="popup-selesai">

<div class="popup-card">

<h2>🎉 Hasil Kuis</h2>

<p id="scoreText">
Skor kamu: 0%
</p>

<div id="feedbackContainer" class="scroll-feedback"></div>


<div class="popup-actions">

<button id="retryBtn">
🔁 Coba Lagi
</button>

<button id="nextPage">
▶️ Lanjut ke Latihan
</button>

</div>

</div>

</div>


<div class="popup-actions">
  <div id="wadahTombolLanjut" style="display: none; margin-top: 20px; text-align: center;">
<button id="btnLanjutKuis" class="btn-periksa" 
    onclick="event.preventDefault(); event.stopImmediatePropagation(); window.location.href='{{ url('/materi2/petunjuk-kuis') }}'; return false;" 
    style="margin: 0 auto; display: block; width: 100%; max-width: 600px; padding: 15px; font-size: 16px; background: linear-gradient(90deg, #f59e0b, #d97706); color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: bold;">
    ▶️ Selesai Diskusi, Lanjut ke Kuis!
</button>
  </div>
</main>
</body>
</html>