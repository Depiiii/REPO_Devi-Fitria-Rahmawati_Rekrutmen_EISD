<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Tambah User - KerjainYUK</title>

<style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        background: #f5f5f6;
        color: #171719;
    }

    .page-container {
        max-width: 900px;
        margin: 0 auto;
        padding: 40px 48px 60px;
    }

    /* HEADER */

    .page-header {
        margin-bottom: 28px;
    }

    .page-header h1 {
        margin: 0 0 7px;
        font-size: 28px;
        font-weight: 700;
        letter-spacing: -0.5px;
    }

    .page-header p {
        margin: 0;
        color: #77777e;
        font-size: 14px;
    }

    /* CARD */

    .form-card {
        background: #ffffff;
        border: 1px solid #e5e5e8;
        border-radius: 18px;
        padding: 30px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.03);
    }

    /* ALERT */

    .alert-error {
        padding: 13px 16px;
        margin-bottom: 24px;
        border-radius: 10px;
        background: #fff1f1;
        border: 1px solid #f1d6d6;
        color: #a34d4d;
        font-size: 13px;
    }

    .error-list {
        margin: 0;
        padding-left: 18px;
    }

    .error-list li {
        margin-bottom: 5px;
    }

    .error-list li:last-child {
        margin-bottom: 0;
    }

    /* FORM */

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        margin-bottom: 9px;
        font-size: 13px;
        font-weight: 600;
        color: #333337;
    }

    .form-input,
    .form-select {
        width: 100%;
        padding: 13px 15px;
        border: 1px solid #ddddE1;
        border-radius: 10px;
        background: #ffffff;
        color: #171719;
        font-family: inherit;
        font-size: 13px;
        outline: none;
        transition: 0.2s;
    }

    .form-input::placeholder {
        color: #aaaaaf;
    }

    .form-input:focus,
    .form-select:focus {
        border-color: #6d5193;
        box-shadow: 0 0 0 3px rgba(109, 81, 147, 0.10);
    }

    .form-select {
        cursor: pointer;
    }

    /* PASSWORD INFO */

    .form-hint {
        margin-top: 7px;
        font-size: 11px;
        color: #99999f;
    }

    /* TWO COLUMN */

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }

    /* ACTION */

    .form-actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding-top: 10px;
        margin-top: 8px;
        border-top: 1px solid #eeeeef;
    }

    .btn-cancel {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 11px 17px;
        border: 1px solid #ddddE1;
        border-radius: 10px;
        background: #ffffff;
        color: #55555a;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        transition: 0.2s;
    }

    .btn-cancel:hover {
        background: #f8f8f9;
        border-color: #ccccd1;
    }

    .btn-save {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 11px 20px;
        border: none;
        border-radius: 10px;
        background: #6d5193;
        color: #ffffff;
        font-family: inherit;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.2s;
    }

    .btn-save:hover {
        background: #5c437e;
        transform: translateY(-1px);
    }

    /* RESPONSIVE */

    @media (max-width: 600px) {

        .page-container {
            padding: 30px 20px 40px;
        }

        .page-header h1 {
            font-size: 24px;
        }

        .form-card {
            padding: 22px;
        }

        .form-row {
            grid-template-columns: 1fr;
            gap: 0;
        }

        .form-actions {
            flex-direction: column-reverse;
            align-items: stretch;
        }

        .btn-cancel,
        .btn-save {
            width: 100%;
        }
    }
</style>


</head>

<body>


@include('layouts.navbar')

<div class="page-container">

    <!-- HEADER -->
    <div class="page-header">

        <h1>Tambah User</h1>

        <p>
            Tambahkan pengguna baru ke dalam sistem KerjainYUK.
        </p>

    </div>


    <!-- FORM CARD -->
    <div class="form-card">

        @if ($errors->any())

            <div class="alert-error">

                <ul class="error-list">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        <form action="/admin/user" method="POST">

            @csrf


            <!-- NAMA -->
            <div class="form-group">

                <label for="nama" class="form-label">
                    Nama
                </label>

                <input
                    type="text"
                    id="nama"
                    name="nama"
                    class="form-input"
                    value="{{ old('nama') }}"
                    placeholder="Masukkan nama lengkap"
                    required
                >

            </div>


            <!-- EMAIL -->
            <div class="form-group">

                <label for="email" class="form-label">
                    Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-input"
                    value="{{ old('email') }}"
                    placeholder="contoh@email.com"
                    required
                >

            </div>


            <!-- PASSWORD -->
            <div class="form-row">

                <div class="form-group">

                    <label for="password" class="form-label">
                        Password
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-input"
                        placeholder="Masukkan password"
                        required
                    >

                </div>


                <!-- KONFIRMASI PASSWORD -->
                <div class="form-group">

                    <label for="password_confirmation" class="form-label">
                        Konfirmasi Password
                    </label>

                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        class="form-input"
                        placeholder="Ulangi password"
                        required
                    >

                </div>

            </div>


            <!-- ROLE -->
            <div class="form-group">

                <label for="role" class="form-label">
                    Role
                </label>

                <select
                    id="role"
                    name="role"
                    class="form-select"
                    required
                >

                    <option value="">
                        -- Pilih Role --
                    </option>

                    <option
                        value="mahasiswa"
                        {{ old('role') == 'mahasiswa' ? 'selected' : '' }}
                    >
                        Mahasiswa
                    </option>

                    <option
                        value="admin"
                        {{ old('role') == 'admin' ? 'selected' : '' }}
                    >
                        Admin
                    </option>

                </select>

            </div>


            <!-- PROGRAM STUDI -->
            <div class="form-group">

                <label for="program_studi" class="form-label">
                    Program Studi
                </label>

                <input
                    type="text"
                    id="program_studi"
                    name="program_studi"
                    class="form-input"
                    value="{{ old('program_studi') }}"
                    placeholder="Contoh: Sistem Informasi"
                    required
                >

            </div>


            <!-- SEMESTER -->
            <div class="form-group">

                <label for="semester" class="form-label">
                    Semester
                </label>

                <input
                    type="number"
                    id="semester"
                    name="semester"
                    class="form-input"
                    value="{{ old('semester') }}"
                    min="0"
                    placeholder="Contoh: 5"
                    required
                >

            </div>


            <!-- ACTION -->
            <div class="form-actions">

                <a href="/admin/user" class="btn-cancel">
                    ← Kembali
                </a>

                <button type="submit" class="btn-save">
                    Simpan User
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>
