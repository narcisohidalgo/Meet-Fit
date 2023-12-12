<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Demandada;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ParticipanteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_actdemandada' => fake()->randomElement(Demandada::all())['id'],
            'id_users' => fake()->randomElement(User::all())['id'],
        ];
    }
}
