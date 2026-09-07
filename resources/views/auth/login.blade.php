<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - KerjainYUK</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>

    <div class="login-container">

        <!-- Brand -->
        <div class="brand">
            <h1>KerjainYUK</h1>
            <p>Temukan kerjaan yang cocok untukmu.</p>
        </div>

        <!-- Login Card -->
        <div class="login-card">

            <div class="login-title">
                <h2>Selamat Datang </h2>
                <p>Silakan masuk ke akun kamu.</p>
            </div>

            <!-- Success -->
            @if (session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Error -->
            @if ($errors->any())
                <div class="alert-error">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <!-- Form -->
            <form action="/login" method="POST">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Masukkan email kamu"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Masukkan password kamu"
                        required
                    >
                </div>

                <button type="submit" class="btn-login">
                    Login
                </button>
            </form>

            <p class="register-text">
                Belum punya akun?
                <a href="/register">Register</a>
            </p>

        </div>

    </div>

</body>
</html>
