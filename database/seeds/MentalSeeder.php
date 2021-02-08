<?php

use Illuminate\Database\Seeder;
use App\Mental;

class MentalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mental::create(['discapacidad' => 'Intelectual']);
        Mental::create(['discapacidad' => 'Conductual']);
        Mental::create(['discapacidad' => 'Otra']);
        Mental::create(['discapacidad' => 'Ninguna']);

    }
}
