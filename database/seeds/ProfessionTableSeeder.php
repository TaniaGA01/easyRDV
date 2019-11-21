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
            'name' => 'Neurologue',
        ]);
        DB::table('professions')->insert([
            'name' => 'Neuro-compresseur',
        ]);
        DB::table('professions')->insert([
            'name' => 'Psychologue',
        ]);
        DB::table('professions')->insert([
            'name' => 'Psychopathe',
        ]);
        DB::table('professions')->insert([
            'name' => 'Chasseur de primes',
        ]);
        DB::table('professions')->insert([
            'name' => 'Laveur de cerveau',
        ]);
        DB::table('professions')->insert([
            'name' => 'Avocat',
        ]);
        DB::table('professions')->insert([
            'name' => 'Baveux',
        ]);
        DB::table('professions')->insert([
            'name' => 'Ramasseur de champignons',
        ]);
        DB::table('professions')->insert([
            'name' => 'Flyfu**er',
        ]);
        DB::table('professions')->insert([
            'name' => 'Chasseur de Troll',
        ]);
        DB::table('professions')->insert([
            'name' => 'Moine à temps partiel',
        ]);
        DB::table('professions')->insert([
            'name' => 'Socialiste dépressif',
        ]);
        DB::table('professions')->insert([
            'name' => 'Barbier',
        ]);
        DB::table('professions')->insert([
            'name' => 'Stagiaire spécialisé Maison du Café',
        ]);
        DB::table('professions')->insert([
            'name' => 'Web designer',
        ]);
        DB::table('professions')->insert([
            'name' => 'Péripapétitien*ne',
        ]);
        DB::table('professions')->insert([
            'name' => 'Développeur Web',
        ]);
    }
}
