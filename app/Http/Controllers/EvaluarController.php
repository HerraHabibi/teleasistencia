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
    public function storeTeleoperador(Request $request)
    {
        $validatedData = $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'email_usuario' => 'required|email',
            'email_teleoperador' => 'required|email',
            'bienvenida' => 'required|integer|between:1,10',
            'contenido' => 'required|integer|between:1,10',
            'comunicacion' => 'required|integer|between:1,10',
            'despedida' => 'required|integer|between:1,10',
            'observaciones' => 'nullable|string',
        ]);

        try {
            $media = ($validatedData['bienvenida'] + $validatedData['contenido'] + $validatedData['comunicacion'] + $validatedData['despedida']) / 4;

            $evaluacion = new EvaluacionTeleoperador([
                'fecha' => $validatedData['fecha'],
                'hora' => $validatedData['hora'],
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
    public function storeUsuario(Request $request)
{
    $validatedData = $request->validate([
        'fecha' => 'required|date',
        'hora' => 'required|date_format:H:i',
        'email_usuario' => 'required|email',
        'email_teleoperador' => 'required|email',
        'creatividad' => 'required|integer|between:1,10',
        'satisfaccion_usuario' => 'required|integer|between:1,10',
        'satisfaccion_teleoperador' => 'required|integer|between:1,10',
        'teatralizacion' => 'required|integer|between:1,10',
        'media' => 'nullable|numeric', // puedes calcularla manualmente
        'observaciones' => 'nullable|string',
    ]);

    try {
        $media = ($validatedData['creatividad'] + $validatedData['satisfaccion_usuario'] + $validatedData['satisfaccion_teleoperador'] + $validatedData['teatralizacion']) / 4;

        $evaluacion = new EvaluacionUsuario([
            'fecha' => $validatedData['fecha'],
            'hora' => $validatedData['hora'],
            'email_usuario' => $validatedData['email_usuario'],
            'email_teleoperador' => $validatedData['email_teleoperador'],
            'creatividad' => $validatedData['creatividad'],
            'satisfaccion_usuario' => $validatedData['satisfaccion_usuario'],
            'satisfaccion_teleoperador' => $validatedData['satisfaccion_teleoperador'],
            'teatralizacion' => $validatedData['teatralizacion'],
            'media' => $media,
            'observaciones' => $validatedData['observaciones'] ?? '',
        ]);

        $evaluacion->save();

        return redirect()->route('evaluar.result')->with('success', 'Evaluación registrada con éxito');

    } catch (\Illuminate\Database\QueryException $e) {
        $errorMessage = $e->getMessage();

        return redirect()->route('evaluar.usuario')->with('error', 'Error al registrar la evaluación: ' . $errorMessage);

    } catch (\Exception $e) {
        return redirect()->route('evaluar.usuario')->with('error', 'Error al registrar la evaluación');
    }
}

}
