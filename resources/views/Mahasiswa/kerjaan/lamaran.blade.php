<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Pelamar - KerjainYUK</title>
</head>

<body>

@include('layouts.navbar')

<style>
    .page-container {
    max-width: 1200px;
    margin: auto;
    padding: 40px;
}

.page-header {
    margin-bottom: 30px;
}

.page-header h1 {
    font-size: 30px;
    margin-bottom: 6px;
}

.page-header p {
    color: #777;
}

.applicant-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill,minmax(350px,1fr));
    gap: 20px;
}

.applicant-card {
    background: white;
    border: 1px solid #e8e8e8;
    border-radius: 18px;
    padding: 24px;
    box-shadow: 0 2px 8px rgba(0,0,0,.03);
}

.applicant-name {
    font-size: 18px;
    font-weight: 700;
    color: #171719;
    margin-bottom: 5px;
}

.applicant-info {
    font-size: 13px;
    color: #777;
    margin-bottom: 14px;
}

.rating-box {
    display: inline-block;
    background: #fff7e6;
    color: #b7791f;
    padding: 6px 10px;
    border-radius: 8px;
    font-size: 12px;
    font-weight: 600;
    margin-bottom: 16px;
}

.message-box {
    background: #f8f8f9;
    border-radius: 12px;
    padding: 14px;
    margin-bottom: 16px;
}

.message-title {
    font-size: 12px;
    font-weight: 600;
    margin-bottom: 8px;
    color: #555;
}

.message-content {
    font-size: 13px;
    line-height: 1.6;
    color: #444;
}

.status-badge {
    display: inline-block;
    padding: 6px 10px;
    border-radius: 999px;
    font-size: 12px;
    font-weight: 600;
}

.status-pending {
    background: #fff7e6;
    color: #b7791f;
}

.status-accepted {
    background: #eef8f2;
    color: #47785c;
}

.status-rejected {
    background: #fff1f1;
    color: #b91c1c;
}

.action-group {
    display: flex;
    gap: 10px;
    margin-top: 16px;
}

.btn-accept {
    background: #171719;
    color: white;
    border: none;
    border-radius: 8px;
    padding: 9px 14px;
    cursor: pointer;
}

.btn-reject {
    background: white;
    border: 1px solid #e1e1e1;
    border-radius: 8px;
    padding: 9px 14px;
    cursor: pointer;
}
</style>
<div style="padding: 30px;">

    <h1>Daftar Pelamar</h1>

    <h2>{{ $kerjaan->nama }}</h2>

    <p>
        Berikut adalah mahasiswa yang melamar kerjaan ini.
    </p>

    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    @if (session('error'))
        <p style="color: red;">
            {{ session('error') }}
        </p>
    @endif

    <br>

    @if ($lamarans->count() > 0)


<div class="applicant-grid">

@foreach ($lamarans as $lamaran)

@php
    $jumlahUlasan = $lamaran->user->ulasans->count();

    $rataRating = $jumlahUlasan > 0
        ? round($lamaran->user->ulasans->avg('rating'), 1)
        : 0;
@endphp

<div class="applicant-card">

    <div class="applicant-name">
        {{ $lamaran->user->nama }}
    </div>

    <div class="applicant-info">
        {{ $lamaran->user->program_studi }}
        • Semester {{ $lamaran->user->semester }}
    </div>

    <div class="rating-box">
        @if ($jumlahUlasan > 0)
            ⭐ {{ $rataRating }}/5 ({{ $jumlahUlasan }} ulasan)
        @else
            Belum memiliki rating
        @endif
    </div>

    <div class="message-box">
        <div class="message-title">
            Pesan Lamaran
        </div>

        <div class="message-content">
            {{ $lamaran->pesan_lamar }}
        </div>
    </div>

    <div>
        @if ($lamaran->status === 'pending')
            <span class="status-badge status-pending">
                Pending
            </span>
        @elseif ($lamaran->status === 'diterima')
            <span class="status-badge status-accepted">
                Diterima
            </span>
        @else
            <span class="status-badge status-rejected">
                Ditolak
            </span>
        @endif
    </div>

    @if ($lamaran->status === 'pending' && $kerjaan->status === 'dibuka')

        <div class="action-group">

            <form action="/mahasiswa/lamaran/{{ $lamaran->id }}/accept" method="POST">
                @csrf
                <button type="submit" class="btn-accept">
                    Terima
                </button>
            </form>

            <form action="/mahasiswa/lamaran/{{ $lamaran->id }}/reject" method="POST">
                @csrf
                <button type="submit" class="btn-reject">
                    Tolak
                </button>
            </form>

        </div>

    @endif

</div>

@endforeach

</div>
    @else

        <p>
            Belum ada mahasiswa yang melamar kerjaan ini.
        </p>

    @endif

    <br>

    <a href="/mahasiswa/kelola-kerjaan">
        ← Kembali ke Kelola Kerjaan
    </a>

</div>

</body>

</html>

