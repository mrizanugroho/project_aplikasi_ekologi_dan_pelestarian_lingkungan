<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Eko-Platform</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    
    <style>
        .login-card form { display: flex; flex-direction: column; gap: 15px; margin-top: 20px; }
        
        .login-card input, .login-card select { 
            padding: 12px; 
            border-radius: 8px; 
            border: 1px solid rgba(255,255,255,0.3); 
            background: rgba(255,255,255,0.1); 
            color: white; 
            font-family: inherit;
        }
        
        .login-card input::placeholder { color: rgba(255,255,255,0.7); }
        
        /* Dropdown styling agar teks terlihat saat diklik */
        .login-card select option { background: #2c3e50; color: white; }
        
        .btn-submit { 
            padding: 12px; border-radius: 8px; border: none; 
            background: #19a463; color: white; font-weight: 600; 
            cursor: pointer; transition: 0.3s; 
        }
        .btn-submit:hover { background: #0f6b40; }
        
        .back-link { margin-top: 15px; font-size: 13px; color: rgba(255,255,255,0.8); text-decoration: none; display: block; }
        
        /* Kelas rahasia untuk menyembunyikan input token */
        .hidden { display: none !important; }
    </style>
</head>
<body>

    <video id="bgVideo" autoplay muted playsinline>
        <source src="{{ asset('video/login.mp4') }}" type="video/mp4">
    </video>

    <div class="overlay"></div>

    <main class="login-wrapper">
        <div class="login-card">
            <h1>Daftar Akun</h1>
            <p>Buat akun baru untuk mengakses portal Eko-Platform.</p>
            @if ($errors->any())
    <div style="background: rgba(255, 0, 0, 0.2); color: #ff9999; padding: 10px; border-radius: 8px; margin-bottom: 15px; font-size: 14px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            
<form action="{{ url('/register') }}" method="POST">
    @csrf
    <input type="text" name="nama_lengkap" placeholder="Nama Lengkap Kamu" value="{{ old('nama_lengkap') }}" required>
    
    <input type="text" name="username" placeholder="Username / NISN / NIP" value="{{ old('username') }}" required>
    
    <input type="password" name="password" placeholder="Password (Minimal 6 Karakter)" required>
    
<select name="role" id="roleSelector" required>
        <option value="" disabled selected>Pilih Role Pendaftar</option>
        <option value="siswa" {{ old('role') == 'siswa' ? 'selected' : '' }}>Siswa</option>
        <option value="guru" {{ old('role') == 'guru' ? 'selected' : '' }}>Guru</option>
    </select>

    <!-- 👇 TAMBAHIN KODE INI DI SINI 👇 -->
    <select name="kelas" id="kelasSelector" class="hidden">
        <option value="" disabled selected>Pilih Kelas Kamu (Khusus Siswa)</option>
        <option value="7A" {{ old('kelas') == '7A' ? 'selected' : '' }}>Kelas 7A</option>
        <option value="7B" {{ old('kelas') == '7B' ? 'selected' : '' }}>Kelas 7B</option>
        <option value="7C" {{ old('kelas') == '7C' ? 'selected' : '' }}>Kelas 7C</option>
    </select>
    <!-- 👆 ----------------------- 👆 -->

    <input type="text" name="token_guru" id="tokenGuru" class="hidden" placeholder="Masukkan Token Rahasia Guru">

    <button type="submit" class="btn-submit">Daftar Sekarang</button>
</form>

            <a href="login.blade.php" class="back-link">← Sudah punya akun? Kembali ke Login</a>
        </div>
    </main>

    <script src="{{ asset('js/login.js') }}"></script>
    
<script>
        const roleSelector = document.getElementById('roleSelector');
        const tokenGuru = document.getElementById('tokenGuru');
        const kelasSelector = document.getElementById('kelasSelector'); // Ambil elemen kelas

        roleSelector.addEventListener('change', function() {
            if (this.value === 'guru') {
                // Munculkan input token guru, sembunyikan kelas
                tokenGuru.classList.remove('hidden');
                tokenGuru.setAttribute('required', 'true');
                
                kelasSelector.classList.add('hidden');
                kelasSelector.removeAttribute('required');
                kelasSelector.value = ''; // Reset pilihan kelas
                
            } else if (this.value === 'siswa') {
                // Munculkan pilihan kelas, sembunyikan token guru
                kelasSelector.classList.remove('hidden');
                kelasSelector.setAttribute('required', 'true');
                
                tokenGuru.classList.add('hidden');
                tokenGuru.removeAttribute('required');
                tokenGuru.value = ''; // Reset input token
            }
        });
    </script>
</body>
</html>