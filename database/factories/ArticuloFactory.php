<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Grupo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Articulo>
 */
class ArticuloFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'descripcion' => $this->faker->paragraph(),
            'categoria_id' => Categoria::inRandomOrder()->first()->id ?? Categoria::factory(),
            'grupo_id' => Grupo::inRandomOrder()->first()->id ?? Grupo::factory(),
            'stock' => $this->faker->randomNumber(),
            'estado' => $this->faker->boolean(),
        ];
    }
}
