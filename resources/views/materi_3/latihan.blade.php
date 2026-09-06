<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Materi 3 | Tujuan & Apersepsi</title>
  <link rel="stylesheet" href="{{ asset('css/style_kuis3.css') }}" />
  <script defer src="{{ asset('js/aktivitas3.js?v=' . time()) }}"></script>
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


<!-- ===== KONTEN ===== -->
<main class="content">

<header class="header sticky">
<h1>🌍 Latihan – Dampak Aktivitas Manusia</h1>
</header>


<section class="content-box">

<div class="inquiry-board">
    <div class="inquiry-header">
        <span class="icon">📁</span>
        <h2>Laboratorium Inkuiri: Tragedi Sungai Asri</h2>
        <span class="status-badge">KASUS TERBUKA</span>
    </div>
    
    <div class="inquiry-body">
        <div class="problem-statement">
            <strong>🔴 Rumusan Masalah:</strong>
            <p>"Warga desa gempar! Pagi ini, ratusan ikan ditemukan mati mengambang di aliran Sungai Asri. Setelah diselidiki, ternyata di hulu sungai baru saja dibangun pabrik, dan di bantaran sungai banyak warga yang membuang sampah sembarangan. Sebagai detektif, mari selidiki aktivitas manusia apa saja yang merusak ekosistem ini dan bagaimana langkah pelestariannya!"</p>
        </div>

        <div class="inquiry-steps">
            <div class="step-card">
                <div class="step-number">1</div>
                <div class="step-text">
                    <strong>Tahap Pengumpulan Bukti (Klasifikasi Dampak)</strong>
                    <p>Seret kartu aktivitas manusia di bawah ini ke kotak yang tepat: mana yang Merusak Ekosistem (Negatif) dan mana yang Melestarikan (Positif).</p>
                </div>
            </div>
            <div class="step-card">
                <div class="step-number">2</div>
                <div class="step-text">
                    <strong>Tahap Analisis Kasus</strong>
                    <p>Setelah bukti diklasifikasikan, isi laporan forensik untuk menyimpulkan status ekosistem Sungai Asri.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="drag-area" id="dragArea">
    <div class="draggable" draggable="true" data-type="merusak">🏭 Buang Limbah Pabrik</div>
    <div class="draggable" draggable="true" data-type="merusak">🗑️ Buang Sampah Plastik</div>
    
    <div class="draggable" draggable="true" data-type="lestari">⚙️ Bikin Filter Penyaring</div>
    <div class="draggable" draggable="true" data-type="lestari">🌱 Tanam Pohon (Reboisasi)</div>
</div>

<div class="drop-zone-container">
    <div class="drop-zone" id="merusak1Zone"><h3>❌ Merusak (1)</h3></div>
    <div class="drop-zone" id="merusak2Zone"><h3>❌ Merusak (2)</h3></div>
    <div class="drop-zone" id="lestari1Zone"><h3>✅ Melestarikan (1)</h3></div>
    <div class="drop-zone" id="lestari2Zone"><h3>✅ Melestarikan (2)</h3></div>
</div>

<div class="fill-blank-section report-card" style="margin-top: 40px;">
    <h3>📝 Tahap 2: Laporan Analisis Forensik</h3>
    <p class="instruction-text">Lengkapi rumpang di bawah ini berdasarkan bukti aktivitas yang telah kamu temukan!</p>
    
    <div class="report-content">
        <p>1. Ikan-ikan di Sungai Asri mati karena airnya mengalami <input type="text" id="fill1" data-answer="pencemaran" class="inline-input" autocomplete="off"> yang parah.</p>
        
        <p>2. Hal ini disebabkan oleh pengaruh <input type="text" id="fill2" data-answer="negatif" class="inline-input" autocomplete="off"> dari aktivitas manusia.</p>
        
        <p>3. Contoh aktivitas buruk tersebut adalah membuang <input type="text" id="fill3" data-answer="limbah" class="inline-input" autocomplete="off"> pabrik dan sampah sembarangan ke sungai.</p>
        
        <p>4. Agar ekosistem sungai kembali pulih, kita harus melakukan langkah <input type="text" id="fill4" data-answer="pelestarian" class="inline-input" autocomplete="off"> lingkungan.</p>
        
        <p class="conclusion-text"><strong>📌 Kesimpulan Kasus:</strong> Aktivitas manusia sangat memengaruhi alam, namun dengan tindakan yang tepat kita bisa menjaga <input type="text" id="fill5" data-answer="keseimbangan" class="inline-input" autocomplete="off"> ekosistem.</p>
    </div>
</div>

<div class="done-section" style="margin-top: 30px; margin-bottom: 40px; text-align: center;">
    <button id="checkAnswer" class="btn-selesai" style="margin: 0 auto; display: block; width: 100%; max-width: 600px; padding: 15px; font-size: 16px;">
        ✅ Periksa Analisis Detektif
    </button>
</div>

<div class="mission-briefing">
    <h3>🕵️‍♂️ Misi Eko-Detektif: Diskusi Tim Virtual!</h3>
    <p>Halo, Detektif Lingkungan! Bukti pencemaran sungai sudah jelas. Mari kita bahas solusi pencegahannya di <strong>Forum Diskusi</strong>.</p>
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
                    Halo tim! Laporan kita udah divalidasi. Fix ikan mati karena sampah dan limbah pabrik. Biar kejadian ini nggak keulang, solusi awal apa nih yang bisa kita lakuin buat bersihin sampahnya?
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
    onclick="event.preventDefault(); event.stopImmediatePropagation(); window.location.href='{{ url('/materi3/petunjuk-kuis') }}'; return false;" 
    style="margin: 0 auto; display: block; width: 100%; max-width: 600px; padding: 15px; font-size: 16px; background: linear-gradient(90deg, #f59e0b, #d97706); color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: bold;">
    ▶️ Selesai Diskusi, Lanjut ke Kuis!
</button>
  </div>
</main>
</body>
</html>