<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Kerjaan - KerjainYUK</title>

    <link rel="stylesheet" href="{{ asset('css/kerjaan.css') }}">
</head>

<body>

    @include('layouts.navbar')

    <main class="page-container">

        <div class="page-header">
            <div>
                <span class="page-label">KERJAINYUK</span>
                <h1>Daftar Kerjaan</h1>
                <p>Temukan dan pilih pekerjaan yang sesuai dengan kemampuanmu.</p>
            </div>
        </div>

        @if (session('success'))
        <div class="alert alert-success">
            <span class="alert-icon">✓</span>
            <span>{{ session('success') }}</span>
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-error">
            <span class="alert-icon">!</span>
            <span>{{ session('error') }}</span>
        </div>
        @endif

        <section class="job-card">

            <div class="card-header">
                <div>
                    <h2>Semua Kerjaan</h2>
                    <p>
                        {{ $kerjaans->count() }}
                        pekerjaan tersedia
                    </p>
                </div>
            </div>

            @if ($kerjaans->count() > 0)

            <div class="table-wrapper">

                <table class="job-table">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kerjaan</th>
                            <th>Kategori</th>
                            <th>Imbalan</th>
                            <th>Lokasi</th>
                            <th>Deadline</th>
                            <th>Status</th>
                            <th>Pembuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($kerjaans as $kerjaan)

                        <tr>

                            {{-- No --}}
                            <td class="number-cell">
                                {{ $loop->iteration }}
                            </td>

                            {{-- Nama --}}
                            <td>
                                <div class="job-name">
                                    {{ $kerjaan->nama }}
                                </div>
                            </td>

                            {{-- Kategori --}}
                            <td>
                                <span class="category-badge">
                                    {{ $kerjaan->kategori->nama_kategori }}
                                </span>
                            </td>

                            {{-- Imbalan --}}
                            <td>
                                <span class="salary">
                                    Rp {{ number_format($kerjaan->imbalan, 0, ',', '.') }}
                                </span>
                            </td>

                            {{-- Lokasi --}}
                            <td>
                                <div class="location">
                                    {{ $kerjaan->lokasi }}
                                </div>
                            </td>

                            {{-- Deadline --}}
                            <td>
                                <span class="deadline">
                                    {{ $kerjaan->deadline->format('d M Y') }}
                                </span>
                            </td>

                            {{-- Status --}}
                            <td>
                                @if ($kerjaan->status === 'dibuka')

                                <span class="status-badge status-open">
                                    <span class="status-dot"></span>
                                    Dibuka
                                </span>

                                @else

                                <span class="status-badge status-closed">
                                    <span class="status-dot"></span>
                                    Ditutup
                                </span>

                                @endif
                            </td>

                            {{-- Pembuat --}}
                            <td>
                                <div class="creator">
                                    {{ $kerjaan->user->nama }}
                                </div>
                            </td>

                            {{-- Action --}}
                            <td>

                                @if ($kerjaan->status === 'dibuka')

                                @if ($kerjaan->sudah_dilamar)

                                <span class="btn-applied">
                                    <span class="check-icon">✓</span>
                                    Sudah Dilamar
                                </span>

                                @else

                                <a
                                    href="/mahasiswa/kerjaan/{{ $kerjaan->id }}/lamar"
                                    class="btn-apply">
                                    Lamar
                                    <span>→</span>
                                </a>

                                @endif

                                @else

                                <span class="not-available">
                                    Tidak tersedia
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

                <div class="empty-icon">
                    ♧
                </div>

                <h3>Belum ada kerjaan</h3>

                <p>
                    Saat ini belum ada pekerjaan yang tersedia.
                    Silakan cek kembali nanti.
                </p>

            </div>

            @endif

        </section>

    </main>

</body>

</html>
