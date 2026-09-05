<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lamar Kerjaan - KerjainYUK</title>

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

    .job-card {
        background: #ffffff;
        border: 1px solid #e5e5e8;
        border-radius: 18px;
        padding: 26px 30px;
        margin-bottom: 20px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.03);
    }

    .job-title {
        margin: 0 0 8px;
        font-size: 21px;
        font-weight: 700;
        color: #171719;
    }

    .job-category {
        display: inline-flex;
        align-items: center;
        padding: 6px 10px;
        background: #f1ecf6;
        color: #6d5193;
        border-radius: 8px;
        font-size: 11px;
        font-weight: 600;
        margin-bottom: 22px;
    }

    .job-details {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 15px;
    }

    .detail-item {
        background: #f8f8f9;
        border-radius: 11px;
        padding: 13px 15px;
    }

    .detail-label {
        display: block;
        margin-bottom: 6px;
        font-size: 10px;
        font-weight: 600;
        color: #99999f;
        text-transform: uppercase;
        letter-spacing: 0.4px;
    }

    .detail-value {
        display: block;
        font-size: 13px;
        font-weight: 600;
        color: #333337;
    }

    .reward {
        color: #47785c;
    }

    .form-card {
        background: #ffffff;
        border: 1px solid #e5e5e8;
        border-radius: 18px;
        padding: 30px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.03);
    }

    .form-title {
        margin: 0 0 6px;
        font-size: 17px;
        font-weight: 700;
        color: #202024;
    }

    .form-description {
        margin: 0 0 22px;
        font-size: 13px;
        color: #77777e;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        font-size: 13px;
        font-weight: 600;
        color: #303034;
    }

    .form-textarea {
        display: block;
        width: 100%;
        min-height: 160px;
        padding: 13px 14px;
        border: 1px solid #ddddE2;
        border-radius: 10px;
        background: #ffffff;
        color: #222225;
        font-family: inherit;
        font-size: 13px;
        line-height: 1.6;
        resize: vertical;
        outline: none;
        transition: 0.2s;
    }

    .form-textarea::placeholder {
        color: #aaaab0;
    }

    .form-textarea:focus {
        border-color: #6d5193;
        box-shadow: 0 0 0 3px rgba(109, 81, 147, 0.10);
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
        margin-top: 24px;
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

    .btn-submit {
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

    .btn-submit:hover {
        background: #222225;
        transform: translateY(-1px);
    }

    @media (max-width: 700px) {
        .page-container {
            padding: 30px 20px 40px;
        }

        .job-card,
        .form-card {
            padding: 22px;
        }

        .job-details {
            grid-template-columns: 1fr;
        }

        .form-actions {
            flex-direction: column-reverse;
            align-items: stretch;
        }

        .btn-back,
        .btn-submit {
            width: 100%;
        }
    }
</style>

</head>

<body>

@include('layouts.navbar')

<div class="page-container">

    <div class="page-header">
        <h1>Lamar Kerjaan</h1>
        <p>Lengkapi pesan lamaranmu untuk mengajukan diri pada kerjaan ini.</p>
    </div>

    <!-- Detail Kerjaan -->
    <div class="job-card">

        <h2 class="job-title">
            {{ $kerjaan->nama }}
        </h2>

        <span class="job-category">
            {{ $kerjaan->kategori->nama_kategori }}
        </span>

        <div class="job-details">

            <div class="detail-item">
                <span class="detail-label">
                    Imbalan
                </span>

                <span class="detail-value reward">
                    Rp {{ number_format($kerjaan->imbalan, 0, ',', '.') }}
                </span>
            </div>

            <div class="detail-item">
                <span class="detail-label">
                    Lokasi
                </span>

                <span class="detail-value">
                    {{ $kerjaan->lokasi }}
                </span>
            </div>

            <div class="detail-item">
                <span class="detail-label">
                    Deadline
                </span>

                <span class="detail-value">
                    {{ \Carbon\Carbon::parse($kerjaan->deadline)->format('d-m-Y') }}
                </span>
            </div>

        </div>

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

    <!-- Form Lamaran -->
    <div class="form-card">

        <h2 class="form-title">
            Pesan Lamaran
        </h2>

        <p class="form-description">
            Jelaskan alasan kamu cocok untuk mengerjakan tugas ini.
        </p>

        <form
            action="/mahasiswa/kerjaan/{{ $kerjaan->id }}/lamar"
            method="POST"
        >

            @csrf

            <div>
                <label for="pesan_lamar" class="form-label">
                    Pesan Lamaran
                </label>

                <textarea
                    id="pesan_lamar"
                    name="pesan_lamar"
                    class="form-textarea"
                    placeholder="Tulis pesan lamaranmu di sini..."
                    required>{{ old('pesan_lamar') }}</textarea>
            </div>

            <div class="form-actions">

                <a href="/mahasiswa/kerjaan" class="btn-back">
                    ← Kembali
                </a>

                <button type="submit" class="btn-submit">
                    Kirim Lamaran
                </button>

            </div>

        </form>

    </div>

</div>


</body>

</html>
