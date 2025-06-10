<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Comprobación adicional para verificar si el usuario está verificado
        if (Auth::user()->verificado) {
            $request->session()->regenerate();
            return redirect()->route('home')->with('success', '¡Has iniciado sesión correctamente!');
        } else {
            Auth::logout();
            return redirect()->back()->withErrors(['email' => 'Necesita que un profesor verifique su cuenta.']);
        }
    }

    return redirect()->back()->withErrors(['email' => 'Datos mal introducidos.']);
}
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

