<?php

use Illuminate\Database\Seeder;
use App\Sensorial;

class SensorialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sensorial::create(['discapacidad' => 'Visual']);
        Sensorial::create(['discapacidad' => 'Auditiva']);
        Sensorial::create(['discapacidad' => 'Verbal']);
        Sensorial::create(['discapacidad' => 'Comprensión']);
        Sensorial::create(['discapacidad' => 'Múltiple']);
        Sensorial::create(['discapacidad' => 'Ninguna']);


    }
}
