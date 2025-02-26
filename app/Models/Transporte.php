<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transporte extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'slogan','servicio', 'icono', 'descripcion', 'departamento', 'ciudad', 'direccion', 'img', 'whatsapp'];
  

    public function comentarios_transportes() {
        return $this->hasMany(ComentarioTransporte::class, 'transporte_id');
    }
}
