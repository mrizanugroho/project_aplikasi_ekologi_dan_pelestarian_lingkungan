// Popup helper
function openPopup(title, text) {
  const popup = document.getElementById("popup");
  document.getElementById("popup-title").innerText = title;
  document.getElementById("popup-text").innerText = text;
  popup.style.display = "flex";
}
function closePopup() {
  document.getElementById("popup").style.display = "none";
}

// === Observasi ===
const OBS_KEY = "observations_materi1";
const loadObservations = () =>
  JSON.parse(localStorage.getItem(OBS_KEY) || "[]");
const saveObservation = (obs) =>
  localStorage.setItem(OBS_KEY, JSON.stringify([...loadObservations(), obs]));
const clearObservations = () => localStorage.removeItem(OBS_KEY);
const updateObsCount = () =>
  (document.getElementById("obsCount").innerText = loadObservations().length);

// === Health formula ===
function computeHealth(t, w) {
  const ideal = 25;
  const diff = Math.abs(t - ideal);
  const tempScore = Math.max(0, 1 - diff / 15);
  const waterScore = w / 100;
  return Math.round((tempScore * 0.55 + waterScore * 0.45) * 100);
}

// === Sliders ===
const tempSlider = document.getElementById("tempSlider");
const waterSlider = document.getElementById("waterSlider");
const tempValue = document.getElementById("tempValue");
const waterValue = document.getElementById("waterValue");
const healthFill = document.getElementById("healthFill");
const healthText = document.getElementById("healthText");
const pondEmoji = document.getElementById("pondEmoji");
const fish = document.getElementById("fishAvatar");

function updateDisplay() {
  const t = +tempSlider.value, w = +waterSlider.value;
  tempValue.textContent = t;
  waterValue.textContent = w;
  document.getElementById("legendTemp").textContent = `${t}°C`;
  document.getElementById("legendWater").textContent = w;
  const health = computeHealth(t, w);
  healthFill.style.width = `${health}%`;

  if (health > 70) {
    healthFill.style.background = "linear-gradient(90deg,#34d399,#059669)";
    healthText.textContent = "Sehat";
    healthText.style.color = "#065f46";
    pondEmoji.textContent = "🐟";
  } else if (health > 40) {
    healthFill.style.background = "linear-gradient(90deg,#fde68a,#f59e0b)";
    healthText.textContent = "Stres";
    healthText.style.color = "#92400e";
    pondEmoji.textContent = "😟";
  } else {
    healthFill.style.background = "linear-gradient(90deg,#fecaca,#ef4444)";
    healthText.textContent = "Bahaya";
    healthText.style.color = "#b91c1c";
    pondEmoji.textContent = "💀";
  }
}
[tempSlider, waterSlider].forEach((el) =>
  el.addEventListener("input", updateDisplay)
);
updateDisplay();

// === Presets ===
document.getElementById("presetNormal").onclick = () => {
  tempSlider.value = 25;
  waterSlider.value = 100;
  updateDisplay();
};
document.getElementById("presetHot").onclick = () => {
  tempSlider.value = 38;
  waterSlider.value = 70;
  updateDisplay();
};
document.getElementById("presetPolluted").onclick = () => {
  tempSlider.value = 30;
  waterSlider.value = 40;
  updateDisplay();
};

// === Random Event ===
document.getElementById("randomEventBtn").onclick = () => {
  tempSlider.value = Math.round(Math.random() * 30 + 10);
  waterSlider.value = Math.round(Math.random() * 100);
  updateDisplay();
  openPopup("🎲 Perubahan Acak!", "Kondisi lingkungan berubah secara acak!");
};

// === Save ===
document.getElementById("snapshotBtn").onclick = () => {
  const obs = {
    time: new Date().toLocaleString(),
    temp: +tempSlider.value,
    water: +waterSlider.value,
  };
  saveObservation(obs);
  updateObsCount();
  openPopup("✅ Observasi Disimpan", "Data kondisi lingkungan berhasil disimpan!");
};

// === Clear ===
document.getElementById("clearObsBtn").onclick = () => {
  if (!loadObservations().length) {
    openPopup("ℹ️ Tidak Ada Data", "Belum ada data yang tersimpan untuk dihapus.");
    return;
  }
  clearObservations();
  updateObsCount();
  document.getElementById("obsTableWrap").innerHTML = "";
  openPopup("🗑️ Data Terhapus", "Semua data observasi berhasil dihapus!");
};

// === Show Observations ===
document.getElementById("showObs").onclick = () => {
  const data = loadObservations();
  const wrap = document.getElementById("obsTableWrap");
  if (!data.length) {
    wrap.innerHTML = "<p>Belum ada data observasi.</p>";
    openPopup("ℹ️ Belum Ada Observasi", "Kamu belum menyimpan data apapun.");
    return;
  }
  wrap.innerHTML = data
    .slice()
    .reverse()
    .map(
      (o, i) =>
        `<div style="background:#f9fafb;padding:8px;border-radius:8px;margin-bottom:6px;">
          <strong>#${i + 1}</strong> — 🌡️ ${o.temp}°C, 💧 ${o.water} (${o.time})
        </div>`
    )
    .join("");
  openPopup("📊 Observasi Ditampilkan", "Berikut hasil pengamatan yang telah kamu simpan.");
};
updateObsCount();

// === Navigasi ===
document.getElementById("toHutan").onclick = () =>
  (window.location.href = "simulasi_hutan.html");
document.getElementById("toMateri").onclick = () =>
  (window.location.href = "halaman_materi1.html");
