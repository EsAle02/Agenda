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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('Titulo');
            $table->text('Descripcion');
            $table->dateTime('Fecha_inicio');
            $table->dateTime('Fecha_fin');
            $table->unsignedBigInteger('contacto_id');
            $table->foreign('Contacto_id')->references('id')->on('contactos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
