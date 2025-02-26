<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComentarioSitio extends Model
{
    use HasFactory;

    protected $table = 'comentarios_sitios';

    protected $fillable = ['usuario_id', 'usuario', 'sitio_id', 'comentario', 'likes_count'];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function sitio()
    {
        return $this->belongsTo(Sitio::class, 'sitio_id');
    }

    public function likes()
    {
        return $this->hasMany(LikeComentario::class, 'comentario_id')->where('tipo', 'sitio');
    }
}
