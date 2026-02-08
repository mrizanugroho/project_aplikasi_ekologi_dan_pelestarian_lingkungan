const menuToggle = document.getElementById("menu-toggle");
const sidebar = document.getElementById("sidebar");

// overlay biar bisa klik area luar buat nutup sidebar
const overlay = document.createElement("div");
overlay.classList.add("overlay");
document.body.appendChild(overlay);

// tombol sidebar (☰)
menuToggle.addEventListener("click", () => {
  sidebar.classList.toggle("active");
  overlay.classList.toggle("show");
});

// klik area luar sidebar = sidebar tertutup
overlay.addEventListener("click", () => {
  sidebar.classList.remove("active");
  overlay.classList.remove("show");
});

// tombol close di dalam sidebar
const closeSidebarBtn = document.getElementById("close-sidebar");

closeSidebarBtn.addEventListener("click", () => {
  sidebar.classList.remove("active");
  overlay.classList.remove("show");
});

function openPopup(type) {
  const popup = document.getElementById("popup");
  const title = document.getElementById("popup-title");
  const text = document.getElementById("popup-text");

  popup.style.display = "flex";

  if (type === "aktivitas") {
    title.innerText = "Ayo Mulai Aktivitas!";
    text.innerText = "Cocokkan komponen biotik dan abiotik dalam permainan interaktif!";
  } else if (type === "refleksi") {
    title.innerText = "Saatnya Refleksi!";
    text.innerText = "Uji pemahamanmu dengan menjawab pertanyaan reflektif!";
  } else {
    title.innerText = "Kembali ke Materi?";
    text.innerText = "Kamu akan kembali ke daftar materi.";
  }
}

function closePopup() {
  document.getElementById("popup").style.display = "none";
}

function goToPage(url) {
  window.location.href = url;
  closePopup();
}

function openPopup(type) {
  const popup = document.getElementById("popup");
  const title = document.getElementById("popup-title");
  const text = document.getElementById("popup-text");

  popup.style.display = "flex";

  if (type === "aktivitas") {
    title.innerText = "Ayo Mulai Aktivitas!";
    text.innerText = "Cocokkan komponen biotik dan abiotik dalam permainan interaktif!";
  } else if (type === "refleksi") {
    title.innerText = "Saatnya Refleksi!";
    text.innerText = "Uji pemahamanmu dengan menjawab pertanyaan reflektif!";
  } else {
    title.innerText = "Kembali ke Materi?";
    text.innerText = "Kamu akan kembali ke daftar materi.";
  }
}

function closePopup() {
  document.getElementById("popup").style.display = "none";
}

function goToPage(url) {
  window.location.href = url;
  closePopup();
}

