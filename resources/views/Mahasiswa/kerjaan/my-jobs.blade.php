<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Kerjaan - KerjainYUK</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f5f6;
            color: #131212;
        }

        .page-container {
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
            padding: 40px 48px 60px;
        }

        .page-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 28px;
        }

        .page-header h1 {
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -0.7px;
            color: #131212;
        }

        .page-header p {
            margin-top: 8px;
            color: #6d6d72;
            font-size: 14px;
            line-height: 1.5;
        }

        .btn-create {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 10px 15px;
            border-radius: 8px;
            background: #131212;
            color: #ffffff;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            white-space: nowrap;
            transition: all 0.2s ease;
        }

        .btn-create:hover {
            background: #2b2a2a;
            transform: translateY(-1px);
        }

        .alert {
            padding: 12px 14px;
            border-radius: 9px;
            font-size: 13px;
            margin-bottom: 20px;
        }

        .alert-success {
            background: #eef8f2;
            border: 1px solid #d5ebdd;
            color: #47785c;
        }

        .alert-error {
            background: #fff1f1;
            border: 1px solid #f2d4d4;
            color: #a34d4d;
        }

        .job-card {
            background: #ffffff;
            border: 1px solid #e5e5e8;
            border-radius: 18px;
            padding: 28px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.03);
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .card-header h2 {
            font-size: 17px;
            font-weight: 650;
            color: #131212;
        }

        .card-header span {
            font-size: 12px;
            color: #77777c;
        }

        .table-wrapper {
            width: 100%;
            max-width: 100%;
            overflow-x: hidden;
        }

        .job-table {
            width: 100%;
            min-width: 0;
            table-layout: fixed;
            border-collapse: separate;
            border-spacing: 0;
            border: 1px solid #e9e9ec;
            border-radius: 12px;
            overflow: hidden;
            background: #ffffff;
        }

        .job-table th {
            background: #f8f8f9;
            color: #6d6d72;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            text-align: left;
            padding: 13px 12px;
            border-bottom: 1px solid #e9e9ec;
        }

        .job-table td {
            padding: 16px 12px;
            border-bottom: 1px solid #eeeeef;
            color: #454548;
            font-size: 13px;
            vertical-align: middle;
        }

        .job-table tbody tr:last-child td {
            border-bottom: none;
        }

        .job-table tbody tr {
            transition: background 0.15s ease;
        }

        .job-table tbody tr:hover {
            background: #fafafa;
        }

        .number-cell {
            width: 38px;
            max-width: 38px;
            padding: 16px 6px !important;
            text-align: center;
            color: #99999e !important;
            font-size: 12px !important;
        }

        .job-name {
            font-weight: 600;
            color: #242426 !important;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .category-cell {
            color: #66666b !important;
        }

        .salary-cell {
            font-weight: 600;
            color: #3f3f42 !important;
            white-space: nowrap;
        }

        .location-cell,
        .deadline-cell {
            color: #66666b !important;
        }

        .applicant-cell {
            text-align: center;
            font-weight: 600;
            color: #454548 !important;
        }

        .status {
            display: inline-flex;
            align-items: center;
            padding: 5px 9px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 600;
            white-space: nowrap;
        }

        .status-dibuka {
            background: #f1f1f3;
            color: #55555a;
        }

        .status-berjalan {
            background: #f5f0fa;
            color: #6d5193;
        }

        .status-selesai {
            background: #eef8f2;
            color: #47785c;
        }

        .action-cell {
            width: 260px;
        }

        .actions {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 6px;
        }

        .action-link,
        .action-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 7px 10px;
            border-radius: 7px;
            border: 1px solid #e1e1e4;
            background: #ffffff;
            color: #4c4c50;
            text-decoration: none;
            font-family: inherit;
            font-size: 11px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .action-link:hover,
        .action-button:hover {
            background: #f5f5f6;
            border-color: #d3d3d6;
            color: #131212;
        }

        .action-edit {
            color: #6d5193;
            border-color: #e1d9e9;
            background: #faf8fc;
        }

        .action-edit:hover {
            background: #f4eff8;
            border-color: #d7c9e2;
            color: #5a407d;
        }

        .action-applicant {
            color: #4f5f70;
            border-color: #dce2e8;
            background: #f8fafc;
        }

        .action-applicant:hover {
            background: #f1f4f7;
        }


        .action-delete {
            color: #a34d4d;
            border-color: #efd7d7;
            background: #fffafa;
        }

        .action-delete:hover {
            background: #fff1f1;
            border-color: #e7c2c2;
        }


        .action-complete {
            color: #47785c;
            border-color: #d6e8dc;
            background: #f8fcf9;
        }

        .action-complete:hover {
            background: #eef8f2;
            border-color: #c4dfcd;
        }

        .action-rating {
            color: #7a6845;
            border-color: #ebe2d2;
            background: #fcfaf6;
        }

        .action-rating:hover {
            background: #f7f2e8;
        }

        .already-rated {
            display: inline-flex;
            align-items: center;
            padding: 7px 10px;
            border-radius: 7px;
            background: #f3f3f4;
            color: #88888d;
            font-size: 11px;
            font-weight: 600;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-icon {
            width: 46px;
            height: 46px;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: #f2f2f4;
            color: #77777c;
            font-size: 20px;
        }

        .empty-state h3 {
            font-size: 16px;
            color: #303033;
            margin-bottom: 7px;
        }

        .empty-state p {
            color: #85858a;
            font-size: 13px;
            margin-bottom: 18px;
        }

        @media (max-width: 1100px) {
            .page-container {
                padding: 30px 24px 50px;
            }

            .job-card {
                padding: 20px;
            }

            .job-table th,
            .job-table td {
                padding: 12px 8px;
            }

            .action-cell {
                width: 230px;
            }
        }

        @media (max-width: 850px) {
            .page-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .btn-create {
                width: 100%;
                justify-content: center;
            }

            .job-table {
                font-size: 12px;
            }

            .job-table th {
                font-size: 10px;
            }

            .job-table td {
                font-size: 11px;
            }

            .action-cell {
                width: 210px;
            }
        }
    </style>
</head>

<body>

@include('layouts.navbar')

<div class="page-container">

    <div class="page-header">
        <div>
            <h1>Kelola Kerjaan</h1>
            <p>
                Kelola kerjaan yang kamu buat dan lihat pelamar yang masuk.
            </p>
        </div>

        <a href="/mahasiswa/kerjaan/create" class="btn-create">
            <span>+</span>
            Buat Kerjaan
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif

    <div class="job-card">

        <div class="card-header">
            <h2>Kerjaan Buatan Saya</h2>

            <span>
                {{ $kerjaans->count() }} kerjaan
            </span>
        </div>


        @if ($kerjaans->count() > 0)

            <div class="table-wrapper">

                <table class="job-table">

                    <thead>
                        <tr>
                            <th class="number-cell">No</th>
                            <th>Nama Kerjaan</th>
                            <th>Kategori</th>
                            <th>Imbalan</th>
                            <th>Lokasi</th>
                            <th>Deadline</th>
                            <th>Status</th>
                            <th>Pelamar</th>
                            <th class="action-cell">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($kerjaans as $kerjaan)

                            <tr>

                                <!-- No -->
                                <td class="number-cell">
                                    {{ $loop->iteration }}
                                </td>


                                <!-- Nama -->
                                <td class="job-name" title="{{ $kerjaan->nama }}">
                                    {{ $kerjaan->nama }}
                                </td>


                                <!-- Kategori -->
                                <td class="category-cell">
                                    {{ $kerjaan->kategori->nama_kategori }}
                                </td>


                                <!-- Imbalan -->
                                <td class="salary-cell">
                                    Rp {{ number_format($kerjaan->imbalan, 0, ',', '.') }}
                                </td>


                                <!-- Lokasi -->
                                <td class="location-cell">
                                    {{ $kerjaan->lokasi }}
                                </td>


                                <!-- Deadline -->
                                <td class="deadline-cell">
                                    {{ $kerjaan->deadline->format('d-m-Y') }}
                                </td>


                                <!-- Status -->
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

                                        <span class="status status-dibuka">
                                            {{ ucfirst($kerjaan->status) }}
                                        </span>

                                    @endif

                                </td>


                                <!-- Jumlah Pelamar -->
                                <td class="applicant-cell">
                                    {{ $kerjaan->lamaran->count() }}
                                </td>


                                <!-- Aksi -->
                                <td class="action-cell">

                                    <div class="actions">

                                        <!-- Edit -->
                                        <a
                                            href="/mahasiswa/kerjaan/{{ $kerjaan->id }}/edit"
                                            class="action-link action-edit"
                                        >
                                            Edit
                                        </a>


                                        <!-- Lihat Pelamar -->
                                        <a
                                            href="/mahasiswa/kerjaan/{{ $kerjaan->id }}/lamaran"
                                            class="action-link action-applicant"
                                        >
                                            Pelamar
                                        </a>


                                        <!-- Hapus -->
                                        <form
                                            action="/mahasiswa/kerjaan/{{ $kerjaan->id }}"
                                            method="POST"
                                            style="display: inline;"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="action-button action-delete"
                                                onclick="return confirm('Yakin ingin menghapus kerjaan ini?')"
                                            >
                                                Hapus
                                            </button>
                                        </form>


                                        <!-- Tandai Selesai -->
                                        @if ($kerjaan->status === 'berjalan')

                                            <form
                                                action="/mahasiswa/kerjaan/{{ $kerjaan->id }}/selesai"
                                                method="POST"
                                                style="display: inline;"
                                            >
                                                @csrf

                                                <button
                                                    type="submit"
                                                    class="action-button action-complete"
                                                >
                                                    Tandai Selesai
                                                </button>
                                            </form>

                                        @endif


                                        <!-- Beri Rating -->
                                        @if ($kerjaan->status === 'selesai' && !$kerjaan->ulasan)

                                            <a
                                                href="/mahasiswa/kerjaan/{{ $kerjaan->id }}/ulasan/create"
                                                class="action-link action-rating"
                                            >
                                                Beri Rating
                                            </a>

                                        @endif

                                        @if ($kerjaan->status === 'selesai' && $kerjaan->ulasan)

                                            <span class="already-rated">
                                                ✓ Sudah Diberi Rating
                                            </span>

                                        @endif

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="empty-state">

                <div class="empty-icon">
                    +
                </div>

                <h3>Belum Ada Kerjaan</h3>

                <p>
                    Kamu belum membuat kerjaan. Yuk buat kerjaan pertamamu!
                </p>

                <a href="/mahasiswa/kerjaan/create" class="btn-create">
                    <span>+</span>
                    Buat Kerjaan
                </a>

            </div>

        @endif

    </div>

</div>

</body>
</html>

