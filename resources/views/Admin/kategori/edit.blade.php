<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Kategori - KerjainYUK</title>

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

    .form-card {
        background: #ffffff;
        border: 1px solid #e5e5e8;
        border-radius: 18px;
        padding: 30px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.03);
    }

    .form-group {
        margin-bottom: 24px;
    }

    .form-label {
        display: block;
        margin-bottom: 9px;
        font-size: 13px;
        font-weight: 600;
        color: #333337;
    }

    .form-input {
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

    .form-input:focus {
        border-color: #6d5193;
        box-shadow: 0 0 0 3px rgba(109, 81, 147, 0.10);
    }

    .alert-error {
        padding: 13px 16px;
        margin-bottom: 22px;
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
        margin-bottom: 4px;
    }

    .error-list li:last-child {
        margin-bottom: 0;
    }

    .form-actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding-top: 4px;
    }

    .btn-back {
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

    .btn-back:hover {
        background: #f8f8f9;
        border-color: #ccccd1;
    }

    .btn-update {
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

    .btn-update:hover {
        background: #5c437e;
        transform: translateY(-1px);
    }

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

        .form-actions {
            flex-direction: column-reverse;
            align-items: stretch;
        }

        .btn-back,
        .btn-update {
            width: 100%;
        }
    }
</style>

</head>

<body>


@include('layouts.navbar')

<div class="page-container">

    <div class="page-header">
        <h1>Edit Kategori</h1>
        <p>Perbarui nama kategori yang tersedia di KerjainYUK.</p>
    </div>

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

        <form action="/admin/kategori/{{ $kategori->id }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_kategori" class="form-label">
                    Nama Kategori
                </label>

                <input
                    type="text"
                    id="nama_kategori"
                    name="nama_kategori"
                    class="form-input"
                    value="{{ old('nama_kategori', $kategori->nama_kategori) }}"
                    placeholder="Contoh: Design, Programming, Data..."
                    required
                >
            </div>

            <div class="form-actions">

                <a href="/admin/kategori" class="btn-back">
                    ← Kembali
                </a>

                <button type="submit" class="btn-update">
                    Update Kategori
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>
