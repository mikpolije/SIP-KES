<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Prepare credentials for authentication
        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        // Check if "remember me" is checked
        $remember = $request->has('remember');

        // Attempt to authenticate the user
        if (Auth::attempt($credentials, $remember)) {
            // Redirect to the intended page (default: dashboard)
            return redirect()->intended('main/index');
        }

        // If authentication fails, return back with errors
        return back()->withErrors([
            'login' => 'Invalid username or password.',
        ]);
    }

    public function logout(Request $request)
    {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login');
    }



    public function showIdentityForm()
    {
        return view('user.forgot-password');
    }

    public function checkIdentity(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'nik' => 'required',
            'profesi' => 'required',
        ]);

        $user = User::where('username', $request->username)
                    ->where('nik', $request->nik)
                    ->where('profesi', $request->profesi)
                    ->first();

        if (!$user) {
            return back()->withErrors(['identity' => 'Data tidak cocok.']);
        }

        // Redirect ke halaman reset password
        return redirect()->route('password.reset', $user->id);
    }

    public function showResetForm($id)
    {
        $user = User::findOrFail($id);
        return view('user.reset-password', compact('user'));
    }

    public function resetPassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::findOrFail($id);
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login')->with('success', 'Password berhasil diperbarui. Silakan login kembali.');
    }



}
