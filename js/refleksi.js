document.addEventListener("DOMContentLoaded", () => {

  // ===== SIDEBAR PROGRESS (TETAP) =====
  (function refleksiProgress() {
    function setSidebarProgress(val) {
      sessionStorage.setItem('progress_global', val);
      const fill = document.getElementById('progress-fill');
      const percent = document.getElementById('progress-percent');
      if (fill) fill.style.width = val + '%';
      if (percent) percent.textContent = val + '%';
    }
    const cur = Number(sessionStorage.getItem('progress_global') || 0);
    setSidebarProgress(Math.max(cur, 75));
  })();

  // ===== ELEMEN =====
  const refleksiInput = document.getElementById("refleksiInput");
  const submitBtn = document.getElementById("submitRefleksi");
  const popup = document.getElementById("popupResult");
  const popupFeedback = document.getElementById("popupFeedback");

  const ratingItems = document.querySelectorAll(".rating-item");
  const ratingValue = document.getElementById("ratingValue");

  let selectedRating = null;

  // ===== HITUNG KATA =====
  function hitungKata(teks) {
    return teks.trim().split(/\s+/).filter(k => k.length > 0).length;
  }

  // ===== PILIH ANGKA RATING =====
  ratingItems.forEach(item => {
    item.addEventListener("click", () => {
      ratingItems.forEach(i => i.classList.remove("active"));
      item.classList.add("active");

      selectedRating = item.dataset.value;
      ratingValue.textContent = selectedRating;
    });
  });

  // ===== SUBMIT REFLEKSI =====
  submitBtn.addEventListener("click", () => {
    const teks = refleksiInput.value.trim();
    const jumlahKata = hitungKata(teks);

    if (!selectedRating) {
      alert("Silakan pilih tingkat pemahaman terlebih dahulu 😊");
      return;
    }

    if (jumlahKata < 20) {
      alert("Refleksi minimal 20 kata ya 😊");
      return;
    }

    popupFeedback.innerHTML = `
      <strong>Skor Pemahaman:</strong> ${selectedRating} / 10<br><br>
      <strong>Refleksi Kamu:</strong><br>${teks}
    `;

    popup.classList.add("show");

    // Progress jadi 100%
    sessionStorage.setItem('progress_global', 100);
    document.getElementById('progress-fill').style.width = '100%';
    document.getElementById('progress-percent').textContent = '100%';
  });

  // ===== TOMBOL POPUP =====
  document.getElementById("backToQuiz2")?.addEventListener("click", () => {
    window.location.href = "halaman_kuis2.html";
  });

  document.getElementById("goToEvaluasi")?.addEventListener("click", () => {
    window.location.href = "halaman_evaluasi.html";
  });

});
