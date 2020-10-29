<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Etnia;

class EtniaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
/*         DB::table('etnias')->insert([
            'etnia' => 'Maya'
        ]);
        DB::table('etnias')->insert([
            'etnia' => 'Garífuna'
        ]);
        DB::table('etnias')->insert([
            'etnia' => 'Xinca'
        ]);
        DB::table('etnias')->insert([
            'etnia' => 'Mestizo'
        ]); */
        Etnia::create(['etnia' => 'Maya']);
        Etnia::create(['etnia' => 'Garífuna']);
        Etnia::create(['etnia' => 'Xinca']);
        Etnia::create(['etnia' => 'Mestizo']);

    }
}
