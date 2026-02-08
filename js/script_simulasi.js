document.addEventListener("DOMContentLoaded", () => {
  const stage = document.getElementById("stage");
  const popup = document.getElementById("popup");
  const emojiLayer = document.getElementById("emojiLayer");
  const healthText = document.getElementById("healthText");
  const healthFill = document.getElementById("healthFill");
  const tempSlider = document.getElementById("tempSlider");
  const waterSlider = document.getElementById("waterSlider");

  function computeHealth(temp, water) {
    let score = 100;
    if (temp < 18 || temp > 32) score -= 30 + Math.abs(temp - 25);
    if (water < 60) score -= (60 - water) * 0.8;
    return Math.max(0, Math.min(100, Math.round(score)));
  }

  function spawnEmoji(type) {
    const e = document.createElement("div");
    e.className = "float-emoji";
    e.textContent = type === "good" ? "😊" : "☠️";
    e.style.left = Math.random() > 0.5 ? "25%" : "75%";
    emojiLayer.append(e);
    setTimeout(() => e.remove(), 1200);
  }

  function updateDisplay() {
    const temp = +tempSlider.value, water = +waterSlider.value;
    document.getElementById("tempVal").textContent = temp;
    document.getElementById("waterVal").textContent = water;
    const score = computeHealth(temp, water);
    healthFill.style.width = `${score}%`;
    if (score >= 80) { healthText.textContent = "Sehat"; healthFill.style.background = "#16a34a"; spawnEmoji("good"); }
    else if (score >= 50) { healthText.textContent = "Cukup"; healthFill.style.background = "#facc15"; }
    else { healthText.textContent = "Bahaya"; healthFill.style.background = "#ef4444"; spawnEmoji("bad"); }
  }

  tempSlider.oninput = waterSlider.oninput = updateDisplay;
  document.getElementById("btnRandom").onclick = () => {
    tempSlider.value = Math.floor(Math.random() * 31) + 10;
    waterSlider.value = Math.floor(Math.random() * 101);
    updateDisplay();
  };
  document.getElementById("btnSave").onclick = () => popup.classList.add("show");
  document.getElementById("popupClose").onclick = () => popup.classList.remove("show");
  document.getElementById("popupGoForest").onclick = () => { popup.classList.remove("show"); stage.classList.add("go-forest"); };
  document.getElementById("btnGoForest").onclick = () => stage.classList.add("go-forest");
  document.getElementById("btnClear").onclick = () => { tempSlider.value = 25; waterSlider.value = 100; updateDisplay(); };

  // Forest
  const icons = document.querySelectorAll(".icon");
  const forestStatus = document.getElementById("forestStatus");
  const btnResetForest = document.getElementById("btnResetForest");
  const btnQuiz = document.getElementById("btnQuiz");

  icons.forEach(icon => {
    icon.addEventListener("click", () => {
      icon.classList.toggle("active");
      if (icon.dataset.kind === "tree" && icon.classList.contains("active")) spawnLeaf(icon);
      updateForestStatus();
    });
  });

  btnResetForest.onclick = () => { icons.forEach(i => i.classList.remove("active")); updateForestStatus(); };
  btnQuiz.onclick = () => window.location.href = "kuis_materi1.html";

  function updateForestStatus() {
    const activeCount = document.querySelectorAll(".icon.active").length;
    if (activeCount === icons.length) forestStatus.textContent = "🌿 Ekosistem seimbang.";
    else if (activeCount >= 3) forestStatus.textContent = "⚠️ Ekosistem terganggu.";
    else forestStatus.textContent = "❌ Ekosistem rusak!";
  }

  function spawnLeaf(icon) {
    const leaf = document.createElement("div");
    leaf.textContent = "🍃";
    leaf.className = "leaf";
    const rect = icon.getBoundingClientRect();
    leaf.style.left = rect.left + rect.width / 2 + "px";
    leaf.style.top = rect.top + "px";
    document.body.append(leaf);
    setTimeout(() => leaf.remove(), 1500);
  }

  updateDisplay();
});
