<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ordens', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('id_usuario');
            //fecha de que? $table->timestamp('fecha');
            $table->decimal('total', 10, 2);
            $table->enum('estado', [1,2,3]);
            
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ordens');
    }
};
