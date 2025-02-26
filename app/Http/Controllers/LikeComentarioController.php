<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LikeComentario;
use App\Models\ComentarioHotel;
use App\Models\ComentarioRestaurante;
use App\Models\ComentarioSitio;
use App\Models\ComentarioTransporte;
use Illuminate\Support\Facades\Auth;

class LikeComentarioController extends Controller
{
    public function likeComentario(Request $request)
    {
        $userId = Auth::id();
        $comentarioId = $request->input('comentario_id');
        $tipo = $request->input('tipo');

        // Verificar si el usuario ya ha dado "Me gusta"
        $existingLike = LikeComentario::where([
            'usuario_id' => $userId,
            'comentario_id' => $comentarioId,
            'tipo' => $tipo
        ])->first();

        if ($existingLike) {
            $existingLike->delete(); // Eliminar el like
            $likesCount = $this->updateLikesCount($comentarioId, $tipo, -1);
            return response()->json(['success' => true, 'likes' => $likesCount]);
        } else {
            LikeComentario::create([
                'usuario_id' => $userId,
                'comentario_id' => $comentarioId,
                'tipo' => $tipo
            ]);

            $likesCount = $this->updateLikesCount($comentarioId, $tipo, 1);
            return response()->json(['success' => true, 'likes' => $likesCount]);
        }
    }

    private function updateLikesCount($comentarioId, $tipo, $increment)
    {
        $modelClass = match ($tipo) {
            'hotel' => ComentarioHotel::class,
            'restaurante' => ComentarioRestaurante::class,
            'sitio' => ComentarioSitio::class,
            'transporte' => ComentarioTransporte::class,
            default => null,
        };

        if ($modelClass) {
            $comentario = $modelClass::find($comentarioId);
            if ($comentario) {
                $comentario->increment('likes_count', $increment);
                return $comentario->likes_count;
            }
        }
        return 0;
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
