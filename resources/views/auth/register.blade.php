<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register - KerjainYUK</title>
</head>
<body>

    <h1>Register KerjainYUK</h1>

    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="/register" method="POST">
        @csrf

        <div>
            <label>Nama</label>
            <input type="text" name="nama" value="{{ old('nama') }}" required>
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <div>
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" required>
        </div>

        <div>
            <label>Program Studi</label>
            <input type="text" name="program_studi" value="{{ old('program_studi') }}" required>
        </div>

        <div>
            <label>Semester</label>
            <input type="number" name="semester" min="1" required>
        </div>

        <button type="submit">Register</button>
    </form>

    <p>
        Sudah punya akun?
        <a href="/login">Login</a>
    </p>

</body>
</html>
