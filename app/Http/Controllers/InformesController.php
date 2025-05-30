<?php

namespace App\Http\Controllers;

use App\Models\BeneficiarioInteres;
use App\Models\CitaMedica;
use App\Models\Contacto;
use App\Models\Entrante;
use App\Models\Gestion;
use App\Models\User;
use App\Models\Saliente;
use App\Models\EvaluacionUsuario;
use App\Models\EvaluacionTeleoperador;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class InformesController extends Controller
{
    public function index()
    {
        return view('informes.index');
    }
    public function beneficiarios()
    {
        return view('informes.listado_beneficiario');
    }
    public function infoBeneficiarios()
    {
        $beneficiarios = Gestion::orderBy('dni')->get();

        return view('informes.beneficiario_resultados', compact('beneficiarios'));
    }
    public function contactos()
    {
        return view('informes.listado_contactos');
    }
    public function buscarContacto()
    {
        $contactos = Contacto::orderBy('dni_beneficiario')->get();

        return view('informes.contactos_resultados', compact('contactos'));
    }
    public function interesconsultarview()
    {
        return view('informes.consultar_interes');
    }
    public function interesconsultar(Request $request)
    {
        $request->validate([
            'dni' => 'required|string|max:9'
        ]);

        $dni = $request->input('dni');
        $beneficiario = Gestion::where('dni', $dni)->first();
        $beneficiarioInteres = BeneficiarioInteres::where('dni_beneficiario', $dni)->first();

        if (!$beneficiario) {
            return redirect()->back()->with('error', 'El DNI no existe en la tabla Beneficiario.');
        } elseif (!$beneficiarioInteres) {
            return redirect()->back()->with('error', 'Datos no asignados.');
        } else {
            return view('informes.consultar_datos_interes', compact('beneficiario','beneficiarioInteres'));
        }
    }
    public function buscarprevistas(Request $request)
    {
        $opcion = $request->input('opcion');

        switch ($opcion) {
            case 'citas_medicas_hoy':
                $resultados = $this->obtenerCitasMedicasHoy();
                return view('informes.citas_medicas', compact('resultados'));
                break;
            case 'cumpleaneros_hoy':
                $resultados = $this->obtenerCumpleanerosHoy();
                return view('informes.cumpleaños', compact('resultados'));
                break;
            default:
                return redirect()->back()->with('error', 'Opción no válida.');
        }

    }
    private function obtenerCitasMedicasHoy()
    {
        $hoy = Carbon::today()->toDateString(); // Obtener la fecha de hoy
        $citas = CitaMedica::whereDate('fecha', $hoy)->get();

        return $citas;
    }
    private function obtenerCumpleanerosHoy()
    {
        $hoy = Carbon::today();
        $dia = $hoy->day;
        $mes = $hoy->month;

        $cumpleaneros = Gestion::whereDay('fecha_nacimiento', $dia)
                                    ->whereMonth('fecha_nacimiento', $mes)
                                    ->get();

        return $cumpleaneros;
    }
    public function llamadasprevistas()
    {
        return view('informes.listado_llamadas_previstas');
    }
    public function buscarBeneficiario(Request $request)
    {
        $request->validate([
            'dni' => 'required|string|max:255',
        ]);
    
        $dni = $request->input('dni');
        $beneficiario = Gestion::where('dni', $dni)->first();
    
        if (!$beneficiario) {
            return redirect()->route('informes.informes-beneficiario')->with('error', 'Beneficiario no encontrado.');
        }
    
        $llamadasEntrantes = Entrante::with('user')
            ->where('dni_beneficiario', $dni)
            ->get()
            ->map(function ($llamada) {
                $tiene_audio = $llamada->archivo !== null && Storage::disk('public')->exists('audios/' . $llamada->archivo);
                return [
                    'fecha_hora' => $llamada->hora_inicio,
                    'dni_beneficiario' => $llamada->dni_beneficiario,
                    'tipo' => $llamada->tipo_llamada,
                    'observaciones' => $llamada->observaciones,
                    'archivo' => $llamada->archivo,
                    'teleoperador' => optional($llamada->user)->name,
                    'origen' => 'Beneficiario/Contacto',
                    'nivel_activacion' => $llamada->nivel_activacion,
                    'responde' => '-',
                    'intentos' => '-',
                    'quien_coge' => '-',
                    'id' => $llamada->id,
                    'tiene_audio' => $tiene_audio,
                ];
            });
    
        $llamadasSalientes = Saliente::with('user')
            ->where('dni_beneficiario', $dni)
            ->get()
            ->map(function ($llamada) {
                $tiene_audio = $llamada->archivo !== null && Storage::disk('public')->exists('audios/' . $llamada->archivo);
                return [
                    'fecha_hora' => $llamada->fecha . ' ' . $llamada->hora,
                    'dni_beneficiario' => $llamada->dni_beneficiario,
                    'tipo' => $llamada->tipo,
                    'observaciones' => $llamada->observaciones,
                    'archivo' => $llamada->archivo,
                    'teleoperador' => optional($llamada->user)->name,
                    'origen' => 'Teleoperador',
                    'nivel_activacion' => '-',
                    'responde' => $llamada->responde,
                    'intentos' => $llamada->intentos,
                    'quien_coge' => $llamada->quien_coge,
                    'id' => $llamada->id,
                    'tiene_audio' => $tiene_audio,
                ];
            });
    
        $llamadas = $llamadasEntrantes
            ->merge($llamadasSalientes)
            ->sortByDesc('fecha_hora')
            ->map(function($item) {
                return (object) $item;
            })
            ->values();
        
        $evaluaciones = EvaluacionUsuario::where('email_usuario', $beneficiario->email)
        ->orderByDesc('hora_inicio')
        ->get()
        ->map(function ($evaluacion) {
            $nombreEvaluador = function ($email) {
                $teleoperador = User::where('email', $email)->first();
                if ($teleoperador) {
                    return $teleoperador->name;
                }
    
                $beneficiario = User::where('email', $email)->first();
                return $beneficiario ? $beneficiario->nombre . ' ' . $beneficiario->apellidos : $email;
            };
    
            return [
                'nombre_usuario' => $nombreEvaluador($evaluacion->email_usuario),
                'hora_inicio' => $evaluacion->hora_inicio,
                'hora_fin' => $evaluacion->hora_fin,
                'bienvenida' => $evaluacion->bienvenida,
                'contenido' => $evaluacion->contenido,
                'comunicacion' => $evaluacion->comunicacion,
                'despedida' => $evaluacion->despedida,
                'media' => $evaluacion->media,
                'observaciones' => $evaluacion->observaciones,
            ];
        });
    
        $totalEntrantes = Entrante::where('dni_beneficiario', $dni)->count();
        $totalSalientes = Saliente::where('dni_beneficiario', $dni)->count();
        $totalSalientesNoContestadas = Saliente::where('dni_beneficiario', $dni)->where('responde', 'No')->count();
        $activacionN1 = Entrante::where('dni_beneficiario', $dni)->where('nivel_activacion', '1')->count();
        $activacionN2 = Entrante::where('dni_beneficiario', $dni)->where('nivel_activacion', '2')->count();
        $activacionN3 = Entrante::where('dni_beneficiario', $dni)->where('nivel_activacion', '3')->count();
        $evaluacionMedia = $beneficiario->evaluaciones()->avg('media');
        $evaluacionMedia = $evaluacionMedia !== null ? round($evaluacionMedia, 2) : null;
    
        return view('informes.informes_beneficiario', compact(
            'beneficiario',
            'llamadas',
            'totalEntrantes',
            'totalSalientes',
            'totalSalientesNoContestadas',
            'activacionN1',
            'activacionN2',
            'activacionN3',
            'evaluacionMedia',
            'evaluaciones'
        ));
    }
    public function buscarTeleoperador(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
        ]);
    
        $email = $request->input('email');
        $teleoperador = User::where('email', $email)->first();
    
        if (!$teleoperador) {
            return redirect()->route('informes.informes-teleoperador')->with('error', 'Teleoperador no encontrado.');
        }
    
        $llamadasAtendidas = Entrante::with(['beneficiario', 'user'])
            ->where('email_users', $email)
            ->get()
            ->map(function ($llamada) {
                $tiene_audio = $llamada->archivo !== null && Storage::disk('public')->exists('audios/' . $llamada->archivo);
                return [
                    'fecha_hora' => $llamada->hora_inicio,
                    'dni_beneficiario' => $llamada->dni_beneficiario,
                    'tipo' => $llamada->tipo_llamada,
                    'observaciones' => $llamada->observaciones,
                    'archivo' => $llamada->archivo,
                    'teleoperador' => optional($llamada->user)->name,
                    'origen' => 'Beneficiario/Contacto',
                    'nivel_activacion' => $llamada->nivel_activacion,
                    'responde' => '-',
                    'intentos' => '-',
                    'quien_coge' => '-',
                    'id' => $llamada->id,
                    'tiene_audio' => $tiene_audio,
                    'beneficiario_nombre' => optional($llamada->beneficiario)->nombre . ' ' . optional($llamada->beneficiario)->apellidos,
                ];
            });
    
        $llamadasRealizadas = Saliente::with(['beneficiario', 'user'])
            ->where('email_users', $email)
            ->get()
            ->map(function ($llamada) {
                $tiene_audio = $llamada->archivo !== null && Storage::disk('public')->exists('audios/' . $llamada->archivo);
                return [
                    'fecha_hora' => $llamada->fecha . ' ' . $llamada->hora,
                    'dni_beneficiario' => $llamada->dni_beneficiario,
                    'tipo' => $llamada->tipo,
                    'observaciones' => $llamada->observaciones,
                    'archivo' => $llamada->archivo,
                    'teleoperador' => optional($llamada->user)->name,
                    'origen' => 'Teleoperador',
                    'nivel_activacion' => '-',
                    'responde' => $llamada->responde,
                    'intentos' => $llamada->intentos,
                    'quien_coge' => $llamada->quien_coge,
                    'id' => $llamada->id,
                    'tiene_audio' => $tiene_audio,
                    'beneficiario_nombre' => optional($llamada->getRelationValue('beneficiario'))->nombre . ' ' . optional($llamada->getRelationValue('beneficiario'))->apellidos,
                ];
            });
    
        $llamadas = $llamadasRealizadas
            ->merge($llamadasAtendidas)
            ->sortByDesc('fecha_hora')
            ->map(fn($item) => (object) $item)
            ->values();
        
        $evaluaciones = EvaluacionTeleoperador::where('email_teleoperador', $email)
        ->orderByDesc('hora_inicio')
        ->get()
        ->map(function ($evaluacion) {
            $nombreEvaluador = function ($email) {
                $beneficiario = Gestion::where('email', $email)->first();
                if ($beneficiario) {
                    return $beneficiario->nombre . ' ' . $beneficiario->apellidos;
                }
    
                $teleoperador = User::where('email', $email)->first();
                return $teleoperador ? $teleoperador->name : $email;
            };

            return [
                'nombre_usuario' => $nombreEvaluador($evaluacion->email_usuario),
                'hora_inicio' => $evaluacion->hora_inicio,
                'hora_fin' => $evaluacion->hora_fin,
                'bienvenida' => $evaluacion->bienvenida,
                'contenido' => $evaluacion->contenido,
                'comunicacion' => $evaluacion->comunicacion,
                'despedida' => $evaluacion->despedida,
                'media' => $evaluacion->media,
                'observaciones' => $evaluacion->observaciones,
            ];
        });

        $totalRealizadas = $llamadasRealizadas->count();
        $totalAtendidas = $llamadasAtendidas->count();
        $totalRealizadasNoContestadas = Saliente::where('email_users', $email)->where('responde', 'No')->count();
        $evaluacionMedia = $teleoperador->evaluaciones()->avg('media');
        $evaluacionMedia = $evaluacionMedia !== null ? round($evaluacionMedia, 2) : null;
    
        return view('informes.informes_teleoperador', compact(
            'teleoperador',
            'llamadas',
            'totalRealizadas',
            'totalAtendidas',
            'totalRealizadasNoContestadas',
            'evaluacionMedia',
            'evaluaciones'
        ));
    }
    public function mostrarLlamadasEntrantesHoy()
    {
        // Obtener hora de inicio y de fin de hoy 
        $inicioHoy = Carbon::today()->startOfDay();
        $finHoy = Carbon::today()->endOfDay();
        
        // Obtener las llamadas que han empezado o terminado hoy
        $llamadas = Entrante::whereBetween('hora_inicio', [$inicioHoy, $finHoy]) -> orWhereBetween('hora_fin', [$inicioHoy, $finHoy]) -> get();
        
        // Devolver la vista con las llamadas
        return view('informes.registro_entrantes', compact('llamadas'));
    }
    public function mostrarLlamadasSalientesHoy()
    {
        // Obtener la fecha de hoy
        $hoy = Carbon::today()->toDateString();
        
        // Obtener las llamadas salientes de hoy
        $llamadas = Saliente::whereDate('fecha', $hoy)->get();
        
        // Devolver la vista con las llamadas
        return view('informes.registro_salientes', compact('llamadas'));
    }

    public function llamadasEntrantesHoy()
    {
        $hoy = Carbon::today();

        $inicioHoy = $hoy->startOfDay();
        $finHoy = $hoy->copy()->endOfDay();

        $entrantes_hoy = Entrante::whereBetween('hora_inicio', [$inicioHoy, $finHoy])
                            ->orWhereBetween('hora_fin', [$inicioHoy, $finHoy])
                            ->orderByDesc('hora_fin')
                            ->orderBy('dni_beneficiario')
                            ->get()
                            ->map(function ($llamada) {
                                $llamada->tiene_audio = $llamada->archivo !== null && Storage::disk('public')->exists('audios/' . $llamada->archivo);
                                return $llamada;
                            });

        return view('informes.llamadas.entrantes_hoy', compact('entrantes_hoy'));
    }

    public function llamadasEntrantesSiempre()
    {
        $entrantes_siempre = Entrante::orderByDesc('hora_fin')
                                ->orderBy('dni_beneficiario')
                                ->get()
                                ->map(function ($llamada) {
                                    $llamada->tiene_audio = $llamada->archivo !== null && Storage::disk('public')->exists('audios/' . $llamada->archivo);
                                    return $llamada;
                                });

        return view('informes.llamadas.entrantes_siempre', compact('entrantes_siempre'));
    }

    public function llamadasSalientesHoy()
    {
        $hoy = Carbon::today();

        $salientes_hoy = Saliente::whereDate('fecha', $hoy)
                            ->orderByDesc('fecha')
                            ->orderBy('dni_beneficiario')
                            ->get()
                            ->map(function ($llamada) {
                                $llamada->tiene_audio = $llamada->archivo !== null && Storage::disk('public')->exists('audios/' . $llamada->archivo);
                                return $llamada;
                            });

        return view('informes.llamadas.salientes_hoy', compact('salientes_hoy'));
    }
    public function llamadasSalientesSiempre()
    {
        $salientes_siempre = Saliente::orderByDesc('fecha')
                                ->orderBy('dni_beneficiario')
                                ->get()
                                ->map(function ($llamada) {
                                    $llamada->tiene_audio = $llamada->archivo !== null && Storage::disk('public')->exists('audios/' . $llamada->archivo);
                                    return $llamada;
                                });

        return view('informes.llamadas.salientes_siempre', compact('salientes_siempre'));
    }
}
