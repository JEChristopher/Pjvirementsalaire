<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        /**
         * TODO : VERIFIER QUE is_active = true AVANT DE CONNECTER LE USER
         */
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('home');
        }

        return redirect()->route('login-form')->with('danger', 'Email ou mot de passe incorrect');
    }

    public function logout()
    {
        $user = Auth::user();
        if ($user) {
            $user->last_login = NOW();
            Auth::logout();
        }
        return redirect()->route('login-form');
    }
}
