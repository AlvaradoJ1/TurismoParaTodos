<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\LikeComentario;
use App\Models\Transporte;
class TrasnporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transportes = DB::table('transportes')->get();

        $transportes->transform(function ($transporte) {
            $transporte->slogan = json_decode($transporte->slogan, true);
            $transporte->descripcion = json_decode($transporte->descripcion, true);
            $transporte->img = json_decode($transporte->img, true);
            return $transporte;
    });

    return view('transportes', compact('transportes'));
    }

    public function verTransporte($id)
    {
        
        $transporte = DB::table('transportes')->where('id', $id)->first();

        if (!$transporte) {
            return redirect()->route("index");        
        }
        
        $transporte->slogan = json_decode($transporte->slogan, true);
        $transporte->descripcion = json_decode($transporte->descripcion, true);
        $transporte->img = json_decode($transporte->img, true);
        $transporte = Transporte::with('comentarios_transportes')->findOrFail($id);
        $tipo = 'transporte';
    
        if (!$transporte) {
            return redirect()->route('index')->with('error', 'Sitio no encontrado');
        }
    
        // Obtener los likes del usuario autenticado
        $userLikes = Auth::check()
            ? LikeComentario::where('usuario_id', Auth::id())->pluck('comentario_id')->toArray()
            : [];
    
        return view('/page/verTransporte', compact('transporte', 'tipo', 'userLikes'));
        

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
