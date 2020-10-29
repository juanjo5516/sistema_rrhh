<?php

use Illuminate\Database\Seeder;
use App\Comunidad;

class ComunidadLinguisticaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comunidad::create(['comunidad_linguistica' => 'Achí']);
        Comunidad::create(['comunidad_linguistica' => 'Akateka']);
        Comunidad::create(['comunidad_linguistica' => 'Awakateka']);
        Comunidad::create(['comunidad_linguistica' => 'Chalchiteka']);
        Comunidad::create(['comunidad_linguistica' => 'Ch´orti´']);
        Comunidad::create(['comunidad_linguistica' => 'Chuj ']);
        Comunidad::create(['comunidad_linguistica' => 'Itza´']);
        Comunidad::create(['comunidad_linguistica' => 'Ixil']);
        Comunidad::create(['comunidad_linguistica' => 'Jakalteka (Popti´)']);
        Comunidad::create(['comunidad_linguistica' => 'K´iche´']);
        Comunidad::create(['comunidad_linguistica' => 'Kaqchikel']);
        Comunidad::create(['comunidad_linguistica' => 'Mam']);
        Comunidad::create(['comunidad_linguistica' => 'Mopan']);
        Comunidad::create(['comunidad_linguistica' => 'Poqoman']);
        Comunidad::create(['comunidad_linguistica' => 'Poqomchi´']);
        Comunidad::create(['comunidad_linguistica' => 'Q´anjob´al']);
        Comunidad::create(['comunidad_linguistica' => 'Q´eqchi´']);
        Comunidad::create(['comunidad_linguistica' => 'Sakapulteka']);
        Comunidad::create(['comunidad_linguistica' => 'Sipakapense']);
        Comunidad::create(['comunidad_linguistica' => 'Tektiteka']);
        Comunidad::create(['comunidad_linguistica' => 'Tz´utujil']);
        Comunidad::create(['comunidad_linguistica' => 'Uspanteka']);
        Comunidad::create(['comunidad_linguistica' => 'Garífuna']);
        Comunidad::create(['comunidad_linguistica' => 'Xinca']);
        Comunidad::create(['comunidad_linguistica' => 'Castellana']);
        Comunidad::create(['comunidad_linguistica' => 'Extrajera']);
    }
}
