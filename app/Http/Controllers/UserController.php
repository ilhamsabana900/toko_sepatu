<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'telepon' => 'nullable|string',
            'provinsi_id' => 'nullable|integer',
            'kota_id' => 'nullable|integer',
            'kecamatan_id' => 'nullable|integer',
            'kelurahan_id' => 'nullable|integer',
            'kode_pos' => 'nullable|string|max:10',
        ]);

        // membuat user baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),  // Meng-hash password
            'telepon' => $request->telepon,
            'provinsi_id' => $request->provinsi_id,
            'kota_id' => $request->kota_id,
            'kecamatan_id' => $request->kecamatan_id,
            'kelurahan_id' => $request->kelurahan_id,
            'kode_pos' => $request->kode_pos,
        ]);

        return redirect()->route('admin.user.index')->with('success', 'berhasil membuat user baru');
    }

    // menampilkan form edit berdasarkan id
    // Menampilkan form edit user berdasarkan ID
    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('admin.user.edit', compact('users'));
    }

    // Update data user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
            'telepon' => 'nullable|string',
            'provinsi_id' => 'nullable|integer',
            'kota_id' => 'nullable|integer',
            'kecamatan_id' => 'nullable|integer',
            'kelurahan_id' => 'nullable|integer',
            'kode_pos' => 'nullable|string|max:10',
        ]);

        // Jika password diisi, update password-nya
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        // Update data user
        $user->update($request->except('password'));

        return redirect()->route('admin.user.index')->with('success', 'User updated successfully.');
    }

    // Hapus user berdasarkan ID
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.user.index')->with('success', 'User deleted successfully.');
    }
}
