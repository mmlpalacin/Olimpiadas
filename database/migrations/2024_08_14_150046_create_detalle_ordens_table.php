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
        Schema::create('detalle_ordens', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('id_orden');
            $table->unsignedInteger('id_producto');
            $table->integer('cantidad');
            $table->decimal('precio_final', 10, 2);
            
            $table->foreign('id_orden')->references('id')->on('ordens');
            $table->foreign('id_producto')->references('id')->on('productos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_ordens');
    }
};
