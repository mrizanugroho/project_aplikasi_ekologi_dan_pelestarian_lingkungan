// =======================
// DATA SISWA (SAMA KAYAK DASHBOARD)
// =======================
let siswa = [
  { nama: "Andi", nis: "701", kuis: 80, evaluasi: 85 },
  { nama: "Budi", nis: "702", kuis: 70, evaluasi: 75 },
  { nama: "Citra", nis: "703", kuis: 90, evaluasi: 88 },
  { nama: "Dewi", nis: "704", kuis: 60, evaluasi: 70 },
  { nama: "Eka", nis: "705", kuis: 75, evaluasi: 65 }
];


// =======================
// HITUNG NILAI AKHIR
// =======================
function hitungNilaiAkhir(kuis, evaluasi) {
  return (kuis * 0.4 + evaluasi * 0.6).toFixed(1);
}


// =======================
// STATUS NILAI
// =======================
function getStatus(nilai) {
  if (nilai >= 85) return "Sangat Baik";
  if (nilai >= 70) return "Baik";
  return "Perlu Perbaikan";
}


// =======================
// RENDER TABEL
// =======================
function renderTable(data = siswa) {
  const tbody = document.querySelector("#tbl-siswa tbody");
  tbody.innerHTML = "";

  data.forEach((s, i) => {
    const nilaiAkhir = hitungNilaiAkhir(s.kuis, s.evaluasi);
    const status = getStatus(nilaiAkhir);

    tbody.innerHTML += `
      <tr>
        <td>${i + 1}</td>
        <td>${s.nama}</td>
        <td>${s.nis}</td>
        <td>${s.kuis}</td>
        <td>${s.evaluasi}</td>
        <td>${nilaiAkhir}</td>
        <td>${status}</td>
      </tr>
    `;
  });
}


// =======================
// UPDATE KPI
// =======================
function updateKPI() {
  const total = siswa.length;

  const totalKuis = siswa.reduce((sum, s) => sum + s.kuis, 0);
  const avgKuis = (totalKuis / total).toFixed(1);

  document.getElementById("total-siswa").innerText = total;
  document.getElementById("avg-kuis").innerText = avgKuis;
}


// =======================
// SEARCH
// =======================
function applySearch() {
  const keyword = document.getElementById("search-siswa").value.toLowerCase();

  const result = siswa.filter(s =>
    s.nama.toLowerCase().includes(keyword) ||
    s.nis.includes(keyword)
  );

  renderTable(result);
}


// =======================
// RESET
// =======================
document.getElementById("reset-siswa").onclick = () => {
  document.getElementById("search-siswa").value = "";
  renderTable();
};


// =======================
// EVENT
// =======================
document.getElementById("search-siswa").addEventListener("input", applySearch);


// =======================
// INIT
// =======================
function init() {
  renderTable();
  updateKPI();
}

init();