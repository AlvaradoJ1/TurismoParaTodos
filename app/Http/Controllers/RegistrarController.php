<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;


class RegistrarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function index()
    {
        return view("login/registrar");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'usuario' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required',
            // 'confirmPassword' => 'required|same:password',
        ]);

        $result = user::factory()->createOne([
            'name' => $validated["usuario"],
            'email' => $validated["email"],
            'password' => Hash::make($validated['password'])
        ]);
        // Asignar el rol de "user"
        $result->assignRole('usuario');

        // Iniciar sesión automáticamente después del registro
        Auth::login($result);

        if ($result != null && $result->id != 0) {
            return redirect()->route('index');
        }
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->onlyInput('usuario');
          
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
