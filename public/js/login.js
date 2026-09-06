/* ===================================================
   login.js - Logika Video Background & Navigasi Role
=================================================== */

document.addEventListener("DOMContentLoaded", () => {
    
    /* =================================================
       1. LOGIKA VIDEO FREEZE DI DETIK KE-5
    ================================================= */
    const video = document.getElementById('bgVideo');

    if (video) {
        // Event listener buat mantau waktu video
        video.addEventListener('timeupdate', () => {
            if (video.currentTime >= 5) {
                video.pause();
                video.currentTime = 5; // Kunci biar diem di detik ke-5
            }
        });

        // Pastikan video otomatis putar (autoplay policy di beberapa browser kadang blokir)
        video.play().catch(error => {
            console.log("Autoplay dicegat browser, biasanya karena belum ada interaksi user.");
        });
    }

/* =================================================
       2. LOGIKA TOMBOL PILIH ROLE (Siswa / Guru)
    ================================================= */
    window.login = function(role) {
        if (role === 'siswa') {
            // Mengarah ke route /login/siswa
            window.location.href = '/ekosistem-laravel/public/login/siswa'; 
        } else if (role === 'guru') {
            // Mengarah ke route /login/guru
            window.location.href = '/ekosistem-laravel/public/login/guru'; 
        }
    };
});