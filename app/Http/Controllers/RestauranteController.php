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
            'img_0' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'img_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'img_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        // Procesar imágenes y guardar en 'public/img/'
        $imagenes = [];
        for ($i = 0; $i < 3; $i++) {
            if ($request->hasFile("img_$i")) {
                $imagen = $request->file("img_$i");
                $nombreImagen = time() . "_$i." . $imagen->extension();
                $imagen->move(public_path('img'), $nombreImagen); // Guardar en 'public/img/'
                $imagenes[$i] = $nombreImagen;
            } else {
                $imagenes[$i] = null; // Si no hay imagen, se guarda null
            }
        }
    
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
            'img' => json_encode($imagenes, JSON_UNESCAPED_UNICODE), // Se almacenan los nombres de las imágenes
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
            'img_0' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'img_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'img_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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
        $restaurant->whatsapp = $validated["whatsapp"];
        $restaurant->facebook = $validated["facebook"];
        $restaurant->instagram = $validated["instagram"];
        $restaurant->twitter = $validated["twitter"];
        $restaurant->tiktok = $validated["tiktok"];
               // Decodificar imágenes existentes
    $imagenes_anteriores = json_decode($restaurant->img, true);

    $imagenes_nuevas = [];

    for ($i = 0; $i < 3; $i++) {
        if ($request->hasFile("img_$i")) {
            // Eliminar imagen anterior si existe
            if (!empty($imagenes_anteriores[$i])) {
                $ruta_anterior = public_path('img/' . $imagenes_anteriores[$i]);
                if (file_exists($ruta_anterior)) {
                    unlink($ruta_anterior);
                }
            }

            // Guardar la nueva imagen
            $imagen = $request->file("img_$i");
            $nombreImagen = time() . "_$i." . $imagen->extension();
            $imagen->move(public_path('img'), $nombreImagen);
            $imagenes_nuevas[$i] = $nombreImagen;
        } else {
            // Mantener la imagen anterior si no se sube una nueva
            $imagenes_nuevas[$i] = $imagenes_anteriores[$i] ?? null;
        }
    }
    
        // Guardar las imágenes actualizadas
        $restaurant->img = json_encode($imagenes_nuevas, JSON_UNESCAPED_UNICODE);
    
        // Guardar cambios en la base de datos
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
        // Decodificar el JSON de imágenes
        $imagenes = json_decode($restaurant->img, true);
    
        // Eliminar las imágenes del servidor si existen
        if (!empty($imagenes)) {
            foreach ($imagenes as $imagen) {
                if (!empty($imagen)) {
                    $ruta_imagen = public_path('img/' . $imagen);
                    if (file_exists($ruta_imagen)) {
                        unlink($ruta_imagen);
                    }
                }
            }
        }
    
        // Eliminar el registro de la base de datos
        $restaurant->delete();
        return redirect()->route('restaurantes.index')->with('success', 'restaurante eliminado correctamente');
    }

}