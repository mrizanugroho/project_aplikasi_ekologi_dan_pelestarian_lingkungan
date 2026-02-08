document.addEventListener("DOMContentLoaded", () => {
  const icons = document.querySelectorAll(".icon");
  const forestStatus = document.getElementById("forestStatus");
  const resetBtn = document.getElementById("btnResetForest");
  const quizBtn = document.getElementById("btnQuiz");

    /********** Progress sync (sessionStorage) **********/
  function setSidebarProgressSim(val) {
    sessionStorage.setItem('progress_global', val);
    const fill = document.getElementById('progress-fill');
    const percent = document.getElementById('progress-percent');
    if (fill) fill.style.width = val + '%';
    if (percent) percent.textContent = val + '%';
  }

  function loadSidebarProgressSim() {
    const current = Number(sessionStorage.getItem('progress_global') || 0);
    // If entering simulation and current < 20 => set to 20
    if (current < 20) {
      setSidebarProgressSim(20);
    } else {
      setSidebarProgressSim(current);
    }
  }

  // call on load
  loadSidebarProgressSim();

  /********** Experiment controls wiring **********/
  const expTemp = document.getElementById('exp-temp');
  const expPoll = document.getElementById('exp-poll');
  const tempVal = document.getElementById('temp-value');
  const pollVal = document.getElementById('poll-value');
  const expRun = document.getElementById('exp-run');
  const expComplete = document.getElementById('exp-complete');
  const expFeedback = document.getElementById('exp-feedback');

  // live labels
  if (expTemp) {
    tempVal.textContent = expTemp.value;
    expTemp.addEventListener('input', () => tempVal.textContent = expTemp.value);
  }
  if (expPoll) {
    pollVal.textContent = expPoll.value;
    expPoll.addEventListener('input', () => pollVal.textContent = expPoll.value);
  }

  // run experiment => instant feedback + small animation
  if (expRun) {
    expRun.addEventListener('click', () => {
      const t = Number(expTemp.value);
      const p = Number(expPoll.value);
      // simple rules:
      // if pollution > 70 or (temp > 35 and p>40) -> bad
      if (p > 70 || (t > 35 && p > 40)) {
        expFeedback.textContent = '❌ Kondisi buruk: banyak organisme terkena dampak. Kurangi pencemaran!';
        expFeedback.style.color = '#ef4444';
        // visual status
        forestStatus.textContent = '❌ Ekosistem rusak!';
        forestStatus.style.color = '#ef4444';
      } else if (p >= 40 || t >= 32) {
        expFeedback.textContent = '⚠️ Kondisi rentan: beberapa spesies mungkin terpengaruh.';
        expFeedback.style.color = '#f59e0b';
        forestStatus.textContent = '⚠️ Ekosistem mulai terganggu.';
        forestStatus.style.color = '#f59e0b';
      } else {
        expFeedback.textContent = '🌿 Kondisi aman: ekosistem tampak seimbang.';
        expFeedback.style.color = '#16a34a';
        forestStatus.textContent = '🌿 Ekosistem seimbang.';
        forestStatus.style.color = '#16a34a';
      }
      // optional micro-visual: briefly animate header color
      document.querySelector('.header').style.boxShadow = '0 8px 30px rgba(6,95,70,0.12)';
      setTimeout(()=> document.querySelector('.header').style.boxShadow = '', 800);
    });
  }

  // Complete simulation: set progress to 30% and navigate to kuis
  if (expComplete) {
    expComplete.addEventListener('click', () => {
      // set progress
      setSidebarProgressSim(30);
      // save small flag (optional)
      sessionStorage.setItem('simulasi_done', '1');
      // quick feedback
      alert('Simulasi selesai — Anda akan diarahkan ke kuis.');
      // navigate (or show modal) to kuis
      window.location.href = 'petunjuk_kuis.html';
    });
  }


  // Klik ikon
  icons.forEach(icon => {
    icon.addEventListener("click", () => {
      icon.classList.toggle("active");

      // Animasi daun untuk pohon
      if (icon.dataset.kind === "tree" && icon.classList.contains("active")) {
        const leaf = document.createElement("div");
        leaf.textContent = "🍃";
        leaf.className = "leaf";
        document.body.appendChild(leaf);
        const rect = icon.getBoundingClientRect();
        leaf.style.left = rect.left + rect.width / 2 + "px";
        leaf.style.top = rect.top + "px";
        setTimeout(() => leaf.remove(), 1500);
      }

      updateForest();
    });
  });

  // Reset semua ikon
  resetBtn.addEventListener("click", () => {
    icons.forEach(icon => icon.classList.remove("active"));
    updateForest();
  });

  // Pergi ke kuis
  quizBtn.addEventListener("click", () => {
    window.location.href = "petunjuk_kuis.html";
  });

  // Update status ekosistem
  function updateForest() {
    const activeCount = document.querySelectorAll(".icon.active").length;

    if (activeCount === icons.length) {
      forestStatus.textContent = "🌿 Ekosistem seimbang.";
      forestStatus.style.color = "#16a34a";
    } else if (activeCount >= 3) {
      forestStatus.textContent = "⚠️ Ekosistem mulai terganggu.";
      forestStatus.style.color = "#facc15";
    } else {
      forestStatus.textContent = "❌ Ekosistem rusak!";
      forestStatus.style.color = "#ef4444";
    }
  }
});

/* ===== SIMULATION VISUAL-POINT MODAL (no localStorage write) ===== */
document.addEventListener('DOMContentLoaded', () => {
  // find the existing expComplete button if present (some pages may use different ID)
  const expCompleteBtn = document.getElementById('exp-complete');
  const overlay = document.getElementById('sim-reward-overlay');

  // helper show/hide
  function showSimReward() {
    if (overlay) overlay.classList.remove('hidden');
    // optional: focus first action
    const go = document.getElementById('sim-modal-go-quiz');
    if (go) go.focus();
  }
  function hideSimReward() {
    if (overlay) overlay.classList.add('hidden');
  }

  // attach to modal buttons
  const btnClose = document.getElementById('sim-modal-close');
  const btnGoQuiz = document.getElementById('sim-modal-go-quiz');
  if (btnClose) btnClose.addEventListener('click', hideSimReward);
  if (btnGoQuiz) btnGoQuiz.addEventListener('click', () => {
    // navigate to kuis setelah menutup modal
    hideSimReward();
    window.location.href = 'petunjuk_kuis.html';
  });

  // if there is an expComplete button, override its behavior to show modal first
  if (expCompleteBtn) {
    // remove existing listeners by cloning (simple way)
    const newBtn = expCompleteBtn.cloneNode(true);
    expCompleteBtn.parentNode.replaceChild(newBtn, expCompleteBtn);

    newBtn.addEventListener('click', (e) => {
      e.preventDefault();
      // set sidebar progress to 30% (preserve existing behavior)
      try { sessionStorage.setItem('progress_global', '30'); } catch(e){}
      // set simulasi_done flag if you need (optional)
      try { sessionStorage.setItem('simulasi_done', '1'); } catch(e){}
      // show the visual-only reward modal (10 points portrait only)
      showSimReward();
    });
  }
});

/* ===== SAFETY GUARDS + AUTO-TRIGGER REWARD MODAL =====
   Paste ini di akhir simulasi_hutan.js (append) */
(function(){
  // helper to safely attach listeners only if element exists
  function onIf(sel, event, fn) {
    if (!sel) return;
    const el = (typeof sel === 'string') ? document.getElementById(sel) : sel;
    if (!el) return;
    el.addEventListener(event, fn);
  }

  // show/hide modal helpers (overlay exists in HTML)
  function showSimReward() {
    const overlay = document.getElementById('sim-reward-overlay');
    if (overlay) overlay.classList.remove('hidden');
  }
  function hideSimReward() {
    const overlay = document.getElementById('sim-reward-overlay');
    if (overlay) overlay.classList.add('hidden');
  }

  // attach modal buttons (if present)
  document.addEventListener('DOMContentLoaded', () => {
    onIf('sim-modal-close', 'click', hideSimReward);
    onIf('sim-modal-go-quiz', 'click', function(){
      hideSimReward();
      window.location.href = 'petunjuk_kuis.html';
    });

    // safe attach for old element ids: btnResetForest, btnQuiz, exp-complete
    const resetBtn = document.getElementById('btnResetForest');
    const quizBtn = document.getElementById('btnQuiz');
    const expCompleteBtn = document.getElementById('exp-complete');

    if (resetBtn) {
      resetBtn.addEventListener('click', () => {
        // existing behavior: reset icons (if icons exist)
        document.querySelectorAll('.forest-icons .icon').forEach(i => i.classList.remove('active'));
        if (typeof updateForest === 'function') updateForest();
      });
    }

    if (quizBtn) {
      quizBtn.addEventListener('click', () => {
        window.location.href = 'petunjuk_kuis.html';
      });
    }

    if (expCompleteBtn) {
      // replace behavior safely
      const newBtn = expCompleteBtn.cloneNode(true);
      expCompleteBtn.parentNode.replaceChild(newBtn, expCompleteBtn);
      newBtn.addEventListener('click', (e) => {
        e.preventDefault();
        try { sessionStorage.setItem('progress_global','30'); } catch(e){}
        try { sessionStorage.setItem('simulasi_done','1'); } catch(e){}
        showSimReward();
      });
    }

    // AUTO-TRIGGER: jika user mengaktifkan semua ikon sehingga kondisi seimbang,
    // munculkan modal visual reward (non-persistent).
    // Guard: pastikan modal tidak selalu munculkan (cek session flag)
    const iconList = document.querySelectorAll('.forest-icons .icon');
    if (iconList && iconList.length) {
      iconList.forEach(ic => {
        ic.addEventListener('click', () => {
          // after click, check if all active
          const activeCount = document.querySelectorAll('.forest-icons .icon.active').length;
          const total = iconList.length;
          const alreadyShown = sessionStorage.getItem('sim_reward_shown') === 'true';
          if ((activeCount === total) && !alreadyShown) {
            // mark shown for this session only
            try { sessionStorage.setItem('sim_reward_shown','true'); } catch(e){}
            showSimReward();
          }
        });
      });
    }
  });
})();

/* ===== Hook tombol "Tandai Selesai" ke modal + Lanjut ke Kuis 1 ===== */
(function(){
  function showModal() {
    const overlay = document.getElementById('mq-complete-overlay');
    if (overlay) overlay.classList.remove('hidden');
  }
  function hideModal() {
    const overlay = document.getElementById('mq-complete-overlay');
    if (overlay) overlay.classList.add('hidden');
  }

  document.addEventListener('DOMContentLoaded', () => {
    // attach modal action buttons (safe attach)
    const closeBtn = document.getElementById('mq-close-btn');
    const goKuisBtn = document.getElementById('mq-go-kuis1-btn');
    if (closeBtn) closeBtn.addEventListener('click', hideModal);
    if (goKuisBtn) goKuisBtn.addEventListener('click', () => {
      // close modal then go to Kuis 1
      hideModal();
      window.location.href = 'petunjuk_kuis.html';
    });

    // find "tandai selesai" button(s) by known selectors (tries several)
    const selList = ['.btn-selesai', '.tandai-selesai', '#btn-selesai', '.btn-complete', '#btnMarkComplete'];
    const found = selList.map(s => document.querySelector(s)).find(x => !!x);

    if (!found) {
      // fallback: try any button with text containing 'Tandai' or 'Selesai'
      const btns = Array.from(document.querySelectorAll('button'));
      const fuzzy = btns.find(b => /tandai|selesai|tutup/i.test(b.textContent));
      if (fuzzy) {
        fuzzy.addEventListener('click', (e) => {
          e.preventDefault && e.preventDefault();
          // just show modal visually
          showModal();
        });
      } else {
        console.info('[mq] tombol "Tandai Selesai" tidak ditemukan otomatis. Jika tombol ada, beritahu selector-nya.');
      }
    } else {
      // attach once safely (avoid duplicate listeners)
      found.addEventListener('click', (e) => {
        e.preventDefault && e.preventDefault();
        // keep existing logic (unlock sim etc.) if function exists
        try { if (typeof unlockSimulasi === 'function') unlockSimulasi(); } catch(e){}
        try { if (typeof refreshGamifyUI === 'function') refreshGamifyUI(); } catch(e){}
        // show the visual-only modal with +10 text
        showModal();
      });
    }
  });
})();
