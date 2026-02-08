// js/infografis.js (FULL file - replace existing)
document.addEventListener("DOMContentLoaded", () => {
  const area = document.getElementById("infografisArea");
  if (!area) {
    console.warn("infografisArea not found.");
    return;
  }

  // selectors matching your HTML
  const iconSelector = ".icon-gallery img, .gallery img, .draggable-icon";
  const symbolSelector = ".symbol-gallery img, .symbol-icon, .symbol";
  const galleryItems = document.querySelectorAll(iconSelector + ", " + symbolSelector);

  const addTextBtn = document.getElementById("addTextBtn");
  const resetBtn = document.getElementById("resetBtn");
  const exportBtn = document.getElementById("exportBtn");
  const rotateLeftBtn = document.getElementById("rotateLeftBtn");
  const rotateRightBtn = document.getElementById("rotateRightBtn");

  // --- popup helpers (safe define) ---
  if (!window.openPopup) {
    window.openPopup = (title, text) => {
      const popup = document.getElementById("popup");
      if (!popup) { alert(title + "\n\n" + text); return; }
      const tEl = document.getElementById("popup-title");
      const txtEl = document.getElementById("popup-text");
      if (tEl) tEl.innerText = title;
      if (txtEl) txtEl.innerText = text;
      popup.style.display = "flex";
    };
  }
  if (!window.closePopup) {
    window.closePopup = () => {
      const popup = document.getElementById("popup");
      if (popup) popup.style.display = "none";
    };
  }

  // -------------------------
  // Dragstart: attach to gallery and symbol items
  // -------------------------
  galleryItems.forEach(item => {
    item.addEventListener("dragstart", e => {
      const isSymbol = item.matches(symbolSelector);
      e.dataTransfer.setData("isSymbol", isSymbol ? "true" : "false");

      // if element has data-symbol attribute, pass that (useful for text symbols)
      const dsSym = item.dataset && item.dataset.symbol ? item.dataset.symbol : "";
      if (dsSym) e.dataTransfer.setData("symbol", dsSym);

      // src fallback from image src or dataset-src
      const src = item.src || item.dataset.src || "";
      if (src) {
        try { e.dataTransfer.setData("src", src); } catch (err) {}
        try { e.dataTransfer.setData("text/uri-list", src); } catch (err) {}
      }

      // reduce default ghost drag image to avoid visual artifact
      try {
        const blank = new Image();
        blank.src = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAAA1BMVEX///+nxBvIAAAACklEQVQI12NgAAAAAgAB4iG8MwAAAABJRU5ErkJggg==";
        e.dataTransfer.setDragImage(blank, 0, 0);
      } catch (err) {}
    });
  });

  // -------------------------
  // Drop handler on canvas
  // -------------------------
  area.addEventListener("dragover", e => e.preventDefault());

  area.addEventListener("drop", e => {
    e.preventDefault();

    const isSymbol = e.dataTransfer.getData("isSymbol") === "true";
    let src = e.dataTransfer.getData("src") || "";
    const textUri = e.dataTransfer.getData("text/uri-list") || "";
    const symbolText = e.dataTransfer.getData("symbol") || "";

    if (!src && textUri) src = textUri.split("\n")[0].trim();

    const x = Math.max(0, e.offsetX - 30);
    const y = Math.max(0, e.offsetY - 30);

    // if symbol (text symbol)
    if (isSymbol && symbolText) {
      const sym = document.createElement("div");
      sym.className = "dropped-symbol";
      sym.innerText = symbolText;
      sym.style.left = `${x}px`;
      sym.style.top = `${y}px`;
      sym.style.position = "absolute";
      sym.style.zIndex = 60;
      makePointerDraggable(sym);
      attachRotateHandlers(sym);
      makeSelectable(sym);
      area.appendChild(sym);
      return;
    }

    // final fallback: try event target if image was dragged
    if (!src) {
      const tgt = e.target;
      if (tgt && tgt.tagName && tgt.tagName.toLowerCase() === "img" && tgt.src) {
        src = tgt.src;
      }
    }

    if (!src) {
      openPopup("⚠️ Gagal", "Gambar tidak tersedia (src kosong). Coba drag ulang.");
      return;
    }

    // Create image and wait for load before append (prevents broken placeholders)
    const img = new Image();
    img.className = "dropped-icon";
    img.style.position = "absolute";
    img.style.left = `${x}px`;
    img.style.top = `${y}px`;
    img.style.zIndex = 50;
    img.style.width = "60px";
    img.style.height = "60px";
    img.alt = "";

    img.onload = () => {
      makePointerDraggable(img);
      attachRotateHandlers(img);
      makeSelectable(img);
      area.appendChild(img);
    };

    img.onerror = () => {
      openPopup("❌ Gagal memuat gambar", "Periksa file gambar atau coba drag ulang.");
    };

    img.src = src;
  });

  // -------------------------
  // Add editable text
  // -------------------------
  if (addTextBtn) {
    addTextBtn.addEventListener("click", () => {
      const t = document.createElement("div");
      t.className = "editable-text";
      t.contentEditable = "true";
      t.innerText = "Tulis di sini...";
      t.style.left = "40px";
      t.style.top = "40px";
      t.style.position = "absolute";
      t.style.zIndex = 70;
      makePointerDraggable(t);
      attachRotateHandlers(t);
      area.appendChild(t);
      makeSelectable(t);
      requestAnimationFrame(() => t.focus());
    });
  }

  // -------------------------
  // Reset area
  // -------------------------
  if (resetBtn) {
    resetBtn.addEventListener("click", () => {
      if (confirm("Yakin ingin menghapus semua elemen di infografis?")) {
        area.innerHTML = "";
        closePopup();
      }
    });
  }

  // -------------------------
  // Export (clone + html2canvas)
  // -------------------------
  if (exportBtn) {
    exportBtn.addEventListener("click", async () => {
      openPopup("⏳ Memproses...", "Sedang membuat gambar, mohon tunggu...");
      await new Promise(r => setTimeout(r, 250));

      if (area.children.length === 0) {
        closePopup();
        openPopup("⚠️ Kosong", "Tambahkan elemen dulu sebelum ekspor.");
        return;
      }

      const clone = area.cloneNode(true);
      clone.style.position = "absolute";
      clone.style.left = "-99999px";
      clone.style.top = "-99999px";

      // sanitize clone (remove contenteditable so caret won't show)
      clone.querySelectorAll("[contenteditable]").forEach(el => el.removeAttribute("contenteditable"));

      document.body.appendChild(clone);

      // ensure images in clone are loaded
      const imgs = Array.from(clone.querySelectorAll("img"));
      await Promise.all(imgs.map(img => new Promise(res => {
        if (img.complete) return res();
        img.onload = res; img.onerror = res;
      })));

      html2canvas(clone, { useCORS: true, allowTaint: true, backgroundColor: "#ffffff" })
        .then(canvas => {
          const link = document.createElement("a");
          link.download = "infografis_ekologi.png";
          link.href = canvas.toDataURL("image/png");
          link.click();
          document.body.removeChild(clone);
          closePopup();
          openPopup("✅ Infografis Disimpan", "Gambar berhasil diekspor ke perangkatmu!");
        })
        .catch(err => {
          console.error("Export error:", err);
          document.body.removeChild(clone);
          closePopup();
          openPopup("❌ Gagal Ekspor", "Terjadi kesalahan saat membuat gambar.");
        });
    });
  }

  // -------------------------
  // Pointer-based dragging (no trail)
  // -------------------------
  function makePointerDraggable(el) {
    el.style.touchAction = "none";
    el.style.position = el.style.position || "absolute";
    let dragging = false;
    let startX = 0, startY = 0, origLeft = 0, origTop = 0;

    const down = (ev) => {
      if (ev.pointerType === "mouse" && ev.button !== 0) return; // only primary button
      ev.preventDefault();
      dragging = true;
      try { el.setPointerCapture(ev.pointerId); } catch (e) {}
      startX = ev.clientX; startY = ev.clientY;
      const parentRect = area.getBoundingClientRect();
      const rect = el.getBoundingClientRect();
      origLeft = rect.left - parentRect.left;
      origTop = rect.top - parentRect.top;
      el.style.cursor = "grabbing";
    };

    const move = (ev) => {
      if (!dragging) return;
      const dx = ev.clientX - startX;
      const dy = ev.clientY - startY;
      const parentRect = area.getBoundingClientRect();
      const w = el.offsetWidth, h = el.offsetHeight;
      let nx = Math.max(0, Math.min(parentRect.width - w, origLeft + dx));
      let ny = Math.max(0, Math.min(parentRect.height - h, origTop + dy));
      el.style.left = nx + "px";
      el.style.top = ny + "px";
    };

    const up = (ev) => {
      if (!dragging) return;
      try { el.releasePointerCapture(ev.pointerId); } catch (e) {}
      dragging = false;
      el.style.cursor = "grab";
    };

    el.addEventListener("pointerdown", down);
    window.addEventListener("pointermove", move);
    window.addEventListener("pointerup", up);
  }

  // -------------------------
  // Rotate handlers (dblclick + programmatic)
  // -------------------------
  function attachRotateHandlers(el) {
    if (el.__rotateAttached) return;
    el.__rotateAttached = true;

    // dblclick rotates (but if contenteditable, skip so user can edit)
    el.addEventListener("dblclick", (ev) => {
      if (el.isContentEditable) return;
      ev.stopPropagation();
      rotateElementBy(el, 90);
    });

    // tooltip hint
    try { el.title = (el.title || "") + " (Double-click to rotate)"; } catch (e) {}
  }

  // rotate element by angle degrees (positive clockwise)
  function rotateElementBy(el, angle) {
    if (!el) return;
    const s = el.style.transform || "";
    const m = s.match(/rotate\(([-0-9.]+)deg\)/);
    let cur = m ? Number(m[1]) : 0;
    cur = (cur + angle) % 360;
    el.style.transform = `rotate(${cur}deg)`;
  }

  // -------------------------
  // Selection support + rotate buttons
  // -------------------------
  let selectedElement = null;

  function selectElement(el) {
    if (selectedElement && selectedElement !== el) {
      selectedElement.classList && selectedElement.classList.remove("selected");
    }
    selectedElement = el;
    if (selectedElement) selectedElement.classList && selectedElement.classList.add("selected");
  }

  // click on canvas background deselects
  area.addEventListener("pointerdown", (ev) => {
    if (ev.target === area) {
      if (selectedElement) {
        selectedElement.classList && selectedElement.classList.remove("selected");
        selectedElement = null;
      }
    }
  });

  // make element selectable (click to select, delete key to remove)
  function makeSelectable(el) {
    if (el.__selectableAttached) return;
    el.__selectableAttached = true;

    el.addEventListener("click", (ev) => {
      if (el.isContentEditable) return; // clicking to edit shouldn't select
      ev.stopPropagation();
      selectElement(el);
    });

    // delete key support
    window.addEventListener("keydown", (ev) => {
      if (!selectedElement) return;
      if (ev.key === "Delete" || ev.key === "Backspace") {
        selectedElement.remove();
        selectedElement = null;
      }
    });
  }

  // wire rotate buttons
  if (rotateLeftBtn) {
    rotateLeftBtn.addEventListener("click", () => {
      if (!selectedElement) {
        openPopup("ℹ️ Pilih Elemen", "Klik sebuah elemen pada kanvas untuk memilihnya, lalu gunakan Rotate Left/Right.");
        return;
      }
      rotateElementBy(selectedElement, -90);
    });
  }
  if (rotateRightBtn) {
    rotateRightBtn.addEventListener("click", () => {
      if (!selectedElement) {
        openPopup("ℹ️ Pilih Elemen", "Klik sebuah elemen pada kanvas untuk memilihnya, lalu gunakan Rotate Left/Right.");
        return;
      }
      rotateElementBy(selectedElement, 90);
    });
  }

  // -------------------------
  // Ensure existing children (if any) are set up
  // -------------------------
  Array.from(area.children).forEach(el => {
    makePointerDraggable(el);
    attachRotateHandlers(el);
    makeSelectable(el);
  });

  // Also attach makeSelectable/rotate/pointer to any future child append locations
  // (we already call these where we append new elements above)

  // Done
});
