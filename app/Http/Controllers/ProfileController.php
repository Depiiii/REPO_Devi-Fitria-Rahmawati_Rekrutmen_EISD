<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $avgRating = Ulasan::where(
            'id_pelamar',
            $user->id
        )->avg('rating');

        $avgRating = $avgRating
            ? round($avgRating, 1)
            : 0;

        $ulasans = Ulasan::with([
            'pemberiUlasan'
        ])
        ->where('id_pelamar', $user->id)
        ->latest()
        ->get();

        return view(
            'Mahasiswa.profile',
            compact(
                'user',
                'avgRating',
                'ulasans'
            )
        );
    }


    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'program_studi' => 'required',
            'semester' => 'required'
        ]);

        Auth::user()->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'program_studi' => $request->program_studi,
            'semester' => $request->semester,
        ]);

        return back()
            ->with('success', 'Profil berhasil diperbarui');
    }


    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);

        if (
            !Hash::check(
                $request->old_password,
                Auth::user()->password
            )
        ) {
            return back()
                ->with(
                    'error',
                    'Password lama salah'
                );
        }

        Auth::user()->update([
            'password' => Hash::make(
                $request->password
            )
        ]);

        return back()
            ->with(
                'success',
                'Password berhasil diubah'
            );
    }
}
