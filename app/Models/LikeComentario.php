<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeComentario extends Model
{
    use HasFactory;

    protected $table = 'likes_comentarios';

    protected $fillable = ['usuario_id', 'usuario', 'comentario_id', 'tipo'];

    public function comentario()
    {
        return match ($this->tipo) {
            'hotel' => $this->belongsTo(ComentarioHotel::class, 'comentario_id'),
            'restaurante' => $this->belongsTo(ComentarioRestaurante::class, 'comentario_id'),
            'sitio' => $this->belongsTo(ComentarioSitio::class, 'comentario_id'),
            'transporte' => $this->belongsTo(ComentarioTransporte::class, 'comentario_id'),
            default => null,
        };
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
