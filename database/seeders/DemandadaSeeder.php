<?php

namespace Database\Seeders;

use App\Models\Demandada;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemandadaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Demandada::factory(20)->create();
    }
}
