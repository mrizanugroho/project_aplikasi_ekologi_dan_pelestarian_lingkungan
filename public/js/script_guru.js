/* ===================================================
   script_guru.js - Logika Animasi & Grafik Dashboard Guru
=================================================== */

document.addEventListener("DOMContentLoaded", () => {

    /* =================================================
       1. TOGGLE SIDEBAR BUKA-TUTUP
    ================================================= */
    const sidebar = document.getElementById("sidebar");
    const sidebarToggle = document.getElementById("sidebarToggle");

    if (sidebarToggle && sidebar) {
        sidebarToggle.addEventListener("click", () => {
            // Menambah/menghapus class 'collapsed' pada sidebar
            sidebar.classList.toggle("collapsed");
        });
    }

/* =================================================
       2. KONFIGURASI GLOBAL CHART.JS
    ================================================= */
    // Tambahkan pengaman 'if (typeof Chart !== "undefined")' 
    if (typeof Chart !== 'undefined') {
        // Biar font di grafik ngikutin font website kita (Poppins)
        Chart.defaults.font.family = "'Poppins', sans-serif";
        Chart.defaults.color = "#718096";
    }

    /* =================================================
       3. GRAFIK BUNDER (DONUT CHART) - TOTAL SISWA
    ================================================= */
    const ctxTotalSiswa = document.getElementById('chartTotalSiswa');
    if (ctxTotalSiswa && typeof dataGrafik !== 'undefined') {
        // Di dalam script_guru.js
        new Chart(ctxTotalSiswa, {
            type: 'doughnut',
            data: {
                labels: ['Kelas 7A', 'Kelas 7B', 'Kelas 7C'],
                datasets: [{
                    data: [
                        dataGrafik.total_siswa.kelas_7a, 
                        dataGrafik.total_siswa.kelas_7b, 
                        dataGrafik.total_siswa.kelas_7c
                    ],
                    backgroundColor: ['#48bb78', '#4299e1', '#ed8936']
                }]
            }
        });
    }

/* =================================================
   4. FUNGSI PEMBUAT GRAFIK BAR (UNTUK TIAP SUBMATERI)
================================================= */
// Parameter totalLatihan dihapus, sisa totalKuis
function renderSubmateriChart(canvasId, totalKuis) {
    const ctx = document.getElementById(canvasId);
    if (!ctx) return;

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Kuis'], // Tinggal Kuis doang
            datasets: [{
                label: 'Siswa Selesai',
                data: [totalKuis], // Cukup panggil data totalKuis
                backgroundColor: [
                    '#f59e0b'  // Warna Orange untuk Kuis
                ],
                borderRadius: 6, 
                barThickness: 35 
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }, 
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.raw + ' Siswa Selesai';
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    max: 90, 
                    grid: {
                        borderDash: [5, 5],
                        color: '#e2e8f0'
                    }
                },
                x: {
                    grid: { display: false } 
                }
            }
        }
    });
}

/* =================================================
   5. RENDER KE-4 GRAFIK SUBMATERI (DATA DARI DATABASE)
================================================= */
if (typeof dataGrafik !== 'undefined') {
    // Parameter latihan dihapus
    renderSubmateriChart('chartSub1', dataGrafik.materi_1.kuis);
    renderSubmateriChart('chartSub2', dataGrafik.materi_2.kuis);
    renderSubmateriChart('chartSub3', dataGrafik.materi_3.kuis);
    renderSubmateriChart('chartSub4', dataGrafik.materi_4.kuis);
} else {
    // Fallback data dummy
    console.warn("Data database belum masuk, menggunakan data dummy sementara.");
    renderSubmateriChart('chartSub1', 85); 
    renderSubmateriChart('chartSub2', 65); 
    renderSubmateriChart('chartSub3', 40); 
    renderSubmateriChart('chartSub4', 10); 
}
});

/* ===================================================
       6. LOGIKA HALAMAN HASIL SUBMATERI (LATIHAN & KUIS)
    =================================================== */
    let siswaSekarang = "";
    let submateriSekarang = 1;

// MASTER SOAL KUIS (DARI SISWA)
    const questionsSub1 = [
        { q: "Lingkungan adalah ...", a: ["Segala sesuatu yang ada di sekitar makhluk hidup dan memengaruhi kehidupannya", "Tempat tinggal manusia saja", "Tempat hidup hewan saja", "Tempat hidup tumbuhan saja"], c: 0 },
        { q: "Lingkungan tersusun atas dua komponen utama yaitu ...", a: ["Produsen dan konsumen", "Biotik dan abiotik", "Tumbuhan dan hewan", "Air dan tanah"], c: 1 },
        { q: "Komponen abiotik adalah ...", a: ["Makhluk hidup dalam ekosistem", "Organisme yang menghasilkan makanan", "Komponen tak hidup yang memengaruhi organisme", "Semua jenis tumbuhan"], c: 2 },
        { q: "Berikut ini yang termasuk komponen abiotik adalah ...", a: ["Tumbuhan", "Jamur", "Cahaya matahari", "Bakteri"], c: 2 },
        { q: "Jika tanaman tidak diberi air yang cukup maka pertumbuhannya akan ...", a: ["Lebih cepat", "Terhambat", "Tidak berubah", "Menjadi lebih besar"], c: 1 },
        { q: "Faktor lingkungan yang berperan penting dalam proses fotosintesis adalah ...", a: ["Tanah", "Cahaya matahari", "Angin", "Batu"], c: 1 },
        { q: "Contoh komponen biotik dalam suatu lingkungan adalah ...", a: ["Udara", "Air", "Tumbuhan", "Cahaya"], c: 2 },
        { q: "Interaksi antara makhluk hidup dengan lingkungannya dapat memengaruhi ...", a: ["Pertumbuhan dan kelangsungan hidup organisme", "Ukuran planet bumi", "Jumlah matahari", "Warna langit"], c: 0 },
        { q: "Kehidupan suatu organisme sangat dipengaruhi oleh ...", a: ["Komponen biotik saja", "Komponen abiotik saja", "Komponen biotik dan abiotik", "Cuaca saja"], c: 2 },
        { q: "Contoh pengaruh lingkungan terhadap organisme adalah ...", a: ["Tanaman tumbuh lebih cepat ketika mendapatkan cukup air dan cahaya", "Batu berubah menjadi tumbuhan", "Air berubah menjadi hewan", "Tanah berubah menjadi udara"], c: 0 }
    ];

// MASTER SOAL KUIS 2 (Ekosistem, Rantai Makanan & Siklus)
const questionsSub2 = [
    { q: "Ekosistem adalah ...", a: ["Hubungan antara makhluk hidup dengan teknologi", "Interaksi antara makhluk hidup dan lingkungan tak hidup", "Hubungan antara manusia dan hewan", "Tempat hidup manusia saja"], c: 1 },
    { q: "Yang termasuk komponen abiotik dalam ekosistem adalah ...", a: ["Tumbuhan", "Hewan", "Jamur", "Cahaya matahari"], c: 3 },
    { q: "Kumpulan individu sejenis yang hidup di tempat tertentu disebut ...", a: ["Individu", "Populasi", "Komunitas", "Ekosistem"], c: 1 },
    { q: "Organisme yang mampu membuat makanan sendiri melalui fotosintesis disebut ...", a: ["Produsen", "Konsumen", "Dekomposer", "Predator"], c: 0 },
    { q: "Proses perpindahan energi dari satu makhluk hidup ke makhluk hidup lain melalui peristiwa makan dan dimakan disebut ...", a: ["Simbiosis", "Rantai makanan", "Habitat", "Adaptasi"], c: 1 },
    { q: "Dalam rantai makanan, belalang yang memakan tumbuhan berperan sebagai ...", a: ["Produsen", "Konsumen primer", "Konsumen sekunder", "Dekomposer"], c: 1 },
    { q: "Organisme yang menguraikan makhluk hidup yang mati menjadi zat sederhana disebut ...", a: ["Produsen", "Konsumen", "Dekomposer", "Herbivora"], c: 2 },
    { q: "Proses penguapan air dari permukaan bumi karena panas matahari dalam siklus air disebut ...", a: ["Kondensasi", "Evaporasi", "Presipitasi", "Infiltrasi"], c: 1 },
    { q: "Proses berubahnya uap air menjadi titik-titik air sehingga membentuk awan disebut ...", a: ["Evaporasi", "Transpirasi", "Kondensasi", "Presipitasi"], c: 2 },
    { q: "Dalam daur karbon, tumbuhan menyerap karbon dioksida dari udara melalui proses ...", a: ["Respirasi", "Fotosintesis", "Transpirasi", "Fermentasi"], c: 1 }
];

// MASTER SOAL KUIS 3 (Pengaruh Manusia terhadap Ekosistem)
const questionsSub3 = [
    { q: "Dampak negatif dari penerapan sistem pertanian monokultur terhadap lingkungan adalah ...", a: ["Meningkatkan kesuburan tanah", "Menurunkan keanekaragaman hayati", "Memperbanyak jumlah spesies asli", "Memperbaiki ekosistem hutan"], c: 1 },
    { q: "Penggunaan pupuk kimia secara berlebihan dalam bidang pertanian dapat mengakibatkan dampak buruk pada perairan, yaitu ...", a: ["Eutrofikasi perairan", "Berkurangnya gas rumah kaca", "Meningkatnya spesies hewan langka", "Terjadinya hujan asam"], c: 0 },
    { q: "Alih fungsi lahan hutan menjadi perkebunan kelapa sawit atau kawasan pertambangan dapat menyebabkan ...", a: ["Tumbuhan dan hewan kehilangan habitat alami", "Bertambahnya sumber energi alternatif", "Menurunnya suhu bumi secara drastis", "Kualitas udara semakin membaik"], c: 0 },
    { q: "Peristiwa hujan asam yang dapat merusak hutan dan membuat jembatan mudah berkarat disebabkan oleh polutan ...", a: ["Karbon dioksida dan karbon monoksida", "Sulfur oksida dan nitrogen oksida", "Oksigen dan hidrogen", "Metana dan klorofluorokarbon (CFC)"], c: 1 },
    { q: "Terakumulasinya gas karbon dioksida di udara menyebabkan terperangkapnya energi cahaya matahari di bumi. Peristiwa ini berdampak pada ...", a: ["Eutrofikasi", "Hujan asam", "Pemanasan global", "Peningkatan habitat hewan"], c: 2 },
    { q: "Berikut ini yang BUKAN merupakan dampak dari perubahan iklim global adalah ...", a: ["Mencairnya es di kutub", "Cuaca ekstrem dan angin puting beliung", "Musim kemarau yang berkepanjangan", "Meningkatnya keanekaragaman hayati di laut"], c: 3 },
    { q: "Sejak tahun 1800-an, salah satu penyebab utama naiknya gas rumah kaca yang memicu perubahan iklim adalah ...", a: ["Pembakaran bahan bakar fosil", "Penanaman pohon di area perkotaan", "Penggunaan pupuk organik", "Pembuatan suaka margasatwa"], c: 0 },
    { q: "Upaya untuk melindungi dan melestarikan sumber daya alam agar tetap tersedia bagi generasi mendatang disebut ...", a: ["Eksploitasi", "Polusi", "Konservasi", "Deforestasi"], c: 2 },
    { q: "Salah satu kegiatan nyata berwawasan lingkungan yang dapat dilakukan manusia untuk memperlambat penurunan keanekaragaman hayati adalah ...", a: ["Membuang limbah pabrik langsung ke sungai", "Daur ulang sampah dan penggunaan energi alternatif", "Membakar hutan untuk membuka lahan baru", "Menebang pohon tanpa reboisasi"], c: 1 },
    { q: "Strategi yang dapat dilakukan oleh manusia untuk melestarikan spesies makhluk hidup yang terancam punah adalah melalui ...", a: ["Program penangkaran dan pembuatan bank benih", "Perburuan liar satwa eksotis", "Sistem pertanian monokultur", "Penebangan pohon di taman nasional"], c: 0 }
];

// MASTER SOAL KUIS 4 (Konservasi Lingkungan)
const questionsSub4 = [
    { q: "Konservasi adalah upaya untuk ...", a: ["Menghabiskan sumber daya alam", "Melindungi dan melestarikan sumber daya alam", "Memanfaatkan alam tanpa batas", "Mengubah ekosistem secara besar-besaran"], c: 1 },
    { q: "Tujuan utama kegiatan konservasi adalah ...", a: ["Menambah jumlah penduduk", "Menjaga kelestarian makhluk hidup dan lingkungannya", "Mengganti semua hutan menjadi kota", "Mengurangi jumlah hewan di alam"], c: 1 },
    { q: "Konservasi yang dilakukan di habitat asli makhluk hidup disebut ...", a: ["Konservasi ex-situ", "Konservasi buatan", "Konservasi in-situ", "Konservasi industri"], c: 2 },
    { q: "Contoh konservasi in-situ adalah ...", a: ["Kebun binatang", "Taman nasional", "Laboratorium", "Akuarium rumah"], c: 1 },
    { q: "Konservasi ex-situ merupakan pelestarian makhluk hidup yang dilakukan ...", a: ["Di habitat aslinya", "Di luar habitat aslinya", "Di laut saja", "Di hutan saja"], c: 1 },
    { q: "Contoh tempat konservasi ex-situ adalah ...", a: ["Suaka margasatwa", "Cagar alam", "Kebun binatang", "Hutan lindung"], c: 2 },
    { q: "Salah satu manfaat konservasi bagi lingkungan adalah ...", a: ["Mengurangi keanekaragaman hayati", "Menjaga keseimbangan ekosistem", "Mempercepat kepunahan hewan", "Menghilangkan habitat alami"], c: 1 },
    { q: "Konservasi juga memberikan manfaat ekonomi karena ...", a: ["Dapat mendukung kegiatan wisata alam", "Menyebabkan kerusakan lingkungan", "Mengurangi jumlah tumbuhan", "Membatasi aktivitas manusia sepenuhnya"], c: 0 },
    { q: "Kawasan yang digunakan untuk melindungi berbagai jenis satwa liar disebut ...", a: ["Suaka margasatwa", "Kebun raya", "Laboratorium", "Museum"], c: 0 },
    { q: "Salah satu tindakan sederhana yang dapat dilakukan untuk mendukung konservasi adalah ...", a: ["Menebang hutan", "Membuang sampah ke sungai", "Menanam pohon", "Membakar hutan"], c: 2 }
];

    // Nanti lu tambahin array questionsSub2, questionsSub3, questionsSub4 ya bro sesuai data lu

// Fungsi Buka Modal Pop-up
window.bukaDetailKuisSiswa = function(idSiswa) {
        siswaSekarang = idSiswa; // Kita pakai ID sekarang, bukan nama
        
        // Cari data siswanya dari array yang dikirim Laravel
        const siswa = dataRealSiswa.find(s => s.id == idSiswa);
        if (!siswa) return;
        
        document.getElementById("namaSiswaTerpilih").textContent = siswa.nama_lengkap;
        
        const modalDetail = document.getElementById("modalDetailSiswa");
        if (modalDetail) {
            modalDetail.classList.add("show");
            document.body.style.overflow = "hidden";
            
            // Set tab awal ke Submateri 1
            const tabs = document.querySelectorAll(".btn-sub-tab");
            tabs.forEach((t, i) => {
                if(i === 0) t.classList.add("active");
                else t.classList.remove("active");
            });

            // Tampilkan data awal (Submateri 1)
            renderDataKuisAsli(1, siswa);
        }
    };

    // Fungsi Tutup Modal Pop-up
    window.tutupDetailSiswa = function() {
        const modalDetail = document.getElementById("modalDetailSiswa");
        if (modalDetail) {
            // Sembunyikan Modal & Kembalikan Scroll Halaman Belakang
            modalDetail.classList.remove("show");
            document.body.style.overflow = "";
        }
    };

window.gantiSubmateri = function(subNum, btn) {
        submateriSekarang = subNum;
        const tabs = document.querySelectorAll(".btn-sub-tab");
        tabs.forEach(t => t.classList.remove("active"));
        btn.classList.add("active");
        
        const siswa = dataRealSiswa.find(s => s.id == siswaSekarang);
        renderDataKuisAsli(subNum, siswa);
    };

function renderDataKuisAsli(subNum, siswa) {
        const kuisData = siswa[`kuis_${subNum}`]; 
        const listKuisDetail = document.getElementById("listKuisDetail");
        
        if (listKuisDetail) listKuisDetail.innerHTML = "";

        if (!kuisData) {
            document.getElementById("skorKuis").textContent = "0";
            document.getElementById("detailKuis").textContent = `✔️ Benar: 0 | ❌ Salah: 0`;
            if (listKuisDetail) listKuisDetail.innerHTML = "<p style='font-size: 13px; color: #94a3b8; text-align: center; padding: 20px;'>Siswa belum mengerjakan kuis ini.</p>";
            return;
        }

        document.getElementById("skorKuis").textContent = kuisData.skor;
        document.getElementById("detailKuis").textContent = `✔️ Benar: ${kuisData.jumlah_benar} | ❌ Salah: ${kuisData.jumlah_salah}`;

        let polaJawaban = [];
        try { 
            polaJawaban = JSON.parse(kuisData.pola_jawaban); 
            if (typeof polaJawaban === 'string') polaJawaban = JSON.parse(polaJawaban);
        } catch(e) { console.error("Pola error:", e); }

let masterSoal = [];
        if (subNum === 1) {
            masterSoal = questionsSub1;
        } else if (subNum === 2) {
            masterSoal = questionsSub2;
        } else if (subNum === 3) {
            masterSoal = questionsSub3;
        } else if (subNum === 4) {
            masterSoal = questionsSub4;
        }

        if (listKuisDetail && polaJawaban && polaJawaban.length > 0) {
            polaJawaban.forEach((userAnswerIndex, index) => {
                let qText = "Soal tidak ditemukan";
                let correctAnsText = "-";
                let userAnsText = "Tidak dijawab";
                let isCorrect = false;

                // Cocokkan jawaban dengan master soal
                if (masterSoal[index]) {
                    const q = masterSoal[index];
                    qText = q.q;
                    correctAnsText = q.a[q.c];

                    // Cek apa yang dipencet siswa
                    if (userAnswerIndex !== null && userAnswerIndex !== undefined) {
                        userAnsText = q.a[userAnswerIndex] || "Tidak dijawab";
                        isCorrect = (userAnswerIndex === q.c);
                    }
                }

                // Bikin Elemen Kotak ala Halaman Evaluasi
                const itemDiv = document.createElement("div");
                itemDiv.className = "essay-review-item"; 
                itemDiv.style.marginBottom = "15px";

                let statusBadge = isCorrect 
                    ? `<span style="color: #16a34a; font-weight: bold; font-size: 12px; float: right;"><i class="fa-solid fa-check"></i> Benar</span>` 
                    : `<span style="color: #dc2626; font-weight: bold; font-size: 12px; float: right;"><i class="fa-solid fa-xmark"></i> Salah</span>`;

                itemDiv.innerHTML = `
                    <div class="essay-q-title" style="margin-bottom: 8px;">Soal ${index + 1}: ${qText} ${statusBadge}</div>
                    
                    <div class="essay-student-ans" style="margin-bottom: 8px; ${isCorrect ? 'border-left: 3px solid #16a34a;' : 'border-left: 3px solid #dc2626;'}">
                        <strong>Jawaban Siswa:</strong><br>${userAnsText}
                    </div>
                    
                    ${!isCorrect ? `
                    <div class="essay-grading-zone" style="background: #f0fdf4; border-left: 3px solid #16a34a; padding: 10px; margin-top: 5px;">
                        <strong>Kunci Jawaban:</strong><br>${correctAnsText}
                    </div>
                    ` : ''}
                `;
                
                listKuisDetail.appendChild(itemDiv);
            });
        } else if (listKuisDetail) {
            listKuisDetail.innerHTML = "<p style='font-size: 13px; color: #dc2626; text-align: center; padding: 20px;'>Data jawaban tidak terbaca.</p>";
        }
    }
    function renderDataNilai(subNum) {
        const dataSiswa = databaseDummy[siswaSekarang][subNum];
        if (!dataSiswa) return;
        
        document.getElementById("skorLatihan").textContent = dataSiswa.L.skor;
        document.getElementById("detailLatihan").textContent = `✔️ Benar: ${dataSiswa.L.b} | ❌ Salah: ${dataSiswa.L.s}`;
        
        document.getElementById("skorKuis").textContent = dataSiswa.K.skor;
        document.getElementById("detailKuis").textContent = `✔️ Benar: ${dataSiswa.K.b} | ❌ Salah: ${dataSiswa.K.s}`;

        const gridLatihan = document.getElementById("gridLatihan");
        if (gridLatihan) {
            gridLatihan.innerHTML = "";
            dataSiswa.L.pola.forEach((status, index) => {
                const box = document.createElement("div");
                box.className = `q-box ${status === 1 ? 'correct' : 'wrong'}`;
                box.textContent = index + 1;
                box.title = `Soal Nomor ${index + 1}: ${status === 1 ? 'Benar' : 'Salah'}`;
                gridLatihan.appendChild(box);
            });
        }

        const gridKuis = document.getElementById("gridKuis");
        if (gridKuis) {
            gridKuis.innerHTML = "";
            dataSiswa.K.pola.forEach((status, index) => {
                const box = document.createElement("div");
                box.className = `q-box ${status === 1 ? 'correct' : 'wrong'}`;
                box.textContent = index + 1;
                box.title = `Soal Nomor ${index + 1}: ${status === 1 ? 'Benar' : 'Salah'}`;
                gridKuis.appendChild(box);
            });
        }
        
        const txtKomentar = document.getElementById("txtKomentarGuru");
        if (txtKomentar) txtKomentar.value = "";
    }

    window.simpanKomentarGuru = function() {
        const txtKomentar = document.getElementById("txtKomentarGuru");
        if (!txtKomentar) return;
        
        const isiKomentar = txtKomentar.value.trim();
        if(isiKomentar === "") {
            alert("Silakan ketik komentar atau rekomendasinya terlebih dahulu, ya Bapak/Ibu.");
            return;
        }
        alert(`Komentar sukses disimpan untuk ${siswaSekarang} pada Submateri ${submateriSekarang}! 🎉`);
        txtKomentar.value = "";
    };

    /* ===================================================
       7. LOGIKA HALAMAN REKAP EVALUASI AKHIR (ESAI)
    =================================================== */
    let siswaEvaluasiSekarang = "";

    // Data teks soal esai (21-25) agar guru tahu konteks pertanyaan HOTS-nya
    const soalEsaiHots = [
        "Jelaskan rantai makanan yang terganggu akibat punahnya ular di ekosistem sawah!",
        "Mengapa tumbuhan lumut kerak disebut sebagai vegetasi perintis pada batuan sisa lahar?",
        "Analisis hubungan logis penebangan hutan dengan meningkatnya suhu bumi global!",
        "Bagaimana air panas limbah pabrik bisa membunuh ekosistem ikan sungai secara ilmiah?",
        "Jelaskan perbedaan esensial antara pelestarian hewan komodo secara In-situ dan Ex-situ!"
    ];

    // Dummy DB Jawaban Ujian Akhir Siswa
// GANTI baris 'const databaseEvaluasiDummy = { ... }' lama kamu dengan baris sakti ini:
    const databaseEvaluasiDummy = typeof dataEvaluasiDariDatabase !== 'undefined' 
        ? dataEvaluasiDariDatabase 
        : {
            "Ahmad Budi Santoso": { /* ... isi data dummy lama kamu ... */ },
            "Siti Aminah": { /* ... isi data dummy lama kamu ... */ }
        };

    // Fungsi Buka Modal Evaluasi
// Fungsi Buka Modal Evaluasi
    window.bukaEvaluasiSiswa = function(nama) {
        siswaEvaluasiSekarang = nama;
        const txtNama = document.getElementById("namaSiswaEvaluasi");
        const modalEvaluasi = document.getElementById("modalEvaluasiSiswa");
        const dataSiswa = databaseEvaluasiDummy[nama];

        if (txtNama && modalEvaluasi && dataSiswa) {
            txtNama.textContent = nama;
            modalEvaluasi.classList.add("show");
            document.body.style.overflow = "hidden"; // Kunci scroll layar utama

            // 1. Render Informasi Skor Pilgan
            document.getElementById("txtSkorPilgan").textContent = `Skor Pilgan: ${dataSiswa.pilgan.skor} / 100`;
            document.getElementById("txtDetailPilgan").textContent = `✔️ Benar: ${dataSiswa.pilgan.b} Soal | ❌ Salah: ${dataSiswa.pilgan.s} Soal`;

            // 2. Render Kotak Analisis Pilgan Horizontal (1-20)
            const gridPilgan = document.getElementById("gridEvaluasiPilgan");
            gridPilgan.innerHTML = "";
            dataSiswa.pilgan.pola.forEach((status, idx) => {
                const box = document.createElement("div");
                box.className = `q-box ${status === 1 ? 'correct' : 'wrong'}`;
                box.textContent = idx + 1;
                box.title = `Soal ${idx + 1}: ${status === 1 ? 'Benar' : 'Salah'}`;
                gridPilgan.appendChild(box);
            });

            // 3. Render Daftar Koreksi Jawaban Esai (21-25)
            const listEsai = document.getElementById("listEvaluasiEsai");
            listEsai.innerHTML = "";
            dataSiswa.esai.forEach((jawaban, idx) => {
                const item = document.createElement("div");
                item.className = "essay-review-item";
                item.innerHTML = `
                    <div class="essay-q-title">Soal ${idx + 21}: ${soalEsaiHots[idx]}</div>
                    <div class="essay-student-ans">
                        <strong>Jawaban Siswa:</strong><br>${jawaban}
                    </div>
                    <div class="essay-grading-zone">
                        <label for="score_${idx + 21}">Beri Nilai (0-20):</label>
                        <input type="number" id="score_${idx + 21}" class="input-skor-esai" min="0" max="20" placeholder="0">
                    </div>
                `;
                // 🔥 INI YANG DIPERBAIKI (Tadinya ada box.parentNode yang bikin error) 🔥
                listEsai.appendChild(item); 
            });

            document.getElementById("txtKomentarEvaluasi").value = "";
        }
    };

    // Fungsi Tutup Modal Evaluasi
    window.tutupEvaluasiSiswa = function() {
        const modalEvaluasi = document.getElementById("modalEvaluasiSiswa");
        if (modalEvaluasi) {
            modalEvaluasi.classList.remove("show");
            document.body.style.overflow = ""; // Lepas kunci scroll
        }
    };

    // Fungsi Tombol Simpan Hasil Koreksi
window.simpanKoreksiEvaluasi = function() {
        const txtKomentar = document.getElementById("txtKomentarEvaluasi");
        if (!txtKomentar || txtKomentar.value.trim() === "") {
            alert("Harap berikan komentar evaluasi akhir untuk siswa terlebih dahulu, ya Bapak/Ibu.");
            return;
        }

        const komentar = txtKomentar.value.trim();
        // Ambil token keamanan Laravel dari tag meta di Langkah 1
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Kirim data ke Controller menggunakan Fetch API
        fetch('/guru/evaluasi/simpan', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({
                nama_siswa: siswaEvaluasiSekarang,
                komentar: komentar
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert(`Catatan untuk ${siswaEvaluasiSekarang} berhasil disimpan ke sistem! 🎉`);
                window.tutupEvaluasiSiswa();
                location.reload(); // Refresh halaman otomatis biar status badge berubah jadi "Sudah Dinilai"
            } else {
                alert("Gagal menyimpan: " + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert("Terjadi kesalahan sistem saat menghubungi server.");
        });
    };

    /* =================================================
   8. LOGIKA HALAMAN DATA SISWA (MODAL INFO)
================================================= */
window.bukaDetailInfoSiswa = function(nama, nis, kelas) {
    // Masukkin data dari tombol ke dalam teks pop-up
    document.getElementById("infoNama").textContent = nama;
    document.getElementById("infoNis").textContent = nis;
    document.getElementById("infoKelas").textContent = kelas;
    
    // Tampilkan Modal
    const modalInfo = document.getElementById("modalInfoSiswa");
    if (modalInfo) {
        modalInfo.classList.add("show");
        document.body.style.overflow = "hidden"; // Kunci scroll layar belakang
    }
};

window.tutupDetailInfoSiswa = function() {
    // Sembunyikan Modal
    const modalInfo = document.getElementById("modalInfoSiswa");
    if (modalInfo) {
        modalInfo.classList.remove("show");
        document.body.style.overflow = ""; // Buka lagi scroll-nya
    }
};

/* =================================================
   9. FITUR FILTER KELAS DI HALAMAN DATA SISWA
================================================= */
document.addEventListener('DOMContentLoaded', function() {
    // Ambil elemen dropdown filter kelas dan semua baris tabel
    const filterDropdown = document.querySelector('.filter-kelas');
    const tableRows = document.querySelectorAll('.data-table tbody tr');

    if (filterDropdown) {
        filterDropdown.addEventListener('change', function() {
            // Ambil nilai yang dipilih (misal: '7a', '7b', atau 'all')
            const selectedKelas = this.value.toLowerCase();

            // Cek setiap baris siswa di tabel
            tableRows.forEach(row => {
                // Ambil teks dari kolom ke-4 (indeks 3) yaitu kolom Kelas
                const kelasSiswa = row.cells[3].textContent.trim().toLowerCase();

                // Logika tampilkan/sembunyikan
                if (selectedKelas === 'all' || kelasSiswa === selectedKelas) {
                    row.style.display = ''; // Munculkan baris
                } else {
                    row.style.display = 'none'; // Sembunyikan baris
                }
            });
        });
    }
});