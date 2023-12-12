<?php

namespace Database\Factories;

use App\Models\Actividad;
use App\Models\Lugar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ActividadLugarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_actividad' => fake()->randomElement(Actividad::all())['id'],
            'id_lugar' => fake()->randomElement(Lugar::all())['id']
        ];
    }
}
