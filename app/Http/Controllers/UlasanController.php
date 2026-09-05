<?php

namespace App\Http\Controllers;

use App\Models\Kerjaan;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UlasanController extends Controller
{
    public function create(Kerjaan $kerjaan)
    {
        if ($kerjaan->id_user !== Auth::id()) {
            abort(403);
        }

        if ($kerjaan->status !== 'selesai') {
            return back()->with(
                'error',
                'Rating hanya dapat diberikan setelah kerjaan selesai.'
            );
        }

        if ($kerjaan->ulasan) {
            return back()->with(
                'error',
                'Kerjaan ini sudah diberi rating.'
            );
        }

        // Cari pelamar yang diterima
        $lamaran = $kerjaan->lamaran()
            ->where('status', 'diterima')
            ->with('user')
            ->first();

        if (!$lamaran) {
            return back()->with(
                'error',
                'Belum ada pelamar yang diterima.'
            );
        }

        return view(
            'mahasiswa.ulasan.create',
            compact('kerjaan', 'lamaran')
        );
    }

    public function store(Request $request, Kerjaan $kerjaan)
    {
        if ($kerjaan->id_user !== Auth::id()) {
            abort(403);
        }

        if ($kerjaan->status !== 'selesai') {
            return back()->with(
                'error',
                'Rating hanya dapat diberikan setelah kerjaan selesai.'
            );
        }

        if ($kerjaan->ulasan) {
            return back()->with(
                'error',
                'Kerjaan ini sudah diberi rating.'
            );
        }

        $lamaran = $kerjaan->lamaran()
            ->where('status', 'diterima')
            ->first();

        if (!$lamaran) {
            return back()->with(
                'error',
                'Tidak ditemukan pelamar yang diterima.'
            );
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'required|string|max:1000',
        ], [
            'rating.required' => 'Rating wajib dipilih.',
            'rating.min' => 'Rating minimal 1.',
            'rating.max' => 'Rating maksimal 5.',
            'komentar.required' => 'Komentar wajib diisi.',
            'komentar.max' => 'Komentar maksimal 1000 karakter.',
        ]);

        Ulasan::create([
            'id_pekerjaan' => $kerjaan->id,
            'id_pelamar' => $lamaran->id_user,
            'rating' => $request->rating,
            'komentar' => $request->komentar,
        ]);

        return redirect('/mahasiswa/kelola-kerjaan')
            ->with('success', 'Rating berhasil diberikan.');
    }
}
