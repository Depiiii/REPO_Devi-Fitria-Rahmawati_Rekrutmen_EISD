<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kelola User - KerjainYUK</title>

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
        max-width: 1250px;
        margin: 0 auto;
        padding: 40px 48px 60px;
    }

    /* HEADER */

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
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

    /* BUTTON TAMBAH */

    .btn-add {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 11px 17px;
        background: #6d5193;
        color: #ffffff;
        text-decoration: none;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 600;
        transition: 0.2s;
        white-space: nowrap;
    }

    .btn-add:hover {
        background: #5c437e;
        transform: translateY(-1px);
    }

    .plus {
        font-size: 17px;
        line-height: 1;
    }

    /* ALERT */

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

    /* CARD */

    .user-card {
        background: #ffffff;
        border: 1px solid #e5e5e8;
        border-radius: 18px;
        padding: 24px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.03);
    }

    .table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    /* TABLE */

    .user-table {
        width: 100%;
        min-width: 850px;
        border-collapse: separate;
        border-spacing: 0;
        border: 1px solid #e9e9ec;
        border-radius: 12px;
        overflow: hidden;
        background: #ffffff;
    }

    .user-table thead {
        background: #f8f8f9;
    }

    .user-table th {
        padding: 14px 16px;
        text-align: left;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #77777e;
        border-bottom: 1px solid #e9e9ec;
        white-space: nowrap;
    }

    .user-table td {
        padding: 16px;
        font-size: 13px;
        color: #444448;
        border-bottom: 1px solid #eeeeef;
        vertical-align: middle;
    }

    .user-table tbody tr:last-child td {
        border-bottom: none;
    }

    .user-table tbody tr:hover {
        background: #fafafa;
    }

    /* COLUMN */

    .number-cell {
        width: 60px;
        text-align: center !important;
        color: #99999f !important;
    }

    .name-cell {
        font-weight: 600;
        color: #202024 !important;
        white-space: nowrap;
    }

    .email-cell {
        color: #66666d !important;
    }

    .action-cell {
        width: 150px;
    }

    /* ROLE */

    .role-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 6px 10px;
        border-radius: 999px;
        font-size: 11px;
        font-weight: 600;
    }

    .role-admin {
        background: #f1ecf6;
        color: #6d5193;
    }

    .role-mahasiswa {
        background: #eef8f2;
        color: #47785c;
    }

    /* ACTION */

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
        transition: 0.2s;
    }

    .btn-edit:hover {
        background: #e8e0ef;
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
        transition: 0.2s;
    }

    .btn-delete:hover {
        background: #fbe4e4;
    }

    .admin-note {
        font-size: 11px;
        color: #99999f;
    }

    /* EMPTY */

    .empty-state {
        text-align: center;
        padding: 55px 20px !important;
        color: #99999f !important;
    }

    .empty-title {
        display: block;
        margin-bottom: 6px;
        font-size: 14px;
        font-weight: 600;
        color: #55555a;
    }

    .empty-text {
        font-size: 12px;
        color: #99999f;
    }

    /* RESPONSIVE */

    @media (max-width: 700px) {

        .page-container {
            padding: 30px 20px 40px;
        }

        .page-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .header-left h1 {
            font-size: 24px;
        }

        .btn-add {
            width: 100%;
            justify-content: center;
        }

        .user-card {
            padding: 16px;
        }
    }
</style>


</head>

<body>

@include('layouts.navbar')

<div class="page-container">

    <!-- HEADER -->
    <div class="page-header">

        <div class="header-left">
            <h1>Kelola User</h1>

            <p>
                Kelola data pengguna yang terdaftar di KerjainYUK.
            </p>
        </div>

        <a href="/admin/user/create" class="btn-add">
            <span class="plus">+</span>
            Tambah User
        </a>

    </div>


    <!-- SUCCESS -->
    @if (session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    <!-- ERROR -->
    @if (session('error'))

        <div class="alert alert-error">
            {{ session('error') }}
        </div>

    @endif


    <!-- USER TABLE -->
    <div class="user-card">

        @if ($users->count() > 0)

            <div class="table-wrapper">

                <table class="user-table">

                    <thead>

                        <tr>
                            <th class="number-cell">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Program Studi</th>
                            <th>Semester</th>
                            <th class="action-cell">Aksi</th>
                        </tr>

                    </thead>


                    <tbody>

                        @foreach ($users as $user)

                            <tr>

                                <td class="number-cell">
                                    {{ $loop->iteration }}
                                </td>


                                <td class="name-cell">
                                    {{ $user->nama }}
                                </td>


                                <td class="email-cell">
                                    {{ $user->email }}
                                </td>


                                <td>

                                    @if ($user->role === 'admin')

                                        <span class="role-badge role-admin">
                                            Admin
                                        </span>

                                    @else

                                        <span class="role-badge role-mahasiswa">
                                            Mahasiswa
                                        </span>

                                    @endif

                                </td>


                                <td>
                                    {{ $user->program_studi ?? '-' }}
                                </td>


                                <td>
                                    {{ $user->semester ?? '-' }}
                                </td>


                                <td class="action-cell">

                                    <div class="action-wrapper">

                                        <a
                                            href="/admin/user/{{ $user->id }}/edit"
                                            class="btn-edit"
                                        >
                                            Edit
                                        </a>


                                        @if ($user->role !== 'admin')

                                            <form
                                                action="/admin/user/{{ $user->id }}"
                                                method="POST"
                                            >

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="btn-delete"
                                                    onclick="return confirm('Yakin ingin menghapus user ini?')"
                                                >
                                                    Hapus
                                                </button>

                                            </form>

                                        @else

                                            <span class="admin-note">
                                                Admin
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

                <span class="empty-title">
                    Belum ada user
                </span>

                <span class="empty-text">
                    Belum ada pengguna yang terdaftar di KerjainYUK.
                </span>

            </div>

        @endif

    </div>

</div>
</body>
</html>
