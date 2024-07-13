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
        Schema::create('ciudad', function (Blueprint $table) {
            $table->id();
            $table->string('foto');
            $table->integer('calificacion');
            $table->string('nombre');
            $table->double('latitud', 15, 8);
            $table->double('longitud', 15, 8);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ciudad');
    }
};
