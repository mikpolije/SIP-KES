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
}
