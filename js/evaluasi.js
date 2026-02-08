/* ====== EVALUASI – INTERAKSI ====== */

// ----- kumpulkan jawaban (sementara alert ringkas) -----
// ====== EVALUASI – INTERAKSI ======

/* ===== Eval / Remedial: settings (paste near top of evaluasi.js) ===== */
const GAMIFY_THRESHOLD_PG_PASS = 80;   // % minimal PG untuk dianggap pass pada PG
const REMEDIAL_THRESHOLD_PG = 70;      // % di bawah ini direkomendasikan remedial
const EVAL_SESSION_KEY = 'eval_result_v1'; // sessionStorage key
/* ===================================================================== */


// Ambil elemen popup
// ====== EVALUASI – POPUP HANDLING ======

// Elemen popup
const popupOverlay = document.getElementById('popupOverlay');
const popupMessage = document.getElementById('popupMessage');
const popupTitle = document.getElementById('popupTitle');
const backToMateri = document.getElementById('backToMateri');
const nextMateri = document.getElementById('nextMateri');

// Tombol "Tutup" khusus (buat kondisi belum selesai)
let closeButton;

// --- di evaluasi.js (di dalam handler submitBtn) ---
// --- di evaluasi.js (di dalam handler submitBtn) ---
document.getElementById('submitBtn').addEventListener('click', () => {
  const form = document.getElementById('evaluasiForm');
  const radioGroups = [...new Set([...form.querySelectorAll('input[type="radio"]')].map(i => i.name))];
  const essayInputs = form.querySelectorAll('textarea');

  const allAnswered =
    radioGroups.every(name => form.querySelector(`input[name="${name}"]:checked`)) &&
    [...essayInputs].every(txt => txt.value.trim() !== '');

  if (!allAnswered) {
    // kalau belum lengkap — tampilan peringatan lama
    popupTitle.textContent = "⚠️ Belum Selesai";
    popupMessage.textContent = "Kamu belum menyelesaikan semua soal. Coba cek lagi deh 😅";
    document.querySelector('.popup-buttons').innerHTML = '';
    const closeButton = document.createElement('button');
    closeButton.textContent = "Tutup";
    closeButton.className = "btn primary";
    closeButton.addEventListener('click', () => {
      popupOverlay.classList.add('hidden');
    });
    document.querySelector('.popup-buttons').appendChild(closeButton);
    popupOverlay.classList.remove('hidden');
    return;
  }

  // semua soal terjawab → ambil data PG + esai
  const essayAnswers = Array.from(essayInputs).map((el,i) => ({ id: el.dataset.id || (i+1), answer: el.value.trim() }));

  // hitung nilai PG (replace logic sesuai grading sebenar; contoh sederhana:)
  const pgTotal = radioGroups.length || 0;
  let pgCorrect = 0;
  radioGroups.forEach(name => {
    const selected = form.querySelector(`input[name="${name}"]:checked`);
    if (selected && selected.dataset && selected.dataset.correct === "1") pgCorrect++;
  });

  // simpan hasil sementara ke sessionStorage & tampilkan ringkasan (saveEvalResult juga panggil showEvalModal)
  saveEvalResult(pgCorrect, pgTotal, essayAnswers);

  // tampilkan modal "jawaban terkumpul — tunggu penilaian guru"
  const pendingOverlay = document.getElementById('eval-pending-overlay');
  if (pendingOverlay) pendingOverlay.classList.remove('hidden');

  // wire tombol modal pending
  const btnClose = document.getElementById('eval-pending-close');
  const btnBack = document.getElementById('eval-pending-back-materi');

  if (btnClose) btnClose.onclick = () => { pendingOverlay.classList.add('hidden'); };
  if (btnBack) btnBack.onclick = () => { window.location.href = 'halaman_materi1.html'; };

  // optional: show small toast
  if (typeof showToast === 'function') showToast('Jawaban terkumpul. Menunggu penilaian guru.');
});


// Tutup popup jika klik luar area card
popupOverlay.addEventListener('click', e => {
  if (e.target === popupOverlay) popupOverlay.classList.add('hidden');
});

// ===== FIX INTERAKSI SIDEBAR (AGAR TOMBOL KEMBALI BISA DIKLIK) =====
window.addEventListener('load', () => {
  const sidebar = document.querySelector('.sidebar');
  if (sidebar) {
    sidebar.style.pointerEvents = 'auto';
  }

  // pastikan popup tidak menutup sidebar
  const popup = document.getElementById('popupOverlay');
  if (popup) {
    popup.addEventListener('mouseenter', () => {
      popup.style.pointerEvents = 'auto';
    });
    popup.addEventListener('mouseleave', () => {
      popup.style.pointerEvents = 'none';
    });
  }
});

/* ===== eval -> sessionStorage + modal hasil (paste here, before progress sync block) ===== */

function saveEvalResult(pgCorrect, pgTotal, essayAnswersArray) {
  const percent = Math.round((pgTotal>0 ? (pgCorrect / pgTotal) * 100 : 0));
  // rekomendasi topik sederhana berdasarkan nilai
  const recommended_topics = [];
  if (percent < REMEDIAL_THRESHOLD_PG) {
    recommended_topics.push('Komponen ekosistem', 'Rantai makanan', 'Interaksi makhluk hidup');
  } else if (percent < GAMIFY_THRESHOLD_PG_PASS) {
    recommended_topics.push('Rantai makanan');
  }

  const result = {
    time: new Date().toISOString(),
    pgCorrect: pgCorrect,
    pgTotal: pgTotal,
    pgPercent: percent,
    essayAnswers: essayAnswersArray || [],
    essayEvaluated: false,
    needs_remedial: (percent < REMEDIAL_THRESHOLD_PG),
    recommended_topics
  };

  try {
    sessionStorage.setItem(EVAL_SESSION_KEY, JSON.stringify(result));
  } catch (e) {
    console.warn('sessionStorage set failed', e);
  }

  showEvalModal(result);
}

// tampilkan modal ringkasan hasil (modal sederhana)
function showEvalModal(result) {
  const overlay = document.getElementById('eval-result-overlay');
  const title = document.getElementById('eval-result-title');
  const body = document.getElementById('eval-result-body');
  const pointsLine = document.getElementById('eval-result-points');

  if (!overlay || !title || !body) {
    // fallback non-blocking: tulis ke console saja agar tidak muncul alert() bawaan.
    console.log(`Hasil sementara: ${result.pgPercent}% (${result.pgCorrect}/${result.pgTotal})`);
    return;
  }


  title.textContent = `Skor sementara: ${result.pgPercent}% (${result.pgCorrect} / ${result.pgTotal})`;

  let html = '';
  if (result.needs_remedial) {
    html += `<p style="margin:0 0 .5rem;">Menurut sistem, kamu memerlukan <strong>remedial</strong> untuk topik berikut:</p>`;
    html += `<ul style="margin:0 0 .8rem;">${result.recommended_topics.map(t=>`<li>${t}</li>`).join('')}</ul>`;
    html += `<p style="margin:.2rem 0 0;color:#555">Kamu bisa langsung menuju halaman remedial untuk latihan singkat.</p>`;
    if (pointsLine) {
      pointsLine.style.display = 'block';
      pointsLine.textContent = `⚠️ Rekomendasi: lakukan remedial (PG ${result.pgPercent}%)`;
    }
    body.innerHTML = html + `<div style="margin-top:8px"><button id="btn-go-remed" class="eval-btn primary">Lanjut ke Remedial</button></div>`;
  } else {
    html += `<p style="margin:0 0 .5rem;">PG kamu: <strong>${result.pgPercent}%</strong>. Esai menunggu penilaian guru.</p>`;
    if (pointsLine) pointsLine.style.display = 'none';
    body.innerHTML = html;
  }

  overlay.classList.remove('hidden');

  const btnRem = document.getElementById('btn-go-remed');
  if (btnRem) {
    btnRem.addEventListener('click', () => {
      overlay.classList.add('hidden');
      window.location.href = 'halaman_remedial.html';
    });
  }
}

// close handler for modal (tutup tombol)
document.addEventListener('click', (e) => {
  if (e.target && e.target.id === 'eval-result-close') {
    const ov = document.getElementById('eval-result-overlay');
    if (ov) ov.classList.add('hidden');
  }
});

/* ===== end eval/session modal ===== */


/* ===== progress sync (paste at end of evaluasi.js) ===== */
(function () {
  function setProgress(val) {
    sessionStorage.setItem('progress_global', val);
    const fill = document.getElementById('progress-fill');
    const percent = document.getElementById('progress-percent');
    if (fill) fill.style.width = val + '%';
    if (percent) percent.textContent = val + '%';
  }
  function loadProgress() {
    const cur = Number(sessionStorage.getItem('progress_global') || 0);
    const show = Math.max(cur, 75); // evaluasi minimal tunjukkan 75%
    setProgress(show);
  }
  window.__setEvalProgress = setProgress;
  loadProgress();
})();

/* ===== countdown (paste at end of evaluasi.js, after progress block) ===== */
(function(){
  const DURATION_SECONDS = 30 * 60; // default 30 menit
  const TIMER_KEY = 'evaluasi_timer_end';
  let end = Number(sessionStorage.getItem(TIMER_KEY) || 0);
  const now = Date.now();

  if (!end || end <= now) {
    end = now + DURATION_SECONDS * 1000;
    sessionStorage.setItem(TIMER_KEY, end);
  }

  function formatTime(secs){
    const m = String(Math.floor(secs / 60)).padStart(2, '0');
    const s = String(secs % 60).padStart(2, '0');
    return `${m}:${s}`;
  }

  const el = document.getElementById('countdown-timer');

  function tick() {
    const rem = Math.max(0, Math.floor((end - Date.now()) / 1000));

    if (el) el.textContent = formatTime(rem);

    if (rem <= 0) {
      clearInterval(iid);
      sessionStorage.removeItem(TIMER_KEY);

      // tampilkan modal jika ada data tersimpan
      try {
        const saved = JSON.parse(sessionStorage.getItem(EVAL_SESSION_KEY));
        if (saved && typeof showEvalModal === 'function') showEvalModal(saved);
      } catch (e) {}

      const btn = document.getElementById('submitBtn');
      if (btn) btn.click();
    }
  }

  tick();
  const iid = setInterval(tick, 1000);
})();


/* ===== countdown (paste at end of evaluasi.js, after progress block) ===== */
(function(){
  const DURATION_SECONDS = 30 * 60; // default 30 menit; ubah bila perlu
  const TIMER_KEY = 'evaluasi_timer_end';
  let end = Number(sessionStorage.getItem(TIMER_KEY) || 0);
  const now = Date.now();
  if (!end || end <= now) {
    end = now + DURATION_SECONDS*1000;
    sessionStorage.setItem(TIMER_KEY, end);
  }
  function formatTime(secs){ const m=String(Math.floor(secs/60)).padStart(2,'0'); const s=String(secs%60).padStart(2,'0'); return `${m}:${s}`; }
  const el = document.getElementById('countdown-timer');
  const submitBtn = () => document.getElementById('submitBtn');
  function tick() {
    const rem = Math.max(0, Math.floor((end - Date.now()) / 1000));
    if (rem <= 0) {
      clearInterval(iid);
      sessionStorage.removeItem(TIMER_KEY);

      // non-blocking: tampilkan modal ringkasan hasil (jika ada hasil tersimpan)
      // atau paling tidak tulis ke console. Lalu submit jawaban.
      try {
        const saved = JSON.parse(sessionStorage.getItem(EVAL_SESSION_KEY));
        if (saved && typeof showEvalModal === 'function') {
          // tampilkan modal kustom dengan ringkasan (jika sudah terisi)
          showEvalModal(saved);
        } else {
          console.log("Waktu habis! Jawaban akan dikumpulkan otomatis.");
        }
      } catch (e) {
        console.log("Waktu habis! Jawaban akan dikumpulkan otomatis.");
      }

      const btn = submitBtn();
      if (btn) btn.click();
    }
  }
  tick();
  const iid = setInterval(tick, 1000);
  window.__evaluasi_cancelTimer = () => { clearInterval(iid); sessionStorage.removeItem(TIMER_KEY); };
})();

// ========== BADGE MODAL HANDLER (updated) ==========

// helper: tampilkan / sembunyikan badge modal
function showBadgeModal() {
  const overlay = document.getElementById('badge-overlay');
  if (overlay) overlay.classList.remove('hidden');
}
function hideBadgeModal() {
  const overlay = document.getElementById('badge-overlay');
  if (overlay) overlay.classList.add('hidden');
}

// pasang badge kecil ke sidebar (jika belum ada)
function injectSidebarBadge() {
  try {
    const sidebar = document.querySelector('.sidebar');
    if (!sidebar) return;
    if (sidebar.querySelector('.sidebar-badge')) return; // sudah ada
    const b = document.createElement('div');
    b.className = 'sidebar-badge';
    b.innerHTML = `<div class="ico"><img src="img/badge.png" alt="badge" style="width:28px;height:28px;object-fit:contain"></div><div class="txt">Badge: Eco Learner</div>`;
    // letakkan sebelum progress box bila ada, atau di akhir sidebar
    const before = sidebar.querySelector('.sidebar-progress-box') || sidebar.querySelector('.nav-menu');
    if (before && before.parentNode) before.parentNode.insertBefore(b, before.nextSibling);
    else sidebar.appendChild(b);
  } catch (e) { console.warn(e); }
}

// --- prepare essayAnswers array (ambil dari textarea jika ada) ---
// --- PREP: ambil essay answers (sama seperti sebelumnya) ---
const essayInputs = form.querySelectorAll('textarea');
const essayAnswers = Array.from(essayInputs).map((el, i) => ({
  id: el.dataset.id || i + 1,
  answer: el.value.trim()
}));

// ---- perhitungan sementara PG (fallback) ----
const totalPg = radioGroups.length || 0;
// jika grading otomatis tersedia, ganti pgCorrect sesuai hasil grading
let pgCorrect = 0; // default 0 — ganti nanti jika ada mekanisme grading otomatis

// Simpan hasil ke sessionStorage (saveEvalResult juga memanggil showEvalModal)
saveEvalResult(pgCorrect, totalPg, essayAnswers);

// Jangan award badge otomatis di sini.
// Sebagai gantinya:
//  - bila siswa perlu remedial -> showEvalModal sudah menampilkan rekomendasi dan tombol Remedial.
//  - bila PG pass tapi masih ada esai -> tetap tunggu penilaian guru.
// Kita set flag di sessionStorage agar backend/guru/UX tahu statusnya (essayEvaluated: false sudah diset di saveEvalResult).

// OPTIONAL: tampilkan notifikasi ringan (toast) bahwa jawaban terkumpul
try {
  if (typeof showToast === 'function') {
    showToast('Jawaban terkumpul. Tunggu penilaian guru untuk badge evaluasi.');
  } else {
    console.log('Jawaban terkumpul. Menunggu penilaian guru.');
  }
} catch (e) { console.warn(e); }


// wire modal buttons (IDs match HTML: badge-close, badge-view)
document.addEventListener('DOMContentLoaded', () => {
  renderBadgeSidebarOnLoad();

  const btnClose = document.getElementById('badge-close');
  const btnView  = document.getElementById('badge-view');
  if (btnClose) btnClose.addEventListener('click', hideBadgeModal);
  if (btnView)  btnView.addEventListener('click', () => { hideBadgeModal(); window.scrollTo({top:0, behavior:'smooth'}); });
});
