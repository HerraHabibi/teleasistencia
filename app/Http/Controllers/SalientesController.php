<?php

namespace App\Http\Controllers;

use App\Models\Saliente;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SalientesController extends Controller
{
    public function index()
    {
        return view('salientes.index');
    }

    public function create()
    {
        return view('salientes.registrar_llamada_saliente');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|string|max:100',
            'email_users' => 'required|string|max:100',
            'responde' => 'required|in:Si,No',
            'intentos' => 'required|integer',
            'quien_coge' => 'required|string|max:255',
            'beneficiario' => 'required|in:Si,No',
            'hora_inicio' => 'required|date_format:Y-m-d\TH:i:s',
            'hora_fin' => 'required|date_format:Y-m-d\TH:i:s|after:hora_inicio',
            'observaciones' => 'nullable|string',
            'dni_beneficiario' => 'required|string|max:9',
            'archivo' => 'nullable|file|mimes:mp3,wav,aac,ogg',
            'tipo' => 'required|string',
        ]);
        if ($request->hasFile('archivo')) {
            $fileName = time().'.'.$request->archivo->extension();
            $request->file('archivo')->storeAs('audios', $fileName, 'public');
        } else {
            return back()->withErrors(['archivo' => 'Error al subir el archivo. Intente de nuevo.']);
        }

        $registroLlamada = new Saliente();
        $registroLlamada->email = $request->email;
        $registroLlamada->email_users = $request->email_users;
        $registroLlamada->responde = $request->responde;
        $registroLlamada->intentos = $request->intentos;
        $registroLlamada->quien_coge = $request->quien_coge;
        $registroLlamada->beneficiario = $request->beneficiario;
        $registroLlamada->hora_inicio = Carbon::parse($request->hora_inicio)->format('Y-m-d H:i:s');
        $registroLlamada->hora_fin = Carbon::parse($request->hora_fin)->format('Y-m-d H:i:s');
        $registroLlamada->observaciones = $request->observaciones;
        $registroLlamada->dni_beneficiario = $request->dni_beneficiario;
        $registroLlamada->tipo = $request->tipo;
        $registroLlamada->archivo = $fileName;
        $registroLlamada->save();

        return redirect()->route('salientes.create')->with('success', '¡Registro de llamada saliente exitoso!');
    }
    public function error()
    {
        return view('salientes.error');
    }
}
