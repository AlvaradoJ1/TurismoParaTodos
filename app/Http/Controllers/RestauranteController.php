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

    
    public function adminIndex(Request $request)
    {
        $restaurantes = DB::table('restaurantes')->get();

    return view('/page/admin/adminRestaurantes', compact('restaurantes'));

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
        

        
        Restaurante::create($data);
        
        return redirect()->route('restaurantes.index')->with('success', 'Restaurante creado correctamente.');
    }        
    

    public function update(Request $request, $id)
    {

        $restaurant = Restaurante::findOrFail(($id)); // Usa findOrFail para asegurar que se obtiene el registro // Validar los datos del formulario
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
        $restaurant->nombre = $validated["nombre"];
        $restaurant->slogan = json_encode([
            'es' => $validated['slogan_es'],
            'en' => $validated['slogan_en']
        ]);
        $restaurant->servicio = json_encode([
            'es' => $validated['servicio_es'],
            'en' => $validated['servicio_en']
        ]);
        $restaurant->descripcion = json_encode([
            'es' => $validated['descripcion_es'],
            'en' => $validated['descripcion_en']
        ]);
        $restaurant->departamento = $validated["departamento"];
        $restaurant->ciudad = $validated["ciudad"];
        $restaurant->direccion = $validated["direccion"];
        $restaurant->img = json_encode([
            '0' => $validated['img_0'],
            '1' => $validated['img_1'],
            '2' => $validated['img_2']
        ]);
        $restaurant->whatsapp = $validated["whatsapp"];
        $restaurant->facebook = $validated["facebook"];
        $restaurant->instagram = $validated["instagram"];
        $restaurant->twitter = $validated["twitter"];
        $restaurant->tiktok = $validated["tiktok"];
         // Guardar solo al final
        $restaurant->save();
        if ($restaurant->save()) {
            return redirect()->route('restaurantes.index')->with('success', 'Sitio actualizado correctamente');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('nombre');
        
    }

    public function updateId($id)
    {

        $restaurant =Restaurante::findOrFail($id);

        if (!$restaurant) {
            return redirect()->route('index')->with('error', 'restaurante no encontrado');
        }
    
        return view('/page/admin/adminRestaurantes', compact('restaurant')) ;

    }

    public function destroy( $id)
    {

        $restaurant = Restaurante::findOrFail($id);

        $restaurant->delete();
        return redirect()->route('restaurantes.index')->with('success', 'restaurante eliminado correctamente');
    }

}