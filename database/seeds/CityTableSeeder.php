<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('city')->insert([
            'name' => 'Vladivostok',
        ]);
        DB::table('city')->insert([
            'name' => 'Perpignan',
        ]);
        DB::table('city')->insert([
            'name' => 'Carcassonne',
        ]);
        DB::table('city')->insert([
            'name' => 'Corlaix',
        ]);
        DB::table('city')->insert([
            'name' => 'Brest',
        ]);
        DB::table('city')->insert([
            'name' => 'Rennes',
        ]);
        DB::table('city')->insert([
            'name' => 'Iakoutsk',
        ]);
        DB::table('city')->insert([
            'name' => 'Kyoto',
        ]);
        DB::table('city')->insert([
            'name' => 'Bourg-les-Mouls',
        ]);
        DB::table('city')->insert([
            'name' => 'Serres-les-Coings',
        ]);
        DB::table('city')->insert([
            'name' => 'Marseille',
        ]);
        DB::table('city')->insert([
            'name' => 'Xandar City',
        ]);
        DB::table('city')->insert([
            'name' => 'Poudlard',
        ]);
        DB::table('city')->insert([
            'name' => 'Rungis',
        ]);
        DB::table('city')->insert([
            'name' => 'Minas Territ',
        ]);
        DB::table('city')->insert([
            'name' => 'Vannes',
        ]);
        DB::table('city')->insert([
            'name' => 'Kaamelott',
        ]);
        DB::table('city')->insert([
            'name' => 'Montréal',
        ]);
        DB::table('city')->insert([
            'name' => 'Laraville',
        ]);
    }
}
