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
  
     public function adminIndex(Request $request)
     {
         $hoteles = DB::table('hoteles')->get();
 
     return view('/page/admin/adminHoteles', compact('hoteles'));
 
     }
         
     public function store(Request $request)
     {
         // Validar los datos del formulario
         $request->validate([
             'nombre' => 'required|string|max:255',
             'slogan_es' => 'nullable|string',
             'slogan_en' => 'nullable|string',
             'servicio_es' => 'nullable|string',
             'servicio_en' => 'nullable|string',
             'descripcion_es' => 'nullable|string',
             'descripcion_en' => 'nullable|string',
             'departamento' => 'required|string|max:255',
             'ciudad' => 'required|string|max:255',
             'direccion' => 'nullable|string|max:255',
             'whatsapp' => 'nullable|string|max:255',
             'facebook' => 'nullable|string|max:255',
             'instagram' => 'nullable|string|max:255',
             'twitter' => 'nullable|string|max:255',
             'tiktok' => 'nullable|string|max:255',
             'img_0' => 'nullable|string',
             'img_1' => 'nullable|string',
             'img_2' => 'nullable|string',
         ]);
 
     
         $data = [
             'nombre' => $request->nombre,
             'slogan' => json_encode([
                 'es' => $request->slogan_es,
                 'en' => $request->slogan_en
             ], JSON_UNESCAPED_UNICODE),
             'servicio' => json_encode([
                 'es' => $request->servicio_es,
                 'en' => $request->servicio_en
             ], JSON_UNESCAPED_UNICODE),
             'descripcion' => json_encode([
                 'es' => $request->descripcion_es,
                 'en' => $request->descripcion_en
             ], JSON_UNESCAPED_UNICODE),
             'departamento' => $request->departamento,
             'ciudad' => $request->ciudad,
             'direccion' => $request->direccion,
             'img' => json_encode([
                 '0' => $request->img_0,
                 '1' => $request->img_1,
                 '2' => $request->img_2,
             ], JSON_UNESCAPED_UNICODE),
             'whatsapp' => $request->whatsapp,
             'facebook' => $request->facebook,
             'instagram' => $request->instagram,
             'twitter' => $request->twitter,
             'tiktok' => $request->tiktok
         ];
         
 
         
         Hotel::create($data);
         
         return redirect()->route('hoteles.index')->with('success', 'hotel creado correctamente.');
     }        
     
 
     public function update(Request $request, $id)
     {
 
         $hotel = Hotel::findOrFail(($id)); // Usa findOrFail para asegurar que se obtiene el registro // Validar los datos del formulario
         $validated = $request->validate([
             'nombre' => 'required|string|max:255',
             'slogan_es' => 'nullable|string',
             'slogan_en' => 'nullable|string',
             'servicio_es' => 'nullable|string',
             'servicio_en' => 'nullable|string',
             'descripcion_es' => 'nullable|string',
             'descripcion_en' => 'nullable|string',
             'departamento' => 'required|string|max:255',
             'ciudad' => 'required|string|max:255',
             'direccion' => 'nullable|string|max:255',
             'img_0' => 'nullable|string',
             'img_1' => 'nullable|string',
             'img_2' => 'nullable|string',
             'whatsapp' => 'nullable|string|max:20',
             'facebook' => 'nullable|string|max:255',
             'instagram' => 'nullable|string|max:255',
             'twitter' => 'nullable|string|max:255',
             'tiktok' => 'nullable|string|max:255',
 
 
         ]);
         $hotel->nombre = $validated["nombre"];
         $hotel->slogan = json_encode([
             'es' => $validated['slogan_es'],
             'en' => $validated['slogan_en']
         ]);
         $hotel->servicio = json_encode([
             'es' => $validated['servicio_es'],
             'en' => $validated['servicio_en']
         ]);
         $hotel->descripcion = json_encode([
             'es' => $validated['descripcion_es'],
             'en' => $validated['descripcion_en']
         ]);
         $hotel->departamento = $validated["departamento"];
         $hotel->ciudad = $validated["ciudad"];
         $hotel->direccion = $validated["direccion"];
         $hotel->img = json_encode([
             '0' => $validated['img_0'],
             '1' => $validated['img_1'],
             '2' => $validated['img_2']
         ]);
         $hotel->whatsapp = $validated["whatsapp"];
         $hotel->facebook = $validated["facebook"];
         $hotel->instagram = $validated["instagram"];
         $hotel->twitter = $validated["twitter"];
         $hotel->tiktok = $validated["tiktok"];
          // Guardar solo al final
         $hotel->save();
         if ($hotel->save()) {
             return redirect()->route('hoteles.index')->with('success', 'Sitio actualizado correctamente');
         }
         return back()->withErrors([
             'email' => 'The provided credentials do not match our records.',
         ])->onlyInput('nombre');
         
     }
 
     public function updateId($id)
     {
 
         $hotel =Hotel::findOrFail($id);
 
         if (!$hotel) {
             return redirect()->route('index')->with('error', 'hotele no encontrado');
         }
     
         return view('/page/admin/adminHoteles', compact('hotel')) ;
 
     }
 
     public function destroy( $id)
     {
 
         $hotel = Hotel::findOrFail($id);
 
         $hotel->delete();
         return redirect()->route('hoteles.index')->with('success', 'hotel eliminado correctamente');
     }
 
 }