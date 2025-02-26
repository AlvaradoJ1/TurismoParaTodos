<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Foundation\Configuration\Exceptions;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Registra tu middleware global aquí
        $middleware->web(append: [
            \App\Http\Middleware\SetLocale::class,
        ]);
         // Agregar middleware para redirigir usuarios autenticados
    $middleware->alias([
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'role' => \App\Http\Middleware\RoleMiddleware::class,
        'custom.throttle' => \App\Http\Middleware\CustomThrottle::class, // 🔹 Corrección aquí
    ]);
    
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();