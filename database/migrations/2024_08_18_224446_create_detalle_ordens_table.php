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

            $table->unsignedBigInteger('orden_id');
            $table->unsignedBigInteger('producto_id');
            $table->integer('cantidad');
            $table->decimal('precio', 10, 2);
            $table->unsignedBigInteger('comprobante_id');

            $table->foreign('comprobante_id')->references('id')->on('comprobantes');
            $table->foreign('orden_id')->references('id')->on('ordens');
            $table->foreign('producto_id')->references('id')->on('productos');
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
