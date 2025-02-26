<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComentarioTransporte extends Model
{
    use HasFactory;

    protected $table = 'comentarios_transportes';

    protected $fillable = ['usuario_id', 'usuario', 'transporte_id', 'comentario', 'likes_count'];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function transporte()
    {
        return $this->belongsTo(Transporte::class, 'transporte_id');
    }

    public function likes()
    {
        return $this->hasMany(LikeComentario::class, 'comentario_id')->where('tipo', 'transporte');
    }
}
