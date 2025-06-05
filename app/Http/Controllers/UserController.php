<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $users = User::query()
            ->when($search, fn($q) => $q->where('nama', 'like', "%{$search}%"))
            ->get();

        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'       => 'required|string|max:255',
            'username'   => 'required|string|max:255|unique:users,username',
            'nik'        => 'required|string|max:20|unique:users,nik',
            'profesi'    => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|min:6',
            'alamat'     => 'required|string',
        ]);

        User::create([
            'nama'       => $request->nama,
            'username'   => $request->username,
            'nik'        => $request->nik,
            'profesi'    => $request->profesi,
            'no_telepon' => $request->no_telepon,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'alamat'     => $request->alamat,
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'nama'       => 'required|string|max:255',
            'username'   => 'required|string|max:255|unique:users,username,' . $user->id,
            'nik'        => 'required|string|max:20|unique:users,nik,' . $user->id,
            'profesi'    => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
            'email'      => 'required|email|unique:users,email,' . $user->id,
            'password'   => 'nullable|min:6',
            'alamat'     => 'required|string',
        ]);

        $data = $request->only([
            'nama', 'username', 'nik', 'profesi', 'no_telepon', 'email', 'alamat'
        ]);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }
}
