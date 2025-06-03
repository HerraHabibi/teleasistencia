<?php

namespace App\Http\Controllers;

use App\Models\EvaluacionTeleoperador;
use App\Models\EvaluacionUsuario;
use Illuminate\Http\Request;

class EvaluarController extends Controller
{
    public function index()
    {
        return view('informes.evaluacion.index');
    }
    public function evaluarUsuario()
    {
        return view('informes.evaluacion.usuario');
    }
    public function evaluarTeleoperador()
    {
        return view('informes.evaluacion.teleoperador');
    }
    public function result()
    {
        return view('informes.evaluacion.error');
    }

    public function verTeleoperador(Request $request)
    {

        $query = EvaluacionTeleoperador::orderBy('hora_inicio', 'desc');

        if ($request->has('buscar') && $request->buscar != '') {
            $query->where('email_usuario', 'like', '%' . $request->buscar . '%');
        }

        $evaluaciones = $query->get();

        return view('informes.evaluacion.verTeleoperador', compact('evaluaciones'));
    }

    public function storeTeleoperador(Request $request)
    {
        $validatedData = $request->validate([
            'hora_inicio' => 'required|date_format:Y-m-d\TH:i:s',
            'hora_fin' => 'required|date_format:Y-m-d\TH:i:s|after:hora_inicio',
            'email_usuario' => 'required|email|exists:users,email',
            'email_teleoperador' => 'required|email|exists:users,email',
            'bienvenida' => 'required|integer|between:1,10',
            'contenido' => 'required|integer|between:1,10',
            'comunicacion' => 'required|integer|between:1,10',
            'despedida' => 'required|integer|between:1,10',
            'observaciones' => 'nullable|string',
        ], [
            'email_usuario.exists' => 'El email del usuario no pertenece a ningún usuario registrado.',
            'email_teleoperador.exists' => 'El email del teleoperador no pertenece a ningún usuario registrado.',
        ]);
        

        try {
            $media = ($validatedData['bienvenida'] + $validatedData['contenido'] + $validatedData['comunicacion'] + $validatedData['despedida']) / 4;

            $evaluacion = new EvaluacionTeleoperador([
                'hora_inicio' => $validatedData['hora_inicio'],
                'hora_fin' => $validatedData['hora_fin'],
                'email_usuario' => $validatedData['email_usuario'],
                'email_teleoperador' => $validatedData['email_teleoperador'],
                'bienvenida' => $validatedData['bienvenida'],
                'contenido' => $validatedData['contenido'],
                'comunicacion' => $validatedData['comunicacion'],
                'despedida' => $validatedData['despedida'],
                'media' => $media,
                'observaciones' => $validatedData['observaciones'],
            ]);

            $evaluacion->save();

            return redirect()->route('evaluar.result')->with('success', 'Evaluación registrada con éxito');

        } catch (\Illuminate\Database\QueryException $e) {
            $errorMessage = $e->getMessage();

            return redirect()->route('evaluar.teleoperador')->with('error', 'Error al registrar la evaluación: ' . $errorMessage);

        } catch (\Exception $e) {
            return redirect()->route('evaluar.teleoperador')->with('error', 'Error al registrar la evaluación');
        }
    }
}
