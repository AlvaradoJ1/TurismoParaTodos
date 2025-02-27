<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sitio;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\LikeComentario;

class SitiosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sitios = DB::table('sitios')->get();

        return view('sitios', compact('sitios'));
    }

    public function adminIndex(Request $request)
    {
        $sitios = DB::table('sitios')->get();

        return view('/page/admin/adminSitos', compact('sitios'));
    }

    public function verSitio($id)
    {
        $sitio = Sitio::with('comentarios_sitios')->findOrFail($id);
        $tipo = 'sitio';

        if (!$sitio) {
            return redirect()->route('index')->with('error', 'Sitio no encontrado');
        }

        // Obtener los likes del usuario autenticado
        $userLikes = Auth::check()
            ? LikeComentario::where('usuario_id', Auth::id())->pluck('comentario_id')->toArray()
            : [];

        return view('/page/verSitio', compact('sitio', 'tipo', 'userLikes'));
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
    
        // Datos del sitio a guardar
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
    
        // Crear el nuevo sitio en la base de datos
        Sitio::create($data);
    
        return redirect()->route('sites.index')->with('success', 'Sitio creado correctamente.');
    }
    

    public function update(Request $request, $sitio)
    {
        $site = Sitio::findOrFail($sitio); // Buscar el sitio o lanzar error 404
    
        // Validar los datos del formulario
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
    
        // Asignar valores de texto
        $site->nombre = $validated["nombre"];
        $site->slogan = json_encode([
            'es' => $validated['slogan_es'],
            'en' => $validated['slogan_en']
        ], JSON_UNESCAPED_UNICODE);
        $site->servicio = json_encode([
            'es' => $validated['servicio_es'],
            'en' => $validated['servicio_en']
        ], JSON_UNESCAPED_UNICODE);
        $site->descripcion = json_encode([
            'es' => $validated['descripcion_es'],
            'en' => $validated['descripcion_en']
        ], JSON_UNESCAPED_UNICODE);
        $site->departamento = $validated["departamento"];
        $site->ciudad = $validated["ciudad"];
        $site->direccion = $validated["direccion"];
        $site->whatsapp = $validated["whatsapp"];
        $site->facebook = $validated["facebook"];
        $site->instagram = $validated["instagram"];
        $site->twitter = $validated["twitter"];
        $site->tiktok = $validated["tiktok"];
    
        // Decodificar imágenes existentes
    $imagenes_anteriores = json_decode($site->img, true);

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
        $site->img = json_encode($imagenes_nuevas, JSON_UNESCAPED_UNICODE);
    
        // Guardar cambios en la base de datos
        if ($site->save()) {
            return redirect()->route('sites.index')->with('success', 'Sitio actualizado correctamente');
        }
    
        return back()->withErrors(['error' => 'No se pudo actualizar el sitio.'])->withInput();
    }
    

    public function updateId($id)
    {

        $sitio = Sitio::findOrFail($id);

        if (!$sitio) {
            return redirect()->route('index')->with('error', 'Sitio no encontrado');
        }

        return view('/page/admin/adminSitos', compact('sitio'));
    }
    public function destroy($site)
    {
        $sitio = Sitio::findOrFail($site);
    
        // Decodificar el JSON de imágenes
        $imagenes = json_decode($sitio->img, true);
    
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
        $sitio->delete();
    
        return redirect()->route('sites.index')->with('success', 'Sitio eliminado correctamente');
    }
    




    /**
     * Display the specified resource.
     */
    public function show() {}

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




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }
}
