<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Evaluasi Akhir Ekosistem</title>
<link rel="stylesheet" href="{{ asset('css/evaluasi.css') }}">
<script defer src="{{ asset('js/evaluasi.js?v=' . time()) }}"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="base-url" content="{{ url('/') }}">
</head>

<body>

<header class="header">
    <h1>Evaluasi Akhir – Ekosistem Terpadu</h1>
    <div class="timer">90:00</div>
</header>

<main class="main">

    <section class="left-panel">
        
        <div id="pilganArea">
            <div class="soal-label" id="labelSoal">Pilihan Ganda - Soal <span id="currentQ">1</span> dari 20</div>

            <div class="question-wrapper">
                <div class="question-card">
                    <h2 id="questionText">
                        Pertanyaan akan muncul di sini...
                    </h2>

                    <div class="answers" id="answersBox">
                        </div>
                </div>
            </div>
        </div>

    </section>

    <aside class="right-panel">

        <h3 style="font-size: 14px; margin-bottom: 12px; color: #555;">Nomor Soal (1-20 Pilgan, 21-25 Esai)</h3>
        
        <div class="number-grid" id="pilganGrid">
            </div>

        <button class="btn-flag">Tandai Ragu-ragu</button>

        <div class="nav-buttons">
            <button class="btn-prev" id="btnPrev">Sebelumnya</button>
            <button class="btn-finish" id="btnFinish">Selesai</button>
            <button class="btn-next" id="btnNext">Berikutnya</button>
        </div>

    </aside>

</main>

<div class="modal-overlay" id="resultModal">
  <div class="modal-box">
    <h2>Hasil Evaluasi</h2>

    <p class="score-text">
      Skor Pilihan Ganda:<br>
      <span id="finalScore">0</span>
    </p>

    <p id="scoreDetail" style="margin-bottom: 15px; font-weight: bold; color: #333;"></p>
    <p style="font-size: 13px; color: #e74c3c; font-style: italic;">*Nilai Esai (Soal 21-25) akan diperiksa manual oleh guru.</p>

    <div class="modal-buttons">
      <button id="btnReview" class="btn-secondary">Review Jawaban</button>
      <button id="btnNextQuiz" class="btn-primary">Kembali ke Beranda</button>
    </div>
  </div>
</div>

<div class="modal-overlay" id="reviewModal">
  <div class="modal-box" style="width: 600px; max-height: 85vh; display: flex; flex-direction: column;">
    
    <h2>🔍 Review Evaluasi Akhir</h2>
    
    <div id="reviewContent" style="overflow-y: auto; text-align: left; margin-top: 15px; padding-right: 10px; max-height: 60vh;">
    </div>
    
    <div class="modal-actions" style="margin-top: 20px; justify-content: center;">
        <button id="btnCloseReview" style="padding: 10px 20px; background: #e74c3c; color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: bold;">
            Tutup Review
        </button>
    </div>

  </div>
</div>

</body>
</html>