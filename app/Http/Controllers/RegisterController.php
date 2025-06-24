<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showForm()
    {
    return view('user.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama'         => 'required|string|max:255',
            'username'     => 'required|string|max:50|unique:users,username',
            'nik'          => 'required|string|max:20|unique:users,nik',
            'profesi'      => 'required|string|max:100',
            'no_telepon'   => 'required|string|max:20',
            'email'        => 'required|email|unique:users,email',
            'password'     => 'required|string|min:6|confirmed',
            'alamat'       => 'required|string',
        ]);


        User::create([
            'nama'         => $request->nama,
            'username'     => $request->username,
            'nik'          => $request->nik,
            'profesi'      => $request->profesi,
            'no_telepon'   => $request->no_telepon,
            'email'        => $request->email,
            'password'     => Hash::make($request->password),
            'alamat'       => $request->alamat,
        ]);

        return redirect()->route('register.form')->with('success', 'User registered successfully!');
    }
}
