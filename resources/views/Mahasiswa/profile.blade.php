<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Profil Saya</title>

    <style>
        body {
            background: #f5f5f6;
            font-family: Arial;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 40px;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }

        .card {
            background: white;
            border-radius: 18px;
            padding: 24px;
            border: 1px solid #ececec;
        }

        .title {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 10px;
        }

        textarea {
            width: 100%;
        }

        button {
            background: #171719;
            color: white;
            border: none;
            padding: 12px 18px;
            border-radius: 10px;
            cursor: pointer;
        }

        .rating-box {
            font-size: 34px;
            font-weight: 700;
        }

        .review {
            border-top: 1px solid #eee;
            padding-top: 14px;
            margin-top: 14px;
        }
    </style>
</head>

<body>

    @include('layouts.navbar')

    <div class="container">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="grid">

            {{-- PROFIL --}}
            <div class="card">

                <div class="title">
                    Informasi Profil
                </div>

                <form action="/profil/update" method="POST">

                    @csrf

                    <div class="form-group">
                        <input
                            type="text"
                            name="nama"
                            value="{{ $user->nama }}">
                    </div>

                    <div class="form-group">
                        <input
                            type="email"
                            name="email"
                            value="{{ $user->email }}">
                    </div>

                    <div class="form-group">
                        <input
                            type="text"
                            name="program_studi"
                            value="{{ $user->program_studi }}">
                    </div>

                    <div class="form-group">
                        <input
                            type="number"
                            name="semester"
                            value="{{ $user->semester }}">
                    </div>

                    <button type="submit">
                        Simpan Profil
                    </button>

                </form>

            </div>

            {{-- PASSWORD --}}
            <div class="card">

                <div class="title">
                    Ganti Password
                </div>

                <form action="/profil/password" method="POST">

                    @csrf

                    <div class="form-group">
                        <input
                            type="password"
                            name="old_password"
                            placeholder="Password Lama">
                    </div>

                    <div class="form-group">
                        <input
                            type="password"
                            name="password"
                            placeholder="Password Baru">
                    </div>

                    <div class="form-group">
                        <input
                            type="password"
                            name="password_confirmation"
                            placeholder="Konfirmasi Password">
                    </div>

                    <button type="submit">
                        Ganti Password
                    </button>

                </form>

            </div>

        </div>

        <br><br>

        <div class="card">

            <div class="title">
                Rating & Ulasan Saya
            </div>

            <div class="rating-box">
                ⭐ {{ $avgRating }}/5
            </div>

            <br>

            @forelse($ulasans as $ulasan)

            <div class="review">

                <strong>
                    {{ $ulasan->rating }}/5
                </strong>

                <p>
                    {{ $ulasan->komentar }}
                </p>

            </div>

            @empty

            <p>
                Belum ada ulasan.
            </p>

            @endforelse

        </div>

    </div>

</body>

</html>
