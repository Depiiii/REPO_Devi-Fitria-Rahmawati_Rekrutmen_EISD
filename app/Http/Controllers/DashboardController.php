<?php

namespace App\Http\Controllers;

use App\Models\Kerjaan;
use App\Models\Lamaran;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function mahasiswa()
    {
        $user = Auth::user();

        $totalLamaran = Lamaran::where('id_user', $user->id)
            ->count();

        $totalSelesai = Lamaran::where('id_user', $user->id)
            ->where('status', 'diterima')
            ->whereHas('kerjaan', function ($query) {
                $query->where('status', 'selesai');
            })
            ->count();


        $avgRating = $user->ulasans()->avg('rating');

        $avgRating = $avgRating
            ? round($avgRating, 1)
            : 0;

        $kerjaanTerbaru = Kerjaan::with([
            'user',
            'kategori'
        ])
            ->where('status', 'dibuka')
            ->where('id_user', '!=', $user->id)
            ->latest()
            ->take(5)
            ->get();

        return view('Mahasiswa.dashboard', compact(
            'totalSelesai',
            'totalLamaran',
            'avgRating',
            'kerjaanTerbaru'
        ));
    }



    public function admin()
    {
        $totalUser = User::where('role', '!=', 'admin')
            ->count();

        $totalKerjaan = Kerjaan::count();

        $kerjaanDibuka = Kerjaan::where('status', 'dibuka')
            ->count();

        $totalLamaran = Lamaran::count();

        $kerjaanTerbaru = Kerjaan::with([
            'user',
            'kategori'
        ])
            ->latest()
            ->take(6)
            ->get();

        $lamaranTerbaru = Lamaran::with([
            'user',
            'kerjaan'
        ])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalUser',
            'totalKerjaan',
            'kerjaanDibuka',
            'totalLamaran',
            'kerjaanTerbaru',
            'lamaranTerbaru'
        ));
    }
}
