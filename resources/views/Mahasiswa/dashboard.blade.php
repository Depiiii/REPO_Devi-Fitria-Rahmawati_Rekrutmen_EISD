<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Mahasiswa - KerjainYUK</title>

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

        /* STATISTIC */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
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

        .rating {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .star {
            color: #d89b2b;
            font-size: 24px;
        }

        /* SECTION */
        .section-card {
            background: white;
            border: 1px solid #e7e7e9;
            border-radius: 18px;
            padding: 28px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.025);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
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

        .view-all {
            color: #6d5193;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
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
            padding: 14px 12px;
            text-align: left;
            border-bottom: 1px solid #e9e9ec;
        }

        .job-table td {
            padding: 16px 12px;
            font-size: 13px;
            border-bottom: 1px solid #eeeeef;
        }

        .job-table tr:last-child td {
            border-bottom: none;
        }

        .job-table th:nth-child(1) {
            width: 32%;
        }

        .job-table th:nth-child(2) {
            width: 17%;
        }

        .job-table th:nth-child(3) {
            width: 17%;
        }

        .job-table th:nth-child(4) {
            width: 17%;
        }

        .job-table th:nth-child(5) {
            width: 17%;
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

        .reward {
            font-weight: 600;
        }

        .status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 11px;
            border-radius: 999px;
            background: #eef8f2;
            color: #47785c;
            font-size: 11px;
            font-weight: 600;
        }

        .status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #5caa7b;
        }

        .empty-state {
            text-align: center;
            padding: 45px 20px;
            color: #88888f;
            font-size: 14px;
        }

        @media (max-width: 900px) {
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

            <h1>Dashboard</h1>

            <p>
                Selamat datang kembali,
                <strong>{{ Auth::user()->nama ?? Auth::user()->name }}</strong>.
                Yuk, temukan kerjaan yang sesuai denganmu.
            </p>

        </div>


        <div class="stats-grid">

            <div class="stat-card">

                <div class="stat-label">
                    Kerjaan Selesai
                </div>

                <div class="stat-value">
                    {{ $totalSelesai }}
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

            <div class="stat-card">

                <div class="stat-label">
                    Rating Saya
                </div>

                <div class="stat-value rating">

                    <span class="star">★</span>

                    {{ number_format($avgRating, 1) }}

                </div>

            </div>

        </div>

        <div class="section-card">

            <div class="section-header">

                <div>
                    <h2>Pekerjaan Yang Sedang Dibuka</h2>

                    <p>
                        Temukan pekerjaan baru yang bisa kamu ambil.
                    </p>
                </div>

                <a href="/mahasiswa/kerjaan" class="view-all">
                    Lihat Semua →
                </a>

            </div>


            @if ($kerjaanTerbaru->count() > 0)

                <div class="table-wrapper">

                    <table class="job-table">

                        <thead>

                            <tr>
                                <th>Nama Kerjaan</th>
                                <th>Kategori</th>
                                <th>Imbalan</th>
                                <th>Lokasi</th>
                                <th>Deadline</th>
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
                                        {{ $kerjaan->kategori->nama_kategori ?? '-' }}
                                    </td>

                                    <td>
                                        <div class="reward">
                                            Rp {{ number_format($kerjaan->imbalan, 0, ',', '.') }}
                                        </div>
                                    </td>

                                    <td class="muted">
                                        {{ $kerjaan->lokasi }}
                                    </td>

                                    <td class="muted">
                                        {{ \Carbon\Carbon::parse($kerjaan->deadline)->format('d M Y') }}
                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div class="empty-state">
                    Belum ada pekerjaan yang sedang dibuka.
                </div>

            @endif

        </div>

    </div>

</body>

</html>
