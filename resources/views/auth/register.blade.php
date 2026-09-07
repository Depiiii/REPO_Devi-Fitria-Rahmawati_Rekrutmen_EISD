<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register - KerjainYUK</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:Arial, Helvetica, sans-serif;
            background:#f5f5f6;
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            color:#131212;
            padding:24px;
        }

        .register-container{
    width:100%;
    max-width:560px;
        }

        .brand{
            text-align:center;
            margin-bottom:28px;
        }

        .brand h1{
            font-size:28px;
            font-weight:700;
            letter-spacing:-0.8px;
            color:#131212;
        }

        .brand p{
            margin-top:8px;
            color:#6d6d72;
            font-size:14px;
        }

        .register-card{
            background:#ffffff;
            border:1px solid #e5e5e8;
            border-radius:18px;
            padding:32px;
            box-shadow:0 8px 30px rgba(0,0,0,0.04);
        }

        .register-title{
            margin-bottom:24px;
        }

        .register-title h2{
            font-size:20px;
            font-weight:650;
            color:#131212;
        }

        .register-title p{
            margin-top:6px;
            font-size:13px;
            color:#77777c;
        }

        .alert-error{
            background:#fff1f1;
            border:1px solid #f2d4d4;
            color:#a34d4d;
            padding:11px 13px;
            border-radius:9px;
            font-size:13px;
            margin-bottom:18px;
        }

        .alert-error p{
            margin:3px 0;
        }

        .form-group{
            margin-bottom:16px;
        }

        .form-group label{
            display:block;
            margin-bottom:8px;
            font-size:13px;
            font-weight:600;
            color:#3f3f42;
        }

        .form-group input{
            width:100%;
            height:44px;
            padding:0 13px;
            border:1px solid #dedee2;
            border-radius:9px;
            background:#ffffff;
            color:#131212;
            font-size:14px;
            outline:none;
            transition:all .2s ease;
        }

        .form-group input:focus{
            border-color:#6d5193;
            box-shadow:0 0 0 3px rgba(109,81,147,.10);
        }

        .btn-register{
            width:100%;
            height:44px;
            border:none;
            border-radius:9px;
            background:#131212;
            color:#ffffff;
            font-size:14px;
            font-weight:600;
            cursor:pointer;
            transition:all .2s ease;
            margin-top:8px;
        }

        .btn-register:hover{
            background:#2b2a2a;
            transform:translateY(-1px);
        }

        .login-text{
            text-align:center;
            margin-top:22px;
            font-size:13px;
            color:#77777c;
        }

        .login-text a{
            color:#6d5193;
            font-weight:600;
            text-decoration:none;
        }

        .login-text a:hover{
            text-decoration:underline;
        }

        @media(max-width:480px){

            body{
                padding:18px;
            }

            .register-card{
                padding:24px;
                border-radius:15px;
            }

            .brand h1{
                font-size:25px;
            }

        }

    </style>
</head>
<body>

<div class="register-container">



    <div class="register-card">

        <div class="register-title">
            <h2>Buat Akun Baru</h2>
            <p>Daftar untuk mulai menggunakan KerjainYUK.</p>
        </div>

        @if ($errors->any())
            <div class="alert-error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="/register" method="POST">

            @csrf

            <div class="form-group">
                <label>Nama</label>
                <input
                    type="text"
                    name="nama"
                    value="{{ old('nama') }}"
                    placeholder="Masukkan nama lengkap"
                    required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email"
                    required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input
                    type="password"
                    name="password"
                    placeholder="Masukkan password"
                    required>
            </div>

            <div class="form-group">
                <label>Konfirmasi Password</label>
                <input
                    type="password"
                    name="password_confirmation"
                    placeholder="Ulangi password"
                    required>
            </div>

            <div class="form-group">
                <label>Program Studi</label>
                <input
                    type="text"
                    name="program_studi"
                    value="{{ old('program_studi') }}"
                    placeholder="Contoh: Sistem Informasi"
                    required>
            </div>

            <div class="form-group">
                <label>Semester</label>
                <input
                    type="number"
                    name="semester"
                    min="1"
                    placeholder="Contoh: 5"
                    required>
            </div>

            <button type="submit" class="btn-register">
                Register
            </button>

        </form>

        <div class="login-text">
            Sudah punya akun?
            <a href="/login">Login</a>
        </div>

    </div>

</div>

</body>
</html>
