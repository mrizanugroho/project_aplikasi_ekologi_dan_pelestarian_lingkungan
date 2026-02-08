document.addEventListener("DOMContentLoaded", () => {

  /* =====================================================
     1. SIDEBAR PROGRESS
  ===================================================== */
  (function kuis1Progress() {
    function setSidebarProgress(val) {
      sessionStorage.setItem("progress_global", val);
      const fill = document.getElementById("progress-fill");
      const percent = document.getElementById("progress-percent");
      if (fill) fill.style.width = val + "%";
      if (percent) percent.textContent = val + "%";
    }

    const cur = Number(sessionStorage.getItem("progress_global") || 0);
    setSidebarProgress(Math.max(cur, 30));
    window.__setKuis1Progress = setSidebarProgress;
  })();

  /* =====================================================
     2. COUNTDOWN TIMER (10 MENIT)
  ===================================================== */
  (function quizCountdown() {
    const DURATION = 10 * 60;
    const KEY = "quiz1_timer_end";
    const timerEl = document.getElementById("countdown-timer");
    const submitBtn = document.getElementById("submitQuiz");

    let end = sessionStorage.getItem(KEY);
    const now = Date.now();

    if (!end || end < now) {
      end = now + DURATION * 1000;
      sessionStorage.setItem(KEY, end);
    } else {
      end = Number(end);
    }

    function format(sec) {
      const m = String(Math.floor(sec / 60)).padStart(2, "0");
      const s = String(sec % 60).padStart(2, "0");
      return `${m}:${s}`;
    }

    const tick = () => {
      const remain = Math.max(0, Math.floor((end - Date.now()) / 1000));
      if (timerEl) timerEl.textContent = format(remain);

      if (remain <= 0) {
        clearInterval(interval);
        alert("Waktu habis! Jawaban dikumpulkan otomatis.");
        submitBtn.click();
      }
    };

    tick();
    const interval = setInterval(tick, 1000);
  })();

  /* =====================================================
     3. DATA SOAL (10 SOAL)
  ===================================================== */
  const quizData = [
    {
      question: "Yang termasuk komponen biotik di bawah ini adalah …",
      options: ["Air", "Batu", "Pohon", "Cahaya"],
      correct: 2,
      feedback: "Komponen biotik mencakup makhluk hidup seperti tumbuhan, hewan, dan mikroorganisme."
    },
    {
      question: "Cahaya matahari termasuk komponen …",
      options: ["Biotik", "Abiotik", "Organik", "Sintetik"],
      correct: 1,
      feedback: "Cahaya matahari merupakan faktor abiotik."
    },
    {
      question: "Hewan pemakan tumbuhan disebut …",
      options: ["Karnivora", "Herbivora", "Omnivora", "Dekomposer"],
      correct: 1,
      feedback: "Herbivora adalah hewan pemakan tumbuhan."
    },
    {
      question: "Contoh faktor abiotik yang memengaruhi pertumbuhan tumbuhan adalah …",
      options: ["Ketersediaan air", "Jumlah hewan", "Persaingan makhluk hidup", "Dekomposer"],
      correct: 0,
      feedback: "Air merupakan faktor abiotik penting."
    },
    {
      question: "Dalam ekosistem, mikroorganisme seperti jamur berperan sebagai …",
      options: ["Produsen", "Konsumen", "Dekomposer", "Parasit"],
      correct: 2,
      feedback: "Jamur berperan sebagai dekomposer."
    },
    {
      question: "Hubungan timbal balik antara makhluk hidup dan lingkungannya disebut …",
      options: ["Simbiotik", "Ekosistem", "Komunitas", "Habitat"],
      correct: 1,
      feedback: "Ekosistem adalah interaksi biotik dan abiotik."
    },
    {
      question: "Komponen abiotik yang memengaruhi kehidupan ikan laut adalah …",
      options: ["Suhu dan salinitas", "Jumlah tanaman", "Jenis predator", "Dekomposer"],
      correct: 0,
      feedback: "Ikan laut dipengaruhi suhu dan kadar garam."
    },
    {
      question: "Rantai makanan dimulai dari …",
      options: ["Konsumen", "Produsen", "Dekomposer", "Hewan"],
      correct: 1,
      feedback: "Rantai makanan dimulai dari produsen."
    },
    {
      question: "Tumbuhan di tempat lembap dan minim cahaya beradaptasi terhadap …",
      options: ["Faktor abiotik", "Faktor biotik", "Kompetisi", "Predasi"],
      correct: 0,
      feedback: "Cahaya dan kelembapan adalah faktor abiotik."
    },
    {
      question: "Jika populasi konsumen meningkat tajam, maka yang terjadi adalah …",
      options: [
        "Keseimbangan ekosistem terjaga",
        "Jumlah produsen meningkat",
        "Jumlah produsen menurun",
        "Jumlah dekomposer berkurang"
      ],
      correct: 2,
      feedback: "Konsumen meningkat → produsen menurun."
    }
  ];

  /* =====================================================
     4. STATE CBT
  ===================================================== */
  let currentQuestion = 0;

  const questionStatus = quizData.map(() => ({
    answered: false,
    doubt: false
  }));

  /* =====================================================
     5. ELEMENT
  ===================================================== */
  const questionMap = document.getElementById("questionMap");
  const questionContainer = document.getElementById("questionContainer");
  const indicator = document.getElementById("questionIndicator");
  const prevBtn = document.getElementById("prevBtn");
  const nextBtn = document.getElementById("nextBtn");
  const doubtBtn = document.getElementById("markDoubt");
  const submitBtn = document.getElementById("submitQuiz");

  /* =====================================================
     6. BUAT NOMOR SOAL
  ===================================================== */
  quizData.forEach((_, i) => {
    const box = document.createElement("div");
    box.textContent = i + 1;
    box.className = "question-number";
    box.onclick = () => {
      currentQuestion = i;
      renderQuestion(i);
    };
    questionMap.appendChild(box);
  });

  /* =====================================================
     7. RENDER SOAL (BUTTON ANSWER)
  ===================================================== */
  function renderQuestion(index) {
    const q = quizData[index];

    indicator.textContent = `Soal ${index + 1} dari ${quizData.length}`;

questionContainer.innerHTML = `
  <div class="question-block">
    <h3 class="question-text">
      ${q.question}
    </h3>

    <div class="answer-options">
      ${q.options.map((opt, i) => `
        <label class="answer-btn">
          <span class="answer-label">${String.fromCharCode(65 + i)}</span>
          <span>${opt}</span>
          <input type="radio" name="q${index}" value="${i}">
        </label>
      `).join("")}
    </div>
  </div>
`;


    const radios = document.querySelectorAll(`input[name="q${index}"]`);

    radios.forEach(radio => {
      radio.addEventListener("change", () => {
        questionStatus[index].answered = true;
        questionStatus[index].doubt = false;

        document.querySelectorAll(".answer-btn")
          .forEach(btn => btn.classList.remove("selected"));

        radio.closest(".answer-btn").classList.add("selected");

        updateMap();
        checkSubmitAvailability();
      });
    });

    // restore pilihan
    const checked = document.querySelector(`input[name="q${index}"]:checked`);
    if (checked) {
      checked.closest(".answer-btn").classList.add("selected");
    }

    prevBtn.disabled = index === 0;
    nextBtn.textContent = index === quizData.length - 1
      ? "Selesai"
      : "Berikutnya ➡";

    updateMap();
  }

  /* =====================================================
     8. UPDATE NOMOR SOAL
  ===================================================== */
  function updateMap() {
    document.querySelectorAll(".question-number").forEach((box, i) => {
      box.classList.remove("active", "answered", "doubt");
      if (i === currentQuestion) box.classList.add("active");
      if (questionStatus[i].answered) box.classList.add("answered");
      if (questionStatus[i].doubt) box.classList.add("doubt");
    });

    doubtBtn.classList.toggle(
      "active",
      questionStatus[currentQuestion].doubt
    );
  }

  /* =====================================================
     9. VALIDASI SUBMIT
  ===================================================== */
  function checkSubmitAvailability() {
    submitBtn.disabled = !questionStatus.every(q => q.answered);
  }

  /* =====================================================
     10. NAVIGASI
  ===================================================== */
  nextBtn.onclick = () => {
    if (currentQuestion < quizData.length - 1) {
      currentQuestion++;
      renderQuestion(currentQuestion);
    } else {
      submitBtn.click();
    }
  };

  prevBtn.onclick = () => {
    if (currentQuestion > 0) {
      currentQuestion--;
      renderQuestion(currentQuestion);
    }
  };

  doubtBtn.onclick = () => {
    questionStatus[currentQuestion].doubt =
      !questionStatus[currentQuestion].doubt;
    updateMap();
  };

  /* =====================================================
     11. SUBMIT
  ===================================================== */
  submitBtn.onclick = () => {
    const doubtful = questionStatus
      .map((q, i) => q.doubt ? i + 1 : null)
      .filter(Boolean);

    if (doubtful.length > 0) {
      if (!confirm(
        `Masih ada soal ragu-ragu: ${doubtful.join(", ")}.\nYakin ingin menyelesaikan?`
      )) return;
    }

    tampilkanHasil();
  };

  /* =====================================================
     12. HASIL
  ===================================================== */
function tampilkanHasil() {
  let benar = 0;

  quizData.forEach((q, i) => {
    const selected = document.querySelector(`input[name="q${i}"]:checked`);
    if (selected && Number(selected.value) === q.correct) {
      benar++;
    }
  });

  const skor = Math.round((benar / quizData.length) * 100);
  document.getElementById("scoreText").textContent =
    `Skor kamu: ${skor}% (${benar} benar)`;

  const popup = document.getElementById("popupResult");
  popup.classList.add("show");

  if (window.__setKuis1Progress) {
    window.__setKuis1Progress(50);
  }
}

  /* =====================================================
     13. INIT
  ===================================================== */
  renderQuestion(0);
  checkSubmitAvailability();


  /* =====================================================
   14. POPUP ACTIONS
===================================================== */
const popup = document.getElementById("popupResult");
const closePopupBtn = document.getElementById("closePopup");
const nextQuizBtn = document.getElementById("nextQuiz");

if (closePopupBtn) {
  closePopupBtn.onclick = () => {
    popup.classList.remove("show");
  };
}

if (nextQuizBtn) {
  nextQuizBtn.onclick = () => {
    window.location.href = "halaman_kuis2.html";
  };
}

});