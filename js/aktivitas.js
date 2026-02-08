document.addEventListener("DOMContentLoaded", () => {
  // 🎧 AUTO AUDIO UNLOCKER (asli)
  const unlockAudio = () => {
    try {
      const ctx = new (window.AudioContext || window.webkitAudioContext)();
      const buffer = ctx.createBuffer(1, 1, 22050);
      const source = ctx.createBufferSource();
      source.buffer = buffer;
      source.connect(ctx.destination);
      source.start(0);
      if (ctx.state === "suspended") ctx.resume();
      console.log("🔊 AudioContext unlocked!");
    } catch (e) {
      console.warn("Audio unlock failed:", e);
    }
    document.removeEventListener("mousedown", unlockAudio);
    document.removeEventListener("touchstart", unlockAudio);
  };
  document.addEventListener("mousedown", unlockAudio);
  document.addEventListener("touchstart", unlockAudio);

  // ===== Sidebar progress sync for Kuis 2 =====
  (function kuis2Progress() {
    function setSidebarProgress(val) {
      sessionStorage.setItem('progress_global', val);
      const fill = document.getElementById('progress-fill');
      const percent = document.getElementById('progress-percent');
      if (fill) fill.style.width = val + '%';
      if (percent) percent.textContent = val + '%';
    }

    function loadSidebarProgress() {
      const cur = Number(sessionStorage.getItem('progress_global') || 0);
      // entering kuis2 should show at least 50% (assume materi+kuis1 done)
      const show = Math.max(cur, 50);
      setSidebarProgress(show);
    }

    // expose for other code if needed
    window.__setKuis2Progress = setSidebarProgress;

    // call on load
    loadSidebarProgress();
  })();

  // ============================================
  // VARIABEL DASAR (asli)
  // ============================================
  const draggables = document.querySelectorAll(".draggable");
  const dropZones = document.querySelectorAll(".drop-zone");
  const checkBtn = document.getElementById("checkAnswer");
  const popup = document.getElementById("popupResult");
  const scoreText = document.getElementById("scoreText");
  const feedbackContainer = document.getElementById("feedbackContainer");
  const retryBtn = document.getElementById("retryBtn");
  const nextPage = document.getElementById("nextPage");

  // 🔊 Sound Effects (asli)
  const soundDrag = new Audio("sounds/drag.mp3");
  const soundDrop = new Audio("sounds/drop.mp3");
  const soundCorrect = new Audio("sounds/correct.mp3");
  const soundWrong = new Audio("sounds/wrong.mp3");

  [soundDrag, soundDrop, soundCorrect, soundWrong].forEach(s => {
    s.preload = "auto";
    s.volume = 0.7;
  });

  let placedCount = 0;

  // ============================================
  // SISTEM DRAG
  // ============================================
  draggables.forEach(item => {
    item.addEventListener("dragstart", e => {
      e.dataTransfer.setData("type", item.dataset.type);
      e.dataTransfer.setData("content", item.textContent);
      e.dataTransfer.effectAllowed = "move";

      soundDrag.currentTime = 0;
      soundDrag.play().catch(() => {});
    });
  });

  dropZones.forEach(zone => {
    zone.addEventListener("dragover", e => {
      e.preventDefault();
      zone.classList.add("drag-over");
    });

    zone.addEventListener("dragleave", () => {
      zone.classList.remove("drag-over");
    });

    zone.addEventListener("drop", e => {
      e.preventDefault();
      zone.classList.remove("drag-over");

      const type = e.dataTransfer.getData("type");
      const content = e.dataTransfer.getData("content");
      if (!content) return;

      const dragged = Array.from(draggables).find(d => d.textContent === content);
      if (dragged && dragged.parentElement !== zone) {
        zone.appendChild(dragged);

        soundDrop.currentTime = 0;
        soundDrop.play().catch(() => {});
      }

      placedCount++;
      checkBtn.disabled = placedCount < draggables.length;
    });
  });

  // ============================================
  // CEK JAWABAN
  // ============================================
  checkBtn.addEventListener("click", () => {
    let correct = 0;
    const feedbacks = [];

    draggables.forEach(drag => {
      const parent = drag.parentElement.id;
      const expected = drag.dataset.type;
      const isCorrect =
        (expected === "biotik" && parent === "bioticZone") ||
        (expected === "abiotik" && parent === "abioticZone");

      if (isCorrect) {
        correct++;
        feedbacks.push(`
          <div class="feedback-card correct">
            ✅ ${drag.textContent} ditempatkan dengan benar.
          </div>
        `);
      } else {
        feedbacks.push(`
          <div class="feedback-card wrong">
            ❌ ${drag.textContent} salah tempat.<br>
            💡 ${expected === "biotik"
              ? "Seharusnya di area Biotik karena termasuk makhluk hidup."
              : "Seharusnya di area Abiotik karena bukan makhluk hidup."}
          </div>
        `);
      }
    });

    const score = Math.round((correct / draggables.length) * 100);
    scoreText.textContent = `Skor kamu: ${score}% (${correct} benar dari ${draggables.length})`;
    feedbackContainer.innerHTML = feedbacks.join("");

    // play sound result
    if (correct >= 8) {
      soundCorrect.currentTime = 0;
      soundCorrect.play().catch(() => {});
    } else {
      soundWrong.currentTime = 0;
      soundWrong.play().catch(() => {});
    }

    // update sidebar progress: misalnya naik ke 75% jika lulus/cek
    if (window.__setKuis2Progress) {
      // naikan ke 75 (atau pertahankan lebih tinggi jika sudah ada nilai lebih besar)
      const current = Number(sessionStorage.getItem('progress_global') || 0);
      const target = Math.max(current, 75);
      window.__setKuis2Progress(target);
    }

    feedbackContainer.innerHTML = feedbacks.join("");

    // update sidebar progress: misalnya naik ke 75% jika lulus/cek
    if (window.__setKuis2Progress) {
      const current = Number(sessionStorage.getItem('progress_global') || 0);
      const target = Math.max(current, 75);
      window.__setKuis2Progress(target);
    }

    // ---- tampilkan poin visual (1 benar = 1 poin) ----
    (function showPointsVisual(correctCount, total) {
      try {
        correctCount = Number(correctCount) || 0;
        total = Number(total) || draggables.length || 10;
        const points = Math.max(0, Math.min(total, Math.round(correctCount)));

        // cari elemen modal/popup hasil
        const resultModal = document.getElementById("popupResult")
                          || document.querySelector(".popup-card")
                          || document.querySelector(".popup-selesai");

        const pointsId = 'quiz-result-points';

        if (resultModal) {
          let el = resultModal.querySelector('#' + pointsId);
          if (!el) {
            el = document.createElement('div');
            el.id = pointsId;
            el.className = 'quiz-points-display';
            // coba insert sebelum area tombol (popup-actions)
            const actions = resultModal.querySelector('.popup-actions, .mq-actions, .popup-actions');
            if (actions && actions.parentNode) actions.parentNode.insertBefore(el, actions);
            else resultModal.appendChild(el);
          }
          el.textContent = `🎯 Poin yang didapat: ${points}`;
          el.style.display = 'block';
        } else {
          console.info('[quiz-points] poin:', points);
        }
      } catch (err) {
        console.error('[quiz-points] error', err);
      }
    })(correct, draggables.length);
    // ---- end tampilkan poin ----

    popup.classList.add("show");

  });

  // ============================================
  // ULANGI (asli)
  // ============================================
  retryBtn.addEventListener("click", () => {
    popup.classList.remove("show");
    dropZones.forEach(zone => (zone.innerHTML = `<h3>${zone.querySelector("h3").textContent}</h3>`));

    const dragArea = document.getElementById("dragArea");
    draggables.forEach(drag => dragArea.appendChild(drag));

    placedCount = 0;
    checkBtn.disabled = true;
  });

  // ============================================
  // LANJUT KE REFLEKSI
  // ============================================
  nextPage.addEventListener("click", () => {
    window.location.href = "refleksi_materi1.html";
  });
});

// letakkan di akhir file js/aktivitas_merged.js atau di <script> setelah DOM siap
(function forwardSidebarWheelToWindow(){
  const sidebar = document.querySelector('.sidebar');
  if (!sidebar) return;

  // Bila user menggulir pada sidebar, kita cegah scroll default pada sidebar
  // lalu teruskan guliran ke window sehingga halaman utama yang bergulir.
  sidebar.addEventListener('wheel', function(e) {
    // hanya proses vertikal
    if (Math.abs(e.deltaY) > Math.abs(e.deltaX)) {
      // gulirkan window sebesar deltaY
      window.scrollBy({ top: e.deltaY, left: 0, behavior: 'auto' });
      e.preventDefault(); // cegah sidebar melakukan scroll sendiri
    }
  }, { passive: false });
  
  // juga tangani sentuhan pada perangkat mobile
  let touchStartY = null;
  sidebar.addEventListener('touchstart', (e) => {
    if (e.touches && e.touches.length) touchStartY = e.touches[0].clientY;
  }, { passive: true });

  sidebar.addEventListener('touchmove', (e) => {
    if (!touchStartY) return;
    const touchY = e.touches[0].clientY;
    const delta = touchStartY - touchY;
    window.scrollBy({ top: delta, left: 0, behavior: 'auto' });
    touchStartY = touchY;
    e.preventDefault();
  }, { passive: false });

})();

// Accessibility & keyboard shortcuts for Kuis 2 popup
(function popupActionsAccessibility(){
  const popup = document.getElementById('popupResult');
  const retryBtn = document.getElementById('retryBtn');
  const nextPage = document.getElementById('nextPage');

  if (!popup || !retryBtn || !nextPage) return;

  // focus ke tombol Lanjut saat popup muncul
  const observer = new MutationObserver(() => {
    if (popup.classList.contains('show')) {
      // beri sedikit delay supaya visual ready sebelum focus
      setTimeout(() => nextPage.focus(), 80);
    }
  });
  observer.observe(popup, { attributes: true, attributeFilter: ['class'] });

  // keyboard handling saat popup terbuka
  document.addEventListener('keydown', (e) => {
    if (!popup.classList.contains('show')) return;
    if (e.key === 'Escape') {
      // jika ada fungsi tutup, panggil; mis. popup.classList.remove('show')
      popup.classList.remove('show');
    } else if (e.key === 'Enter') {
      // trigger tombol lanjut
      nextPage.click();
    }
  });

  // micro animation saat klik
  [retryBtn, nextPage].forEach(btn => {
    btn.addEventListener('click', () => {
      btn.style.transform = 'scale(0.98)';
      setTimeout(() => btn.style.transform = '', 120);
    });
  });
})();
