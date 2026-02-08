document.addEventListener("DOMContentLoaded", () => {
  const map = document.getElementById("sim-map");
  const player = document.getElementById("player");
  const popup = document.getElementById("action-popup");
  const btnBad = document.getElementById("action-bad");
  const btnGood = document.getElementById("action-good");
  const statusText = document.getElementById("sim-status");

  const INTERACT_DISTANCE = 50;
  let brokenCount = 0;
  let activeTarget = null;

  /* ===== PLAYER ===== */
  let px = 100, py = 180;
  player.style.left = px + "px";
  player.style.top = py + "px";

  document.addEventListener("keydown", e => {
    const step = 10;
    if (e.key === "w") py -= step;
    if (e.key === "s") py += step;
    if (e.key === "a") px -= step;
    if (e.key === "d") px += step;

    px = Math.max(0, Math.min(px, 712));
    py = Math.max(0, Math.min(py, 372));

    player.style.left = px + "px";
    player.style.top = py + "px";

    checkInteraction();
  });

  /* ===== OBJECTS ===== */
  const objects = [
    { type: "tree", bad: "Tebang", good: "Jaga" },
    { type: "tiger", bad: "Bunuh", good: "Lestarikan" },
    { type: "deer", bad: "Buru", good: "Biarkan" },
    { type: "rice", bad: "Rusak", good: "Rawat" },
    { type: "water", bad: "Cemari", good: "Biarkan", fixed: true }
  ];

  const entities = [];

  objects.forEach(obj => {
    const el = document.createElement("div");
    el.className = "entity normal";
    el.dataset.type = obj.type;
    el.dataset.used = "false";
    el.style.backgroundImage = `url("../img/${obj.type}.png")`;

    if (obj.fixed) {
      el.style.left = "650px";
      el.style.top = "200px";
    } else {
      el.style.left = Math.random() * 550 + 50 + "px";
      el.style.top = Math.random() * 300 + 50 + "px";
    }

    map.appendChild(el);
    entities.push({ el, ...obj });
  });

  /* ===== INTERACTION ===== */
  function checkInteraction() {
    popup.classList.add("hidden");
    activeTarget = null;

    entities.forEach(obj => {
      if (obj.el.dataset.used === "true") return;

      const rect = obj.el.getBoundingClientRect();
      const pRect = player.getBoundingClientRect();
      const dx = rect.left - pRect.left;
      const dy = rect.top - pRect.top;
      const dist = Math.sqrt(dx * dx + dy * dy);

      if (dist < INTERACT_DISTANCE) {
        activeTarget = obj;
        showPopup(rect.left - map.getBoundingClientRect().left,
                  rect.top - map.getBoundingClientRect().top - 40,
                  obj);
      }
    });
  }

  function showPopup(x, y, obj) {
    popup.style.left = x + "px";
    popup.style.top = y + "px";
    popup.classList.remove("hidden");

    btnBad.textContent = obj.bad;
    btnGood.textContent = obj.good;
  }

  /* ===== ACTIONS ===== */
  btnBad.onclick = () => resolveAction(true);
  btnGood.onclick = () => resolveAction(false);

  function resolveAction(isBad) {
    if (!activeTarget) return;

    activeTarget.el.dataset.used = "true";
    popup.classList.add("hidden");

    if (isBad) {
      activeTarget.el.classList.add("damaged");
      brokenCount++;
    }

    checkEnd();
  }

  function checkEnd() {
    if (brokenCount >= 3) {
      statusText.textContent = "❌ Ekosistem rusak parah!";
      statusText.style.color = "#ef4444";
    }
  }
});
