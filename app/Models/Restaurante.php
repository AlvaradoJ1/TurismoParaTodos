<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Restaurante extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'slogan', 'servicio', 'descripcion', 'departamento', 'ciudad', 'direccion', 'img', 'whatsapp', 'facebook', 'instagram', 'twitter', 'tiktok'];
  

    public function comentarios_restaurantes() {
        return $this->hasMany(ComentarioRestaurante::class, 'restaurante_id');
    }
}
