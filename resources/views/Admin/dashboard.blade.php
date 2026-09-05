<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin - KerjainYUK</title>

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

        .dashboard-container {
            max-width: 1400px;
            margin: auto;
            padding: 40px 48px 60px;
        }

        /* HEADER */
        .welcome-section {
            margin-bottom: 28px;
        }

        .welcome-section h1 {
            margin: 0 0 8px;
            font-size: 30px;
            font-weight: 700;
        }

        .welcome-section p {
            margin: 0;
            color: #77777e;
            font-size: 14px;
        }

        /* STATISTIK */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 28px;
        }

        .stat-card {
            background: white;
            border: 1px solid #e7e7e9;
            border-radius: 18px;
            padding: 24px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.025);
        }

        .stat-label {
            color: #77777e;
            font-size: 13px;
            margin-bottom: 12px;
        }

        .stat-value {
            font-size: 30px;
            font-weight: 700;
        }

        /* CONTENT */
        .content-grid {
            display: grid;
            grid-template-columns: 1.6fr 1fr;
            gap: 20px;
        }

        .section-card {
            background: white;
            border: 1px solid #e7e7e9;
            border-radius: 18px;
            padding: 28px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.025);
        }

        .section-header {
            margin-bottom: 22px;
        }

        .section-header h2 {
            margin: 0;
            font-size: 20px;
        }

        .section-header p {
            margin: 6px 0 0;
            color: #88888f;
            font-size: 13px;
        }

        /* TABLE */
        .table-wrapper {
            width: 100%;
            overflow-x: hidden;
        }

        .job-table {
            width: 100%;
            table-layout: fixed;
            border-collapse: separate;
            border-spacing: 0;
            border: 1px solid #e9e9ec;
            border-radius: 12px;
            overflow: hidden;
        }

        .job-table th {
            background: #fafafa;
            color: #77777e;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            padding: 14px 10px;
            text-align: left;
            border-bottom: 1px solid #e9e9ec;
        }

        .job-table td {
            padding: 15px 10px;
            font-size: 12px;
            border-bottom: 1px solid #eeeeef;
            vertical-align: middle;
        }

        .job-table tr:last-child td {
            border-bottom: none;
        }

        .job-table th:nth-child(1) {
            width: 35%;
        }

        .job-table th:nth-child(2) {
            width: 22%;
        }

        .job-table th:nth-child(3) {
            width: 18%;
        }

        .job-table th:nth-child(4) {
            width: 25%;
        }

        .job-name {
            font-weight: 600;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .muted {
            color: #77777e;
        }

        /* STATUS */
        .status {
            display: inline-flex;
            align-items: center;
            padding: 7px 10px;
            border-radius: 999px;
            font-size: 10px;
            font-weight: 600;
        }

        .status-dibuka {
            background: #eef8f2;
            color: #47785c;
        }

        .status-berjalan {
            background: #fff7e6;
            color: #b7791f;
        }

        .status-selesai {
            background: #f1f1f4;
            color: #66666d;
        }

        /* LAMARAN */
        .application-list {
            display: flex;
            flex-direction: column;
        }

        .application-item {
            padding: 17px 0;
            border-bottom: 1px solid #eeeeef;
        }

        .application-item:first-child {
            padding-top: 0;
        }

        .application-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .applicant-name {
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .application-job {
            color: #77777e;
            font-size: 12px;
            margin-bottom: 9px;
        }

        .application-status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 10px;
            font-weight: 600;
        }

        .pending {
            background: #fff7e6;
            color: #b7791f;
        }

        .accepted {
            background: #eef8f2;
            color: #47785c;
        }

        .rejected {
            background: #fff1f1;
            color: #b91c1c;
        }

        .empty-state {
            text-align: center;
            padding: 40px 15px;
            color: #88888f;
            font-size: 13px;
        }

        @media (max-width: 1000px) {

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {

            .dashboard-container {
                padding: 30px 20px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    @include('layouts.navbar')

    <div class="dashboard-container">

        {{-- HEADER --}}
        <div class="welcome-section">

            <h1>Dashboard Admin</h1>

            <p>
                Kelola dan pantau aktivitas KerjainYUK dari satu tempat.
            </p>

        </div>


        {{-- STATISTIK ADMIN --}}
        <div class="stats-grid">

            <div class="stat-card">

                <div class="stat-label">
                    Total User
                </div>

                <div class="stat-value">
                    {{ $totalUser }}
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-label">
                    Total Kerjaan
                </div>

                <div class="stat-value">
                    {{ $totalKerjaan }}
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-label">
                    Kerjaan Dibuka
                </div>

                <div class="stat-value">
                    {{ $kerjaanDibuka }}
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-label">
                    Total Lamaran
                </div>

                <div class="stat-value">
                    {{ $totalLamaran }}
                </div>

            </div>

        </div>


        {{-- CONTENT --}}
        <div class="content-grid">

            {{-- KERJAAN TERBARU --}}
            <div class="section-card">

                <div class="section-header">

                    <h2>Kerjaan Terbaru</h2>

                    <p>
                        Daftar pekerjaan yang baru ditambahkan.
                    </p>

                </div>


                @if ($kerjaanTerbaru->count() > 0)

                    <div class="table-wrapper">

                        <table class="job-table">

                            <thead>

                                <tr>
                                    <th>Kerjaan</th>
                                    <th>Pembuat</th>
                                    <th>Imbalan</th>
                                    <th>Status</th>
                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($kerjaanTerbaru as $kerjaan)

                                    <tr>

                                        <td>
                                            <div class="job-name">
                                                {{ $kerjaan->nama }}
                                            </div>
                                        </td>

                                        <td class="muted">
                                            {{ $kerjaan->user->nama ?? $kerjaan->user->name ?? '-' }}
                                        </td>

                                        <td>
                                            Rp {{ number_format($kerjaan->imbalan, 0, ',', '.') }}
                                        </td>

                                        <td>

                                            @if ($kerjaan->status === 'dibuka')

                                                <span class="status status-dibuka">
                                                    Dibuka
                                                </span>

                                            @elseif ($kerjaan->status === 'berjalan')

                                                <span class="status status-berjalan">
                                                    Berjalan
                                                </span>

                                            @elseif ($kerjaan->status === 'selesai')

                                                <span class="status status-selesai">
                                                    Selesai
                                                </span>

                                            @else

                                                <span class="status status-selesai">
                                                    {{ ucfirst($kerjaan->status) }}
                                                </span>

                                            @endif

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                @else

                    <div class="empty-state">
                        Belum ada kerjaan.
                    </div>

                @endif

            </div>


            {{-- LAMARAN TERBARU --}}
            <div class="section-card">

                <div class="section-header">

                    <h2>Lamaran Terbaru</h2>

                    <p>
                        Aktivitas lamaran terbaru dari user.
                    </p>

                </div>


                @if ($lamaranTerbaru->count() > 0)

                    <div class="application-list">

                        @foreach ($lamaranTerbaru as $lamaran)

                            <div class="application-item">

                                <div class="applicant-name">
                                    {{ $lamaran->user->nama ?? $lamaran->user->name ?? '-' }}
                                </div>

                                <div class="application-job">
                                    Melamar:
                                    <strong>
                                        {{ $lamaran->kerjaan->nama ?? '-' }}
                                    </strong>
                                </div>


                                @if ($lamaran->status === 'menunggu')

                                    <span class="application-status pending">
                                        Menunggu
                                    </span>

                                @elseif ($lamaran->status === 'diterima')

                                    <span class="application-status accepted">
                                        Diterima
                                    </span>

                                @elseif ($lamaran->status === 'ditolak')

                                    <span class="application-status rejected">
                                        Ditolak
                                    </span>

                                @else

                                    <span class="application-status pending">
                                        {{ ucfirst($lamaran->status) }}
                                    </span>

                                @endif

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="empty-state">
                        Belum ada lamaran.
                    </div>

                @endif

            </div>

        </div>

    </div>

</body>

</html>
