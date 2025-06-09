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
            'nombre_usuario' => 'required|string|max:255',
            'email_teleoperador' => 'required|email|exists:users,email',
            'nombre_teleoperador' => 'required|string|max:255',
            'bienvenida' => 'required|integer|between:1,10',
            'contenido' => 'required|integer|between:1,10',
            'comunicacion' => 'required|integer|between:1,10',
            'despedida' => 'required|integer|between:1,10',
            'observaciones' => 'nullable|string',
        ], [
            'email_teleoperador.exists' => 'El email del evaluado no pertenece a ningún usuario registrado.',
        ]);
        // Verificación: nombre del teleoperador coincide con el email
        $coincide = \App\Models\User::where('email', $validatedData['email_teleoperador'])
            ->where('name', $validatedData['nombre_teleoperador'])
            ->exists();

        if (!$coincide) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'El nombre no coincide con el email del teleoperador en el sistema.');
        }
        
        try {
            $media = ($validatedData['bienvenida'] + $validatedData['contenido'] + $validatedData['comunicacion'] + $validatedData['despedida']) / 4;

            $evaluacion = new EvaluacionTeleoperador([
                'hora_inicio' => $validatedData['hora_inicio'],
                'hora_fin' => $validatedData['hora_fin'],
                'email_usuario' => $validatedData['email_usuario'],
                'nombre_usuario' => $validatedData['nombre_usuario'],
                'email_teleoperador' => $validatedData['email_teleoperador'],
                'nombre_teleoperador' => $validatedData['nombre_teleoperador'],
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
