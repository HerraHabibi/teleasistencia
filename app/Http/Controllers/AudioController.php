<?php

namespace App\Http\Controllers;

use App\Models\Entrante;
use App\Models\Saliente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AudioController extends Controller
{
    public function index()
    {
        // Obtener registros de llamadas entrantes y salientes
        $entrantes = Entrante::whereNotNull('archivo')->get()->map(function($item) {
            $item->email = $item->email_users;
            $user = User::where('email', $item->email_users)->first();
            $item->nombre = $user ? $user->name : 'Desconocido';
            $item->tipo_llamada = 'Entrante';
            $item->archivo_existe = Storage::disk('public')->exists('audios/' . $item->archivo);
            return $item;
        });
        

        $salientes = Saliente::whereNotNull('archivo')->get()->map(function($item) {
            $item->email = $item->email_users;
            $user = User::where('email', $item->email_users)->first();
            $item->nombre = $user ? $user->name : 'Desconocido';
            $item->tipo_llamada = 'Saliente';
            $item->archivo_existe = Storage::disk('public')->exists('audios/' . $item->archivo);
            return $item;
        });

        // Combinar las colecciones
        $llamadas = $entrantes->merge($salientes);

        // Ordenar por nombre del archivo
        $llamadas = $llamadas->sortBy('archivo');

        return view('audios.index', compact('llamadas'));
    }
}
