<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Eko-Platform</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

    <video id="bgVideo" autoplay muted playsinline>
        <source src="{{ asset('video/login.mp4') }}" type="video/mp4">
        Browser kamu tidak mendukung video.
    </video>

    <div class="overlay"></div>

    <main class="login-wrapper">
        <div class="login-card">
            <h1>Selamat Datang!</h1>
            <p>Silakan pilih akses masuk ke portal pembelajaran.</p>
            
<div class="role-selector">
    <button class="btn-role siswa" onclick="window.location.href='{{ url('/login/siswa') }}'">
        <span>🎓</span> Masuk sebagai Siswa
    </button>
    
    <button class="btn-role guru" onclick="window.location.href='{{ url('/login/guru') }}'">
        <span>👨‍🏫</span> Masuk sebagai Guru
    </button>
</div>
        </div>
    </main>

<script src="{{ asset('js/login.js?v=1.1') }}"></script>
</body>
</html>