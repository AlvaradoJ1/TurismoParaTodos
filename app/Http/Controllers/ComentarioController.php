<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ComentarioSitio;
use App\Models\ComentarioRestaurante;
use App\Models\ComentarioHotel;
use App\Models\ComentarioTransporte;
use App\Models\Sitio;
use Illuminate\Support\Facades\Auth;


class ComentarioController extends Controller
{
    //
    public function storeSitio(Request $request, $sitio_id)
    {

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para comentar.');
        }

        $request->validate([
            'comentario' => 'required|string',
        ]);
        
        $comentario = strip_tags($request->comentario, '<b><i><u><s>'); // Permite solo negrita, cursiva, subrayado y tachado
        
        ComentarioSitio::create([
            'sitio_id' => $sitio_id,
            'usuario_id' => Auth::user()->id,
            'usuario' => Auth::user()->name, // Usa el nombre del usuario autenticado
            'comentario' => $comentario,
        ]);
        

        return redirect()->back()->with('success', 'Comentario agregado.');
    }


    public function storeRestaurante(Request $request, $restaurante_id)
    {

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para comentar.');
        }

        $request->validate([
            'comentario' => 'required|string',
        ]);
        
        $comentario = strip_tags($request->comentario, '<b><i><u><s>'); // Permite solo negrita, cursiva, subrayado y tachado

        ComentarioRestaurante::create([
            'restaurante_id' => $restaurante_id,
            'usuario_id' => Auth::user()->id,
            'usuario' => Auth::user()->name, // Usa el nombre del usuario autenticado
            'comentario' => $comentario,
        ]);

        return redirect()->back()->with('success', 'Comentario agregado.');
    }


    public function storeHotel(Request $request, $hotel_id)
    {

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para comentar.');
        }

        $request->validate([
            'comentario' => 'required|string',
        ]);
        
        $comentario = strip_tags($request->comentario, '<b><i><u><s>'); // Permite solo negrita, cursiva, subrayado y tachado

        ComentarioHotel::create([
            'hotel_id' => $hotel_id,
            'usuario_id' => Auth::user()->id,
            'usuario' => Auth::user()->name, // Usa el nombre del usuario autenticado
            'comentario' => $comentario,
        ]);

        return redirect()->back()->with('success', 'Comentario agregado.');
    }


    public function storeTransporte(Request $request, $transporte_id)
    {

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para comentar.');
        }

        $request->validate([
            'comentario' => 'required|string',
        ]);
        
        $comentario = strip_tags($request->comentario, '<b><i><u><s>'); // Permite solo negrita, cursiva, subrayado y tachado

        ComentarioTransporte::create([
            'transporte_id' => $transporte_id,
            'usuario_id' => Auth::user()->id,
            'usuario' => Auth::user()->name, // Usa el nombre del usuario autenticado
            'comentario' => $comentario,
        ]);

        return redirect()->back()->with('success', 'Comentario agregado.');
    }
}
