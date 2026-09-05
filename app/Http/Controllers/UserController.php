<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();

        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:penggunas,email',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:admin,mahasiswa',
            'program_studi' => 'required|string|max:255',
            'semester' => 'required|integer|min:0',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.max' => 'Nama maksimal 255 karakter.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',

            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',

            'role.required' => 'Role wajib dipilih.',
            'role.in' => 'Role tidak valid.',

            'program_studi.required' => 'Program studi wajib diisi.',

            'semester.required' => 'Semester wajib diisi.',
            'semester.integer' => 'Semester harus berupa angka.',
            'semester.min' => 'Semester minimal 0.',
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
            'program_studi' => $request->program_studi,
            'semester' => $request->semester,
        ]);

        return redirect('/admin/user')
            ->with('success', 'User berhasil ditambahkan.');
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|in:mahasiswa,admin',
            'program_studi' => 'required|string|max:255',
            'semester' => 'required|integer|min:0',
            'password' => 'nullable|string|min:6|confirmed',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'role.required' => 'Role wajib dipilih.',
            'role.in' => 'Role tidak valid.',
            'program_studi.required' => 'Program studi wajib diisi.',
            'semester.required' => 'Semester wajib diisi.',
            'semester.integer' => 'Semester harus berupa angka.',
            'semester.min' => 'Semester tidak boleh kurang dari 0.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->program_studi = $request->program_studi;
        $user->semester = $request->semester;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect('/admin/user')
            ->with('success', 'User berhasil diperbarui.');
    }


    public function destroy(User $user)
    {
        if ($user->role === 'admin') {
            return back()->with(
                'error',
                'User dengan role admin tidak dapat dihapus.'
            );
        }

        $user->delete();

        return redirect('/admin/user')
            ->with('success', 'User berhasil dihapus.');
    }
}
