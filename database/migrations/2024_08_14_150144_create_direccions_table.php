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
        Schema::create('direccions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('usuario_id');
            $table->string('direccion', 255);
            $table->string('ciudad', 100);
            $table->string('estado', 100);
            $table->string('codigo_postal', 20);
            $table->string('pais', 100);
            
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('direccions');
    }
};
