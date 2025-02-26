<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\LikeComentario;
use App\Models\Restaurante;
class RestauranteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurantes = DB::table('restaurantes')->get();

        $restaurantes->transform(function ($restaurante) {
            $restaurante->slogan = json_decode($restaurante->slogan, true);
            $restaurante->descripcion = json_decode($restaurante->descripcion, true);
            $restaurante->img = json_decode($restaurante->img, true);
            return $restaurante;
        });


        return view("restaurantes", compact('restaurantes'));
        
    }

    public function verRestaurante($id)
    {
        
        $restaurante = DB::table('restaurantes')->where('id', $id)->first();

        if (!$restaurante) {
            return redirect()->route('index');
        }
        
        $restaurante->slogan = json_decode($restaurante->slogan, true);
        $restaurante->descripcion = json_decode($restaurante->descripcion, true);
        $restaurante->img = json_decode($restaurante->img, true);
        
        $restaurante = Restaurante::with('comentarios_restaurantes')->findOrFail($id);
        $tipo = 'restaurante';
    
        if (!$restaurante) {
            return redirect()->route('index')->with('error', 'Sitio no encontrado');
        }
    
        // Obtener los likes del usuario autenticado
        $userLikes = Auth::check()
            ? LikeComentario::where('usuario_id', Auth::id())->pluck('comentario_id')->toArray()
            : [];
    
        return view('/page/verRestaurante', compact('restaurante', 'tipo', 'userLikes'));
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
