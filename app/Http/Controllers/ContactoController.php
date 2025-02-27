<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactoMailable;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function enviar(Request $request)
    {
            $request->validate([
                'nombre' => 'required|string|max:100',
                'numero' => 'nullable|string|max:20',
                'email' => 'required|email|max:100',
                'comentario' => 'required|string|max:500',
            ]);
        
            // Datos del formulario
            $datos = $request->all();
        
            // Dirección de correo a la que se enviará el mensaje
            $correoDestino = 'turism0parat0d0s2025@gmail.com'; 
        
            try {
                // Enviar correo
            Mail::to($correoDestino)->send(new ContactoMailable($datos));
            return back()->with('success', 'Tu mensaje ha sido enviado con éxito. Nos pondremos en contacto contigo pronto.');
            } catch (\Exception $e) {
                return back()->with('error', 'Hubo un problema al enviar el mensaje. Inténtalo de nuevo.');
            }

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
