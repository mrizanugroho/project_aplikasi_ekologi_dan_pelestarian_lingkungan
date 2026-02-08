// js/forum.js — Forum Mini dengan Reply-to-Comment
document.addEventListener("DOMContentLoaded", () => {
  const STORAGE_KEY = "forum_mini_threads_v2";

  // UI refs
  const threadListEl = document.getElementById("threadList");
  const searchInput = document.getElementById("searchThreads");
  const newThreadBtn = document.getElementById("newThreadBtn");
  const threadModal = document.getElementById("threadModal");
  const saveThreadBtn = document.getElementById("saveThreadBtn");
  const cancelThreadBtn = document.getElementById("cancelThreadBtn");
  const threadAuthor = document.getElementById("threadAuthor");
  const threadTitle = document.getElementById("threadTitle");
  const threadBody = document.getElementById("threadBody");
  const noThreadEl = document.getElementById("noThread");
  const threadDetailEl = document.getElementById("threadDetail");
  const detailTitle = document.getElementById("detailTitle");
  const detailMeta = document.getElementById("detailMeta");
  const detailBody = document.getElementById("detailBody");
  const commentList = document.getElementById("commentList");
  const commentName = document.getElementById("commentName");
  const commentText = document.getElementById("commentText");
  const postCommentBtn = document.getElementById("postCommentBtn");
  const likeThreadBtn = document.getElementById("likeThreadBtn");
  const threadLikes = document.getElementById("threadLikes");
  const deleteThreadBtn = document.getElementById("deleteThreadBtn");
  const exportBtn = document.getElementById("exportThreads");
  const importBtn = document.getElementById("importThreads");

  let threads = [];
  let selectedThreadId = null;

  // utils
  function uid(p = "") {
    return p + Date.now().toString(36) + Math.random().toString(36).slice(2, 8);
  }
  function load() {
    try {
      const raw = localStorage.getItem(STORAGE_KEY);
      threads = raw ? JSON.parse(raw) : [];
    } catch {
      threads = [];
    }
  }
  function save() {
    localStorage.setItem(STORAGE_KEY, JSON.stringify(threads));
  }
  function formatTime(ts) {
    return new Date(ts).toLocaleString();
  }
  function escapeHtml(s) {
    return s ? s.replace(/[&<>"']/g, m => ({ "&":"&amp;", "<":"&lt;", ">":"&gt;", '"':"&quot;", "'":"&#39;" }[m])) : "";
  }

  // render list
  function renderList(q = "") {
    threadListEl.innerHTML = "";
    const query = q.trim().toLowerCase();
    const list = threads
      .slice()
      .sort((a, b) => b.createdAt - a.createdAt)
      .filter(t => !query || (t.title + " " + t.author).toLowerCase().includes(query));

    if (!list.length) {
      threadListEl.innerHTML = `<div class="small-muted">Belum ada thread.</div>`;
      return;
    }

    list.forEach(t => {
      const div = document.createElement("div");
      div.className = "forum-thread";
      div.dataset.id = t.id;
      div.innerHTML = `
        <div style="flex:1">
          <div class="title">${escapeHtml(t.title)}</div>
          <div class="meta">Oleh <strong>${escapeHtml(t.author)}</strong> • ${formatTime(t.createdAt)}</div>
        </div>
        <div style="text-align:right;">
          <div class="small-muted">${t.comments.length} 💬</div>
          <div class="small-muted">${t.likes} 👍</div>
        </div>
      `;
      div.addEventListener("click", () => openThread(t.id));
      threadListEl.appendChild(div);
    });
  }

  // open thread
  function openThread(id) {
    const t = threads.find(x => x.id === id);
    if (!t) return;
    selectedThreadId = id;
    noThreadEl.style.display = "none";
    threadDetailEl.style.display = "block";
    detailTitle.innerText = t.title;
    detailMeta.innerText = `Oleh ${t.author} • ${formatTime(t.createdAt)}`;
    detailBody.innerText = t.body;
    threadLikes.innerText = t.likes;
    renderComments(t);
  }

  // render comments + replies
  function renderComments(thread) {
    commentList.innerHTML = "";
    if (!thread.comments.length) {
      commentList.innerHTML = `<div class="small-muted">Belum ada komentar.</div>`;
      return;
    }

    const renderSingle = (c, indent = 0) => {
      const card = document.createElement("div");
      card.className = "comment-card";
      card.style.marginLeft = indent ? "30px" : "0";
      card.innerHTML = `
        <div style="flex:1">
          <div class="comment-left">${escapeHtml(c.text)}</div>
          <div class="comment-meta">— ${escapeHtml(c.author)} • ${formatTime(c.createdAt)}</div>
        </div>
        <div style="text-align:right">
          <div style="font-weight:700">${c.likes} 👍</div>
          <div style="margin-top:6px;">
            <button class="forum-btn ghost btn-like" data-id="${c.id}">Like</button>
            <button class="forum-btn ghost btn-reply" data-id="${c.id}">Reply</button>
            <button class="forum-btn ghost btn-del" data-id="${c.id}">Hapus</button>
          </div>
        </div>
      `;
      commentList.appendChild(card);
      (c.replies || []).forEach(r => renderSingle(r, indent + 1));
    };

    thread.comments.slice().forEach(c => renderSingle(c));

    // attach handlers
    commentList.querySelectorAll(".btn-like").forEach(btn => {
      btn.onclick = () => {
        const c = findComment(thread, btn.dataset.id);
        if (c) c.likes++;
        save(); renderComments(thread);
      };
    });
    commentList.querySelectorAll(".btn-del").forEach(btn => {
      btn.onclick = () => {
        if (!confirm("Hapus komentar ini?")) return;
        deleteComment(thread, btn.dataset.id);
        save(); renderComments(thread);
      };
    });
    commentList.querySelectorAll(".btn-reply").forEach(btn => {
      btn.onclick = () => {
        const targetId = btn.dataset.id;
        const name = prompt("Namamu:");
        const text = prompt("Tulis balasan:");
        if (!text) return;
        const reply = { id: uid("r_"), author: name || "Anonim", text, createdAt: Date.now(), likes: 0, replies: [] };
        const parent = findComment(thread, targetId);
        parent.replies = parent.replies || [];
        parent.replies.push(reply);
        save(); renderComments(thread);
        openPopup("💬 Balasan Ditambahkan", "Balasan kamu telah ditambahkan!");
      };
    });
  }

  // recursive comment finder + deleter
  function findComment(thread, id, arr = thread.comments) {
    for (const c of arr) {
      if (c.id === id) return c;
      const sub = c.replies && findComment(thread, id, c.replies);
      if (sub) return sub;
    }
    return null;
  }

  function deleteComment(thread, id, arr = thread.comments) {
    for (let i = 0; i < arr.length; i++) {
      if (arr[i].id === id) {
        arr.splice(i, 1);
        return true;
      }
      if (arr[i].replies && deleteComment(thread, id, arr[i].replies)) return true;
    }
    return false;
  }

  // new thread
  newThreadBtn.onclick = () => {
    threadModal.style.display = "block";
    threadAuthor.value = "";
    threadTitle.value = "";
    threadBody.value = "";
  };
  cancelThreadBtn.onclick = () => (threadModal.style.display = "none");
  saveThreadBtn.onclick = () => {
    const t = {
      id: uid("t_"),
      author: threadAuthor.value || "Anonim",
      title: threadTitle.value,
      body: threadBody.value,
      createdAt: Date.now(),
      likes: 0,
      comments: []
    };
    threads.push(t);
    save();
    renderList();
    openThread(t.id);
    threadModal.style.display = "none";
  };

  // post comment
  postCommentBtn.onclick = () => {
    const t = threads.find(x => x.id === selectedThreadId);
    if (!t) return alert("Pilih thread dulu");
    const c = {
      id: uid("c_"),
      author: commentName.value || "Anonim",
      text: commentText.value,
      createdAt: Date.now(),
      likes: 0,
      replies: []
    };
    t.comments.push(c);
    commentText.value = "";
    save();
    renderComments(t);
    renderList();
  };

  likeThreadBtn.onclick = () => {
    const t = threads.find(x => x.id === selectedThreadId);
    if (t) {
      t.likes++;
      save(); renderList(); threadLikes.innerText = t.likes;
    }
  };
  deleteThreadBtn.onclick = () => {
    if (!selectedThreadId || !confirm("Hapus thread ini?")) return;
    threads = threads.filter(x => x.id !== selectedThreadId);
    save(); renderList(); threadDetailEl.style.display = "none"; noThreadEl.style.display = "block";
  };
  searchInput.oninput = () => renderList(searchInput.value);

  exportBtn.onclick = () => {
    const blob = new Blob([JSON.stringify(threads, null, 2)], { type: "application/json" });
    const a = document.createElement("a");
    a.href = URL.createObjectURL(blob);
    a.download = "forum_threads.json";
    document.body.appendChild(a); a.click(); a.remove();
  };

  importBtn.onclick = () => {
    const input = document.createElement("input");
    input.type = "file"; input.accept = "application/json";
    input.onchange = () => {
      const file = input.files[0];
      if (!file) return;
      const reader = new FileReader();
      reader.onload = () => {
        try {
          const data = JSON.parse(reader.result);
          if (Array.isArray(data)) {
            threads = threads.concat(data);
            save(); renderList();
          }
        } catch (e) {
          alert("Gagal import: " + e.message);
        }
      };
      reader.readAsText(file);
    };
    input.click();
  };

  // popup reuse
  window.openPopup = window.openPopup || ((title, text) => {
    const p = document.getElementById("popup");
    if (p) {
      document.getElementById("popup-title").innerText = title;
      document.getElementById("popup-text").innerText = text;
      p.style.display = "flex";
    } else alert(title + "\n" + text);
  });
  window.closePopup = window.closePopup || (() => {
    const p = document.getElementById("popup");
    if (p) p.style.display = "none";
  });

  // init
  load(); renderList();
});

// === Sidebar / Navbar Toggle ===
document.addEventListener("DOMContentLoaded", () => {
  const menuToggle = document.getElementById("menu-toggle");
  const sidebar = document.getElementById("sidebar");

  // Buat overlay sekali aja
  let overlay = document.querySelector(".overlay");
  if (!overlay) {
    overlay = document.createElement("div");
    overlay.className = "overlay";
    document.body.appendChild(overlay);
  }

  // Toggle buka sidebar
  if (menuToggle) {
    menuToggle.addEventListener("click", () => {
      sidebar.classList.toggle("active");
      overlay.classList.toggle("show");
    });
  }

  // Tombol tutup
  const closeSidebar = document.getElementById("close-sidebar");
  if (closeSidebar) {
    closeSidebar.addEventListener("click", () => {
      sidebar.classList.remove("active");
      overlay.classList.remove("show");
    });
  }

  // Klik overlay buat nutup
  overlay.addEventListener("click", () => {
    sidebar.classList.remove("active");
    overlay.classList.remove("show");
  });
});
