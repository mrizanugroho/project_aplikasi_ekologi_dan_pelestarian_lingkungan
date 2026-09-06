<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Materi 4 | Metode Konservasi</title>
  <link rel="stylesheet" href="{{ asset('css/style_kuis4.css') }}" />
  <script defer src="{{ asset('js/aktivitas4.js?v=' . time()) }}"></script>
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


<!-- ===== KONTEN ===== -->
<main class="content">

<header class="header sticky">
<h1>🌍 Latihan – Dampak Aktivitas Manusia</h1>
</header>


<section class="content-box">

<div class="inquiry-board">
    <div class="inquiry-header">
        <span class="icon">📁</span>
        <h2>Laboratorium Inkuiri: Penyelamatan Harimau Sumatra</h2>
        <span class="status-badge">KASUS TERBUKA</span>
    </div>
    
    <div class="inquiry-body">
        <div class="problem-statement">
            <strong>🔴 Rumusan Masalah:</strong>
            <p>"Berita darurat! Seekor anak Harimau Sumatra ditemukan terluka di pinggir desa karena habitatnya rusak akibat penebangan liar. Di saat yang sama, polisi hutan berhasil menyita bibit Anggrek Langka dari penyelundup. Sebagai detektif, kita harus segera menentukan metode pelestarian yang tepat!"</p>
        </div>

        <div class="inquiry-steps">
            <div class="step-card">
                <div class="step-number">1</div>
                <div class="step-text">
                    <strong>Tahap Pengumpulan Bukti (Klasifikasi Konservasi)</strong>
                    <p>Seret kartu tempat pelestarian ke kotak yang tepat: mana yang termasuk Konservasi In Situ (Di Habitat Asli) dan Ex Situ (Di Luar Habitat).</p>
                </div>
            </div>
            <div class="step-card">
                <div class="step-number">2</div>
                <div class="step-text">
                    <strong>Tahap Analisis Kasus</strong>
                    <p>Setelah diklasifikasikan, isi laporan forensik untuk menyimpulkan nasib harimau dan anggrek tersebut.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="drag-area" id="dragArea">
    <div class="draggable" draggable="true" data-type="insitu">🏞️ Taman Nasional</div>
    <div class="draggable" draggable="true" data-type="insitu">🌳 Suaka Margasatwa</div>
    <div class="draggable" draggable="true" data-type="exsitu">🦁 Kebun Binatang</div>
    <div class="draggable" draggable="true" data-type="exsitu">🪴 Kebun Raya (Botani)</div>
</div>

<div class="drop-zone-container">
    <div class="drop-zone" id="inSitu1"><h3>🌿 In Situ (1)</h3></div>
    <div class="drop-zone" id="inSitu2"><h3>🌿 In Situ (2)</h3></div>
    <div class="drop-zone" id="exSitu1"><h3>🏢 Ex Situ (1)</h3></div>
    <div class="drop-zone" id="exSitu2"><h3>🏢 Ex Situ (2)</h3></div>
</div>

<div class="fill-blank-section report-card" style="margin-top: 40px;">
    <h3>📝 Tahap 2: Laporan Penyelamatan</h3>
    <p class="instruction-text">Lengkapi rumpang di bawah ini agar misi penyelamatan berhasil!</p>
    
    <div class="report-content">
        <p>1. Harimau yang terluka dapat diselamatkan dengan merawatnya sementara di fasilitas <input type="text" id="fill1" data-answer="kebun" class="inline-input" autocomplete="off"> binatang.</p>
        
        <p>2. Perawatan pelestarian di luar habitat asli seperti itu disebut upaya konservasi <input type="text" id="fill2" data-answer="ex situ" class="inline-input" autocomplete="off">.</p>
        
        <p>3. Untuk melindungi habitat aslinya di hutan, pemerintah perlu menetapkan kawasan tersebut sebagai Taman <input type="text" id="fill3" data-answer="nasional" class="inline-input" autocomplete="off">.</p>
        
        <p>4. Pelestarian satwa dan tumbuhan yang dilakukan langsung di dalam habitat aslinya disebut konservasi <input type="text" id="fill4" data-answer="in situ" class="inline-input" autocomplete="off">.</p>
        
        <p class="conclusion-text"><strong>📌 Kesimpulan Kasus:</strong> Penyelamatan satwa langka membutuhkan gabungan metode <input type="text" id="fill5" data-answer="konservasi" class="inline-input" autocomplete="off"> yang tepat agar mereka tidak punah.</p>
    </div>
</div>

<div class="done-section" style="margin-top: 30px; margin-bottom: 40px; text-align: center;">
    <button id="checkAnswer" class="btn-selesai" style="margin: 0 auto; display: block; width: 100%; max-width: 600px; padding: 15px; font-size: 16px;">
        ✅ Periksa Laporan Penyelamatan
    </button>
</div>

<div class="mission-briefing">
    <h3>🕵️‍♂️ Misi Eko-Detektif: Diskusi Tim Virtual!</h3>
    <p>Harimau dan anggrek sudah diselamatkan! Sekarang mari kita bahas cara mencegah perusakan habitat di <strong>Forum Diskusi</strong>.</p>
</div>

<div class="chat-wrapper" style="position: relative; margin-top: 20px;">
    
    <div id="chatLockOverlay" class="chat-lock-overlay">
        <div style="font-size: 50px; margin-bottom: 10px;">🔒</div>
        <h3 style="color: #064e3b; margin-bottom: 5px;">Area Diskusi Terkunci</h3>
        <p style="color: #065f46; font-size: 14px; max-width: 80%;">Selesaikan laporan penyelidikan dan dapatkan skor minimal 70 untuk membuka akses diskusi tim!</p>
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
                    Laporan sukses! Harimau dan anggreknya udah aman di tempat konservasi. Tapi, biar satwa lain nggak turun lagi ke desa, langkah apa yang harus kita sarankan ke warga sekitar hutan?
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
    onclick="event.preventDefault(); event.stopImmediatePropagation(); window.location.href='{{ url('/materi4/petunjuk-kuis') }}'; return false;" 
    style="margin: 0 auto; display: block; width: 100%; max-width: 600px; padding: 15px; font-size: 16px; background: linear-gradient(90deg, #f59e0b, #d97706); color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: bold;">
    ▶️ Selesai Diskusi, Lanjut ke Kuis!
</button>
  </div>
</main>
</body>
</html>