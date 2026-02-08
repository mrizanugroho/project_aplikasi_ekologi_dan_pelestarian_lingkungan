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
     4. SELESAIKAN MATERI ABIOTIK (POPUP + POIN)
  ===================================================== */
  if (page === "materi-abiotik") {
    const finishBtn = $("btn-selesaikan-materi");
    const overlay = $("mq-complete-overlay");

    if (finishBtn && overlay) {
      const POINT_KEY = "gamify_points_v1";
      const FLAG_KEY = "abiotik_rewarded";

      finishBtn.addEventListener("click", (e) => {
        e.preventDefault();
        e.stopImmediatePropagation();

        setProgress(30);

        // tampilkan popup
        overlay.classList.remove("hidden");

        sessionStorage.removeItem(MISSION_KEY);

        // tambah poin (sekali)
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
        window.location.href = "halaman_simulasi_hutan.html";
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
