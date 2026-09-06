// =======================
// DATA SISWA (SHARED)
// =======================
// =======================
// DATA SISWA (DARI DATABASE LARAVEL)
// =======================
let siswa = [];

// Kita tangkap data dari jembatan Blade yang udah kamu bikin
if (typeof dataEvaluasiDariDatabase !== 'undefined' && Object.keys(dataEvaluasiDariDatabase).length > 0) {
    // Karena terkadang data dari Laravel bentuknya object (bukan array murni),
    // kita pastikan dia jadi array agar bisa di-looping pakai .forEach atau .filter
    siswa = Array.isArray(dataEvaluasiDariDatabase) 
            ? dataEvaluasiDariDatabase 
            : Object.values(dataEvaluasiDariDatabase);
} else {
    console.log("Data evaluasi dari database masih kosong nih bro.");
    siswa = []; 
}

// Fungsi saveData() yang pakai localStorage hapus aja bro, 
// karena nanti kalau guru nyimpen nilai esai/feedback, nembaknya pakai fetch() ke Controller Laravel.


// =======================
// SIMPAN KE STORAGE
// =======================
function saveData() {
  localStorage.setItem("siswaData", JSON.stringify(siswa));
}


// =======================
// RENDER TABEL
// =======================
function renderTable(data = siswa) {
  const tbody = document.querySelector("#tbl-evaluasi tbody");
  tbody.innerHTML = "";

  data.forEach((s, i) => {
    tbody.innerHTML += `
      <tr>
        <td>${i + 1}</td>
        <td>${s.nama}</td>
        <td>${s.nis}</td>
        <td>
          <input type="number" id="nilai-${i}" value="${s.evaluasi ?? ""}" placeholder="0-100">
        </td>
<td>
  <button onclick="openFeedback(${i})" class="btn">Isi Feedback</button>
</td>
        <td>
          <button onclick="simpan(${i})" class="btn primary">Simpan</button>
        </td>
      </tr>
    `;
  });
}


// =======================
// SIMPAN NILAI
// =======================
function simpan(index) {
  const nilai = document.getElementById(`nilai-${index}`).value;
  const feedback = document.getElementById(`fb-${index}`).value;

  siswa[index].evaluasi = nilai ? parseFloat(nilai) : null;
  siswa[index].feedback = feedback;

  saveData();
  updateKPI();

  alert("Data berhasil disimpan!");
}


// =======================
// KPI
// =======================
function updateKPI() {
  const total = siswa.length;
  const belum = siswa.filter(s => s.evaluasi === null).length;

  document.getElementById("total-siswa").innerText = total;
  document.getElementById("belum-dinilai").innerText = belum;
}


// =======================
// SEARCH
// =======================
function applySearch() {
  const keyword = document.getElementById("search-eval").value.toLowerCase();

  const result = siswa.filter(s =>
    s.nama.toLowerCase().includes(keyword) ||
    s.nis.includes(keyword)
  );

  renderTable(result);
}


// =======================
// RESET
// =======================
document.getElementById("reset-eval").onclick = () => {
  document.getElementById("search-eval").value = "";
  renderTable();
};


// =======================
// EVENT
// =======================
document.getElementById("search-eval").addEventListener("input", applySearch);


// =======================
// INIT
// =======================
function init() {
  renderTable();
  updateKPI();
}

init();

// SIMPAN INDEX YANG AKTIF
let currentIndex = null;

// BUKA MODAL
function openFeedback(index) {
  currentIndex = index;

  const data = siswa[index];
  document.getElementById("feedback-input").value = data.feedback || "";

  document.getElementById("modal-feedback").classList.remove("hidden");
}

// TUTUP MODAL
function closeFeedback() {
  document.getElementById("modal-feedback").classList.add("hidden");
}

// EVENT CLOSE
document.getElementById("close-feedback").onclick = closeFeedback;

// SIMPAN FEEDBACK
document.getElementById("save-feedback").onclick = () => {
  const text = document.getElementById("feedback-input").value;

  siswa[currentIndex].feedback = text;

  saveData();
  closeFeedback();

  alert("Feedback disimpan!");
};