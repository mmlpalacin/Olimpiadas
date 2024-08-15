<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id('id_pago');
            $table->string('Metodo')->unique();
            $table->string('Nombre_titular', 50);
            $table->string('fecha_venc', 20);
            $table->integer('CVV');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        //
    }
};
