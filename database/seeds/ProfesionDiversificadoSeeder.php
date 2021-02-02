<?php

use Illuminate\Database\Seeder;
use App\ProfesionDiversificado;

class ProfesionDiversificadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProfesionDiversificado::create(['profesion_diversificado' => 'Bachiller en ciencias y letras (más cualquier especialidad)']);
        ProfesionDiversificado::create(['profesion_diversificado' => 'Bachiller en computación']);
        ProfesionDiversificado::create(['profesion_diversificado' => 'Bachiller en construcción']);
        ProfesionDiversificado::create(['profesion_diversificado' => 'Bachiller en mercadotecnia']);
        ProfesionDiversificado::create(['profesion_diversificado' => 'Bachillerato en diseño gráfico']);
        ProfesionDiversificado::create(['profesion_diversificado' => 'Bachillerato en turismo y hotelería']);
        ProfesionDiversificado::create(['profesion_diversificado' => 'Bachillerato industrial  (más cualquier especialidad)']);
        ProfesionDiversificado::create(['profesion_diversificado' => 'Maestro (a) de educación preprimaria (urbana o rural)']);
        ProfesionDiversificado::create(['profesion_diversificado' => 'Maestro (a) de educación primaria  (urbana o rural)']);
        ProfesionDiversificado::create(['profesion_diversificado' => 'Perito contador (más cualquier especialidad)']);
        ProfesionDiversificado::create(['profesion_diversificado' => 'Perito en administración (educativa, hotelera, pública etc.)']);
        ProfesionDiversificado::create(['profesion_diversificado' => 'Perito en alimentos  (más cualquier especialidad)']);
        ProfesionDiversificado::create(['profesion_diversificado' => 'Perito en desarrollo comunitario']);
        ProfesionDiversificado::create(['profesion_diversificado' => 'Perito en electrónica (más cualquier especialidad)']);
        ProfesionDiversificado::create(['profesion_diversificado' => 'Perito en informática']);
        ProfesionDiversificado::create(['profesion_diversificado' => 'Perito en mecánica y gestión automotriz']);
        ProfesionDiversificado::create(['profesion_diversificado' => 'Perito en turismo (más cualquier especialidad)']);
        ProfesionDiversificado::create(['profesion_diversificado' => 'Secretaria bilingüe  (más cualquier especialidad)']);
        ProfesionDiversificado::create(['profesion_diversificado' => 'Secretaria comercial y oficinista  (más cualquier especialidad)']);
        ProfesionDiversificado::create(['profesion_diversificado' => 'Sin estudios de nivel medio diversificado']);
        ProfesionDiversificado::create(['profesion_diversificado' => 'Enfermería']);
    }
}
