<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showRegistrationForm()
    {
        return view('registrar');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'fecha_nacimiento' => 'required|date',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'fecha_nacimiento' => $request->fecha_nacimiento,
        ]);

        return redirect('/login')->with('success', '¡Registro exitoso!');
    }
    public function index()
    {
        $usuarios = User::orderByRaw("CASE WHEN name = 'Admin' THEN 0 ELSE 1 END, perfil DESC")
                        ->get();
        
        return view('usuarios.index', compact('usuarios'));
    }
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios')->with('success', 'Usuario eliminado correctamente.');
    }
    public function verificar(User $usuario)
    {
        $usuario->verificado = 1;
        $usuario->save();
        return redirect()->route('usuarios')->with('success', 'Usuario verificado correctamente.');
    }
}
