document.addEventListener("DOMContentLoaded", () => {

  /* =====================================================
     1. HELPER
  ===================================================== */
  const $ = (id) => document.getElementById(id);

  /* =====================================================
     2. ELEMEN INPUT
  ===================================================== */
  const titleInput   = $("infoTitle");
  const contentInput = $("infoContent");
  const imageInput   = $("infoImage");

  /* =====================================================
     3. PREVIEW ELEMEN
  ===================================================== */
  const previewTitle = $("previewTitle");
  const previewText  = $("previewText");
  const previewImg   = $("previewImg");

  /* =====================================================
     4. SUBMIT & POPUP
  ===================================================== */
  const submitBtn = $("submitInfografis");
  const popup     = $("infografis-popup");
  const goEvalBtn = $("goEvaluasi");

  /* =====================================================
     5. LIVE PREVIEW (REAL-TIME)
  ===================================================== */

  // Judul
  if (titleInput) {
    titleInput.addEventListener("input", () => {
      previewTitle.textContent =
        titleInput.value.trim() || "Judul Infografis";
    });
  }

  // Isi
  if (contentInput) {
    contentInput.addEventListener("input", () => {
      previewText.textContent =
        contentInput.value.trim() || "Isi infografis akan muncul di sini.";
    });
  }

  // Gambar
  if (imageInput) {
    imageInput.addEventListener("change", () => {
      const file = imageInput.files[0];
      if (!file) return;

      const reader = new FileReader();
      reader.onload = (e) => {
        previewImg.src = e.target.result;
        previewImg.style.display = "block";
      };
      reader.readAsDataURL(file);
    });
  }

  /* =====================================================
     6. SUBMIT INFOGRAFIS
  ===================================================== */
  if (submitBtn) {
    submitBtn.addEventListener("click", () => {

      const titleVal   = titleInput.value.trim();
      const contentVal = contentInput.value.trim();

      // Validasi ringan (SMP-friendly)
      if (!titleVal || !contentVal) {
        alert("Judul dan isi infografis harus diisi ya 😊");
        return;
      }

      // Simpan hasil infografis (opsional, untuk demo)
      sessionStorage.setItem("infografis_title", titleVal);
      sessionStorage.setItem("infografis_content", contentVal);

      // Update progress (tahap infografis)
      sessionStorage.setItem("progress_global", 90);

      // Tampilkan popup
      popup.classList.remove("hidden");
    });
  }

  /* =====================================================
     7. LANJUT KE EVALUASI
  ===================================================== */
  if (goEvalBtn) {
    goEvalBtn.addEventListener("click", () => {
      window.location.href = "halaman_evaluasi.html";
    });
  }

});
