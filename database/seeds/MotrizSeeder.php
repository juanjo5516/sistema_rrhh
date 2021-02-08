<?php

use Illuminate\Database\Seeder;
use App\Motriz;

class MotrizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Motriz::create(['discapacidad' => 'Extremidades inferiores']);
        Motriz::create(['discapacidad' => 'Extremidades superiores']);
        Motriz::create(['discapacidad' => 'Cabeza']);
        Motriz::create(['discapacidad' => 'Cuello']);
        Motriz::create(['discapacidad' => 'Tronco']);
        Motriz::create(['discapacidad' => 'Múltiple']);
        Motriz::create(['discapacidad' => 'Ninguna']);


    }
}
