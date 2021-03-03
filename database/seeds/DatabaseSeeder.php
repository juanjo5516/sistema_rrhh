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
        $this->call(SensorialSeeder::class);
        $this->call(MotrizSeeder::class);
        $this->call(MentalSeeder::class);
        $this->call(NominalPositionSeeder::class);
        $this->call(AdministrativeUbicationSeeder::class);
        $this->call(PhysicalLocationSeeder::class);
        $this->call(UnidadEjecutoraSeeder::class);
        $this->call(PermissionsSeeder::class);
    }
}
