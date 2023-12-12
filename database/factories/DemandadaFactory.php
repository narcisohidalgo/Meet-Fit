<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Lugar;
use App\Models\Actividad;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DemandadaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $fechaInicio = Carbon::now();
        $fechaFin = Carbon::now()->addDays(30);
        $fechaAleatoria = $this->faker->dateTimeBetween($fechaInicio, $fechaFin);



        return [
            'hora' => $this->faker->time($format = 'H:i'),
            'dia' => $fechaAleatoria->format('d-m-Y'),
            //'dia' => $this->faker->date($format = 'd-m-Y'),
            'id_actividad' => fake()->randomElement(Actividad::all())['id'],
            'id_users' => fake()->randomElement(User::all())['id'],
            'id_lugar' => fake()->randomElement(Lugar::all())['id']
        ];
    }
}
