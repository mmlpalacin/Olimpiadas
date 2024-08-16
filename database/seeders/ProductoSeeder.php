<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('productos')->insert([
            'nombre' => 'Smartphone XYZ',
            'precio' => '299.99' ,
            'descripcion' => 'hgghh',
            'stock' => '49',
            'Categoria_id' => '1',
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Laptop ABC',
            'precio' => '799.99' ,
            'descripcion' => 'hgfhfh',
            'stock' => '434',
            'Categoria_id' => '2',
            ]);
        DB::table('productos')->insert([
            'nombre' => 'Auriculares Bluetooth',
            'precio' => '59.99' ,
            'descripcion' => 'gfhfgh',
            'stock' => '4',
            'Categoria_id' => '3',
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Camara Digital',
            'precio' => '499.99' ,
            'descripcion' => 'hgfhf',
            'stock' => '5',
            'Categoria_id' => '3',

            ]);
        DB::table('productos')->insert([
            'nombre' => 'Chaqueta de Cuero',
            'precio' => '119.99' ,
            'descripcion' => 'hgfhfgh',
            'stock' => '57',
            'Categoria_id' => '2',
            ]);
        DB::table('productos')->insert([
            'nombre' => 'Zapatillas Deportivas',
            'precio' => '89.99' ,
            'descripcion' => 'hgfhghf',
            'stock' => '9',
            'Categoria_id' => '3',
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Reloj de Pulsera',
            'precio' => '149.99' ,
            'descripcion' => 'hfghfh',
            'stock' => '94',
            'Categoria_id' => '1',
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Cinturo De Cuero',
            'precio' => '39.99' ,
            'descripcion' => 'fghgfhfgh',
            'stock' => '98',
            'Categoria_id' => '2',
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Juguete Educativo',
            'precio' => '29.99' ,
            'descripcion' => 'hgfhfgh',
            'stock' => '65',
            'Categoria_id' => '3',
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Peluche Gigante',
            'precio' => '79.99' ,
            'descripcion' => 'ghfhgfh',
            'stock' => '69',
            'Categoria_id' => '1',
        ]);
    }
}
