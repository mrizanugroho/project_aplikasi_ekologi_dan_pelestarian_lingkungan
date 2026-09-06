<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <meta name="base-url" content="{{ url('/') }}">
    
    <title>Kuis Ekosistem Submateri 2</title>
    <link rel="stylesheet" href="{{ asset('css/quiz1.css') }}">
    <script defer src="{{ asset('js/quiz2.js?v=' . time()) }}"></script>
</head>
<body>
<header class="header">
    <h1>Kuis Pilihan Ganda – Alur Energi</h1>
    <div class="timer">10:00</div>
</header>

<!-- MAIN -->
<main class="main">

    <!-- LEFT : AREA SOAL -->
    <section class="left-panel">
        <div class="soal-label">Soal 1 dari 10</div>

        <div class="question-wrapper">
            <div class="question-card">
                <h2 id="questionText">
                    Yang termasuk komponen biotik di bawah ini adalah ...
                </h2>

                <div class="answers">
                    <div class="answer">
                        <span class="choice">A</span>
                        Air
                    </div>
                    <div class="answer">
                        <span class="choice">B</span>
                        Batu
                    </div>
                    <div class="answer">
                        <span class="choice">C</span>
                        Pohon
                    </div>
                    <div class="answer">
                        <span class="choice">D</span>
                        Cahaya
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- RIGHT : SIDEBAR -->
    <aside class="right-panel">

        <h3>Nomor Soal</h3>

        <div class="number-grid">
            <button class="num active">1</button>
            <button class="num">2</button>
            <button class="num">3</button>
            <button class="num">4</button>
            <button class="num">5</button>
            <button class="num">6</button>
            <button class="num">7</button>
            <button class="num">8</button>
            <button class="num">9</button>
            <button class="num">10</button>
        </div>

        <button class="btn-flag">Tandai Ragu-ragu</button>

        <div class="nav-buttons">
            <button class="btn-prev">Sebelumnya</button>
            <button class="btn-finish">Selesai</button>
            <button class="btn-next">Berikutnya</button>
        </div>

    </aside>

</main>

<!-- ================= MODAL HASIL ================= -->
<div class="modal-overlay" id="resultModal">
  <div class="modal-box">
    <h2>Hasil Kuis</h2>

    <p class="score-text">
      Skor kamu:
      <span id="finalScore">0</span>
    </p>

    <p id="scoreDetail"></p>

    <div class="modal-buttons">
      <button id="btnReview" class="btn-secondary">Review Jawaban</button>
      <button id="btnNextQuiz" class="btn-primary" 
    onclick="event.stopImmediatePropagation(); event.preventDefault(); window.location.href='{{ url('/materi2/refleksi') }}';">
    Lanjut ke Refleksi
</button>
    </div>
  </div>
</div>

<div class="modal-overlay" id="reviewModal">
  <div class="modal-box" style="width: 600px; max-height: 85vh; display: flex; flex-direction: column;">
    
    <h2>🔍 Review Jawaban</h2>
    
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