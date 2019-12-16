<?php

use Illuminate\Database\Seeder;

class AppointmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('appointments')->insert([
            [
                'data_tartempion' => '2019-12-16_15',
                'id_pro' => '1',
                'id_client' => '53',
            ],
            [
                'data_tartempion' => '2019-12-18_09',
                'id_pro' => '13',
                'id_client' => '54',
            ],
            [
                'data_tartempion' => '2019-12-18_09',
                'id_pro' => '1',
                'id_client' => '54',
            ],
            [
                'data_tartempion' => '2019-12-18_10',
                'id_pro' => '1',
                'id_client' => '55',
            ],
            [
                'data_tartempion' => '2019-12-19_15',
                'id_pro' => '1',
                'id_client' => '54',
            ],
            [
                'data_tartempion' => '2019-12-19_15',
                'id_pro' => '48',
                'id_client' => '55',
            ],
            [
                'data_tartempion' => '2019-12-18_15',
                'id_pro' => '48',
                'id_client' => '53',
            ],
            [
                'data_tartempion' => '2019-12-18_15',
                'id_pro' => '32',
                'id_client' => '53',
            ],
            [
                'data_tartempion' => '2019-12-19_10',
                'id_pro' => '32',
                'id_client' => '54',
            ],
        ]);

        DB::table('appointments')->insert([
            [
                'data_tartempion' => '2019-12-19_09',
                'content' => 'Amener la bagnole au garage',
                'id_pro' => '1',
            ],
            [
                'data_tartempion' => '2019-12-19_12',
                'content' => 'APERO',
                'id_pro' => '1',
            ],
        ]);
    }
}
