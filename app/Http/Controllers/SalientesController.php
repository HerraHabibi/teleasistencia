<?php

namespace App\Http\Controllers;

use App\Models\Saliente;
use Illuminate\Http\Request;

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
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'duracion' => 'required|string|max:10',
            'observaciones' => 'nullable|string',
            'dni_beneficiario' => 'required|string|max:9',
            'archivo' => 'nullable|file|mimes:mp3,wav,aac,ogg',
            'tipo' => 'required|string|in:Llamada saliente rutinaria por la mañana,Llamada saliente rutinaria por la tarde,Llamada saliente rutinaria por la noche,Llamada saliente para recordatorio de cita médica,Llamada saliente para felicitación de cumpleaños',
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
        $registroLlamada->fecha = $request->fecha;
        $registroLlamada->hora = $request->hora;
        $registroLlamada->duracion = $request->duracion;
        $registroLlamada->observaciones = $request->observaciones;
        $registroLlamada->dni_beneficiario = $request->dni_beneficiario;
        $registroLlamada->tipo = $request->tipo;
        $registroLlamada->archivo = $fileName;
        $registroLlamada->save();

        return redirect()->route('salientes.error')->with('success', '¡Registro de llamada saliente exitoso!');
    }
    public function error()
    {
        return view('salientes.error');
    }
}
