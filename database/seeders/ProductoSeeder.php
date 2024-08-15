<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        Producto::factory()->count(10)->create();

        /*DB::table('productos')->insert([
            'nombre' => ' ',
            'descripcion' => '', seguir
            ]);*/
    }
}
