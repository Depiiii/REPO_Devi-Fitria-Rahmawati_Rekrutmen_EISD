<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Kategori - KerjainYUK</title>

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
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 48px 60px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
        }

        .header-left h1 {
            margin: 0 0 7px;
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .header-left p {
            margin: 0;
            color: #77777e;
            font-size: 14px;
        }

        .btn-add {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 11px 17px;
            background: #6d5193;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .btn-add:hover {
            background: #5c437e;
            transform: translateY(-1px);
        }

        .plus {
            font-size: 17px;
            line-height: 1;
        }

        .alert {
            padding: 13px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 13px;
            border: 1px solid;
        }

        .alert-success {
            background: #eef8f2;
            color: #47785c;
            border-color: #d8ecdf;
        }

        .alert-error {
            background: #fff1f1;
            color: #a34d4d;
            border-color: #f1d6d6;
        }

        .error-list {
            margin: 0;
            padding-left: 18px;
        }

        .error-list li {
            margin-bottom: 4px;
        }

        .category-card {
            background: #ffffff;
            border: 1px solid #e5e5e8;
            border-radius: 18px;
            padding: 24px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.03);
        }

        .table-wrapper {
            width: 100%;
        }

        .category-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            border: 1px solid #e9e9ec;
            border-radius: 12px;
            overflow: hidden;
            background: #ffffff;
        }

        .category-table thead {
            background: #f8f8f9;
        }

        .category-table th {
            padding: 14px 16px;
            text-align: left;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #77777e;
            border-bottom: 1px solid #e9e9ec;
        }

        .category-table td {
            padding: 17px 16px;
            font-size: 13px;
            color: #444448;
            border-bottom: 1px solid #eeeeef;
            vertical-align: middle;
        }

        .category-table tbody tr:last-child td {
            border-bottom: none;
        }

        .category-table tbody tr {
            transition: background 0.15s ease;
        }

        .category-table tbody tr:hover {
            background: #fafafa;
        }

        .number-cell {
            width: 60px;
            text-align: center !important;
            color: #99999f !important;
        }

        .category-name {
            font-weight: 600;
            color: #202024 !important;
        }

        .action-cell {
            width: 180px;
        }

        .action-wrapper {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-edit {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px 13px;
            background: #f1ecf6;
            color: #6d5193;
            text-decoration: none;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .btn-edit:hover {
            background: #e6dcef;
        }

        .btn-delete {
            border: none;
            padding: 8px 13px;
            background: #fff1f1;
            color: #a34d4d;
            border-radius: 8px;
            font-family: inherit;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .btn-delete:hover {
            background: #fbe1e1;
        }

        .empty-state {
            text-align: center;
            padding: 50px 20px !important;
            color: #99999f !important;
        }

        .empty-icon {
            width: 46px;
            height: 46px;
            margin: 0 auto 14px;
            border-radius: 12px;
            background: #f3f3f4;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .empty-title {
            display: block;
            color: #55555a;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .empty-description {
            font-size: 12px;
            color: #99999f;
        }

        @media (max-width: 700px) {
            .page-container {
                padding: 28px 20px 40px;
            }

            .page-header {
                align-items: flex-start;
                gap: 20px;
            }

            .header-left h1 {
                font-size: 24px;
            }

            .category-card {
                padding: 15px;
            }

            .category-table th,
            .category-table td {
                padding: 13px 10px;
            }

            .action-wrapper {
                flex-direction: column;
                align-items: stretch;
            }

            .action-cell {
                width: 120px;
            }

            .btn-edit,
            .btn-delete {
                text-align: center;
            }
        }
    </style>
</head>

<body>

    @include('layouts.navbar')

    <div class="page-container">

        <div class="page-header">

            <div class="header-left">
                <h1>Kelola Kategori</h1>
                <p>Kelola kategori kerjaan yang tersedia di KerjainYUK.</p>
            </div>

            <a href="/admin/kategori/create" class="btn-add">
                <span class="plus">+</span>
                Tambah Kategori
            </a>

        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error">
                <ul class="error-list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="category-card">

            <div class="table-wrapper">

                <table class="category-table">

                    <thead>
                        <tr>
                            <th class="number-cell">No</th>
                            <th>Nama Kategori</th>
                            <th class="action-cell">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($kategoris as $kategori)

                            <tr>

                                <td class="number-cell">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="category-name">
                                    {{ $kategori->nama_kategori }}
                                </td>

                                <td class="action-cell">

                                    <div class="action-wrapper">

                                        <a
                                            href="/admin/kategori/{{ $kategori->id }}/edit"
                                            class="btn-edit"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            action="/admin/kategori/{{ $kategori->id }}"
                                            method="POST"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn-delete"
                                                onclick="return confirm('Yakin ingin menghapus kategori ini?')"
                                            >
                                                Hapus
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="3" class="empty-state">

                                    <div class="empty-icon">
                                        📂
                                    </div>

                                    <span class="empty-title">
                                        Belum ada kategori
                                    </span>

                                    <span class="empty-description">
                                        Tambahkan kategori pertama untuk mulai mengelola kerjaan.
                                    </span>

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</body>

</html>

