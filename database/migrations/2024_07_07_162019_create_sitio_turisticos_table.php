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
        Schema::create('sitio_turistico', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('calificacion');
            $table->string('foto')->nullable();
            $table->text('descripcion')->nullable();
            $table->double('latitud', 15, 8);
            $table->double('longitud', 15, 8);
            $table->integer('id_ciudad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sitio_turistico');
    }
};
