<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('professions')->insert([
            [
                'name' => 'Neurologue'
            ],
            [
                'name' => 'Psychologue'
            ],
            [
                'name' => 'Comptable'
            ],
            [
                'name' => 'Baveux'
            ],
            [
                'name' => 'Psychopathe'
            ],
            [
                'name' => 'Ramasseur-de-champignons'
            ],
            [
                'name' => 'Flyfu**er'
            ],
            [
                'name' => 'Moine-à-temps-partiel'
            ],
            [
                'name' => 'Socialiste-dépressif'
            ],
            [
                'name' => 'Chasseur-de-Troll'
            ],
            [
                'name' => 'Avocat'
            ],
            [
                'name' => 'Barbier'
            ],
            [
                'name' => 'Stagiaire-spécialisé-Maison-du-Café'
            ],
            [
                'name' => 'Web-designer'
            ],
            [
                'name' => 'Péripapétitien*ne'
            ],
            [
                'name' => 'Développeur-Web'
            ],
            [
                'name' => 'Laveur-de-cerveau'
            ],
            [
                'name' => 'Chasseur-de-primes'
            ],
            [
                'name' => 'Oncologue'
            ],
            [
                'name' => 'Lécheur-de-timbre'
            ],
            [
                'name' => 'Taxidermiste'
            ],
            [
                'name' => 'Mannequin-de-crash-test'
            ],
            [
                'name' => 'Beauf-professionnel'
            ],
            [
                'name' => 'Skipper'
            ],
            [
                'name' => 'Nanipabulophile'
            ],
            [
                'name' => 'Porno-phonographiste'
            ],
        ]);
    }
}
