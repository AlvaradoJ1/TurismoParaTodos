<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    use HasFactory;

    protected $table = 'hoteles';

    protected $fillable = ['nombre', 'slogan', 'servicio', 'descripcion', 'departamento', 'ciudad', 'direccion', 'img', 'whatsapp', 'facebook', 'instagram', 'twitter', 'tiktok'];
  

    public function comentarios_hoteles() {
        return $this->hasMany(ComentarioHotel::class, 'hotel_id');
    }
}
