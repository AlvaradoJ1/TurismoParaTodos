<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session; // Usa el facade correcto

class SetLocale
{
    public function handle($request, Closure $next)
    {
        // Verifica si hay un idioma guardado en la sesión
        if (Session::has('locale')) {
            // Establece el idioma de la aplicación
            App::setLocale(Session::get('locale'));
        }

        // Continúa con la solicitud
        return $next($request);
    }
}