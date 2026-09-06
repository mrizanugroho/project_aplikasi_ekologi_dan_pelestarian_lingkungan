// ===============================
// DATA SOAL
// ===============================
// ===============================
// DATA SOAL KUIS 3: Pengaruh Manusia terhadap Ekosistem
// ===============================
const questions = [
  {
    question: "Dampak negatif dari penerapan sistem pertanian monokultur terhadap lingkungan adalah ...",
    answers: [
      "Meningkatkan kesuburan tanah",
      "Menurunkan keanekaragaman hayati",
      "Memperbanyak jumlah spesies asli",
      "Memperbaiki ekosistem hutan"
    ],
    correct: 1 // Berdasarkan sumber, pertanian monokultur menurunkan keanekaragaman hayati karena mengganti berbagai tumbuhan dengan satu jenis saja[cite: 30, 31].
  },
  {
    question: "Penggunaan pupuk kimia secara berlebihan dalam bidang pertanian dapat mengakibatkan dampak buruk pada perairan, yaitu ...",
    answers: [
      "Eutrofikasi perairan",
      "Berkurangnya gas rumah kaca",
      "Meningkatnya spesies hewan langka",
      "Terjadinya hujan asam"
    ],
    correct: 0 // Pupuk kimia yang berlebihan menyebabkan eutrofikasi perairan dan penurunan kesuburan tanah[cite: 31].
  },
  {
    question: "Alih fungsi lahan hutan menjadi perkebunan kelapa sawit atau kawasan pertambangan dapat menyebabkan ...",
    answers: [
      "Tumbuhan dan hewan kehilangan habitat alami",
      "Bertambahnya sumber energi alternatif",
      "Menurunnya suhu bumi secara drastis",
      "Kualitas udara semakin membaik"
    ],
    correct: 0 // Penebangan hutan untuk perkebunan kelapa sawit atau pertambangan menyebabkan banyak hewan dan tumbuhan terancam punah akibat hilangnya habitat alami mereka[cite: 30, 31].
  },
  {
    question: "Peristiwa hujan asam yang dapat merusak hutan dan membuat jembatan mudah berkarat disebabkan oleh polutan ...",
    answers: [
      "Karbon dioksida dan karbon monoksida",
      "Sulfur oksida dan nitrogen oksida",
      "Oksigen dan hidrogen",
      "Metana dan klorofluorokarbon (CFC)"
    ],
    correct: 1 // Hujan asam terjadi akibat polutan sulfur oksida dan nitrogen oksida yang bereaksi dengan air di udara[cite: 31].
  },
  {
    question: "Terakumulasinya gas karbon dioksida di udara menyebabkan terperangkapnya energi cahaya matahari di bumi. Peristiwa ini berdampak pada ...",
    answers: [
      "Eutrofikasi",
      "Hujan asam",
      "Pemanasan global",
      "Peningkatan habitat hewan"
    ],
    correct: 2 // Akumulasi gas karbon dioksida memerangkap energi panas matahari, yang menyebabkan suhu bumi meningkat atau pemanasan global[cite: 31].
  },
  {
    question: "Berikut ini yang BUKAN merupakan dampak dari perubahan iklim global adalah ...",
    answers: [
      "Mencairnya es di kutub",
      "Cuaca ekstrem dan angin puting beliung",
      "Musim kemarau yang berkepanjangan",
      "Meningkatnya keanekaragaman hayati di laut"
    ],
    correct: 3 // Dampak perubahan iklim meliputi es kutub yang mencair, cuaca ekstrem, dan kemarau berkepanjangan, bukan meningkatnya keanekaragaman laut[cite: 30, 31].
  },
  {
    question: "Sejak tahun 1800-an, salah satu penyebab utama naiknya gas rumah kaca yang memicu perubahan iklim adalah ...",
    answers: [
      "Pembakaran bahan bakar fosil",
      "Penanaman pohon di area perkotaan",
      "Penggunaan pupuk organik",
      "Pembuatan suaka margasatwa"
    ],
    correct: 0 // Pembakaran bahan bakar fosil seperti batu bara dan minyak bumi merupakan salah satu penyebab utama perubahan iklim[cite: 31].
  },
  {
    question: "Upaya untuk melindungi dan melestarikan sumber daya alam agar tetap tersedia bagi generasi mendatang disebut ...",
    answers: [
      "Eksploitasi",
      "Polusi",
      "Konservasi",
      "Deforestasi"
    ],
    correct: 2 // Konservasi adalah upaya pelestarian dan perlindungan sumber daya alam[cite: 30].
  },
  {
    question: "Salah satu kegiatan nyata berwawasan lingkungan yang dapat dilakukan manusia untuk memperlambat penurunan keanekaragaman hayati adalah ...",
    answers: [
      "Membuang limbah pabrik langsung ke sungai",
      "Daur ulang sampah dan penggunaan energi alternatif",
      "Membakar hutan untuk membuka lahan baru",
      "Menebang pohon tanpa reboisasi"
    ],
    correct: 1 // Kegiatan konservasi meliputi penggunaan energi alternatif, daur ulang sampah, penghijauan, dan pengolahan limbah[cite: 30, 31].
  },
  {
    question: "Strategi yang dapat dilakukan oleh manusia untuk melestarikan spesies makhluk hidup yang terancam punah adalah melalui ...",
    answers: [
      "Program penangkaran dan pembuatan bank benih",
      "Perburuan liar satwa eksotis",
      "Sistem pertanian monokultur",
      "Penebangan pohon di taman nasional"
    ],
    correct: 0 // Spesies terancam punah dapat dilestarikan dengan program penangkaran dan bank benih[cite: 31].
  }
];

// ... (LANJUTKAN DENGAN KODE JS SEPERTI BIASA DI BAWAHNYA) ...

let currentQuestion = 0;
let answersUser = Array(questions.length).fill(null);
let ragu = Array(questions.length).fill(false);

// ELEMENT SELECTION
const questionText = document.getElementById("questionText");
const answerBox = document.querySelector(".answers");
const numberButtons = document.querySelectorAll(".num");
const btnNext = document.querySelector(".btn-next");
const btnPrev = document.querySelector(".btn-prev");
const btnFlag = document.querySelector(".btn-flag");
const soalLabel = document.querySelector(".soal-label");

const resultModal = document.getElementById("resultModal");
const finalScoreElement = document.getElementById("finalScore");
const scoreDetail = document.getElementById("scoreDetail");
const btnNextQuiz = document.getElementById("btnNextQuiz");
const btnReview = document.getElementById("btnReview");
const reviewModal = document.getElementById("reviewModal");
const reviewContent = document.getElementById("reviewContent");
const btnCloseReview = document.getElementById("btnCloseReview");

// ===============================
// LOAD SOAL
// ===============================
function loadQuestion(newIndex, direction = "next") {
  const card = document.querySelector(".question-card");

  if(direction === "next"){
    card.classList.add("slide-out-left");
  } else {
    card.classList.add("slide-out-right");
  }

  setTimeout(()=>{
    currentQuestion = newIndex;
    const q = questions[currentQuestion];

    soalLabel.textContent = `Soal ${currentQuestion + 1} dari ${questions.length}`;
    questionText.textContent = q.question;
    answerBox.innerHTML = "";

    q.answers.forEach((ans, i) => {
      const div = document.createElement("div");
      div.className = "answer";
      div.innerHTML = `<span class="choice">${String.fromCharCode(65+i)}</span> ${ans}`;

      if (answersUser[currentQuestion] === i) {
        div.classList.add("selected");
      }

      div.addEventListener("click", () => pilihJawaban(i));
      answerBox.appendChild(div);
    });

    updateNomor();

    card.classList.remove("slide-out-left","slide-out-right");
    if(direction === "next"){
      card.classList.add("slide-in-right");
    } else {
      card.classList.add("slide-in-left");
    }

    setTimeout(()=>{
      card.classList.remove("slide-in-right","slide-in-left");
    }, 250);

  }, 200);
}

function pilihJawaban(i) {
  answersUser[currentQuestion] = i;
  const allAnswers = document.querySelectorAll(".answer");
  allAnswers.forEach((el, index) => {
    el.classList.remove("selected");
    if(index === i){
      el.classList.add("selected");
    }
  });
  updateNomor();
}

function updateNomor() {
  numberButtons.forEach((btn, i) => {
    btn.classList.remove("active","answered","ragu");

    if (i === currentQuestion) {
      btn.classList.add("active");
      return;
    }

    if (answersUser[i] !== null) {
      btn.classList.add("answered");
    } 
    else if (ragu[i]) {
      btn.classList.add("ragu");
    }
  });
}

numberButtons.forEach((btn, i)=>{
  btn.addEventListener("click", ()=>{
    if(i === currentQuestion) return;
    const direction = i > currentQuestion ? "next" : "prev";
    loadQuestion(i, direction);
  });
});

// NAVIGATION
btnNext.onclick = () => {
  if(currentQuestion < questions.length-1){
    loadQuestion(currentQuestion + 1, "next");
  }
};

btnPrev.onclick = () => {
  if(currentQuestion > 0){
    loadQuestion(currentQuestion - 1, "prev");
  }
};

btnFlag.onclick = () => {
  ragu[currentQuestion] = !ragu[currentQuestion];
  updateNomor();
};

// ===============================
// TIMER
// ===============================
let time = 600; // 10 menit
const timerEl = document.querySelector(".timer");
let timerInterval = setInterval(updateTimer, 1000);

function updateTimer(){
  let min = Math.floor(time/60);
  let sec = time % 60;

  timerEl.textContent = `${String(min).padStart(2,"0")}:${String(sec).padStart(2,"0")}`;

  if(time <= 60){
    timerEl.style.background = "#e74c3c";
  }

  if(time <= 0){
    clearInterval(timerInterval);
    autoSubmit();
    return;
  }
  time--;
}

// RUN ON LOAD
loadQuestion(currentQuestion);

document.querySelector(".btn-finish").onclick = showResult;

// ===============================
// MAIN RESULT & AJAX SUBMIT
// ===============================
// ===============================
// MAIN RESULT & AJAX SUBMIT
// ===============================
function showResult(){
  clearInterval(timerInterval);

  let correct = 0;
  let wrong = 0;
  let unanswered = 0;

  questions.forEach((q, i)=>{
    if(answersUser[i] === null || answersUser[i] === undefined){
      unanswered++;
    }
    else if(answersUser[i] === q.correct){
      correct++;
    }
    else{
      wrong++;
    }
  });

  const score = Math.round((correct / questions.length) * 100);

  finalScoreElement.textContent = score;
  scoreDetail.textContent = `Benar: ${correct} | Salah: ${wrong} | Kosong: ${unanswered}`;
  resultModal.classList.add("show");

  const baseUrl = document.querySelector('meta[name="base-url"]').getAttribute('content');

  // 🔥 KIRIM NILAI KUIS 3 KE DATABASE LARAVEL
  fetch(baseUrl + '/simpan-nilai', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      },
      body: JSON.stringify({
          materi_id: 'materi_3',               // 👈 Sudah aman untuk Kuis 3
          jenis_tugas: 'kuis', 
          skor: score,
          jumlah_benar: correct,                   // 👈 Komponen wajib untuk panel guru
          jumlah_salah: (wrong + unanswered),      // 👈 Komponen wajib untuk panel guru
          pola_jawaban: JSON.stringify(answersUser) // 👈 Komponen wajib untuk panel guru
      })
  })
  .then(response => response.json())
  .then(data => console.log("Nilai kuis 3 berhasil disimpan:", data))
  .catch(error => console.error("Gagal menyimpan nilai kuis 3:", error));
}

function autoSubmit(){
  showResult();
  document.querySelectorAll("button").forEach(btn=>{
    btn.disabled = true;
  });
}

// ===============================
// LOGIKA REVIEW JAWABAN
// ===============================
if (btnReview) {
    btnReview.addEventListener("click", () => {
        resultModal.classList.remove("show");
        let reviewHTML = "";
        
        questions.forEach((q, i) => {
            const userAnswerIndex = answersUser[i];
            const isCorrect = userAnswerIndex === q.correct;
            const isUnanswered = userAnswerIndex === null || userAnswerIndex === undefined;
            
            let statusBadge = isCorrect ? `<span style="color: #16a34a; font-weight: bold; float: right;">✔️ Benar</span>` : `<span style="color: #dc2626; font-weight: bold; float: right;">❌ Salah</span>`;
            if (isUnanswered) statusBadge = `<span style="color: #f59e0b; font-weight: bold; float: right;">⚠️ Kosong</span>`;
            
            reviewHTML += `<div class="review-item" style="margin-bottom: 15px; border-bottom: 1px solid #ddd; padding-bottom: 10px;">`;
            reviewHTML += `<h4>Soal ${i + 1}: ${q.question} ${statusBadge}</h4>`;
            
            let userAnswerText = isUnanswered ? "Tidak dijawab" : q.answers[userAnswerIndex];
            let answerClass = isCorrect ? "review-correct" : "review-wrong";
            
            reviewHTML += `<div class="review-answer ${answerClass}" style="padding: 5px; margin-top: 5px;">`;
            reviewHTML += `<strong>Jawaban Kamu:</strong> ${userAnswerText}`;
            reviewHTML += `</div>`;
            
            if (!isCorrect) {
                reviewHTML += `<div class="review-answer review-correct" style="margin-top: 8px; padding: 5px; background: #f0fdf4;">`;
                reviewHTML += `<strong>Kunci Jawaban:</strong> ${q.answers[q.correct]}`;
                reviewHTML += `</div>`;
            }
            reviewHTML += `</div>`;
        });
        
        reviewContent.innerHTML = reviewHTML;
        reviewModal.classList.add("show");
    });
}

if (btnCloseReview) {
    btnCloseReview.addEventListener("click", () => {
        reviewModal.classList.remove("show");
        resultModal.classList.add("show"); 
    });
}