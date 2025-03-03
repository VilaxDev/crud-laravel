<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animal>
 */
class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word, // Genera una palabra aleatoria
            'especie' => $this->faker->word, // Genera una palabra aleatoria
            'raza' => $this->faker->word, // Genera una palabra aleatoria
            'color' => $this->faker->colorName, // Genera un color aleatorio
            'edad' => $this->faker->numberBetween(1, 15), // Genera un número entre 1 y 15
        ];
    }
}
