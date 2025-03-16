<?php

namespace App\Http\Controllers;

use App\Models\Entrante;
use App\Models\Saliente;
use App\Models\User;
use Illuminate\Http\Request;

class AudioController extends Controller
{
    public function index()
    {
        // Obtener registros de llamadas entrantes y salientes
        $entrantes = Entrante::whereNotNull('archivo')->get()->map(function($item) {
            $user = User::where('email', $item->email)->first();
            $item->nombre = $user ? $user->name : 'Desconocido';
            $item->tipo_llamada = 'Entrante';
            return $item;
        });

        $salientes = Saliente::whereNotNull('archivo')->get()->map(function($item) {
            $user = User::where('email', $item->email_users)->first();
            $item->email = $item->email_users; // Email_users para las llamadas salientes
            $item->nombre = $user ? $user->name : 'Desconocido';
            $item->tipo_llamada = 'Saliente';
            return $item;
        });

        // Combinar las colecciones
        $llamadas = $entrantes->merge($salientes);

        // Ordenar por nombre del archivo
        $llamadas = $llamadas->sortBy('archivo');

        return view('audios.index', compact('llamadas'));
    }
}
