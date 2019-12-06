<?php

use Illuminate\Database\Seeder;

class StatusAppointmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_appointments')->insert([
            [
                'name' => 'en cours'
            ],
            [
                'name' => 'fini'
            ],
            [
                'name' => 'supprimé'
            ]
        ]);
    }
}
