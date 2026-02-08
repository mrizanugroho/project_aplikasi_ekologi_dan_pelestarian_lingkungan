// === POPUP HANDLER ===
function openPopup(type) {
  const popup = document.getElementById("popup");
  const title = document.getElementById("popup-title");
  const text = document.getElementById("popup-text");

  popup.classList.add("show");

  if (type === "kompetensi") {
    title.innerText = "🎯 Kompetensi Dasar";
    text.innerHTML = `
      <strong>3.8</strong> Menganalisis komponen ekosistem dan interaksi antar komponen tersebut.<br><br>
      <strong>4.8</strong> Menyajikan hasil pengamatan tentang ekosistem dan upaya menjaga keseimbangannya.
    `;
  } else if (type === "info") {
    title.innerText = "ℹ️ Panduan Penggunaan";
    text.innerHTML = `
      Gunakan tombol <strong>Mulai Belajar</strong> untuk memilih materi.<br>
      Ikuti setiap halaman materi dari atas ke bawah.<br>
      Setelah selesai, klik tombol <strong>✅ Tandai Selesai</strong> untuk menambah progres belajarmu.
    `;
  }
}

function closePopup() {
  document.getElementById("popup").classList.remove("show");
}

// === PROGRESS SYSTEM ===
document.addEventListener("DOMContentLoaded", () => {
  const fill = document.getElementById("progress-fill");
  const text = document.getElementById("progress-text");
  let progress = parseInt(localStorage.getItem("progress_eko") || 0);

  if (fill && text) {
    fill.style.width = progress + "%";
    text.textContent = progress + "%";
  }

  document.querySelectorAll(".lesson-nav a.locked").forEach((link) => {
    if (progress >= 50) link.classList.remove("locked");
  });
});

function completeLesson(increase = 25) {
  let progress = parseInt(localStorage.getItem("progress_eko") || 0);
  progress = Math.min(100, progress + increase);
  localStorage.setItem("progress_eko", progress);

  const popup = document.createElement("div");
  popup.className = "popup show";
  popup.innerHTML = `
    <div class="popup-content">
      <h3>✅ Progres Meningkat!</h3>
      <p>Kamu telah mencapai ${progress}% progres pembelajaran!</p>
      <button class="close-popup" onclick="this.parentElement.parentElement.remove()">Tutup</button>
    </div>`;
  document.body.appendChild(popup);

  setTimeout(() => location.reload(), 1500);
}
