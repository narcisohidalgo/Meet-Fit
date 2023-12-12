<?php

namespace Database\Seeders;

use App\Models\Actividad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActividadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Actividad::factory(10)->create();

        $actividad = new Actividad();
        $actividad->nombre = 'Padel';
        $actividad->tipo = 'Pista';
        $actividad->save();

        $actividad = new Actividad();
        $actividad->nombre = 'Futbol';
        $actividad->tipo = 'Pista';
        $actividad->save();

        $actividad = new Actividad();
        $actividad->nombre = 'Tenis';
        $actividad->tipo = 'Pista';
        $actividad->save();

        $actividad = new Actividad();
        $actividad->nombre = 'Baloncesto';
        $actividad->tipo = 'Pista';
        $actividad->save();

        $actividad = new Actividad();
        $actividad->nombre = 'Voleibol';
        $actividad->tipo = 'Pista';
        $actividad->save();

        $actividad = new Actividad();
        $actividad->nombre = 'Rugby';
        $actividad->tipo = 'Pista';
        $actividad->save();

    }
}
