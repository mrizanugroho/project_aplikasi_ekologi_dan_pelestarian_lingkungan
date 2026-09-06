<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Pengembang</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style_info.css') }}">
</head>
<body>

    <div class="background-layer"></div>

    <main class="container">

        <section class="card">

            <a href="{{ url('/materi') }}" class="back-button">← Kembali</a>

            <header class="card-header">
                <div class="icon-box">📘</div>
                <h1>Informasi Pengembang</h1>
                <p class="subtitle">Media Pembelajaran Interaktif Ekosistem</p>
            </header>

            <section class="info-section">
                <h2>👨‍🎓 Biodata Mahasiswa</h2>
                <div class="info-grid">
                    <div class="label">Nama</div>
                    <div class="value">Muhammad R...</div> </div>
            </section>

            <section class="info-section">
                <h2>👨‍🏫 Pembimbing</h2>
                <div class="info-grid">
                    <div class="label">Dosen Pembimbing I</div>
                    <div class="value">Dr. Andi Ichsan Mahardika, M.Pd.</div>

                    <div class="label">Dosen Pembimbing II</div>
                    <div class="value">Novan Alkaf Bahraini Saputra, S.Kom., M.T.</div>
                </div>
            </section>

            <section class="info-section">
                <h2>💻 Tentang Media</h2>
                <p class="description">
                    Website ini dikembangkan sebagai media pembelajaran interaktif
                    pada materi <strong>Ekosistem</strong> untuk siswa sekolah menengah.
                    Media ini memadukan materi, latihan soal, kuis interaktif,
                    serta evaluasi berbasis Computer Based Test (CBT).
                </p>
            </section>

            <section class="info-section">
                <h2>🔗 Pranala Luar</h2>
                <div class="link-group">
                    <a href="#" class="external-link">📄 Dokumen Skripsi</a>
                    <a href="#" class="external-link">🎓 Website Universitas</a>
                    <a href="#" class="external-link">💼 LinkedIn</a>
                </div>
            </section>

        </section>

    </main>

    <script src="{{ asset('js/script_info.js') }}"></script>
</body>
</html>