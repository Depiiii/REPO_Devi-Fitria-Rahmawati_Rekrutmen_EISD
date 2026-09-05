<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kerjaan - KerjainYUK</title>


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
        margin-bottom: 22px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        font-size: 13px;
        font-weight: 600;
        color: #303034;
    }

    .form-input,
    .form-select {
        width: 100%;
        padding: 12px 14px;
        border: 1px solid #ddddE2;
        border-radius: 10px;
        background: #ffffff;
        color: #222225;
        font-family: inherit;
        font-size: 13px;
        outline: none;
        transition: 0.2s;
    }

    .form-input::placeholder {
        color: #aaaab0;
    }

    .form-input:focus,
    .form-select:focus {
        border-color: #6d5193;
        box-shadow: 0 0 0 3px rgba(109, 81, 147, 0.10);
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px;
    }

    .status-section {
        background: #f8f8f9;
        border: 1px solid #eeeeef;
        border-radius: 12px;
        padding: 16px 18px;
        margin-top: 4px;
        margin-bottom: 24px;
    }

    .status-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        margin-bottom: 6px;
    }

    .status-title {
        font-size: 12px;
        font-weight: 600;
        color: #77777e;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        padding: 6px 10px;
        border-radius: 999px;
        font-size: 11px;
        font-weight: 600;
    }

    .status-dibuka {
        background: #eef8f2;
        color: #47785c;
    }

    .status-berjalan {
        background: #f1ecf6;
        color: #6d5193;
    }

    .status-selesai {
        background: #eeeeef;
        color: #66666c;
    }

    .status-description {
        margin: 0;
        font-size: 12px;
        line-height: 1.5;
        color: #8a8a90;
    }

    .error-alert {
        background: #fff1f1;
        color: #a34d4d;
        border: 1px solid #f1d6d6;
        border-radius: 10px;
        padding: 13px 16px;
        margin-bottom: 24px;
        font-size: 13px;
    }

    .error-alert ul {
        margin: 0;
        padding-left: 18px;
    }

    .error-alert li {
        margin-bottom: 4px;
    }

    .error-alert li:last-child {
        margin-bottom: 0;
    }

    .form-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        margin-top: 30px;
        padding-top: 24px;
        border-top: 1px solid #eeeeef;
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 11px 17px;
        border: 1px solid #ddddE2;
        background: #ffffff;
        color: #55555b;
        text-decoration: none;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 600;
        transition: 0.2s;
    }

    .btn-back:hover {
        background: #f8f8f9;
    }

    .btn-update {
        border: none;
        padding: 11px 18px;
        background: #171719;
        color: #ffffff;
        border-radius: 10px;
        font-family: inherit;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.2s;
    }

    .btn-update:hover {
        background: #222225;
        transform: translateY(-1px);
    }

    @media (max-width: 700px) {
        .page-container {
            padding: 30px 20px 40px;
        }

        .form-card {
            padding: 22px;
        }

        .form-row {
            grid-template-columns: 1fr;
            gap: 0;
        }

        .status-header {
            align-items: flex-start;
            flex-direction: column;
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
        <h1>Edit Kerjaan</h1>
        <p>Perbarui informasi kerjaan yang kamu buat.</p>
    </div>

    @if ($errors->any())
        <div class="error-alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-card">

        <form
            action="/mahasiswa/kerjaan/{{ $kerjaan->id }}"
            method="POST"
        >
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama" class="form-label">
                    Nama Kerjaan
                </label>

                <input
                    type="text"
                    id="nama"
                    name="nama"
                    class="form-input"
                    value="{{ old('nama', $kerjaan->nama) }}"
                    placeholder="Contoh: Membuat desain poster"
                    required>
            </div>

            <div class="form-group">
                <label for="id_kategori" class="form-label">
                    Kategori
                </label>

                <select
                    id="id_kategori"
                    name="id_kategori"
                    class="form-select"
                    required>

                    <option value="">
                        -- Pilih Kategori --
                    </option>

                    @foreach ($kategoris as $kategori)
                        <option
                            value="{{ $kategori->id }}"
                            {{ old('id_kategori', $kerjaan->id_kategori) == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div class="form-row">

                <div class="form-group">
                    <label for="imbalan" class="form-label">
                        Imbalan
                    </label>

                    <input
                        type="number"
                        id="imbalan"
                        name="imbalan"
                        class="form-input"
                        value="{{ old('imbalan', $kerjaan->imbalan) }}"
                        min="0"
                        placeholder="Contoh: 150000"
                        required>
                </div>

                <div class="form-group">
                    <label for="deadline" class="form-label">
                        Deadline
                    </label>

                    <input
                        type="date"
                        id="deadline"
                        name="deadline"
                        class="form-input"
                        value="{{ old('deadline', \Carbon\Carbon::parse($kerjaan->deadline)->format('Y-m-d')) }}"
                        required>
                </div>

            </div>

            <div class="form-group">
                <label for="lokasi" class="form-label">
                    Lokasi
                </label>

                <input
                    type="text"
                    id="lokasi"
                    name="lokasi"
                    class="form-input"
                    value="{{ old('lokasi', $kerjaan->lokasi) }}"
                    placeholder="Contoh: Online / Bandung"
                    required>
            </div>


            <div class="status-section">

                <div class="status-header">
                    <span class="status-title">
                        Status Kerjaan
                    </span>

                    @if ($kerjaan->status === 'dibuka')
                        <span class="status-badge status-dibuka">
                            Dibuka
                        </span>
                    @elseif ($kerjaan->status === 'berjalan')
                        <span class="status-badge status-berjalan">
                            Berjalan
                        </span>
                    @else
                        <span class="status-badge status-selesai">
                            Selesai
                        </span>
                    @endif
                </div>

                <p class="status-description">
                    Status kerjaan akan berubah otomatis berdasarkan proses lamaran.
                </p>

            </div>

            <!-- Actions -->
            <div class="form-actions">

                <a href="/mahasiswa/kelola-kerjaan" class="btn-back">
                    ← Kembali
                </a>

                <button type="submit" class="btn-update">
                    Update Kerjaan
                </button>

            </div>

        </form>

    </div>

</div>

</body>

</html>
