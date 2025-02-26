<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hoteles', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('nombre');
            $table->json('slogan')->nullable(); // Descripción en formato JSON
            $table->json('servicio')->nullable(); // Descripción en formato JSON
            $table->json('descripcion')->nullable(); // Descripción en formato JSON
            $table->string('departamento');
            $table->string('ciudad');
            $table->string('direccion');
            $table->json('img')->nullable(); // Descripción en formato JSON
            $table->string('whatsapp')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('tiktok')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 'hoteles');
    }
};
