<?php

use Illuminate\Database\Seeder;
use phpDocumentor\Reflection\Types\Integer;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'last_name' => 'Crevard',
                'first_name' => 'Jean-Michel',
                'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('password'),
                'city_id' => '1',
                'role_id' => '2',
                'profession_id' => '12',
            ],
            [
                'last_name' => 'Connare',
                'first_name' => 'Jean-Michel',
                'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('password'),
                'city_id' => '9',
                'role_id' => '2',
                'profession_id' => '12',

            ],
            [
                'last_name' => 'Bastar',
                'first_name' => 'Jean-Claude',
                'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('password'),
                'city_id' => '9',
                'role_id' => '2',
                'profession_id' => '12',

            ],
            [
                'last_name' => 'Baveux',
                'first_name' => 'Jean-Luc',
                'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('password'),
                'city_id' => '2',
                'role_id' => '2',
                'profession_id' => '12',

            ],
            [
                'last_name' => 'Fissdeuh',
                'first_name' => 'Jean-Eudes',
                'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('password'),
                'city_id' => '5',
                'role_id' => '2',
                'profession_id' => '12',

            ],
            [
                'last_name' => 'Lescrault',
                'first_name' => 'Jean-Pierre',
                'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('password'),
                'city_id' => '1',
                'role_id' => '2',
                'profession_id' => '12',

            ],
            [
                'last_name' => 'Collard',
                'first_name' => 'Gilbert',
                'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('password'),
                'city_id' => '17',
                'role_id' => '2',
                'profession_id' => '12',

            ],
            [
                'last_name' => 'La Barbu',
                'first_name' => 'Maxime',
                'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('password'),
                'city_id' => '5',
                'role_id' => '2',
                'profession_id' => '13',

            ],
            [
                'last_name' => 'Aupouhalt',
                'first_name' => 'Philippe',
                'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('password'),
                'city_id' => '5',
                'role_id' => '2',
                'profession_id' => '13',

            ],
            [
                'last_name' => 'De Taille',
                'first_name' => 'Max',
                'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('password'),
                'city_id' => '5',
                'role_id' => '2',
                'profession_id' => '13',

            ],
            [
                'last_name' => 'Dupoil',
                'first_name' => 'Erwann',
                'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('password'),
                'city_id' => '13',
                'role_id' => '2',
                'profession_id' => '13',

            ],
            [
                'last_name' => 'Sete',
                'first_name' => 'Damien',
                'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('password'),
                'city_id' => '13',
                'role_id' => '2',
                'profession_id' => '13',

            ],
            [
                'last_name' => 'Nougaret',
                'first_name' => 'Adrien',
                'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('password'),
                'city_id' => '17',
                'role_id' => '2',
                'profession_id' => '13',

            ],
            [
                'last_name' => 'De la Vieille Barbe',
                'first_name' => 'Xavier',
                'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('password'),
                'city_id' => '2',
                'role_id' => '2',
                'profession_id' => '13',

            ],
            [
                'last_name' => 'Palat',
                'first_name' => 'Coro',
                'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('password'),
                'city_id' => '17',
                'role_id' => '2',
                'profession_id' => '13',

            ],
            [
                'last_name' => 'Warlord',
                'first_name' => 'Eustache',
                'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('password'),
                'city_id' => '12',
                'role_id' => '2',
                'profession_id' => '6',

            ],
            [
                'last_name' => 'Rockfeller',
                'first_name' => 'Superman',
                'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('password'),
                'city_id' => '9',
                'role_id' => '2',
                'profession_id' => '6',

            ],
            [
                'last_name' => 'Dus',
                'first_name' => 'Jean-Claude',
                'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('password'),
                'city_id' => '5',
                'role_id' => '2',
                'profession_id' => '6',

            ],
            [
                'last_name' => 'Lear',
                'first_name' => 'Lock',
                'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('password'),
                'city_id' => '19',
                'role_id' => '2',
                'profession_id' => '6',

            ]
        ]);
    }
}
