<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\LikeComentario;
use App\Models\Hotel;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hoteles = DB::table('hoteles')->get();

        $hoteles->transform(function($hotel){
            $hotel->slogan = json_decode($hotel->slogan, true);
            $hotel->descripcion = json_decode($hotel->descripcion, true);
            $hotel->img = json_decode($hotel->img, true);
            return $hotel;
        });


        return view("hoteles", compact("hoteles"));
    }

    public function verHotel($id)
    {
        
        $hotel = DB::table('hoteles')->where('id', $id)->first();

        if (!$hotel) {
            return redirect()->route('index');
        }
        
        $hotel->slogan = json_decode($hotel->slogan, true);
        $hotel->descripcion = json_decode($hotel->descripcion, true);
        $hotel->img = json_decode($hotel->img, true);

        $hotel = Hotel::with('comentarios_hoteles')->findOrFail($id);
        $tipo = 'hotel';
    
        if (!$hotel) {
            return redirect()->route('index')->with('error', 'Sitio no encontrado');
        }
        
        // Obtener los likes del usuario autenticado
        $userLikes = Auth::check()
            ? LikeComentario::where('usuario_id', Auth::id())->pluck('comentario_id')->toArray()
            : [];
    
        return view('/page/verHotel', compact('hotel', 'tipo', 'userLikes'));
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
