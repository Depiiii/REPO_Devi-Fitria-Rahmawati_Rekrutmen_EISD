<?php

namespace App\Http\Controllers;

use App\Models\Lamaran;
use App\Models\Kerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LamaranController extends Controller
{
    public function index()
    {
        $lamarans = Lamaran::with(['kerjaan.user', 'kerjaan.kategori'])
            ->where('id_user', Auth::id())
            ->latest()
            ->get();

        return view('mahasiswa.lamaran.index', compact('lamarans'));
    }

    public function create(Kerjaan $kerjaan)
    {
        if ($kerjaan->id_user === Auth::id()) {
            abort(403);
        }

        if ($kerjaan->status !== 'dibuka') {
            return back()->with(
                'error',
                'Kerjaan ini sudah tidak menerima lamaran.'
            );
        }

        $sudahMelamar = Lamaran::where('id_pekerjaan', $kerjaan->id)
            ->where('id_user', Auth::id())
            ->exists();

        if ($sudahMelamar) {
            return back()->with(
                'error',
                'Kamu sudah melamar kerjaan ini.'
            );
        }

        return view('mahasiswa.lamaran.create', compact('kerjaan'));
    }

    public function store(Request $request, Kerjaan $kerjaan)
    {
        if ($kerjaan->id_user === Auth::id()) {
            abort(403);
        }

        if ($kerjaan->status !== 'dibuka') {
            return back()->with(
                'error',
                'Kerjaan ini sudah tidak menerima lamaran.'
            );
        }

        $sudahMelamar = Lamaran::where('id_pekerjaan', $kerjaan->id)
            ->where('id_user', Auth::id())
            ->exists();

        if ($sudahMelamar) {
            return back()->with(
                'error',
                'Kamu sudah melamar kerjaan ini.'
            );
        }

        $request->validate([
            'pesan_lamar' => 'required|string|max:1000',
        ], [
            'pesan_lamar.required' => 'Pesan lamaran wajib diisi.',
            'pesan_lamar.string' => 'Pesan lamaran harus berupa teks.',
            'pesan_lamar.max' => 'Pesan lamaran maksimal 1000 karakter.',
        ]);

        Lamaran::create([
            'id_pekerjaan' => $kerjaan->id,
            'id_user' => Auth::id(),
            'pesan_lamar' => $request->pesan_lamar,
            'status' => 'pending',
        ]);

        return redirect('/mahasiswa/lamaran')
            ->with('success', 'Lamaran berhasil dikirim.');
    }

   public function pelamar(Kerjaan $kerjaan)
{
    if ($kerjaan->id_user !== Auth::id()) {
        abort(403);
    }

    $lamarans = Lamaran::with([
        'user.ulasans'
    ])
    ->where('id_pekerjaan', $kerjaan->id)
    ->latest()
    ->get();

    return view(
        'mahasiswa.kerjaan.lamaran',
        compact('kerjaan', 'lamarans')
    );
}

    public function accept(Lamaran $lamaran)
    {
        $kerjaan = $lamaran->kerjaan;

        if ($kerjaan->id_user !== Auth::id()) {
            abort(403);
        }

        if ($kerjaan->status !== 'dibuka') {
            return back()->with(
                'error',
                'Kerjaan sudah tidak tersedia.'
            );
        }

        if ($lamaran->status !== 'pending') {
            return back()->with(
                'error',
                'Lamaran ini sudah diproses.'
            );
        }

        $lamaran->update([
            'status' => 'diterima',
        ]);
        Lamaran::where('id_pekerjaan', $kerjaan->id)
            ->where('id', '!=', $lamaran->id)
            ->where('status', 'pending')
            ->update([
                'status' => 'ditolak',
            ]);
        $kerjaan->update([
            'status' => 'berjalan',
        ]);

        return back()->with(
            'success',
            'Pelamar berhasil diterima. Kerjaan sekarang berstatus berjalan.'
        );
    }

    public function reject(Lamaran $lamaran)
    {
        $kerjaan = $lamaran->kerjaan;

        if ($kerjaan->id_user !== Auth::id()) {
            abort(403);
        }

        if ($lamaran->status !== 'pending') {
            return back()->with(
                'error',
                'Lamaran ini sudah diproses.'
            );
        }

        $lamaran->update([
            'status' => 'ditolak',
        ]);

        return back()->with(
            'success',
            'Lamaran berhasil ditolak.'
        );
    }
}
