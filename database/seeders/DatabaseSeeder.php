<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategoriaSeeder::class,
            ProductoSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'mili',
            'email' => 'mili@gmail.com',
            'password' => '12345678'
        ]);
    }
}
