<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lamaran Saya - KerjainYUK</title>
    <link rel="stylesheet" href="{{ asset('css/lamaran.css') }}">
</head>
<body>

@include('layouts.navbar')

<div style="padding: 30px;">

  <div class="page-header">
    <h1>Lamaran Saya</h1>
    </div>

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

    @if ($lamarans->count() > 0)

<div class="application-grid">

@foreach ($lamarans as $lamaran)

<div class="application-card">

    <div class="job-title">
        {{ $lamaran->kerjaan->nama }}
    </div>

    <div class="owner-name">
        Pemilik: {{ $lamaran->kerjaan->user->nama }}
    </div>

    <div class="message-box">
        <div class="message-label">
            Pesan Lamaran
        </div>

        <div class="message-content">
            {{ $lamaran->pesan_lamar }}
        </div>
    </div>

    @if ($lamaran->status === 'pending')

        <span class="status-badge status-pending">
            <span class="status-dot"></span>
            Menunggu Review
        </span>

    @elseif ($lamaran->status === 'diterima')

        <span class="status-badge status-accepted">
            <span class="status-dot"></span>
            Diterima
        </span>

    @else

        <span class="status-badge status-rejected">
            <span class="status-dot"></span>
            Ditolak
        </span>

    @endif

</div>

@endforeach

</div>

@else

<div class="empty-state">
    <h3>Belum Ada Lamaran</h3>
    <p>Kamu belum mengirim lamaran ke kerjaan manapun.</p>
</div>

@endif

</div>

</body>
</html>
