document.addEventListener("DOMContentLoaded", () => {

  /* =====================================================
     1. HELPER & INITIALIZATION
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
     3. MINI MISI & LOGIKA PENG DUPLIKAT (MATERI BIOTIK)
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

    const startBtn = document.querySelector(".btn-mission");
    const missionLog = document.getElementById("mission-log");
    if (startBtn) {
      startBtn.addEventListener("click", () => {
        sessionStorage.setItem(MISSION_KEY, "true");
        if (missionLog) missionLog.textContent = "Status: Misi sedang berlangsung";
        alert("Misi dimulai! Lanjutkan membaca materi hingga selesai 🚀");
      });
    }
  }

  if (page === "materi-abiotik") {
    const startBtn = document.querySelector(".btn-mission");
    const missionLog = document.getElementById("mission-log");

    if (sessionStorage.getItem(MISSION_KEY) === "true") {
      if (startBtn) startBtn.style.display = "none";
      if (missionLog) missionLog.textContent = "Status: Misi sedang berlangsung";
    }
  }

  /* =====================================================
     4. ANTI-CHEAT VIDEO + POPUP ELEGAN (MATERI ABIOTIK)
  ===================================================== */
  if (page === "materi-abiotik") {
    const finishBtn = $("btn-selesaikan-materi");
    const overlay = $("mq-complete-overlay");
    const video = $("materiVideo");

    let maxTimeWatched = 0;

    if (video && finishBtn) {
      // Mengunci alur video saat berjalan normal
      video.addEventListener("timeupdate", () => {
        if (!video.seeking) {
          if (video.currentTime > maxTimeWatched + 1) {
            video.currentTime = maxTimeWatched;
          } else {
            maxTimeWatched = Math.max(video.currentTime, maxTimeWatched);
          }
        }
      });

      // Menangkap basah siswa saat mencoba menyeret/mengklik progress bar ke depan
      video.addEventListener("seeking", () => {
        if (video.currentTime > maxTimeWatched) {
          video.currentTime = maxTimeWatched; // Seret paksa balik!
        }
      });

      // Pemicu Pop-up Keluar saat Video Selesai Secara Jujur
      video.addEventListener("ended", () => {
        // 1. Aktifkan tombol pengunci di bawah video
        finishBtn.removeAttribute("disabled");
        finishBtn.innerHTML = "✅ Selesaikan Materi";
        
        // 2. Set isi pesan di dalam modal popup box kamu
        if ($("mq-complete-title")) $("mq-complete-title").textContent = "Video Selesai Ditonton! 🎉";
        if ($("mq-complete-text")) $("mq-complete-text").textContent = "Hebat! Kamu sudah menyimak video penjelasan dengan tuntas. Sekarang silakan klik tombol di bawah untuk menyelesaikan materi dan lanjut ke latihan!";
        if ($("mq-close-btn")) $("mq-close-btn").style.display = "none";
        
        // 3. Tampilkan Pop-up Overlay di layar browser siswa
        if (overlay) {
          overlay.classList.remove("hidden");
        }
      });
    }

    // Mengurus aksi tombol di dalam Pop-up modal
    if (finishBtn && overlay) {
      const POINT_KEY = "gamify_points_v1";
      const FLAG_KEY = "abiotik_rewarded";

      finishBtn.addEventListener("click", (e) => {
        e.preventDefault();
        e.stopImmediatePropagation();

        setProgress(30);

        if ($("mq-complete-title")) $("mq-complete-title").textContent = "Materi Selesai! 🌿";
        if ($("mq-complete-text")) $("mq-complete-text").textContent = "Kamu telah menyelesaikan seluruh submateri 1. Yuk lanjut ke simulasi untuk melihat penerapannya!";
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
        window.location.href = "/ekosistem-laravel/public/materi1/petunjuk-latihan";
      });
    }
  }

});

/* =====================================================
   5. ANIMASI & INTERAKSI (FADE, JARING MAKANAN, PIRAMIDA)
===================================================== */
document.addEventListener("DOMContentLoaded", function () {
  const fadeElements = document.querySelectorAll(".fade-section");
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) entry.target.classList.add("show");
    });
  }, { threshold: 0.2 });
  fadeElements.forEach(el => observer.observe(el));

  // Animasi Jaring Makanan
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

  const arrows = document.querySelectorAll(".food-arrow");
  arrows.forEach((arrow, index) => {
    setTimeout(() => { arrow.style.opacity = "1"; }, 500 * index);
  });

  // Piramida Energi
  const levels = document.querySelectorAll(".pyramid-level");
  levels.forEach((level, index) => {
    level.style.opacity = "0";
    level.style.transform = "translateY(30px)";
    setTimeout(() => {
      level.style.transition = "all 0.6s ease";
      level.style.opacity = "1";
      level.style.transform = "translateY(0)";
    }, index * 300);
  });

  levels.forEach(level => {
    level.addEventListener("click", () => {
      levels.forEach(l => l.classList.remove("active"));
      level.classList.add("active");
    });
  });
});