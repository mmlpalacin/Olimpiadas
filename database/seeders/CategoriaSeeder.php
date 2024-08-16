<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    public function run(): void
        {
            DB::table('categorias')->insert([
                'nombre' => 'Indumentaria',
                'descripcion' => 'Ropa Unisex Para Gente Sin Ropa',
                ]);
            DB::table('categorias')->insert([
                'nombre' => 'Electronica',
                'descripcion' => 'Dispositivos electronicos para la comodidad de su hogar y dia a dia',
                ]);
            DB::table('categorias')->insert([
                'nombre' => 'Juguetes',
                'descripcion' => 'Juguetes para niños y su entretenimiento',
                ]);
        }
}
