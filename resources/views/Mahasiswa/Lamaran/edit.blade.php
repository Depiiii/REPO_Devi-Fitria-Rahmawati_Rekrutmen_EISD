<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Kerjaan - KerjainYUK</title>
</head>
<body>

    @include('layouts.navbar')

    <div style="padding: 30px;">

        <h1>Edit Kerjaan</h1>

        @if ($errors->any())
            <div style="color: red;">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form
            action="/mahasiswa/kerjaan/{{ $kerjaan->id }}"
            method="POST"
        >

            @csrf
            @method('PUT')

            <div>
                <label>Nama Kerjaan</label>
                <br>
                <input
                    type="text"
                    name="nama"
                    value="{{ old('nama', $kerjaan->nama) }}"
                    required
                >
            </div>

            <br>

            <div>
                <label>Kategori</label>
                <br>

                <select name="id_kategori" required>
                    <option value="">-- Pilih Kategori --</option>

                    @foreach ($kategoris as $kategori)
                        <option
                            value="{{ $kategori->id }}"
                            {{ old('id_kategori', $kerjaan->id_kategori) == $kategori->id ? 'selected' : '' }}
                        >
                            {{ $kategori->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <br>

            <div>
                <label>Imbalan</label>
                <br>
                <input
                    type="number"
                    name="imbalan"
                    value="{{ old('imbalan', $kerjaan->imbalan) }}"
                    min="0"
                    required
                >
            </div>

            <br>

            <div>
                <label>Lokasi</label>
                <br>
                <input
                    type="text"
                    name="lokasi"
                    value="{{ old('lokasi', $kerjaan->lokasi) }}"
                    required
                >
            </div>

            <br>

            <div>
                <label>Deadline</label>
                <br>
                <input
                    type="date"
                    name="deadline"
                    value="{{ old('deadline', $kerjaan->deadline->format('Y-m-d')) }}"
                    required
                >
            </div>

            <br>

            <button type="submit">
                Update Kerjaan
            </button>

            <a href="/mahasiswa/kerjaan">
                Batal
            </a>

        </form>

    </div>

</body>
</html>
