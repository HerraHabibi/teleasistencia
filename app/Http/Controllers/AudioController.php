<?php

namespace App\Http\Controllers;

use App\Models\Entrante;
use App\Models\Saliente;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AudioController extends Controller
{
    public function index(Request $request)
    {
        $desde = $request->filled('desde') ? Carbon::parse($request->desde)->startOfDay() : null;
        $hasta = $request->filled('hasta') ? Carbon::parse($request->hasta)->endOfDay() : null;
    
        // Entrantes
        $entrantesQuery = Entrante::whereNotNull('archivo');
        if ($desde) {
            $entrantesQuery->where('created_at', '>=', $desde);
        }
        if ($hasta) {
            $entrantesQuery->where('created_at', '<=', $hasta);
        }
    
        $entrantes = $entrantesQuery->get()->map(function($item) {
            $item->email = $item->email_users;
            $user = User::where('email', $item->email_users)->first();
            $item->nombre = $user ? $user->name : 'Desconocido';
            $item->tipo_llamada = 'Entrante';
            $item->archivo_existe = Storage::disk('public')->exists('audios/' . $item->archivo);
            return $item;
        });
    
        // Salientes
        $salientesQuery = Saliente::whereNotNull('archivo');
        if ($desde) {
            $salientesQuery->where('created_at', '>=', $desde);
        }
        if ($hasta) {
            $salientesQuery->where('created_at', '<=', $hasta);
        }
    
        $salientes = $salientesQuery->get()->map(function($item) {
            $item->email = $item->email_users;
            $user = User::where('email', $item->email_users)->first();
            $item->nombre = $user ? $user->name : 'Desconocido';
            $item->tipo_llamada = 'Saliente';
            $item->archivo_existe = Storage::disk('public')->exists('audios/' . $item->archivo);
            return $item;
        });
    
        // Combinar y ordenar
        $llamadas = $entrantes->merge($salientes)->sortBy('archivo');
    
        return view('audios.index', compact('llamadas'));
    }
}
