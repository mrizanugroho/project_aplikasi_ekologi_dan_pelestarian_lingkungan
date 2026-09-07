<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eko-Platform | Beranda</title>
    <!-- Murni memanggil CSS bawaan halaman login/register -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

    <!-- Video Background -->
    <video id="bgVideo" autoplay muted loop playsinline>
        <source src="{{ asset('video/login.mp4') }}" type="video/mp4">
    </video>

    <!-- Efek Overlay Gelap -->
    <div class="overlay"></div>

    <main class="login-wrapper">
        <div class="login-card">
            <h1>🌱 Eko-Platform</h1>
            <p>Selamat datang di Media Pembelajaran Interaktif Ekologi dan Pelestarian Lingkungan.</p>
            
            <br>
            
            <!-- Tombol Masuk (Pakai Link yg disulap jadi tombol full width) -->
            <a href="{{ url('/login') }}" style="display: block; width: 100%; padding: 12px; border-radius: 8px; background: #19a463; color: white; font-weight: 600; text-align: center; text-decoration: none; margin-bottom: 15px; box-sizing: border-box; font-family: inherit;">Masuk ke Akun</a>
            
            <!-- Tombol Daftar (Pakai gaya transparan border putih) -->
            <a href="{{ url('/register') }}" style="display: block; width: 100%; padding: 12px; border-radius: 8px; border: 1px solid white; background: transparent; color: white; font-weight: 600; text-align: center; text-decoration: none; box-sizing: border-box; font-family: inherit;">Daftar Akun Baru</a>
        </div>
    </main>

    <!-- Murni memanggil JS bawaan -->
    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>