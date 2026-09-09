<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Siswa - Eko-Platform</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    
    <style>
        .login-card form { display: flex; flex-direction: column; gap: 15px; margin-top: 20px; }
        .login-card input { padding: 12px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.3); background: rgba(255,255,255,0.1); color: white; }
        .login-card input::placeholder { color: rgba(255,255,255,0.7); }
        .btn-submit { padding: 12px; border-radius: 8px; border: none; background: #19a463; color: white; font-weight: 600; cursor: pointer; transition: 0.3s; }
        .btn-submit:hover { background: #0f6b40; }
        .back-link { margin-top: 15px; font-size: 13px; color: rgba(255,255,255,0.8); text-decoration: none; display: block; }
    </style>
</head>
<body>

    <video id="bgVideo" autoplay muted playsinline>
        <source src="{{ asset('video/login.mp4') }}" type="video/mp4">
    </video>

    <div class="overlay"></div>

    <main class="login-wrapper">
        <div class="login-card">
            <h1>Login Siswa</h1>
            <p>Masukkan NISN dan Password kamu.</p>
            
<form action="{{ url('/login') }}" method="POST">
    @csrf
    <input type="text" name="username" placeholder="NISN Akun Siswa" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" class="btn-submit">Masuk</button>
</form>

            <a href="/login" class="back-link">← Kembali ke pemilihan role</a>
        </div>
    </main>

    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>