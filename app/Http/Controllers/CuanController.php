<?php

namespace App\Http\Controllers;

use App\cuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CuanController extends Controller
{

    // Tampilkan semua user
    public function index()
    {
        $cuan = cuan::all(); // Ambil semua data dari tabel cuan
        return view('Cuan.index', compact('cuan')); // Kirim ke view
    }

    // Form tambah user
    public function create()
    {
        return view('cuan.create');
    }

    // Simpan user baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:cuan',
            'password' => 'required|string|min:6',
            'role' => 'required',
        ]);

        cuan::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'bio' => $request->bio,
            'skills' => json_encode($request->skills),
            'profile_photo' => $request->profile_photo,
        ]);

        return redirect()->route('cuan.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    // Form edit user
    public function edit($id)
    {
        $user = cuan::findOrFail($id);
        return view('cuan.edit', compact('user'));
    }

    // Update data user
    public function update(Request $request, $id)
    {
        $user = cuan::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:cuan,email,' . $id,
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'bio' => $request->bio,
            'skills' => json_encode($request->skills),
            'profile_photo' => $request->profile_photo,
        ]);

        return redirect()->route('cuan.index')->with('success', 'Pengguna berhasil diperbarui.');
    }

    // Hapus user
    public function destroy($id)
    {
        $user = cuan::findOrFail($id);
        $user->delete();

        return redirect()->route('cuan.index')->with('success', 'Pengguna berhasil dihapus.');
    }

    public function editPassword()
{
    return view('cuan.edit-password');
}

    public function __construct()
    {
        $this->middleware('auth');
    }
}
