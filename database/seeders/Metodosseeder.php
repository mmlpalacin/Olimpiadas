<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Metodosseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payment_methods')->insert([
            'nombre' => 'Ripsa',
            'descripcion' => 'Ropa Unisex Para Gente Sin Ropa',
            ]);
        DB::table('payment_methods')->insert([
            'nombre' => 'Mercado PAgo',
            'descripcion' => 'Dispositivos electronicos para la comodidad de su hogar y dia a dia',
            ]);
    }
}
