<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(EtniaSeeder::class);
        $this->call(ComunidadLinguisticaSeeder::class);
        $this->call(ProfesionSeeder::class);
        $this->call(ProfesionDiversificadoSeeder::class);
        
        
    }
}
