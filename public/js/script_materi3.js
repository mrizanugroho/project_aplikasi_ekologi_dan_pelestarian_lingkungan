document.addEventListener("DOMContentLoaded", () => {

  /* =====================================================
     1. HELPER
  ===================================================== */
  const $ = (id) => document.getElementById(id);
  const page = document.body.dataset.page || "";
  const MISSION_KEY = "mission_started";

  /* =====================================================
     2. PROGRESS SIDEBAR (GLOBAL)
  ===================================================== */
(function sidebarProgress() {
  const fill = $("progress-fill");
  const percent = $("progress-percent");

  let value = Number(sessionStorage.getItem("progress_global") || 0);

  // RESET SAAT MASUK MATERI
  if (page === "materi" || page === "materi-abiotik") {
    value = 0;
    sessionStorage.setItem("progress_global", value);
  }

  if (fill) fill.style.width = value + "%";
  if (percent) percent.textContent = value + "%";
})();

function setProgress(val) {
  sessionStorage.setItem("progress_global", val);
  const fill = document.getElementById("progress-fill");
  const percent = document.getElementById("progress-percent");
  if (fill) fill.style.width = val + "%";
  if (percent) percent.textContent = val + "%";
}



  /* =====================================================
     3. MINI MISI (HANYA HALAMAN MATERI)
  ===================================================== */
  if (page === "materi") {
    const missionBox = $("mini-mission-box");
    const missionBtn = $("mission-complete-btn");

    if (missionBox && missionBtn) {
      const DONE_KEY = "mini_mission_done";

      if (localStorage.getItem(DONE_KEY)) {
        missionBox.classList.add("completed");
      }

      missionBtn.addEventListener("click", () => {
        localStorage.setItem(DONE_KEY, "true");
        missionBox.classList.add("completed");
        alert("Mini misi berhasil diselesaikan! 🎉");
      });
    }
  }

  /* =====================================================
   MULAI MISI (HANYA DI MATERI BIOTIK)
===================================================== */
if (page === "materi") {
  const startBtn = document.querySelector(".btn-mission");
  const missionLog = document.getElementById("mission-log");

  if (startBtn) {
    startBtn.addEventListener("click", () => {
      sessionStorage.setItem(MISSION_KEY, "true");

      if (missionLog) {
        missionLog.textContent = "Status: Misi sedang berlangsung";
      }

      alert("Misi dimulai! Lanjutkan membaca materi hingga selesai 🚀");
    });
  }
}

/* =====================================================
   LANJUTKAN MISI DI ABIOTIK (TANPA MULAI LAGI)
===================================================== */
if (page === "materi-abiotik") {
  const startBtn = document.querySelector(".btn-mission");
  const missionLog = document.getElementById("mission-log");

  if (sessionStorage.getItem(MISSION_KEY) === "true") {
    if (startBtn) startBtn.style.display = "none";
    if (missionLog) {
      missionLog.textContent = "Status: Misi sedang berlangsung";
    }
  }
}


/* =====================================================
     4. SELESAIKAN MATERI ABIOTIK (POPUP ELEGAN + POIN + ANTI SKIP VIDEO)
  ===================================================== */
  if (page === "materi-abiotik") {
    const finishBtn = $("btn-selesaikan-materi");
    const overlay = $("mq-complete-overlay");
    const video = $("materiVideo");

    let maxTimeWatched = 0;
    let videoSelesai = false;

    // --- LOGIKA ANTI-CHEAT VIDEO ---
    if (video && finishBtn) {
      video.addEventListener("timeupdate", () => {
        if (video.currentTime > maxTimeWatched + 1) {
          video.currentTime = maxTimeWatched;
        } else {
          maxTimeWatched = Math.max(video.currentTime, maxTimeWatched);
        }
      });

      video.addEventListener("seeking", () => {
        if (video.currentTime > maxTimeWatched) {
          video.currentTime = maxTimeWatched;
        }
      });

      // KETIKA VIDEO SELESAI DIPUTAR
      video.addEventListener("ended", () => {
        videoSelesai = true;
        finishBtn.removeAttribute("disabled");
        finishBtn.innerHTML = "✅ Selesaikan Materi";
        
        $("mq-complete-title").textContent = "Video Selesai Ditonton! 🎉";
        $("mq-complete-text").textContent = "Hebat! Kamu sudah menyimak video penjelasan dengan tuntas. Sekarang silakan klik tombol di bawah untuk menyelesaikan materi dan lanjut ke latihan!";
        
        if ($("mq-close-btn")) $("mq-close-btn").style.display = "none";
        overlay.classList.remove("hidden");
      });
    }

    // --- LOGIKA KLIK TOMBOL FINISH ---
    if (finishBtn && overlay) {
      const POINT_KEY = "gamify_points_v1";
      const FLAG_KEY = "abiotik_rewarded";

      finishBtn.addEventListener("click", (e) => {
        e.preventDefault();
        e.stopImmediatePropagation();

        setProgress(30);

        $("mq-complete-title").textContent = "Materi Selesai! 🌿";
        $("mq-complete-text").textContent = "Kamu telah menyelesaikan seluruh submateri 3. Yuk lanjut ke latihan!";
        if ($("mq-close-btn")) $("mq-close-btn").style.display = "inline-block";

        overlay.classList.remove("hidden");
        sessionStorage.removeItem(MISSION_KEY);

        if (!localStorage.getItem(FLAG_KEY)) {
          const cur = Number(localStorage.getItem(POINT_KEY) || 0);
          localStorage.setItem(POINT_KEY, cur + 10);
          localStorage.setItem(FLAG_KEY, "true");
        }
      });

      $("mq-close-btn")?.addEventListener("click", () => {
        overlay.classList.add("hidden");
      });

      $("mq-go-sim-btn")?.addEventListener("click", () => {
        // 🔥 Arahkan ke file latihan Submateri 3 kamu
        window.location.href = "petunjuk_latihan.html"; 
      });
    }
  }

  /* =====================================================
     5. GUARD: HINDARI EVENT DUPLIKAT
  ===================================================== */
  document.querySelectorAll(".btn-selesai").forEach(btn => {
    btn.addEventListener("click", (e) => {
      // kalau tombol bukan yang kita kelola secara spesifik, abaikan
      if (!btn.id) return;
    });
  });

});

// ===== Fade In On Scroll =====
document.addEventListener("DOMContentLoaded", function () {

  const fadeElements = document.querySelectorAll(".fade-section");

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add("show");
      }
    });
  }, {
    threshold: 0.2
  });

  fadeElements.forEach(el => {
    observer.observe(el);
  });

});

// ===============================
// FOOD CHAIN ANIMATION
// ===============================

document.addEventListener("DOMContentLoaded", function () {

  const foodItems = document.querySelectorAll(".foodchain-item");

  foodItems.forEach((item, index) => {
    item.style.opacity = "0";
    item.style.transform = "translateY(20px)";

    setTimeout(() => {
      item.style.transition = "all 0.6s ease";
      item.style.opacity = "1";
      item.style.transform = "translateY(0)";
    }, 400 * index);
  });

});

const arrows = document.querySelectorAll(".food-arrow");

arrows.forEach((arrow, index) => {
  setTimeout(() => {
    arrow.style.opacity = "1";
  }, 500 * index);
});

// ===============================
// PIRAMIDA ENERGI INTERAKTIF
// ===============================

document.addEventListener("DOMContentLoaded", function () {

  const levels = document.querySelectorAll(".pyramid-level");

  // animasi muncul satu per satu
  levels.forEach((level, index) => {

    level.style.opacity = "0";
    level.style.transform = "translateY(30px)";

    setTimeout(() => {

      level.style.transition = "all 0.6s ease";
      level.style.opacity = "1";
      level.style.transform = "translateY(0)";

    }, index * 300);

  });


  // highlight aktif saat diklik (mobile friendly)
  levels.forEach(level => {

    level.addEventListener("click", () => {

      levels.forEach(l => l.classList.remove("active"));

      level.classList.add("active");

    });

  });

});

// ================= SIMULASI EKOSISTEM =================

let ecoHealth = 70;

const ecoBar = document.getElementById("eco-level");
const ecoStatus = document.getElementById("eco-status");
const simTitle = document.getElementById("sim-title");
const simDesc = document.getElementById("sim-desc");

document.querySelectorAll(".sim-btn").forEach(btn=>{

btn.addEventListener("click", ()=>{

const effect = btn.dataset.effect;

if(effect === "polusi"){
ecoHealth -= 10;
simTitle.textContent = "Polusi Udara";
simDesc.textContent = "Asap kendaraan meningkatkan polusi udara dan merusak kualitas lingkungan.";
}

if(effect === "industri"){
ecoHealth -= 15;
simTitle.textContent = "Limbah Industri";
simDesc.textContent = "Limbah industri dapat mencemari air dan tanah.";
}

if(effect === "tebang"){
ecoHealth -= 20;
simTitle.textContent = "Penebangan Hutan";
simDesc.textContent = "Penebangan hutan menyebabkan hilangnya habitat dan meningkatkan pemanasan global.";
}

if(effect === "tanam"){
ecoHealth += 10;
simTitle.textContent = "Menanam Pohon";
simDesc.textContent = "Menanam pohon membantu menjaga keseimbangan ekosistem.";
}

if(effect === "daur"){
ecoHealth += 8;
simTitle.textContent = "Daur Ulang Sampah";
simDesc.textContent = "Daur ulang mengurangi limbah dan menjaga lingkungan tetap bersih.";
}

ecoHealth = Math.max(0, Math.min(100, ecoHealth));

ecoBar.style.width = ecoHealth + "%";

if(ecoHealth > 70){
ecoStatus.textContent = "🌍 Ekosistem Sehat";
ecoBar.style.background = "#4caf50";
}

else if(ecoHealth > 40){
ecoStatus.textContent = "⚠️ Ekosistem Mulai Terganggu";
ecoBar.style.background = "#ff9800";
}

else{
ecoStatus.textContent = "☠️ Ekosistem Rusak";
ecoBar.style.background = "#e53935";
}

});

});