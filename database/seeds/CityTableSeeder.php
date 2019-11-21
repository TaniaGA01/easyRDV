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
        DB::table('cities')->insert([
            [
                'name' => 'Vladivostok',
                'departement' => 'Primorie'
            ],
            [
                'name' => 'Perpignan',
                'departement' => 'Pyrénées Orientales'
            ],
            [
                'name' => 'Carcassonne',
                'departement' => 'Aude'
            ],
            [
                'name' => 'Corlaix',
                'departement' => 'Finistère'
            ],
            [
                'name' => 'Rennes',
                'departement' => 'Ille et Vilaine'
            ],
            [
                'name' => 'Brest',
                'departement' => 'Finistère'
            ],
            [
                'name' => 'Iakoutsk',
                'departement' => 'Iakoutie'
            ],
            [
                'name' => 'Kyoto',
                'departement' => 'Kansai'
            ],
            [
                'name' => 'Bourg-les-Mouls',
                'departement' => 'Creuse'
            ],
            [
                'name' => 'Serres-les-Coings',
                'departement' => 'Charente Maritime'
            ],
            [
                'name' => 'Marseille',
                'departement' => 'Bouches du Rhône'
            ],
            [
                'name' => 'Xandar City',
                'departement' => 'Secteur WBH3'
            ],
            [
                'name' => 'Poudlard',
                'departement' => 'Highlands'
            ],
            [
                'name' => 'Rungis',
                'departement' => 'Val-de-Marne'
            ],
            [
                'name' => 'Minas Territ',
                'departement' => 'Terre du Milieu'
            ],
            [
                'name' => 'Vannes',
                'departement' => 'Morbihan'
            ],
            [
                'name' => 'Kaamelott',
                'departement' => 'Armorique'
            ],
            [
                'name' => 'Montréal',
                'departement' => 'Québec'
            ],
            [
                'name' => 'Laraville',
                'departement' => 'Ille et Vilaine'
            ]
        ]);
    }
}
