<?php

namespace Database\Seeders;

use App\Models\Provincia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Provincia::factory(10)->create();

        $provincia = new Provincia();
        $provincia->nombre = 'Córdoba';
        $provincia->save();

        $provincia = new Provincia();
        $provincia->nombre = 'Almería';
        $provincia->save();

        $provincia = new Provincia();
        $provincia->nombre = 'Cádiz';
        $provincia->save();

        $provincia = new Provincia();
        $provincia->nombre = 'Granada';
        $provincia->save();

        $provincia = new Provincia();
        $provincia->nombre = 'Huelva';
        $provincia->save();

        $provincia = new Provincia();
        $provincia->nombre = 'Jaén';
        $provincia->save();

        $provincia = new Provincia();
        $provincia->nombre = 'Málaga';
        $provincia->save();

        $provincia = new Provincia();
        $provincia->nombre = 'Sevilla';
        $provincia->save();
    }
}
