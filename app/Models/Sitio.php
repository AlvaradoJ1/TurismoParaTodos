<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sitio extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'slogan', 'servicio', 'descripcion', 'departamento', 'ciudad', 'direccion', 'img', 'whatsapp', 'facebook', 'instagram', 'twitter', 'tiktok'];
  

   
    public function comentarios_sitios() {
        return $this->hasMany(ComentarioSitio::class, 'sitio_id');
    }
}
