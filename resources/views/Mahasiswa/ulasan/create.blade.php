<body>

@include('layouts.navbar')

<style>
.page-container{
    max-width:700px;
    margin:auto;
    padding:40px 20px;
}

.rating-card{
    background:#fff;
    border:1px solid #ececec;
    border-radius:20px;
    padding:30px;
    box-shadow:0 2px 10px rgba(0,0,0,.04);
}

.page-title{
    font-size:28px;
    font-weight:700;
    margin-bottom:8px;
    color:#171719;
}

.page-desc{
    color:#777;
    margin-bottom:25px;
}

.job-box{
    background:#f8f8f9;
    border-radius:14px;
    padding:16px;
    margin-bottom:25px;
}

.job-name{
    font-size:20px;
    font-weight:700;
    margin-bottom:6px;
}

.applicant-name{
    color:#555;
    font-size:14px;
}

.error-box{
    background:#fff1f1;
    color:#b91c1c;
    padding:14px;
    border-radius:10px;
    margin-bottom:20px;
}

.form-group{
    margin-bottom:20px;
}

.form-label{
    display:block;
    margin-bottom:8px;
    font-weight:600;
    color:#333;
}

.form-control{
    width:100%;
    padding:12px 14px;
    border:1px solid #ddd;
    border-radius:10px;
    font-size:14px;
    box-sizing:border-box;
}

textarea.form-control{
    resize:vertical;
}

.button-group{
    display:flex;
    gap:12px;
    margin-top:25px;
}

.btn-primary{
    background:#171719;
    color:white;
    border:none;
    border-radius:10px;
    padding:12px 20px;
    cursor:pointer;
    font-weight:600;
}

.btn-primary:hover{
    opacity:.9;
}

.btn-secondary{
    text-decoration:none;
    background:#f3f4f6;
    color:#171719;
    padding:12px 20px;
    border-radius:10px;
    font-weight:600;
}
</style>

<div class="page-container">

    <div class="rating-card">

        <div class="page-title">
            Beri Rating
        </div>

        <div class="page-desc">
            Berikan penilaian untuk mahasiswa yang telah menyelesaikan pekerjaan.
        </div>

        <div class="job-box">

            <div class="job-name">
                {{ $kerjaan->nama }}
            </div>

            <div class="applicant-name">
                Pelamar:
                <strong>{{ $lamaran->user->nama }}</strong>
            </div>

        </div>

        @if ($errors->any())

            <div class="error-box">

                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach

            </div>

        @endif

        <form
            action="/mahasiswa/kerjaan/{{ $kerjaan->id }}/ulasan"
            method="POST"
        >

            @csrf

            <div class="form-group">

                <label class="form-label">
                    Rating
                </label>

                <select
                    name="rating"
                    class="form-control"
                    required
                >
                    <option value="">
                        -- Pilih Rating --
                    </option>

                    <option value="1">⭐ 1 - Sangat Buruk</option>
                    <option value="2">⭐⭐ 2 - Buruk</option>
                    <option value="3">⭐⭐⭐ 3 - Cukup</option>
                    <option value="4">⭐⭐⭐⭐ 4 - Baik</option>
                    <option value="5">⭐⭐⭐⭐⭐ 5 - Sangat Baik</option>

                </select>

            </div>

            <div class="form-group">

                <label class="form-label">
                    Komentar
                </label>

                <textarea
                    name="komentar"
                    rows="5"
                    class="form-control"
                    placeholder="Tulis pengalamanmu bekerja dengan mahasiswa ini..."
                    required
                >{{ old('komentar') }}</textarea>

            </div>

            <div class="button-group">

                <button
                    type="submit"
                    class="btn-primary"
                >
                    Kirim Rating
                </button>

                <a
                    href="/mahasiswa/kelola-kerjaan"
                    class="btn-secondary"
                >
                    Batal
                </a>

            </div>

        </form>

    </div>

</div>

</body>
