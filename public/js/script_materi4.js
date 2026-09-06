document.addEventListener("DOMContentLoaded", () => {
  const $ = (id) => document.getElementById(id);
  const page = document.body.dataset.page || "";
  const MISSION_KEY = "mission_started";

  /* =====================================================
     1. PROGRESS SIDEBAR & ANTI-SKIP VIDEO
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
    const fill = $("progress-fill");
    const percent = $("progress-percent");
    if (fill) fill.style.width = val + "%";
    if (percent) percent.textContent = val + "%";
  }

  // --- LOGIKA VIDEO ANTI-SKIP & POPUP ---
  const finishBtn = $("btn-selesaikan-materi");
  const overlay = $("mq-complete-overlay");
  const video = $("materiVideo");
  let maxTimeWatched = 0;

  if (video && finishBtn) {
    video.addEventListener("timeupdate", () => {
      if (video.currentTime > maxTimeWatched + 0.5) { // Toleransi 0.5 detik
        video.currentTime = maxTimeWatched;
      } else {
        maxTimeWatched = video.currentTime;
      }
    });

    video.addEventListener("ended", () => {
      finishBtn.removeAttribute("disabled");
      finishBtn.textContent = "✅ Selesaikan Materi";
      overlay.classList.remove("hidden");
    });
  }

  if (finishBtn && overlay) {
    finishBtn.addEventListener("click", () => {
      setProgress(100);
      overlay.classList.remove("hidden");
    });
    $("mq-go-sim-btn")?.addEventListener("click", () => {
      window.location.href = "halaman_evaluasi.html";
    });
  }

  /* =====================================================
     2. ANIMASI STATIS (TETAP DI SINI)
  ===================================================== */
  // Fade In
  const fadeElements = document.querySelectorAll(".fade-section");
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(e => { if (e.isIntersecting) e.target.classList.add("show"); });
  }, { threshold: 0.2 });
  fadeElements.forEach(el => observer.observe(el));

  // Food Chain
  document.querySelectorAll(".foodchain-item").forEach((item, index) => {
    item.style.opacity = "0";
    setTimeout(() => { item.style.transition = "all 0.6s"; item.style.opacity = "1"; }, 400 * index);
  });

  // Piramida
  document.querySelectorAll(".pyramid-level").forEach((level, index) => {
    level.style.opacity = "0";
    setTimeout(() => { level.style.transition = "all 0.6s"; level.style.opacity = "1"; }, index * 300);
    level.addEventListener("click", () => {
      document.querySelectorAll(".pyramid-level").forEach(l => l.classList.remove("active"));
      level.classList.add("active");
    });
  });
});