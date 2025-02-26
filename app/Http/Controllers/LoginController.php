<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Exceptions\ThrottleRequestsException;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        return view("login/login");
    }
    public function authenticate(Request $request): RedirectResponse
    {
        $email = (string) $request->input('email');

        // Verificar si el usuario ha excedido los intentos permitidos
        if (RateLimiter::tooManyAttempts('login:'.$email, 5)) {
            throw new ThrottleRequestsException('Demasiados intentos. Intenta nuevamente en un minuto.');
        }
    
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            RateLimiter::clear('login:'.$email); // Limpiar intentos si inicia sesión
            return redirect()->intended('/');
        }
    
        RateLimiter::hit('login:'.$email); // Registrar intento fallido
    
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }
    public function logout(Request $request): RedirectResponse
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('index');
    }
    


    protected function redirectTo()
    {
        return session('url.intended', URL::previous());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
