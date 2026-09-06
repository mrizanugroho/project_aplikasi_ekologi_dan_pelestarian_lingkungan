<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capaian Pembelajaran</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style_info.css') }}">
</head>
<body>

    <div class="background-layer"></div>

    <main class="container">

        <section class="card">

            <a href="{{ url('/materi') }}" class="back-button">← Kembali</a>

            <header class="card-header">
                <div class="icon-box">🎯</div>
                <h1>Capaian Pembelajaran</h1>
                <p class="subtitle">IPA SMP Kelas VII – Materi Ekosistem</p>
            </header>

            <section class="info-section">
                <h2>🌱 Deskripsi Umum</h2>
                <p class="description">
                    Pada akhir pembelajaran, peserta didik mampu memahami dan 
                    menganalisis interaksi antara makhluk hidup dan lingkungannya, 
                    serta merancang upaya-upaya konservasi lingkungan sekitar.
                </p>
            </section>

            <section class="info-section">
                <h2>🧠 Pemahaman IPA</h2>
                <div class="info-grid">
                    <div class="label">1</div>
                    <div class="value">Mengidentifikasi komponen biotik dan abiotik dalam suatu ekosistem.</div>

                    <div class="label">2</div>
                    <div class="value">Menganalisis interaksi antar makhluk hidup seperti rantai makanan, jaring-jaring makanan, dan predasi.</div>
                </div>
            </section>

            <section class="info-section">
                <h2>🔬 Keterampilan Proses Sains</h2>
                <div class="info-grid">
                    <div class="label">1</div>
                    <div class="value">Melakukan pengamatan terhadap ekosistem di lingkungan sekitar.</div>

                    <div class="label">2</div>
                    <div class="value">Mengumpulkan dan menyajikan data hasil pengamatan.</div>

                    <div class="label">3</div>
                    <div class="value">Menarik kesimpulan berdasarkan hasil analisis.</div>
                </div>
            </section>

            <section class="info-section">
                <h2>🌍 Sikap Ilmiah</h2>
                <div class="info-grid">
                    <div class="label">1</div>
                    <div class="value">Menunjukkan kepedulian terhadap lingkungan.</div>

                    <div class="label">2</div>
                    <div class="value">Bertanggung jawab menjaga keseimbangan alam.</div>

                    <div class="label">3</div>
                    <div class="value">Menyadari dampak aktivitas manusia terhadap ekosistem.</div>
                </div>
            </section>

        </section>

    </main>

    <script src="{{ asset('js/script_info.js') }}"></script>
</body>
</html>