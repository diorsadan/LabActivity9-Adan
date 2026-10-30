<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Shows the login form (resources/views/auth/login.blade.php)
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Check that email and password were filled in, else go back with errors
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Auth::attempt finds the user by email and checks the hashed password
        if (Auth::attempt($credentials)) {
            // New session ID after login to prevent session fixation
            $request->session()->regenerate();

            // Go to the page the user wanted before login, or /dashboard
            return redirect()->intended('/dashboard');
        }

        // Wrong login: go back to the form, show error, keep only the email typed
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // Clear the session data and make a new CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
