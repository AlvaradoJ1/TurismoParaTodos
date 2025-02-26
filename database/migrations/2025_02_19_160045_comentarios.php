<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

public function up()
    {
        // Tabla comentarios_hoteles
        Schema::create('comentarios_hoteles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->nullable()->index();
            $table->string('usuario');
            $table->foreignId('hotel_id')->nullable()->index(); 
            $table->text('comentario');
            $table->integer('likes_count')->default(0);
            $table->timestamps();
        });

        // Tabla comentarios_restaurantes
        Schema::create('comentarios_restaurantes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->nullable()->index();   
            $table->string('usuario');
            $table->foreignId('restaurante_id')->nullable()->index();   
            $table->text('comentario');
            $table->integer('likes_count')->default(0);
            $table->timestamps();
        });

        // Tabla comentarios_sitios
        Schema::create('comentarios_sitios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->nullable()->index();   
            $table->string('usuario');
            $table->foreignId('sitio_id')->nullable()->index(); 
            $table->text('comentario');
            $table->integer('likes_count')->default(0);
            $table->timestamps();
        });

        // Tabla comentarios_transportes
        Schema::create('comentarios_transportes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->nullable()->index();   
            $table->string('usuario');
            $table->foreignId('transporte_id')->nullable()->index();    
            $table->text('comentario');
            $table->integer('likes_count')->default(0);
            $table->timestamps();
        });

        // Tabla para evitar que un usuario dé más de un "me gusta"
        Schema::create('likes_comentarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->nullable()->index();   
            $table->string('usuario');
            $table->unsignedBigInteger('comentario_id');
            $table->string('tipo'); // Puede ser "hotel", "restaurante", "sitio", "transporte"
            $table->timestamps();

            $table->unique(['usuario_id', 'comentario_id', 'tipo']); // Evita duplicados
        });
    }

    public function down()
    {
        Schema::dropIfExists('likes_comentarios');
        Schema::dropIfExists('comentarios_hoteles');
        Schema::dropIfExists('comentarios_restaurantes');
        Schema::dropIfExists('comentarios_sitios');
        Schema::dropIfExists('comentarios_transportes');
    }
};