<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        /*DB::table('categorias')->insert([
            'nombre' => ' ',
            'descripcion' => ''
            ]);*/
        Categoria::factory()->count(10)->create();
    }
}
