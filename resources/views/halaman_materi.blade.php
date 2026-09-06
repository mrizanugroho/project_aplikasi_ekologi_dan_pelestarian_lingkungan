<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Materi | Ekosistem</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <script defer src="{{ asset('js/script.js') }}"></script>
</head>
@php
    // Cek jumlah kuis yang udah dikerjain siswa ini
    $kuisSelesai = \Illuminate\Support\Facades\DB::table('kuis_submateri')
                     ->where('user_id', session('user_id'))
                     ->count();
@endphp
<body class="materi-body">
  <header class="kompetensi-header">
    <h1>📚 PILIH MATERI</h1>
    <p>Media Pembelajaran Interaktif Ekosistem</p>
    <p class="kelas-info">SMP Kelas 7 | Semester Genap</p>
  </header>

  <main class="kompetensi-container">
    <div class="card-grid">
      <div class="materi-card active" onclick="window.location.href='{{ url('/materi1/tujuan') }}'">
        <img src="{{ asset('img/ekosistem.png') }}" alt="Ekosistem">
        <h2>🌱 Bagaimanakah Pengaruh Lingkungan terhadap Suatu Organisme?</h2>
        <p>Pelajari tentang komponen biotik dan abiotik serta bagaimana keduanya saling berinteraksi.</p>
      </div>

      <div class="materi-card active" onclick="window.location.href='{{ url('/materi2/tujuan') }}'">
        <img src="{{ asset('img/balance.png') }}" alt="Organisasi Kehidupan">
        <h2>💧 Tingkatan Organisasi Kehidupan dalam Ekologi dan Interaksinya</h2>
        <p>Kenali berbagai tingkatan organisasi kehidupan dari individu hingga ekosistem.</p>
      </div>

      <div class="materi-card active" onclick="window.location.href='{{ url('/materi3/tujuan') }}'">
        <img src="{{ asset('img/industrial.png') }}" alt="Industrial">
        <h2>⚖️ Bagaimanakah Pengaruh Manusia terhadap Ekosistem?</h2>
        <p>Temukan bagaimana aktivitas manusia dapat memengaruhi keseimbangan lingkungan.</p>
      </div>

      <div class="materi-card active" onclick="window.location.href='{{ url('/materi4/tujuan') }}'">
        <img src="{{ asset('img/environment.png') }}" alt="Konservasi">
        <h2>🌏 Mengapa Harus Dilakukan Konservasi Keanekaragaman Hayati?</h2>
        <p>Pahami pentingnya konservasi dan upaya menjaga keanekaragaman hayati di sekitar kita.</p>
      </div>

<!-- Logika Penguncian Evaluasi Akhir -->
      @if($kuisSelesai >= 4)
          <!-- Tampilan kalau sudah lulus 4 kuis (Kebuka) -->
          <div class="materi-card active" onclick="window.location.href='{{ url('/evaluasi') }}'" style="border: 2px solid #3182ce; background-color: #ebf8ff;">
            <img src="{{ asset('img/evaluation.png') }}" alt="Evaluasi Akhir" onerror="this.src='https://placehold.co/100x100?text=📝'">
            <h2>📝 Evaluasi Akhir Bab Ekosistem</h2>
            <p>Sudah menyelesaikan semua submateri? Yuk, uji kemampuan komprehensifmu di halaman evaluasi akhir!</p>
          </div>
      @else
          <!-- Tampilan kalau kuis belum lengkap (Digembok) -->
          <div class="materi-card locked" onclick="alert('Selesaikan ke-4 Kuis Submateri terlebih dahulu untuk membuka Evaluasi Akhir!')" style="border: 2px solid #a0aec0; background-color: #f7fafc; opacity: 0.7; cursor: not-allowed;">
            <img src="{{ asset('img/evaluation.png') }}" alt="Evaluasi Akhir" style="filter: grayscale(100%);">
            <h2>🔒 Evaluasi Akhir Bab Ekosistem (Terkunci)</h2>
            <p>Kamu baru menyelesaikan <strong>{{ $kuisSelesai }} dari 4</strong> kuis. Selesaikan semua submateri untuk membuka halaman ini!</p>
          </div>
      @endif

    </div>
  </main>

  <div style="text-align: center; margin-top: 30px; margin-bottom: 30px;">
    <a href="{{ url('/materi') }}" style="color: white; text-decoration: none; font-weight: bold; background: #2c3e50; padding: 10px 20px; border-radius: 8px;">← Kembali ke Menu</a>
  </div>

  <!-- POP UP PREVENT (Muncul otomatis kalau dicegat Satpam URL) -->
@if(session('popup_prevent'))
<div id="preventModal" style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background: rgba(15, 23, 42, 0.7); backdrop-filter: blur(4px); z-index: 9999; display: flex; justify-content: center; align-items: center; animation: fadeIn 0.3s ease;">
    <div style="background: white; padding: 35px; border-radius: 16px; text-align: center; max-width: 420px; box-shadow: 0 15px 30px rgba(0,0,0,0.2); transform: translateY(-20px); animation: slideDown 0.4s ease forwards;">
        <div style="font-size: 55px; margin-bottom: 10px;">🏆</div>
        <h3 style="color: #16a34a; font-size: 22px; margin-bottom: 10px; font-weight: 700;">Misi Sudah Selesai!</h3>
        <p style="color: #475569; font-size: 15px; margin-bottom: 25px; line-height: 1.5;">
            Hebat, Detektif! Kamu sudah menuntaskan latihan dan kuis di <b>{{ session('popup_prevent') }}</b>. Silakan eksplorasi materi yang belum terbuka!
        </p>
        <button onclick="document.getElementById('preventModal').style.display='none'" style="background: #16a34a; color: white; border: none; padding: 12px 24px; border-radius: 8px; cursor: pointer; font-weight: 600; font-size: 15px; width: 100%; transition: 0.2s;">
            Oke, Mengerti
        </button>
    </div>
</div>

<style>
    @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
    @keyframes slideDown { from { transform: translateY(-30px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
    #preventModal button:hover { background: #15803d; }
</style>
@endif

</body>
</html>