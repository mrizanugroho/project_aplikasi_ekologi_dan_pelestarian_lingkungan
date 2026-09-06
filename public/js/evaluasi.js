/* ==================================================
   evaluasi.js - Alur Pilihan Ganda & Esai Menyatu
================================================== */

// ===============================
// 1. DATA SOAL PILIHAN GANDA (1-20)
// ===============================
const questions = [
  { question: "Kolam yang diberi terlalu banyak pupuk akan ditutupi ganggang hijau yang lebat. Tak lama kemudian, banyak ikan mati mengambang. Apa penyebab utamanya?", answers: ["Ikan keracunan memakan ganggang hijau", "Ganggang menghalangi matahari, sehingga air kekurangan oksigen", "Suhu air kolam meningkat drastis menjadi panas", "Ganggang mengeluarkan karbon dioksida berlebih di siang hari"], correct: 1 },
  { question: "Budi menutup rapat toples berisi tanah basah, lumut, dan belalang. Sebulan kemudian, belalang itu tetap hidup. Mengapa belalang tidak kehabisan napas?", answers: ["Belalang berevolusi untuk tidak membutuhkan udara", "Ada lubang mikro di toples yang tidak kasatmata", "Lumut menghasilkan oksigen, belalang menghasilkan karbon dioksida", "Tanah basah memproduksi oksigen baru secara terus-menerus"], correct: 2 },
  { question: "Warga melepas ikan predator asing untuk membasmi nyamuk. Nyamuk habis, tetapi ikan asli sungai ikut punah. Kesalahan fatal dari tindakan ini adalah...", answers: ["Ikan predator memangsa ikan asli yang tak punya pertahanan", "Ikan asli kelaparan karena nyamuknya dihabiskan ikan asing", "Air sungai menjadi beracun akibat ikan predator", "Ikan asli bermigrasi darat untuk menghindari predator"], correct: 0 },
  { question: "Apa yang akan terjadi dalam jangka panjang jika semua bakteri dan jamur pengurai (dekomposer) di sebuah hutan tiba-tiba musnah?", answers: ["Pohon tumbuh raksasa karena bebas dari penyakit", "Hewan karnivora beralih memakan bangkai", "Hutan penuh bangkai & daun mati, lalu tumbuhan mati kurang nutrisi", "Populasi hewan herbivora meledak tak terkendali"], correct: 2 },
  { question: "Tanah bekas letusan gunung hanya menyisakan batu lahar keras. Tumbuhan pertama yang hidup adalah lumut kerak. Mengapa lumut kerak sangat penting di fase ini?", answers: ["Menjadi sumber makanan bagi burung yang lewat", "Mendinginkan batu lahar agar hewan berani datang", "Menghasilkan asam yang perlahan menghancurkan batu menjadi tanah", "Menyerap air hujan agar tidak terjadi erosi batu"], correct: 2 },
  { question: "Padi dimakan belalang, belalang dimakan katak. Energi dari padi yang sampai ke tubuh katak hanya tersisa 10%. Ke mana hilangnya sisa energi tersebut?", answers: ["Tersimpan selamanya di dalam tulang belalang", "Hilang menjadi panas saat belalang bergerak dan bernapas", "Dibuang oleh katak menjadi zat sisa pembuangan", "Menguap kembali ke matahari saat siang hari"], correct: 1 },
  { question: "Zat racun pestisida masuk ke danau. Anehnya, kandungan racun tertinggi justru ditemukan pada elang pemakan ikan di danau tersebut. Kenapa hal ini bisa terjadi?", answers: ["Elang meminum air danau lebih banyak dari hewan lain", "Ikan menyuntikkan racunnya ke elang saat dimangsa", "Racun menumpuk seiring naiknya rantai makanan menuju predator puncak", "Tubuh elang memproduksi racun akibat aroma danau"], correct: 2 },
  { question: "Perhatikan: Padi -> Tikus -> Ular -> Burung Hantu. Jika warga memburu habis semua ular, apa dampak terbesarnya dalam beberapa bulan?", answers: ["Populasi tikus meledak menghancurkan panen, burung hantu kelaparan", "Burung hantu beralih memangsa padi untuk bertahan hidup", "Tikus mati kelaparan karena tidak ada ular pengatur populasi", "Padi tumbuh sangat subur dan burung hantu bertambah banyak"], correct: 0 },
  { question: "Dalam Piramida Ekologi padang rumput, mengapa jumlah produsen (rumput) harus jauh lebih banyak daripada konsumen puncak (singa)?", answers: ["Karena singa berkembang biak dengan sangat lambat", "Rumput berukuran kecil sehingga membutuhkan lahan luas", "Energi berkurang ke atas, butuh banyak produsen untuk sedikit konsumen puncak", "Hewan herbivora mencegah singa bertambah banyak"], correct: 2 },
  { question: "Jika hutan ditebang habis, suhu bumi akan semakin panas (pemanasan global). Apa hubungan logis dari kedua hal tersebut?", answers: ["Tidak ada lagi dahan pohon yang mendinginkan udara", "Pohon tak lagi menyerap karbon dioksida, gas penjebak panas bumi", "Pohon berhenti mengeluarkan metana yang berfungsi mendinginkan", "Matahari langsung membakar tanah tanpa penghalang"], correct: 1 },
  { question: "Pabrik membuang air pendingin yang bersih tapi 'bersuhu panas' ke sungai, membuat ikan lemas dan mati. Mengapa air panas membahayakan ikan?", answers: ["Air panas membuat sisik ikan melepuh dan terlepas", "Suhu panas menurunkan kadar oksigen terlarut dalam air", "Ikan terlalu banyak bergerak kepanasan hingga kelelahan", "Memicu ikan stres dan saling menyerang satu sama lain"], correct: 1 },
  { question: "Asap kendaraan berbelerang tinggi memicu terjadinya 'Hujan Asam'. Apa ancaman paling mematikan hujan asam bagi lahan pertanian?", answers: ["Memudarkan warna daun menjadi transparan", "Membuat ukuran buah membesar secara tidak normal", "Merusak keseimbangan pH tanah sehingga akar tanaman mati", "Membakar cacing tanah pengembur hingga musnah"], correct: 2 },
  { question: "Saat ini lautan tercemar oleh 'mikroplastik' (plastik tak kasatmata). Bahaya paling mengancam dari mikroplastik bagi manusia adalah...", answers: ["Merusak lambung kapal nelayan yang sedang melaut", "Termakan ikan laut, lalu ikan tersebut kita konsumsi", "Mengubah salinitas (kadar garam) air laut menjadi tawar", "Menggumpal dan memblokir cahaya matahari di permukaan laut"], correct: 1 },
  { question: "Meskipun jauh dari laut, hutan yang lebat mampu mencegah sumur warga kering saat kemarau panjang. Bagaimana cara hutan melakukannya?", answers: ["Akar pohon menyerap dan menyimpan air hujan sebagai cadangan air tanah", "Akar pohon memompa air tanah dalam lalu mengubahnya", "Daun pohon menampung embun air layaknya mangkuk raksasa", "Pohon menarik awan hujan dari laut ke daratan"], correct: 0 },
  { question: "Penggunaan gas CFC (pendingin kulkas zaman dulu) telah melubangi lapisan Ozon bumi. Jika Ozon berlubang, apa bahaya nyatanya?", answers: ["Udara dingin dari luar angkasa masuk membekukan bumi", "Meteor lebih mudah menembus atmosfer dan menabrak bumi", "Sinar UV berbahaya langsung merusak kulit dan klorofil tumbuhan", "Bumi akan perlahan kehilangan gaya gravitasinya"], correct: 2 },
  { question: "Pemerintah membuat Taman Nasional (In-situ) dan Kebun Raya (Ex-situ). Perbedaan mendasar dari metode konservasi ini adalah...", answers: ["Taman Nasional melindungi di habitat asli, Kebun Raya di luar habitat asli", "Taman Nasional dikelola polisi, Kebun Raya dikelola masyarakat", "Taman Nasional untuk hewan ganas, Kebun Raya untuk tanaman jinak", "Taman Nasional boleh berburu, Kebun Raya dilarang keras"], correct: 0 },
  { question: "Sebuah jalan tol membelah hutan lindung, membuat kawanan gajah tak bisa menyeberang mencari makan. Solusi paling aman tanpa merobohkan tol adalah?", answers: ["Memindahkan seluruh gajah ke kebun binatang", "Memasang pagar listrik tegangan tinggi di pinggir tol", "Membangun jembatan terowongan khusus berlapis tanah dan pohon", "Rutin menyebar pakan ternak di sepanjang pinggir tol"], correct: 2 },
  { question: "Desa Ekowisata menawarkan wisata menyelam melihat karang. Namun, lambat laun karang malah rusak. Mengapa hal ini bisa terjadi?", answers: ["Ikan karang stres melihat banyaknya orang menyelam", "Kurangnya pengawasan membuat turis rentan menginjak karang & membuang sampah", "Perahu turis menyerap terlalu banyak oksigen terlarut", "Turis secara tidak sengaja membawa penyakit dari kota"], correct: 1 },
  { question: "Menyelamatkan bayi Orang Utan sitaan ke pusat rehabilitasi itu baik. Namun, mengembalikannya ke hutan asli sangat sulit, karena...", answers: ["Orang Utan tersebut lupa insting mencari makan dan terlalu manja pada manusia", "Hutan asli menolak kehadiran hewan yang pernah tinggal di kota", "Mereka akan otomatis dimangsa oleh monyet spesies lain", "Mereka tidak tahan dengan cuaca hutan yang dingin"], correct: 0 },
  { question: "Adat 'Sasi' di Maluku melarang penangkapan ikan di waktu-waktu tertentu. Secara ilmu ekologi, apa manfaat utama larangan ini?", answers: ["Memaksa masyarakat setempat untuk mengonsumsi sayuran", "Mencegah masuknya armada kapal asing ke perairan Maluku", "Memberi waktu jeda agar ikan sempat kawin dan populasinya kembali pulih", "Menakut-nakuti ikan karang agar tidak berani berenang jauh"], correct: 2 }
];

// ===============================
// 2. DATA SOAL ESAI (21-25)
// ===============================
const essayQuestions = [
  "🌾 (Analisis Rantai Makanan) Bayangkan di area kebun sekolahmu, semua burung pemakan ulat daun ditangkap oleh orang jahat. Coba jelaskan secara runtut, apa yang akan terjadi pada daun-daun tanaman dan hewan predator lainnya (seperti ular pemakan burung) di bulan berikutnya?",
  "💧 (Analisis Dampak Manusia) Banyak orang yang mencuci motor di pinggir sungai kecil menggunakan deterjen. Jelaskan 2 dampak buruk bagi kehidupan hewan dan tumbuhan di dalam air sungai tersebut!",
  "🐅 (Merancang Konservasi) Kamu adalah ketua polisi hutan. Kamu menemukan seekor anak Harimau Sumatra yang terluka parah di pinggir desa karena hutannya ditebang. Coba rancang rencana penyelamatan, mulai dari dibawa ke mana (Ex-situ) sampai bagaimana mengembalikannya ke hutan lagi (In-situ)!",
  "🌡️ (Evaluasi Pemanasan Global) Banyak yang bilang 'Menanam 1 pohon di depan rumah sudah cukup untuk menghentikan Pemanasan Global'. Menurutmu sebagai detektif lingkungan, pernyataan itu benar atau kurang tepat? Jelaskan alasan logisnya!",
  "🚮 (Sintesis Daur Ulang) Bekas botol air mineral berbahan plastik butuh ratusan tahun untuk hancur di alam. Berikan ide paling kreatifmu, bagaimana cara memanfaatkan ulang tumpukan botol plastik tersebut agar tidak menjadi sampah abadi yang menyiksa bumi!"
];

// ===============================
// 3. VARIABEL STATE
// ===============================
let totalPilgan = questions.length;
let totalEsai = essayQuestions.length;
let totalQuestions = totalPilgan + totalEsai; // Total 25 Soal
let currentQuestion = 0; // Index 0 - 24

let answersUser = new Array(totalPilgan).fill(null);
let answersEsai = new Array(totalEsai).fill("");
let flagged = new Array(totalQuestions).fill(false);

let time = 90 * 60; // 90 menit
let timerInterval;

// Elemen HTML
const questionText = document.getElementById("questionText");
const answersBox = document.getElementById("answersBox");
const labelSoal = document.getElementById("labelSoal");
const pilganGrid = document.getElementById("pilganGrid");

const btnFlag = document.querySelector(".btn-flag");
const btnPrev = document.getElementById("btnPrev");
const btnNext = document.getElementById("btnNext");
const btnFinish = document.getElementById("btnFinish");

const resultModal = document.getElementById("resultModal");
const finalScore = document.getElementById("finalScore");
const scoreDetail = document.getElementById("scoreDetail");
const btnReview = document.getElementById("btnReview");
const reviewModal = document.getElementById("reviewModal");
const reviewContent = document.getElementById("reviewContent");

// ===============================
// 4. INIT (SAAT HALAMAN DIMUAT)
// ===============================
document.addEventListener("DOMContentLoaded", () => {
    // Generate 25 Tombol Nomor di Sidebar
    for (let i = 0; i < totalQuestions; i++) {
        const btnNum = document.createElement("button");
        btnNum.className = "num";
        btnNum.textContent = i + 1;
        
        // Bedakan warna border untuk Esai (opsional agar menarik)
        if(i >= totalPilgan) {
            btnNum.style.borderBottom = "3px solid #f59e0b";
        }

        btnNum.onclick = () => {
            currentQuestion = i;
            loadQuestion(currentQuestion);
        };
        pilganGrid.appendChild(btnNum);
    }

    loadQuestion(0);
    timerInterval = setInterval(updateTimer, 1000);
});

// ===============================
// 5. RENDER SOAL (PILGAN & ESAI)
// ===============================
function loadQuestion(index) {
    answersBox.innerHTML = ""; 
    
    // Jika masih di nomor 1-20 (Pilgan)
    if (index < totalPilgan) {
        labelSoal.innerHTML = `Pilihan Ganda - Soal <span id="currentQ">${index + 1}</span> dari 20`;
        labelSoal.style.background = "#fff";
        labelSoal.style.color = "#22a873";
        
        const q = questions[index];
        questionText.textContent = q.question;
        
        const labels = ["A", "B", "C", "D"];
        q.answers.forEach((ans, i) => {
            const div = document.createElement("div");
            div.className = "answer";
            if (answersUser[index] === i) div.classList.add("selected");

            div.innerHTML = `<span class="choice">${labels[i]}</span> ${ans}`;
            div.onclick = () => {
                answersUser[index] = i;
                loadQuestion(currentQuestion); 
            };
            answersBox.appendChild(div);
        });
    } 
    // Jika masuk ke nomor 21-25 (Esai)
    else {
        const esaiIndex = index - totalPilgan;
        labelSoal.innerHTML = `Esai (HOTS) - Soal <span id="currentQ">${esaiIndex + 1}</span> dari 5`;
        labelSoal.style.background = "#f59e0b";
        labelSoal.style.color = "#fff";
        
        questionText.textContent = essayQuestions[esaiIndex];
        
        const textarea = document.createElement("textarea");
        textarea.className = "essay-input";
        textarea.placeholder = "Ketik penjelasan dan analisismu di sini secara rinci...";
        textarea.value = answersEsai[esaiIndex];
        
        // Simpan otomatis tiap kali ngetik
        textarea.oninput = (e) => {
            answersEsai[esaiIndex] = e.target.value;
            updateGrid(); 
        };
        
        answersBox.appendChild(textarea);
    }

    updateGrid();
    updateNavButtons();
}

// ===============================
// 6. UPDATE SIDEBAR GRID
// ===============================
function updateGrid() {
    const nums = document.querySelectorAll(".num");
    nums.forEach((btn, i) => {
        btn.classList.remove("active", "answered", "flagged");
        
        if (i === currentQuestion) btn.classList.add("active");
        
        // Cek sudah dijawab atau belum
        if (i < totalPilgan) {
            if (answersUser[i] !== null) btn.classList.add("answered");
        } else {
            if (answersEsai[i - totalPilgan].trim() !== "") btn.classList.add("answered");
        }
        
        if (flagged[i]) btn.classList.add("flagged");
    });

    if (flagged[currentQuestion]) {
        btnFlag.classList.add("active");
        btnFlag.textContent = "Batal Tandai";
    } else {
        btnFlag.classList.remove("active");
        btnFlag.textContent = "Tandai Ragu-ragu";
    }
}

// Tombol Ragu-ragu
btnFlag.onclick = () => {
    flagged[currentQuestion] = !flagged[currentQuestion];
    updateGrid();
};

// ===============================
// 7. NAVIGASI TOMBOL
// ===============================
function updateNavButtons() {
    btnPrev.disabled = (currentQuestion === 0);
    btnNext.disabled = (currentQuestion === totalQuestions - 1);
}

btnPrev.onclick = () => {
    if (currentQuestion > 0) {
        currentQuestion--;
        loadQuestion(currentQuestion);
    }
};

btnNext.onclick = () => {
    if (currentQuestion < totalQuestions - 1) {
        currentQuestion++;
        loadQuestion(currentQuestion);
    }
};

// ===============================
// 8. TIMER & SUBMIT
// ===============================
function updateTimer() {
    const timerDisplay = document.querySelector(".timer");
    const m = Math.floor(time / 60).toString().padStart(2, "0");
    const s = (time % 60).toString().padStart(2, "0");
    timerDisplay.textContent = `${m}:${s}`;

    if (time <= 300) timerDisplay.style.background = "#e74c3c"; // Merah jika sisa 5 menit

    if (time <= 0) {
        clearInterval(timerInterval);
        alert("Waktu Habis! Jawabanmu otomatis dikumpulkan.");
        showResult();
    }
    time--;
}

btnFinish.onclick = () => {
    const confirmSubmit = confirm("Yakin ingin mengakhiri evaluasi? Pastikan semua Pilgan (1-20) dan Esai (21-25) sudah terjawab!");
    if(confirmSubmit) showResult();
};

function showResult() {
    clearInterval(timerInterval);
    let correct = 0;
    let wrong = 0;
    let unanswered = 0;

    // Hitung Benar, Salah, Kosong
    questions.forEach((q, i) => {
        if (answersUser[i] === null || answersUser[i] === undefined) unanswered++;
        else if (answersUser[i] === q.correct) correct++;
        else wrong++;
    });

    // Hitung Skor Akhir
    const score = Math.round((correct / totalPilgan) * 100);
    finalScore.textContent = score;
    scoreDetail.textContent = `✔️ Benar: ${correct} | ❌ Salah: ${wrong} | ⚠️ Kosong: ${unanswered}`;

    document.querySelector(".main").style.pointerEvents = "none";
    resultModal.classList.add("show");

    // =========================================================
    // 🔥 KURIR BERANGKAT MENGIRIM DATA KE LARAVEL
    // =========================================================
    // Gabungin base url sama rute /evaluasi/submit
    fetch(baseUrl + '/evaluasi/submit', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') 
        },
        // ... sisa body: JSON.stringify(...) biarin aja sama kayak sebelumnya ...
        body: JSON.stringify({
            nilai: score,
            benar: correct,
            salah: wrong,
            pola: JSON.stringify(answersUser), 
            // Kirim jawaban esai, kalau kosong dikirim string kosong ""
            esai_1: answersEsai[0] || "",
            esai_2: answersEsai[1] || "",
            esai_3: answersEsai[2] || "",
            esai_4: answersEsai[3] || "",
            esai_5: answersEsai[4] || ""
        })
    })
    .then(response => response.json())
    .then(data => {
        if(data.status === 'success') {
            console.log("Mantap bro! Skor & Esai udah meluncur ke database.");
        }
    })
    .catch(error => {
        console.error("Yah error ngirim data:", error);
    });
}

// ===============================
// 9. REVIEW JAWABAN (GABUNGAN)
// ===============================
btnReview.onclick = () => {
    resultModal.classList.remove("show");
    let reviewHTML = "";

    // Review Pilgan (1-20)
    reviewHTML += `<h3 style="border-bottom: 2px solid #ccc; padding-bottom: 5px; margin-bottom: 15px; color:#22a873;">Bagian A: Pilihan Ganda (1-20)</h3>`;
    questions.forEach((q, i) => {
        const userAnswerIndex = answersUser[i];
        const isCorrect = userAnswerIndex === q.correct;
        const isUnanswered = userAnswerIndex === null || userAnswerIndex === undefined;
        
        let statusBadge = isCorrect ? `<span style="color: #16a34a; float: right;">✔️ Benar</span>` : `<span style="color: #dc2626; float: right;">❌ Salah</span>`;
        if (isUnanswered) statusBadge = `<span style="color: #f59e0b; float: right;">⚠️ Kosong</span>`;
        
        reviewHTML += `<div class="review-item"><h4>Soal ${i + 1}: ${q.question} ${statusBadge}</h4>`;
        
        let userAnswerText = isUnanswered ? "Tidak dijawab" : q.answers[userAnswerIndex];
        let answerClass = isCorrect ? "review-correct" : "review-wrong";
        
        reviewHTML += `<div class="review-answer ${answerClass}"><strong>Jawaban Kamu:</strong> ${userAnswerText}</div>`;
        if (!isCorrect) {
            reviewHTML += `<div class="review-answer review-correct" style="margin-top: 8px;"><strong>Kunci Jawaban:</strong> ${q.answers[q.correct]}</div>`;
        }
        reviewHTML += `</div>`;
    });

    // Review Esai (21-25)
    reviewHTML += `<h3 style="border-bottom: 2px solid #ccc; padding-bottom: 5px; margin-top: 30px; margin-bottom: 15px; color:#f59e0b;">Bagian B: Esai (21-25)</h3>`;
    essayQuestions.forEach((soal, idx) => {
        const jawabanSiswa = answersEsai[idx].trim() === "" ? "<em>Tidak diisi</em>" : answersEsai[idx];
        reviewHTML += `<div class="review-item" style="border-left: 4px solid #f59e0b;">`;
        reviewHTML += `<h4 style="color:#444;">Soal ${idx + 21}: ${soal}</h4>`;
        reviewHTML += `<div style="background:#fff; padding:10px; border:1px solid #ccc; border-radius:6px; margin-top:8px;">`;
        reviewHTML += `<strong style="color:#555;">Jawaban Kamu:</strong><br><p style="margin-top:5px; font-size:13.5px; color:#222; line-height:1.5; white-space: pre-wrap;">${jawabanSiswa}</p>`;
        reviewHTML += `</div></div>`;
    });

    reviewContent.innerHTML = reviewHTML;
    reviewModal.classList.add("show");
};

document.getElementById("btnCloseReview").onclick = () => {
    reviewModal.classList.remove("show");
    resultModal.classList.add("show");
};

const baseUrl = document.querySelector('meta[name="base-url"]').getAttribute('content');

document.getElementById("btnNextQuiz").onclick = () => {
    // Gabungin base url sama rute tujuanmu
    window.location.href = baseUrl + "/materi/daftar"; 
};

