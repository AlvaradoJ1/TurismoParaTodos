<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComentarioRestaurante extends Model
{
    use HasFactory;

    protected $table = 'comentarios_restaurantes';

    protected $fillable = ['usuario_id', 'usuario', 'restaurante_id', 'comentario', 'likes_count'];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function restaurante()
    {
        return $this->belongsTo(Restaurante::class, 'restaurante_id');
    }

    public function likes()
    {
        return $this->hasMany(LikeComentario::class, 'comentario_id')->where('tipo', 'restaurante');
    }
}
