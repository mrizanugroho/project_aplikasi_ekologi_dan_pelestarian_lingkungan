// remedial.js — simple testing logic (static questions)
// tujuan: tampilkan topik yang perlu diperbaiki & popup ringkas

document.addEventListener('DOMContentLoaded', () => {
  const runBtn = document.getElementById('runTestBtn');
  const submitBtn = document.getElementById('submitRemedial');
  const overlay = document.getElementById('remedialOverlay');
  const summary = document.getElementById('remedialSummary');

  // definisi jawaban benar (hardcoded untuk testing)
  const correctAnswers = {
    r1: 'C', // Rumput
    r2: 'A', // Cahaya, air, CO2
    // esai: no auto-check - but we'll detect empty vs non-empty
  };

  // mapping topik berdasarkan soal (untuk rekomendasi)
  const topicMap = {
    r1: 'Komponen Biotik',
    r2: 'Fotosintesis',
    e1: 'Peran Cahaya pada Tumbuhan'
  };

  function gatherAnswers() {
    const form = document.getElementById('remedialForm');
    const data = {};
    const radios = form.querySelectorAll('input[type="radio"]');
    radios.forEach(r => {
      if (r.checked) data[r.name] = r.value;
    });
    const essays = form.querySelectorAll('textarea');
    essays.forEach(t => data[t.name] = t.value.trim());
    return data;
  }

  function evaluateAnswers(ans) {
    const wrongTopics = [];
    // PG check
    for (let key of Object.keys(correctAnswers)) {
      if (!ans[key] || ans[key] !== correctAnswers[key]) {
        wrongTopics.push(topicMap[key] || key);
      }
    }
    // Esai check: if empty -> recommend topic; otherwise mark as "tulis ulang" optional
    if (!ans.e1 || ans.e1.length < 10) { // threshold simpel
      wrongTopics.push(topicMap['e1']);
    }
    return wrongTopics;
  }

  function renderRemedialList(topics) {
    const container = document.getElementById('remedial-items');
    container.innerHTML = '';
    if (!topics || topics.length === 0) {
      container.innerHTML = '<p style="color:#0a6a50">Bagus! Tidak ada topik khusus yang disarankan. Kamu siap lanjut.</p>';
      return;
    }
    const ul = document.createElement('ul');
    ul.style.listStyle = 'disc';
    ul.style.paddingLeft = '20px';
    topics.forEach(t => {
      const li = document.createElement('li');
      li.style.margin = '6px 0';
      li.textContent = t;
      ul.appendChild(li);
    });
    container.appendChild(ul);
  }

  // jalankan tes contoh: compute rekomendasi tanpa submit final
  runBtn.addEventListener('click', () => {
    const answers = gatherAnswers();
    const wrong = evaluateAnswers(answers);
    renderRemedialList(wrong);
    alert('Tes contoh selesai. Lihat daftar topik yang direkomendasikan di kotak atas.');
  });

  // submit remedial -> tampilkan popup ringkas
  submitBtn.addEventListener('click', () => {
    const answers = gatherAnswers();
    const wrong = evaluateAnswers(answers);

    if (wrong.length === 0) {
      summary.innerHTML = `<p>✅ Kamu telah menyelesaikan remedial ini. Topikmu terlihat baik.</p>`;
    } else {
      summary.innerHTML = `<p>🔎 Topik yang perlu kamu perbaiki:</p><ul style="text-align:left;margin-left:18px">${wrong.map(t => `<li>${t}</li>`).join('')}</ul>`;
    }

    overlay.classList.remove('hidden');
  });

  // popup buttons
  document.getElementById('backToMaterial').addEventListener('click', () => {
    window.location.href = 'halaman_materi1.html';
  });
  document.getElementById('retryRemedial').addEventListener('click', () => {
    overlay.classList.add('hidden');
    // clear form minimally
    const form = document.getElementById('remedialForm');
    form.querySelectorAll('input[type="radio"]').forEach(i => i.checked = false);
    form.querySelectorAll('textarea').forEach(t => t.value = '');
    document.getElementById('remedial-items').innerHTML = '<p style="color:#0a6a50">(Tidak ada rekomendasi)</p>';
  });
  document.getElementById('goToPractice').addEventListener('click', () => {
    overlay.classList.add('hidden');
    // contoh: arahkan ke halaman materi atau simulasi
    window.location.href = 'halaman_simulasi_hutan.html';
  });

  // close popup if click outside card
  overlay.addEventListener('click', (ev) => {
    if (ev.target === overlay) overlay.classList.add('hidden');
  });

  // init: show placeholder
  renderRemedialList([]);
});
