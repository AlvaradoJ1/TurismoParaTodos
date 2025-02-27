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
            'img_0' => 'nullable|string',
            'img_1' => 'nullable|string',
            'img_2' => 'nullable|string',
        ]);

    
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
            'img' => json_encode([
                '0' => $request->img_0,
                '1' => $request->img_1,
                '2' => $request->img_2,
            ], JSON_UNESCAPED_UNICODE),
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
            'img_0' => 'nullable|string',
            'img_1' => 'nullable|string',
            'img_2' => 'nullable|string',
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
        $transport->img = json_encode([
            '0' => $validated['img_0'],
            '1' => $validated['img_1'],
            '2' => $validated['img_2']
        ]);
        $transport->whatsapp = $validated["whatsapp"];
         // Guardar solo al final
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

        $transport->delete();
        return redirect()->route('transportes.index')->with('success', 'transporte eliminado correctamente');
    }

}