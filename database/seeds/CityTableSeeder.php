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
        $seed = [];
       if ($handle = fopen(__DIR__.'/laposte_hexasmal.csv', 'r')) {
         while(($data = fgetcsv($handle, 1000, ';')) !== FALSE){
             $seed[] = [
                 'name_ville' => $data[1],
                 'postal_code' => $data[2]
             ];
         }
       }
       foreach ($seed as $city) {
        DB::table('cities')->insert($city);
    }
    }
}
