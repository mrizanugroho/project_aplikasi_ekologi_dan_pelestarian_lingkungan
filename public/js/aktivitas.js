document.addEventListener("DOMContentLoaded", () => {

    /* ===============================
       1. ELEMEN HTML
    =============================== */
    const draggables = document.querySelectorAll(".draggable");
    const dropZones = document.querySelectorAll(".drop-zone");
    const checkBtn = document.getElementById("checkAnswer");
    
    const popup = document.getElementById("popupResult");
    const scoreText = document.getElementById("scoreText");
    const feedbackContainer = document.getElementById("feedbackContainer");
    const retryBtn = document.getElementById("retryBtn");
    const nextPage = document.getElementById("nextPage");
  
    let chatStep = 0; 
    const chatBody = document.getElementById("chatBody");
    const inputField = document.getElementById("chatInput");
    const sendBtn = document.getElementById("sendBtn");
    const typingIndicator = document.getElementById("typingIndicator");
    const wadahTombolLanjut = document.getElementById("wadahTombolLanjut");
    const btnLanjutKuis = document.getElementById("btnLanjutKuis");

    /* ===============================
       2. KUNCI INPUT CHAT DI AWAL
    =============================== */
    if (inputField && sendBtn) {
        inputField.disabled = true;
        sendBtn.disabled = true;
    }
  
    /* ===============================
       3. LOGIKA DRAG & DROP
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
  
        zone.addEventListener("dragleave", () => {
            zone.classList.remove("drag-over");
        });
  
        zone.addEventListener("drop", e => {
            e.preventDefault();
            zone.classList.remove("drag-over");
  
            const type = e.dataTransfer.getData("type");
            const draggedElement = document.querySelector(`.draggable[data-type="${type}"].dragging`) || document.querySelector(`.draggable.dragging`);

            if (draggedElement) { 
                zone.appendChild(draggedElement);
                saveProgress(); // Auto-save
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
            
            let maxScore = draggables.length + inputs.length; 
            let feedbackHTML = "";

            // Cek Drag & Drop
            draggables.forEach(item => {
                const parent = item.parentElement;
                const type = item.dataset.type ? item.dataset.type.toLowerCase() : ""; 
                const textName = item.textContent.trim();
                
                if (parent && parent.classList.contains("drop-zone")) {
                    if (parent.id.toLowerCase().includes(type)) {
                        totalCorrect++;
                        feedbackHTML += `<p style="color:green;">✔️ ${textName} masuk ke kelompok yang benar!</p>`;
                    } else {
                        feedbackHTML += `<p style="color:red;">❌ ${textName} salah kelompok.</p>`;
                    }
                } else {
                    feedbackHTML += `<p style="color:orange;">⚠️ ${textName} belum dimasukkan ke kotak.</p>`;
                }
            });

            // Cek Isian Singkat
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

            // Hitung Nilai
            let finalScore = Math.round((totalCorrect / maxScore) * 100);
            
            scoreText.innerHTML = `Skor Analisis Kamu: <strong>${finalScore}</strong>/100`;
            feedbackContainer.innerHTML = feedbackHTML;
            popup.classList.add("show");

            // Simpan Nilai ke Database
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            let savedJawaban = localStorage.getItem(progressKey) || "{}";

            fetch('/simpan-nilai', { 
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    materi_id: 'materi_1',
                    jenis_tugas: 'latihan', 
                    skor: finalScore,
                    jawaban_detail: savedJawaban
                })
            })
            .then(response => response.json())
            .then(data => console.log("Status Simpan Nilai:", data))
            .catch(error => console.error("Gagal simpan nilai:", error));

            if (finalScore >= 70) {
                nextPage.textContent = "💬 Lanjut Diskusi Tim";
                nextPage.style.display = "inline-block";
                retryBtn.textContent = "Tutup";
            } else {
                nextPage.style.display = "none"; 
                retryBtn.textContent = "🔁 Coba Lagi";
                feedbackContainer.innerHTML += `<p style="color:#d97706; margin-top:10px;"><b>Skor minimal 70 untuk membuka chat. Yuk perbaiki analisismu!</b></p>`;
            }
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
            
            const lockOverlay = document.getElementById("chatLockOverlay");
            if(lockOverlay) {
                lockOverlay.classList.add("unlocked");
            }

            if(inputField && sendBtn) {
                inputField.disabled = false;
                sendBtn.disabled = false;
                inputField.placeholder = "Ketik idemu di sini...";
            }
            
            document.querySelector(".chat-wrapper").scrollIntoView({ behavior: "smooth", block: "center" });
        });
    }
  
    /* ===============================
       6. SISTEM FORUM CHAT REAL (DATABASE)
    =============================== */
    const submateri = "materi_1"; 
    let lastMessageCount = 0; 

    if (inputField && sendBtn) {
        inputField.disabled = false;
        sendBtn.disabled = false;
        inputField.placeholder = "Ketik pesan untuk temanmu...";
    }

    function fetchMessages() {
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

    function sendRealMessage() {
        const text = inputField.value.trim();
        if (!text) return; 

        inputField.disabled = true;
        sendBtn.disabled = true;

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

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

    function renderChat(messages) {
        chatBody.innerHTML = ""; 
        messages.forEach(msg => {
            const messageDiv = document.createElement("div");
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

    if (inputField) {
        inputField.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                event.preventDefault(); 
                sendRealMessage(); 
            }
        });
    }

    if (sendBtn) {
        sendBtn.addEventListener("click", function(event) {
            event.preventDefault();
            sendRealMessage(); 
        });
    }

    /* ===============================
       7. LOGIKA LOCALSTORAGE (AUTO-SAVE)
    =============================== */
    const progressKey = `progres_${submateri}`; 

    function saveProgress() {
        let progressData = { drag: {}, input: {} };

        dropZones.forEach(zone => {
            const item = zone.querySelector(".draggable");
            if (item) {
                progressData.drag[item.textContent.trim()] = zone.id; 
            }
        });

        const inputs = document.querySelectorAll(".inline-input");
        inputs.forEach((input, index) => {
            if (!input.id) input.id = `input_${index}`; 
            progressData.input[input.id] = input.value;
        });

        localStorage.setItem(progressKey, JSON.stringify(progressData));
    }

    function loadProgress() {
        let savedData = localStorage.getItem(progressKey);
        if (savedData) {
            let progress = JSON.parse(savedData);

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

            const inputs = document.querySelectorAll(".inline-input");
            inputs.forEach(input => {
                if (progress.input[input.id]) {
                    input.value = progress.input[input.id];
                }
            });
        }
    }

    /* ===============================
       8. LOGIKA TOMBOL LANJUT KUIS (RESET CHAT)
    =============================== */
    if (btnLanjutKuis) {
        btnLanjutKuis.addEventListener("click", () => {
            
            btnLanjutKuis.textContent = "Menyiapkan Kuis...";
            btnLanjutKuis.disabled = true;

            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch(`/chat/${submateri}/clear`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log("Status Reset Chat:", data);
                localStorage.removeItem(progressKey);
                window.location.href = '/materi1/petunjuk-kuis';
            })
            .catch(error => {
                console.error("Gagal reset chat:", error);
                window.location.href = '/materi1/petunjuk-kuis';
            });
        });
    }

    /* ===============================
       9. PEMANGGILAN FUNGSI SAAT WEB DIBUKA
    =============================== */
    loadProgress(); 
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
                    // Gabungkan nama-nama di array jadi satu kalimat
                    let text = data.online_users.join(', ');
                    if(text === "") text = "Hanya Kamu"; // Kalau database kosong
                    onlineSubtitle.textContent = text;
                }
            })
            .catch(err => console.error("Gagal get data online:", err));
    }

    // Panggil sekali pas web dibuka
    updateOnlinePresence();
    // Ulangi otomatis setiap 5 detik (5000 milidetik)
    setInterval(updateOnlinePresence, 5000);
    
}); // <--- PENUTUP SATU-SATUNYA YANG BENAR