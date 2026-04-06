<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        // Regenerate CSRF token on each login page load
        session()->regenerateToken();
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect to appropriate dashboard based on role
            $user = Auth::user();
            if ($user->isAdmin()) {
                return redirect('/admin/dashboard');
            }

            return redirect('/user/dashboard');
        }

        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => 'user', // Default role is 'user'
        ]);

        // Auto-login the user after registration
        Auth::login($user);
        $request->session()->regenerate();

        // Return JSON response for AJAX requests
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'User registered successfully',
                'redirect' => '/user/dashboard'
            ], 200);
        }

        // Redirect to user dashboard
        return redirect('/user/dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Regenerate a fresh token for the login page
        session()->regenerateToken();

        return redirect('/')->with('success', 'You have been logged out successfully.');
    }
}