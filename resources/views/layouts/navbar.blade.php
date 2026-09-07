<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="app-layout">

<aside class="sidebar">

    <div class="logo">
        KerjainYUK
    </div>

    @auth

        @if (Auth::user()->role === 'admin')

            <div class="sidebar-section">

                <div class="sidebar-title">
                    Admin
                </div>

                <a
                    href="/admin/dashboard"
                    class="sidebar-link">
                    Dashboard
                </a>

                <a
                    href="/admin/user"
                    class="sidebar-link">
                    User
                </a>

                <a
                    href="/admin/kategori"
                    class="sidebar-link">
                    Kategori
                </a>

                <a
                    href="/profil"
                    class="sidebar-link">
                    Profil Saya
                </a>

            </div>

        @elseif (Auth::user()->role === 'mahasiswa')

            <div class="sidebar-section">

                <div class="sidebar-title">
                    Menu
                </div>

                <a
                    href="/mahasiswa/dashboard"
                    class="sidebar-link">
                    Dashboard
                </a>

                <a
                    href="/mahasiswa/kerjaan"
                    class="sidebar-link">
                    Cari Kerjaan
                </a>

                <a
                    href="/mahasiswa/kelola-kerjaan"
                    class="sidebar-link">
                    Kelola Kerjaan
                </a>

                <a
                    href="/mahasiswa/lamaran"
                    class="sidebar-link">
                    Lamaran Saya
                </a>

                <a
                    href="/profil"
                    class="sidebar-link">
                    Profil Saya
                </a>

            </div>

        @endif

        <div class="sidebar-section">

            <form
                action="/logout"
                method="POST"
                style="margin: 0;">

                @csrf

                <button
                    type="submit"
                    class="sidebar-link logout-button">
                    Logout
                </button>

            </form>

        </div>

    @endauth

</aside>


<main class="main-content">

    <div class="topbar">

        <div class="topbar-title">
            KerjainYUK
        </div>

        @auth

            <div class="topbar-user">

                <span class="user-name">
                    Halo, {{ Auth::user()->nama }}
                </span>

            </div>

        @endauth

    </div>

