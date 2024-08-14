<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word, // Genera un nombre ficticio
            'descripcion' => $this->faker->sentence, // Genera una descripción ficticia
            'precio' => $this->faker->randomFloat(2, 1, 1000), // Genera un precio ficticio entre 1 y 1000
            'stock' => $this->faker->numberBetween(1, 100), // Genera un stock ficticio entre 1 y 100
            'categoria_id' => Categoria::factory(),
        ];
    }
}
