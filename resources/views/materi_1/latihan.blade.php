<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Latihan - Biotik & Abiotik</title>
  <link rel="stylesheet" href="{{ asset('css/style_kuis2.css') }}"/>
  <script defer src="{{ asset('js/aktivitas.js?v=' . time()) }}"></script>
</head>
<meta name="csrf-token" content="{{ csrf_token() }}">
<body>
<aside class="sidebar">
  <button class="btn-back" onclick="window.location.href='{{ url('/materi1/petunjuk-latihan') }}'">⬅ Kembali</button>
  <h2>🌿 <br><span>Materi 1:</span><br>Ekosistem</h2>
  <nav class="nav-menu">
    <a href="{{ url('/materi1/tujuan') }}" class="nav-item">🎯 Tujuan & Pengantar</a>
    <a href="{{ url('/materi1/biotik') }}" class="nav-item">📘 Materi Biotik</a>
    <a href="{{ url('/materi1/abiotik') }}" class="nav-item">📘 Materi Abiotik</a>
    <a href="{{ url('/materi1/latihan') }}" class="nav-item active">🧩 Latihan</a>
    <a href="{{ url('/materi1/petunjuk-kuis') }}" class="nav-item locked">🧩 Kuis 🔒</a>
    <a href="{{ url('/materi1/refleksi') }}" class="nav-item locked">💭 Refleksi 🔒</a>
  </nav>
</aside>

<!-- ===== KONTEN ===== -->
<main class="content">

<header class="header sticky">
<h1>🧩 Latihan – Komponen Biotik & Abiotik</h1>
</header>


<section class="content-box">

<div class="inquiry-board">
    <div class="inquiry-header">
        <span class="icon">📁</span>
        <h2>Laboratorium Inkuiri: Kasus Taman Layu</h2>
        <span class="status-badge">KASUS TERBUKA</span>
    </div>
    
    <div class="inquiry-body">
        <div class="problem-statement">
            <strong>🔴 Rumusan Masalah:</strong>
            <p>"Beberapa hari terakhir, tanaman di pot depan kelas 7A tiba-tiba layu, padahal tidak ada hama (ulat/serangga) yang memakannya. Sebagai detektif, kita harus menyelidiki apa yang salah dengan ekosistem di dalam pot tersebut!"</p>
        </div>

        <div class="inquiry-steps">
            <div class="step-card">
                <div class="step-number">1</div>
                <div class="step-text">
                    <strong>Tahap Pengumpulan Fakta (Drag & Drop)</strong>
                    <p>Ambil kartu "Barang Bukti" di bawah ini. Pisahkan mana yang merupakan makhluk hidup (Biotik) dan mana yang faktor lingkungan (Abiotik) di sekitar pot tersebut.</p>
                </div>
            </div>

            <div class="step-card">
                <div class="step-number">2</div>
                <div class="step-text">
                    <strong>Tahap Analisis & Kesimpulan (Isian)</strong>
                    <p>Setelah bukti dipisahkan, jawab pertanyaan analisis di bagian bawah untuk menyimpulkan apa komponen yang hilang sehingga tanaman itu layu.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<p class="intro">
Seret setiap "Barang Bukti" dibawah ini, ke kategori yang benar: <b>Biotik</b> atau <b>Abiotik</b>.
</p>


<!-- ================= DRAG AREA ================= -->
<div class="drag-area" id="dragArea">

<div class="draggable" draggable="true" data-type="biotik">
🥀 Tanaman Layu
</div>

<div class="draggable" draggable="true" data-type="biotik">
🪱 Cacing Tanah
</div>

<div class="draggable" draggable="true" data-type="biotik">
🐜 Semut Merah
</div>

<div class="draggable" draggable="true" data-type="biotik">
🌱 Rumput Liar (Gulma)
</div>

<div class="draggable" draggable="true" data-type="abiotik">
🏜️ Tanah Kering
</div>

<div class="draggable" draggable="true" data-type="abiotik">
☀️ Cahaya Matahari Terik
</div>

<div class="draggable" draggable="true" data-type="abiotik">
🌡️ Suhu Udara Panas
</div>

<div class="draggable" draggable="true" data-type="abiotik">
🪨 Kerikil Pot
</div>

</div>


<!-- ================= DROP ZONE ================= -->
<div class="drop-zone-container">

<div class="drop-zone" id="biotikZone">
<h3>🌿 Biotik</h3>
<p class="zone-desc">Makhluk hidup</p>
</div>

<div class="drop-zone" id="abiotikZone">
<h3>🌍 Abiotik</h3>
<p class="zone-desc">Benda tak hidup</p>
</div>

</div>


<!-- ================= ISIAN ================= -->
<section class="fill-section">

<div class="fill-blank-section report-card">
    <h3>📝 Tahap 2: Laporan Analisis Forensik</h3>
    <p class="instruction-text">Lengkapi rumpang pada laporan di bawah ini berdasarkan bukti yang telah kamu kumpulkan!</p>
    
    <div class="report-content">
        <p>1. Berdasarkan hasil klasifikasi bukti, "Tanaman Layu" dan "Cacing Tanah" termasuk ke dalam kelompok komponen <input type="text" id="fill1" data-answer="biotik" class="inline-input" autocomplete="off">.</p>
        
        <p>2. Sementara itu, "Tanah Kering" dan "Cahaya Matahari" termasuk ke dalam kelompok komponen <input type="text" id="fill2" data-answer="abiotik" class="inline-input" autocomplete="off">.</p>
        
        <p>3. Tanaman di dalam pot tersebut layu bukan karena dimakan oleh hama, melainkan karena kekurangan komponen abiotik yang sangat penting untuk kelangsungan hidupnya, yaitu <input type="text" id="fill3" data-answer="air" class="inline-input" autocomplete="off">.</p>
        
        <p>4. Jika tanaman tersebut dibiarkan terus-menerus di bawah terik cahaya <input type="text" id="fill4" data-answer="matahari" class="inline-input" autocomplete="off"> tanpa disiram, maka tanaman tersebut akan mati kekeringan.</p>
        
        <p class="conclusion-text"><strong>📌 Kesimpulan Kasus:</strong> Kelangsungan hidup komponen biotik (tanaman) sangat bergantung pada kondisi lingkungan atau komponen <input type="text" id="fill5" data-answer="abiotik" class="inline-input" autocomplete="off"> di sekitarnya.</p>
    </div>
</div>

<div class="done-section" style="margin-top: 30px; margin-bottom: 40px; text-align: center;">
    <button id="checkAnswer" class="btn-selesai" style="margin: 0 auto; display: block; width: 100%; max-width: 600px; padding: 15px; font-size: 16px;">
        ✅ Periksa Analisis Detektif
    </button>
</div>

</section>

<div class="mission-briefing">
    <h3>🕵️‍♂️ Misi Eko-Detektif: Diskusi Tim Virtual!</h3>
    <p>Halo, Detektif Lingkungan! Ekosistem di sekitar kita sedang butuh perhatian nih. Mari kita pecahkan masalah ini bersama-sama melalui <strong>Forum Diskusi Tim</strong>.</p>
    
    <div class="mission-steps">
        <p><strong>📋 Petunjuk Misi:</strong></p>
        <ol>
            <li><strong>Baca Kasus:</strong> Perhatikan pesan pembuka dari Ketua Tim (Siti) di dalam grup chat di bawah.</li>
            <li><strong>Ikuti Diskusi:</strong> Ketik pendapat, temuan observasi, atau ide solusimu di kolom input, lalu tekan Kirim.</li>
            <li><strong>Berbalas Pesan:</strong> Teman-teman timmu (Siti, Budi, Ayu, Doni) akan membalas dan merespons jawabanmu secara otomatis. Selesaikan diskusinya sampai tuntas, jangan cuma di-<i>read</i> doang ya! 😉</li>
        </ol>
    </div>
</div>

<div class="chat-wrapper" style="position: relative; margin-top: 20px;">
    
    <div id="chatLockOverlay" class="chat-lock-overlay">
        <div style="font-size: 50px; margin-bottom: 10px;">🔒</div>
        <h3 style="color: #064e3b; margin-bottom: 5px;">Area Diskusi Terkunci</h3>
        <p style="color: #065f46; font-size: 14px; max-width: 80%;">Selesaikan laporan forensik dan dapatkan skor minimal 70 untuk membuka akses diskusi tim!</p>
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
                    Halo tim! Berdasarkan hasil laporan analisis kita di atas, ternyata tanaman pot kelas 7A layu karena kurang komponen abiotik yaitu air. Nah, kira-kira solusi tercepat apa yang bisa kita lakuin sekarang biar tanamannya seger lagi?
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
    onclick="event.preventDefault(); event.stopImmediatePropagation(); window.location.href='{{ url('/materi1/petunjuk-kuis') }}'; return false;" 
    style="margin: 0 auto; display: block; width: 100%; max-width: 600px; padding: 15px; font-size: 16px; background: linear-gradient(90deg, #f59e0b, #d97706); color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: bold;">
    ▶️ Selesai Diskusi, Lanjut ke Kuis!
</button>
  </div>
</main>
</body>
</html>