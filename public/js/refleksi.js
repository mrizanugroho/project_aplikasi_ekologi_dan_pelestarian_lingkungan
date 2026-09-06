document.addEventListener("DOMContentLoaded", () => {

  // ===== SIDEBAR PROGRESS (BAWAAN UI LU) =====
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

  // ===== AMBIL ELEMEN DARI HTML =====
  const refleksiInput = document.getElementById("jawaban_esai"); 
  const submitBtn = document.getElementById("btnSubmitRefleksi");
  const popup = document.getElementById("popupResult");
  const popupFeedback = document.getElementById("popupFeedback");
  const ratingItems = document.querySelectorAll(".rating-item");
  const ratingValue = document.getElementById("ratingValue");

  let selectedRating = null;

  // ===== LOGIKA HITUNG KATA & BUKA KUNCI TOMBOL =====
  function hitungKata(teks) {
    return teks.trim().split(/\s+/).filter(k => k.length > 0).length;
  }

  function checkReady() {
    if (refleksiInput && hitungKata(refleksiInput.value) >= 5 && selectedRating) {
      submitBtn.disabled = false;
    } else {
      if(submitBtn) submitBtn.disabled = true;
    }
  }

  // Deteksi tiap kali siswa ngetik
  if (refleksiInput) {
      refleksiInput.addEventListener("input", checkReady);
  }

  // ===== LOGIKA PILIH ANGKA RATING (1-10) =====
  ratingItems.forEach(item => {
    item.addEventListener("click", () => {
      ratingItems.forEach(i => i.classList.remove("selected"));
      item.classList.add("selected");
      selectedRating = item.getAttribute("data-value");
      if (ratingValue) ratingValue.textContent = selectedRating;
      checkReady(); // Cek lagi apakah tombol udah bisa dibuka
    });
  });

  // ===== PROSES KIRIM KE DATABASE (FETCH) =====
  if (submitBtn) {
      submitBtn.addEventListener('click', function(e) {
          e.preventDefault(); 

          // 1. BACA KTP HALAMAN (META TAGS)
          const submateriAktif = document.querySelector('meta[name="submateri-id"]').getAttribute('content');
          const baseUrl = document.querySelector('meta[name="base-url"]').getAttribute('content');
          const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

          // 2. AMBIL JAWABAN SISWA
          const jawabanEsai = refleksiInput.value;
          const skalaPemahaman = selectedRating;

          // Ubah tombol jadi mode loading
          const originalText = submitBtn.innerHTML;
          submitBtn.innerHTML = "Menyimpan...";
          submitBtn.disabled = true;

          // 3. KIRIM KE CONTROLLER LARAVEL
          fetch(baseUrl + '/simpan-refleksi', {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/json',
                  'X-CSRF-TOKEN': csrfToken
              },
              body: JSON.stringify({
                  submateri: submateriAktif,
                  jawaban_esai: jawabanEsai,
                  skala_pemahaman: parseInt(skalaPemahaman) 
              })
          })
          .then(response => response.json())
          .then(data => {
              if (data.status === 'success') {
                  // Berhasil masuk database! Munculin popup
                  if (popupFeedback) popupFeedback.textContent = "Terima kasih! Jawaban refleksimu berhasil disimpan di sistem.";
                  if (popup) {
                  popup.style.display = 'flex';
                  popup.style.pointerEvents = 'auto';
                  }  
              } else {
                  alert("Gagal menyimpan: " + data.message);
                  submitBtn.innerHTML = originalText;
                  submitBtn.disabled = false;
              }
          })
          .catch(error => {
              console.error("Error Fetch:", error);
              alert("Terjadi kesalahan saat menghubungi server.");
              submitBtn.innerHTML = originalText;
              submitBtn.disabled = false;
          });
      });
  }

  // Catatan: Logika JS buat mindahin halaman dihapus! 
  // Biarkan HTML (tag <a>) yang mindahin halamannya secara otomatis ke Menu Materi.
});