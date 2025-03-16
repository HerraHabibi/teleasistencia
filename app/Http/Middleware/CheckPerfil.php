<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckPerfil
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->perfil == 1) {
            return $next($request);
        }

        // Redirigir a una página de error o de acceso denegado
        return redirect()->route('home'); // Puedes cambiar esta ruta a donde desees redirigir
    }
}
