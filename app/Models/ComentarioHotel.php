<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComentarioHotel extends Model
{
    use HasFactory;

    protected $table = 'comentarios_hoteles';

    protected $fillable = ['usuario_id', 'usuario', 'hotel_id', 'comentario', 'likes_count'];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }

    public function likes()
    {
        return $this->hasMany(LikeComentario::class, 'comentario_id')->where('tipo', 'hotel');
    }
}