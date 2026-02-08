// dashboard_guru.js (mock data + UI) - front-end only
document.addEventListener('DOMContentLoaded', () => {
  const students = [
    { id:1, name:'Andi Susanto', nis:'001', pg:8, essay:3, evaluated:true },
    { id:2, name:'Budi Hartono', nis:'002', pg:6, essay:2, evaluated:false },
    { id:3, name:'Citra Dewi', nis:'003', pg:9, essay:4, evaluated:true },
    { id:4, name:'Dewi Putri', nis:'004', pg:4, essay:1, evaluated:false },
    { id:5, name:'Eko Prasetyo', nis:'005', pg:7, essay:3, evaluated:true },
  ];

  // refs
  const tbody = document.querySelector('#tbl tbody');
  const kTotal = document.getElementById('k-total');
  const kEval = document.getElementById('k-evaluated');
  const kAvg = document.getElementById('k-avg');
  const sideProgress = document.getElementById('side-progress');

  // render summary
  function renderSummary(list = students) {
    const total = list.length;
    const evaluated = list.filter(s => s.evaluated).length;
    const avg = Math.round(list.reduce((a,s)=> a + s.pg + s.essay,0) / (list.length * 15) * 100);
    kTotal.textContent = total;
    kEval.textContent = evaluated;
    kAvg.textContent = avg + '%';
    sideProgress.style.width = `${avg}%`;
  }

  // render table
  function renderTable(list = students) {
    tbody.innerHTML = '';
    list.forEach((s,i) => {
      const total = s.pg + s.essay;
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td>${i+1}</td>
        <td>${s.name}</td>
        <td>${s.nis}</td>
        <td>${s.pg}/10</td>
        <td>${s.essay}/5</td>
        <td>${total}/15</td>
        <td><span class="status-chip">${s.evaluated ? 'Dinilai' : 'Belum'}</span></td>
        <td>
          <button class="btn view" data-id="${s.id}">Lihat</button>
          <button class="btn mark" data-id="${s.id}">${s.evaluated ? 'Batal' : 'Tandai'}</button>
        </td>`;
      tbody.appendChild(tr);
    });

    // attach
    document.querySelectorAll('.view').forEach(b => b.addEventListener('click', onView));
    document.querySelectorAll('.mark').forEach(b => b.addEventListener('click', onToggle));
  }

  // handlers
  function onView(e){
    const id = +e.currentTarget.dataset.id;
    const s = students.find(x=>x.id===id);
    openModal(s);
  }
  function onToggle(e){
    const id = +e.currentTarget.dataset.id;
    const s = students.find(x=>x.id===id);
    s.evaluated = !s.evaluated;
    renderTable();
    renderSummary();
  }

  // modal
  const modal = document.getElementById('modal');
  const modalTitle = document.getElementById('modal-title');
  const modalBody = document.getElementById('modal-body');
  const modalClose = document.getElementById('modal-close');
  const modalOk = document.getElementById('modal-ok');
  const modalMark = document.getElementById('modal-mark');
  let currentId = null;

  function openModal(s){
    currentId = s.id;
    modalTitle.textContent = `${s.name} • NIS ${s.nis}`;
    modalBody.innerHTML = `
      <p><strong>PG:</strong> ${s.pg} / 10</p>
      <p><strong>Esai:</strong> ${s.essay} / 5</p>
      <hr/>
      <p><strong>Contoh detail jawaban:</strong></p>
      <ol>
        <li>Soal 1: Benar</li>
        <li>Soal 2: Salah</li>
      </ol>
    `;
    modal.classList.remove('hidden');
  }
  modalClose.addEventListener('click', ()=>modal.classList.add('hidden'));
  modalOk.addEventListener('click', ()=>modal.classList.add('hidden'));
  modalMark.addEventListener('click', ()=> {
    const s = students.find(x=>x.id===currentId);
    if (s) s.evaluated = true;
    modal.classList.add('hidden');
    renderTable();
    renderSummary();
  });

  // search/filter
  const search = document.getElementById('search');
  const filterStatus = document.getElementById('filter-status');
  const reset = document.getElementById('reset');

  function applyFilter(){
    const q = (search.value || '').toLowerCase();
    const status = filterStatus.value;
    const filtered = students.filter(s=>{
      const matchQ = !q || s.name.toLowerCase().includes(q) || s.nis.includes(q);
      const matchS = status==='all' || (status==='done' && s.evaluated) || (status==='todo' && !s.evaluated);
      return matchQ && matchS;
    });
    renderTable(filtered);
    renderSummary(filtered);
  }
  search.addEventListener('input', applyFilter);
  filterStatus.addEventListener('change', applyFilter);
  reset.addEventListener('click', ()=>{ search.value=''; filterStatus.value='all'; applyFilter(); });

  // bulk mark
  document.getElementById('bulk-mark').addEventListener('click', ()=>{
    students.forEach(s=> s.evaluated = true);
    renderTable(); renderSummary();
  });

  // export (CSV)
  document.getElementById('btn-export').addEventListener('click', ()=>{
    const rows = [['Nama','NIS','PG','Esai','Total','Status']];
    students.forEach(s => rows.push([s.name,s.nis,s.pg,s.essay,(s.pg+s.essay),(s.evaluated ? 'Dinilai':'Belum')]));
    const csv = rows.map(r => r.map(c=>`"${String(c).replace(/"/g,'""')}"`).join(',')).join('\n');
    const blob = new Blob([csv], {type: 'text/csv'});
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a'); a.href=url; a.download='hasil_evaluasi.csv'; a.click();
    URL.revokeObjectURL(url);
  });

  // init
  renderSummary();
  renderTable();
});
