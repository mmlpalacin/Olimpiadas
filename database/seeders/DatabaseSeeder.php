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
            RoleSeeder::class,
            Metodosseeder::class,
        ]);

        User::factory()->create([
            'name' => 'mili',
            'email' => 'mili@gmail.com',
            'password' => '12345678'
        ])->assignRole('admin');
        $users = User::factory(10)->create();

        foreach ($users as $user){
            $user->assignRole('cliente');
        }
    }
}
