<?php

namespace Database\Factories;

use App\Models\Municipio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lugar>
 */
class LugarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->name(),
            'latitud'=> '-4.7727500',
            'longitud'=> '37.8915500',
            'tipo' => fake()->randomElement(['Pista', 'Polideportivo']),
            'id_municipio' => fake()->randomElement(Municipio::all())['id']

        ];
    }
}
