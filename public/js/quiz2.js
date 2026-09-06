// ===============================
// DATA SOAL
// ===============================
const questions = [

{
  question: "Ekosistem adalah ...",
  answers: [
    "Hubungan antara makhluk hidup dengan teknologi",
    "Interaksi antara makhluk hidup dan lingkungan tak hidup",
    "Hubungan antara manusia dan hewan",
    "Tempat hidup manusia saja"
  ],
  correct: 1
},

{
  question: "Yang termasuk komponen abiotik dalam ekosistem adalah ...",
  answers: [
    "Tumbuhan",
    "Hewan",
    "Jamur",
    "Cahaya matahari"
  ],
  correct: 3
},

{
  question: "Kumpulan individu sejenis yang hidup di tempat tertentu disebut ...",
  answers: [
    "Individu",
    "Populasi",
    "Komunitas",
    "Ekosistem"
  ],
  correct: 1
},

{
  question: "Organisme yang mampu membuat makanan sendiri melalui fotosintesis disebut ...",
  answers: [
    "Produsen",
    "Konsumen",
    "Dekomposer",
    "Predator"
  ],
  correct: 0
},

{
  question: "Proses perpindahan energi dari satu makhluk hidup ke makhluk hidup lain melalui peristiwa makan dan dimakan disebut ...",
  answers: [
    "Simbiosis",
    "Rantai makanan",
    "Habitat",
    "Adaptasi"
  ],
  correct: 1
},

{
  question: "Dalam rantai makanan, belalang yang memakan tumbuhan berperan sebagai ...",
  answers: [
    "Produsen",
    "Konsumen primer",
    "Konsumen sekunder",
    "Dekomposer"
  ],
  correct: 1
},

{
  question: "Organisme yang menguraikan makhluk hidup yang mati menjadi zat sederhana disebut ...",
  answers: [
    "Produsen",
    "Konsumen",
    "Dekomposer",
    "Herbivora"
  ],
  correct: 2
},

{
  question: "Proses penguapan air dari permukaan bumi karena panas matahari dalam siklus air disebut ...",
  answers: [
    "Kondensasi",
    "Evaporasi",
    "Presipitasi",
    "Infiltrasi"
  ],
  correct: 1
},

{
  question: "Proses berubahnya uap air menjadi titik-titik air sehingga membentuk awan disebut ...",
  answers: [
    "Evaporasi",
    "Transpirasi",
    "Kondensasi",
    "Presipitasi"
  ],
  correct: 2
},

{
  question: "Dalam daur karbon, tumbuhan menyerap karbon dioksida dari udara melalui proses ...",
  answers: [
    "Respirasi",
    "Fotosintesis",
    "Transpirasi",
    "Fermentasi"
  ],
  correct: 1
}

];

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

  // 🔥 AMBIL BASE URL & KIRIM NILAI KUIS 2 KE DATABASE LARAVEL
  const baseUrl = document.querySelector('meta[name="base-url"]').getAttribute('content');

  fetch(baseUrl + '/simpan-nilai', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      },
      body: JSON.stringify({
          materi_id: 'materi_2',               // 👈 WAJIB 'materi_2' untuk submateri 2
          jenis_tugas: 'kuis', 
          skor: score,
          jumlah_benar: correct,                   
          jumlah_salah: (wrong + unanswered),      
          pola_jawaban: JSON.stringify(answersUser) // 👈 Kirim array jawaban user agar bisa dirender di panel guru
      })
  })  
  .then(response => response.json())
  .then(data => console.log("Nilai kuis 2 berhasil disimpan:", data))
  .catch(error => console.error("Gagal menyimpan nilai kuis 2:", error));
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