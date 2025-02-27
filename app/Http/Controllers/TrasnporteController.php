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

    
    public function adminIndex(Request $request)
    {
        $transportes = DB::table('transportes')->get();

    return view('/page/admin/adminTransportes', compact('transportes'));

    }
        
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'icono' => 'required|string|max:255',
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
            'img_0' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'img_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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
            'icono' => $request->icono,
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
        ];
        

        
        Transporte::create($data);
        
        return redirect()->route('transportes.index')->with('success', 'transporte creado correctamente.');
    }        
    

    public function update(Request $request, $id)
    {

        $transport = Transporte::findOrFail(($id)); // Usa findOrFail para asegurar que se obtiene el registro // Validar los datos del formulario
        $validated = $request->validate([
            'icono' => 'required|string|max:255',
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
            'whatsapp' => 'nullable|string|max:20',
        ]);
        $transport->icono = $validated["icono"];
        $transport->nombre = $validated["nombre"];
        $transport->slogan = json_encode([
            'es' => $validated['slogan_es'],
            'en' => $validated['slogan_en']
        ]);
        $transport->servicio = json_encode([
            'es' => $validated['servicio_es'],
            'en' => $validated['servicio_en']
        ]);
        $transport->descripcion = json_encode([
            'es' => $validated['descripcion_es'],
            'en' => $validated['descripcion_en']
        ]);
        $transport->departamento = $validated["departamento"];
        $transport->ciudad = $validated["ciudad"];
        $transport->direccion = $validated["direccion"];
        $transport->whatsapp = $validated["whatsapp"];
                 // Decodificar imágenes existentes
    $imagenes_anteriores = json_decode($transport->img, true);

    $imagenes_nuevas = [];

    for ($i = 0; $i < 2; $i++) {
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
        $transport->img = json_encode($imagenes_nuevas, JSON_UNESCAPED_UNICODE);
    
        // Guardar cambios en la base de datos
        $transport->save();
        if ($transport->save()) {
            return redirect()->route('transportes.index')->with('success', 'Sitio actualizado correctamente');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('nombre');
        
    }

    public function updateId($id)
    {

        $transporte =Transporte::findOrFail($id);

        if (!$transporte) {
            return redirect()->route('index')->with('error', 'transporte no encontrado');
        }
    
        return view('/page/admin/adminTransportes', compact('transporte')) ;

    }

    public function destroy( $id)
    {

        $transport = Transporte::findOrFail($id);
        // Decodificar el JSON de imágenes
        $imagenes = json_decode($transport->img, true);
    
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
        $transport->delete();
        return redirect()->route('transportes.index')->with('success', 'transporte eliminado correctamente');
    }

}