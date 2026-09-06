document.addEventListener("DOMContentLoaded", () => {

    /* ===============================
       1. ELEMEN HTML
    =============================== */
    const draggables = document.querySelectorAll(".draggable");
    const dropZones = document.querySelectorAll(".drop-zone");
    const checkBtn = document.getElementById("checkAnswer");
    
    // Elemen Pop-up
    const popup = document.getElementById("popupResult");
    const scoreText = document.getElementById("scoreText");
    const feedbackContainer = document.getElementById("feedbackContainer");
    const retryBtn = document.getElementById("retryBtn");
    const nextPage = document.getElementById("nextPage");
  
    // Elemen Chat
    let chatStep = 0; 
    const chatBody = document.getElementById("chatBody");
    const inputField = document.getElementById("chatInput");
    const sendBtn = document.getElementById("sendBtn");
    const typingIndicator = document.getElementById("typingIndicator");
    const wadahTombolLanjut = document.getElementById("wadahTombolLanjut");
    const btnLanjutKuis = document.getElementById("btnLanjutKuis");

    /* ===============================
       2. GEMBOK CHAT DI AWAL
    =============================== */
    if (inputField && sendBtn) {
        inputField.disabled = true;
        sendBtn.disabled = true;
        inputField.placeholder = "Kunci: Periksa jawaban di atas dulu!";
    }
  
/* ===============================
       2. LOGIKA DRAG & DROP
    =============================== */
    draggables.forEach(item => {
        item.addEventListener("dragstart", e => {
            e.dataTransfer.setData("type", item.dataset.type);
            e.dataTransfer.setData("id", item.textContent);
            item.classList.add("dragging");
        });

        item.addEventListener("dragend", () => {
            item.classList.remove("dragging");
        });
    });
  
    dropZones.forEach(zone => {
        zone.addEventListener("dragover", e => {
            e.preventDefault();
            zone.classList.add("drag-over");
        });
  
        // Ini yang tadi nggak sengaja kehapus
        zone.addEventListener("dragleave", () => {
            zone.classList.remove("drag-over");
        });
  
        // Ini event DROP yang BENAR (Cukup 1 aja)
        zone.addEventListener("drop", e => {
            e.preventDefault();
            zone.classList.remove("drag-over");
  
            const type = e.dataTransfer.getData("type");
            const draggedElement = document.querySelector(`.draggable[data-type="${type}"].dragging`) || document.querySelector(`.draggable.dragging`);
            
            if (draggedElement && !zone.querySelector('.draggable')) {
                zone.appendChild(draggedElement);
                saveProgress(); // 👈 INI UDAH MANTAP! AUTO-SAVE BERJALAN!
            }
        });
    });
  
/* ===============================
       4. LOGIKA TOMBOL PERIKSA & POP-UP
    =============================== */
    if (checkBtn) {
        checkBtn.addEventListener("click", () => {
            let totalCorrect = 0;
            const inputs = document.querySelectorAll(".inline-input");
            
            // Hitung total skor maksimal secara otomatis
            let maxScore = draggables.length + inputs.length; 
            let feedbackHTML = "";

            // --- Cek Drag & Drop ---
            draggables.forEach(item => {
                const parent = item.parentElement;
                const type = item.dataset.type ? item.dataset.type.trim().toLowerCase() : ""; 
                const textName = item.textContent.trim();
                
                if (parent && parent.classList.contains("drop-zone")) {
                    const zoneId = parent.id.toLowerCase();
                    if (zoneId.includes(type)) {
                        totalCorrect++;
                        feedbackHTML += `<p style="color:green;">✔️ ${textName} masuk ke kelompok yang benar!</p>`;
                    } else {
                        feedbackHTML += `<p style="color:red;">❌ ${textName} salah kelompok.</p>`;
                    }
                } else {
                    feedbackHTML += `<p style="color:orange;">⚠️ ${textName} belum dimasukkan ke kotak.</p>`;
                }
            });

            // --- Cek Isian Singkat ---
            inputs.forEach((input) => {
                const userAnswer = input.value.trim().toLowerCase();
                const correctAnswer = input.dataset.answer ? input.dataset.answer.toLowerCase() : "";

                if (userAnswer === correctAnswer) {
                    totalCorrect++;
                    input.style.borderBottom = "2px solid #16a34a";
                    input.style.color = "#16a34a";
                } else {
                    input.style.borderBottom = "2px solid #dc2626";
                    input.style.color = "#dc2626";
                }
            });

            // --- Hitung Nilai & Tampilkan Pop-up ---
            let finalScore = Math.round((totalCorrect / maxScore) * 100);
            
            scoreText.innerHTML = `Skor Analisis Kamu: <strong>${finalScore}</strong>/100`;
            feedbackContainer.innerHTML = feedbackHTML;
            popup.classList.add("show");

            // --- Simpan Nilai ke Database ---
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            
            let savedJawaban = localStorage.getItem(progressKey) || "{}";

            // Hapus /ekosistem-laravel/public
            fetch('/simpan-nilai', { 
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    materi_id: 'materi_2',
                    jenis_tugas: 'latihan', 
                    skor: finalScore,
                    jawaban_detail: savedJawaban
                })
            })
            // ... (lanjutan kodingan then catch di bawahnya) ...
            .then(response => response.json())
            .then(data => console.log("Status Simpan Nilai:", data))
            .catch(error => console.error("Gagal simpan nilai:", error));

            // --- Logika Lolos / Tidak ---
            if (finalScore >= 70) {
                if (nextPage) {
                    nextPage.textContent = "💬 Lanjut Diskusi Tim";
                    nextPage.style.display = "inline-block";
                }
                if (retryBtn) retryBtn.textContent = "Tutup";
            } else {
                if (nextPage) nextPage.style.display = "none"; 
                if (retryBtn) retryBtn.textContent = "🔁 Coba Lagi";
                feedbackContainer.innerHTML += `<p style="color:#d97706; margin-top:10px;"><b>Skor minimal 70 untuk membuka chat. Yuk perbaiki analisismu!</b></p>`;
            }
        }); // <-- Ini penutup checkBtn.addEventListener
    } // <-- Ini penutup if (checkBtn)

    if (retryBtn) {
        retryBtn.addEventListener("click", () => {
            popup.classList.remove("show");
        });
    }

    if (retryBtn) {
        retryBtn.addEventListener("click", () => {
            popup.classList.remove("show");
        });
    }

    /* ===============================
       5. BUKA BLUR GEMBOK (TOMBOL LANJUT)
    =============================== */
    if (nextPage) {
        nextPage.addEventListener("click", () => {
            popup.classList.remove("show"); 
            
            // 🔓 HILANGKAN EFEK BLUR GEMBOK
            const lockOverlay = document.getElementById("chatLockOverlay");
            if(lockOverlay) {
                lockOverlay.classList.add("unlocked");
            }

            // Aktifkan kolom input chat
            if(inputField && sendBtn) {
                inputField.disabled = false;
                sendBtn.disabled = false;
                inputField.placeholder = "Ketik idemu di sini...";
            }
            
            // Scroll mulus ke area chat
            document.querySelector(".chat-wrapper").scrollIntoView({ behavior: "smooth", block: "center" });
        });
    }
  
/* ===============================
       4. SISTEM FORUM CHAT REAL (DATABASE)
    =============================== */
    const submateri = "materi_2"; // ID Ruang Chat
    let lastMessageCount = 0; // Buat ngecek ada chat baru atau gak

    // Fungsi 1: Ngambil chat dari server
    function fetchMessages() {
        // Hapus /ekosistem-laravel/public
        fetch(`/chat/${submateri}/get`)
            .then(res => res.json())
            .then(data => {
                if (data.length !== lastMessageCount) {
                    renderChat(data);
                    lastMessageCount = data.length;
                    scrollToBottom();
                }

                if (data.length >= 2) {
                    if (wadahTombolLanjut) {
                        wadahTombolLanjut.style.display = "block";
                    }
                }
            })
            .catch(err => console.error("Gagal ambil chat:", err));
    }

// Fungsi 3: Mengirim pesan ke database
    function sendRealMessage() {
        const text = inputField.value.trim();
        if (!text) return; 

        inputField.disabled = true;
        sendBtn.disabled = true;

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Hapus /ekosistem-laravel/public
        fetch(`/chat/${submateri}/send`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: JSON.stringify({ message: text }) 
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                inputField.value = ""; 
                fetchMessages(); 
            }
        })
        .catch(error => console.error("Gagal kirim chat:", error))
        .finally(() => {
            inputField.disabled = false;
            sendBtn.disabled = false;
            inputField.focus(); 
        });
    }

    // Fungsi 2: Nampilin chat ke layar
    function renderChat(messages) {
        chatBody.innerHTML = ""; // Bersihin layar dulu
        messages.forEach(msg => {
            const messageDiv = document.createElement("div");
            // Kalau is_me = true, class-nya 'sent' (kanan). Kalau false, 'received' (kiri)
            const type = msg.is_me ? "sent" : "received";
            messageDiv.className = `message ${type}`;
            
            let senderHtml = !msg.is_me ? `<span class="sender-name">${msg.sender} <small style="font-size:0.7em;color:#888;">${msg.time}</small></span>` : `<span class="sender-name"><small style="font-size:0.7em;color:#e2e8f0;margin-right:5px;">${msg.time}</small></span>`;
            
            messageDiv.innerHTML = `${senderHtml}<div class="bubble">${msg.text}</div>`;
            chatBody.appendChild(messageDiv);
        });
    }
  
    function scrollToBottom() {
        chatBody.scrollTop = chatBody.scrollHeight;
    }
  
    function enableInput(placeholderText) {
        inputField.disabled = false;
        sendBtn.disabled = false;
        inputField.placeholder = placeholderText;
        inputField.focus();
    }

    // ✅ INI YANG BENAR, BIARKAN SAJA
if (inputField) {
    inputField.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault(); // Mencegah reload halaman gak sengaja
            sendRealMessage(); // Manggil fungsi database
        }
    });
}

if (sendBtn) {
    sendBtn.addEventListener("click", function(event) {
        event.preventDefault();
        sendRealMessage(); // Manggil fungsi database
    });
}

/* ===============================
       5. LOGIKA LOCALSTORAGE (AUTO-SAVE)
    =============================== */
    const progressKey = `progres_${submateri}`; // misal: progres_materi_4

    // Fungsi untuk menyimpan posisi saat ini
    function saveProgress() {
        let progressData = { drag: {}, input: {} };

        // 1. Simpan posisi Drag & Drop (Nama Item -> ID Kotak)
        dropZones.forEach(zone => {
            const item = zone.querySelector(".draggable");
            if (item) {
                progressData.drag[item.textContent.trim()] = zone.id; 
            }
        });

        // 2. Simpan isian singkat (jika ada)
        const inputs = document.querySelectorAll(".inline-input");
        inputs.forEach((input, index) => {
            if (!input.id) input.id = `input_${index}`; // Pastikan input punya ID
            progressData.input[input.id] = input.value;
        });

        // Simpan ke LocalStorage komputer siswa
        localStorage.setItem(progressKey, JSON.stringify(progressData));
    }

    // Fungsi untuk mengembalikan posisi saat halaman di-refresh
    function loadProgress() {
        let savedData = localStorage.getItem(progressKey);
        if (savedData) {
            let progress = JSON.parse(savedData);

            // Kembalikan Drag & Drop ke kotaknya
            draggables.forEach(item => {
                let itemName = item.textContent.trim();
                let targetZoneId = progress.drag[itemName];
                
                if (targetZoneId) {
                    let targetZone = document.getElementById(targetZoneId);
                    if (targetZone) {
                        targetZone.appendChild(item);
                    }
                }
            });

            // Kembalikan tulisan di input
            const inputs = document.querySelectorAll(".inline-input");
            inputs.forEach(input => {
                if (progress.input[input.id]) {
                    input.value = progress.input[input.id];
                }
            });
        }
    }

// Panggil fetchMessages pertama kali saat web dibuka
    fetchMessages();

    // Bikin interval biar sistem ngecek pesan baru tiap 3 detik (3000 ms)
    setInterval(fetchMessages, 3000);
// ... kodingan fungsi saveProgress() dan loadProgress() kamu ...

    /* ===============================
       PEMANGGILAN FUNGSI SAAT WEB DIBUKA
    =============================== */
    
    // 1. Load jawaban sebelumnya (CUKUP SEKALI DI SINI)
    loadProgress(); 

    // 2. Load chat dari database (Kodingan asli kamu)
    fetchMessages();
    setInterval(fetchMessages, 3000);

    /* ===============================
       10. FITUR ONLINE PRESENCE REAL-TIME
    =============================== */
    function updateOnlinePresence() {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
        // 1. Kirim sinyal bahwa user ini sedang online
        fetch(`/chat/${submateri}/ping`, {
            method: 'POST',
            headers: { 
                'Content-Type': 'application/json', 
                'X-CSRF-TOKEN': csrfToken 
            }
        }).catch(err => console.log("Ping error", err));

        // 2. Ambil daftar user yang sedang online
        fetch(`/chat/${submateri}/online`)
            .then(res => res.json())
            .then(data => {
                const onlineSubtitle = document.getElementById('onlineUsersList');
                if(onlineSubtitle && data.online_users) {
                    let text = data.online_users.join(', ');
                    if(text === "") text = "Hanya Kamu"; 
                    onlineSubtitle.textContent = text;
                }
            })
            .catch(err => console.error("Gagal get data online:", err));
    }

    // Panggil sekali pas web dibuka
    updateOnlinePresence();
    // Ulangi otomatis setiap 5 detik (5000 milidetik)
    setInterval(updateOnlinePresence, 5000);
}); // <--- INI ADALAH PENUTUP document.addEventListener("DOMContentLoaded", () => {