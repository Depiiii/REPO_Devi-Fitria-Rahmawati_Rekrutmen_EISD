<?php

namespace App\Http\Controllers;

use App\Models\Kerjaan;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use App\Models\Lamaran;

class KerjaanController extends Controller
{
    // all kerjaan yang dibuka
    public function index()
    {
        $kerjaans = Kerjaan::with(['user', 'kategori'])
            ->where('status', 'dibuka')
            ->where('id_user', '!=', Auth::id())
            ->latest()
        ->get();

    foreach ($kerjaans as $kerjaan) {
        $kerjaan->sudah_dilamar = Lamaran::where('id_pekerjaan', $kerjaan->id)
            ->where('id_user', Auth::id())
            ->exists();
    }

    return view('mahasiswa.kerjaan.index', compact('kerjaans'));
}


    public function create()
    {
        $kategoris = Kategori::all();

        return view('mahasiswa.kerjaan.create', compact('kategoris'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required|exists:kategoris,id',
            'nama' => 'required|string|max:255',
            'imbalan' => 'required|numeric|min:0',
            'lokasi' => 'required|string|max:255',
            'deadline' => 'required|date|after_or_equal:today',
        ], [
            'id_kategori.required' => 'Kategori wajib dipilih.',
            'id_kategori.exists' => 'Kategori tidak valid.',
            'nama.required' => 'Nama kerjaan wajib diisi.',
            'nama.max' => 'Nama kerjaan maksimal 255 karakter.',
            'imbalan.required' => 'Imbalan wajib diisi.',
            'imbalan.numeric' => 'Imbalan harus berupa angka.',
            'imbalan.min' => 'Imbalan tidak boleh kurang dari 0.',
            'lokasi.required' => 'Lokasi wajib diisi.',
            'deadline.required' => 'Deadline wajib diisi.',
            'deadline.after_or_equal' => 'Deadline tidak boleh sebelum hari ini.',
        ]);

        Kerjaan::create([
            'id_user' => Auth::id(),
            'id_kategori' => $request->id_kategori,
            'nama' => $request->nama,
            'imbalan' => $request->imbalan,
            'lokasi' => $request->lokasi,
            'deadline' => $request->deadline,
            'status' => 'dibuka',
        ]);

        return redirect('/mahasiswa/kelola-kerjaan')
            ->with('success', 'Kerjaan berhasil dibuat.');
    }

    public function edit(Kerjaan $kerjaan)
    {

        if ($kerjaan->id_user !== Auth::id()) {
            abort(403);
        }

        $kategoris = Kategori::all();

        return view('mahasiswa.kerjaan.edit', compact('kerjaan', 'kategoris'));
    }

    public function update(Request $request, Kerjaan $kerjaan)
    {
        // Hanya pemilik kerjaan
        if ($kerjaan->id_user !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'id_kategori' => 'required|exists:kategoris,id',
            'nama' => 'required|string|max:255',
            'imbalan' => 'required|numeric|min:0',
            'lokasi' => 'required|string|max:255',
            'deadline' => 'required|date',
        ], [
            'id_kategori.required' => 'Kategori wajib dipilih.',
            'id_kategori.exists' => 'Kategori tidak valid.',
            'nama.required' => 'Nama kerjaan wajib diisi.',
            'nama.max' => 'Nama kerjaan maksimal 255 karakter.',
            'imbalan.required' => 'Imbalan wajib diisi.',
            'imbalan.numeric' => 'Imbalan harus berupa angka.',
            'imbalan.min' => 'Imbalan tidak boleh kurang dari 0.',
            'lokasi.required' => 'Lokasi wajib diisi.',
            'deadline.required' => 'Deadline wajib diisi.',
        ]);

        $kerjaan->update([
            'id_kategori' => $request->id_kategori,
            'nama' => $request->nama,
            'imbalan' => $request->imbalan,
            'lokasi' => $request->lokasi,
            'deadline' => $request->deadline,
        ]);

        return redirect('/mahasiswa/kelola-kerjaan')
            ->with('success', 'Kerjaan berhasil diperbarui.');
    }

    public function destroy(Kerjaan $kerjaan)
    {
        if ($kerjaan->id_user !== Auth::id()) {
            abort(403);
        }

        $kerjaan->delete();

        return redirect('/mahasiswa/kelola-kerjaan')
            ->with('success', 'Kerjaan berhasil dihapus.');
    }

  public function myJobs()
{
    $kerjaans = Kerjaan::with([
        'kategori',
        'lamaran.user',
        'ulasan'
    ])
    ->where('id_user', Auth::id())
    ->latest()
    ->get();

    return view(
        'mahasiswa.kerjaan.my-jobs',
        compact('kerjaans')
    );
}

    public function selesai(Kerjaan $kerjaan)
    {
        if ($kerjaan->id_user !== Auth::id()) {
            abort(403);
        }

        if ($kerjaan->status !== 'berjalan') {
            return back()
                ->with('error', 'Kerjaan belum dalam status berjalan.');
        }

        $kerjaan->update([
            'status' => 'selesai',
        ]);

        return back()
            ->with('success', 'Kerjaan berhasil diselesaikan.');
    }
}
