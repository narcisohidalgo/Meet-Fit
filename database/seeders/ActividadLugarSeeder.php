<?php

namespace Database\Seeders;

use App\Models\ActividadLugar;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ActividadLugarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ActividadLugar::factory(10)->create();
    }
}
