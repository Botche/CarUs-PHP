<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('cars')->get()->count() === 0) {

            $records = [
                [
                    'Romeo',
                    date('2001-11-27'),
                    20000,
                    DB::table('models_cars')->where('name', '=', 'X5')->select('id')->first(),
                    DB::table('manufacturers')->where('type', '=', 'BMW')->select('id')->first(),
                    'https://images.unsplash.com/photo-1599393176800-3a34c99adb7c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80'
                ],
                [
                    'Stamat',
                    date('2001-12-31'),
                    100000,
                    DB::table('models_cars')->where('name', '=', 'Grand cheeroke')->select('id')->first(),
                    DB::table('manufacturers')->where('type', '=', 'Jeep')->select('id')->first(),
                    'https://images.unsplash.com/photo-1576523002176-020ee12eefe3?ixid=MXwxMjA3fDB8MHxzZWFyY2h8NHx8Z3JhbmQlMjBjaGVyb2tlZXxlbnwwfHwwfA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60'
                ],
                [
                    'Pencho',
                    date('2003-09-20'),
                    50000,
                    DB::table('models_cars')->where('name', '=', 'Golf')->select('id')->first(),
                    DB::table('manufacturers')->where('type', '=', 'VW')->select('id')->first(),
                    'https://images.unsplash.com/photo-1471444928139-48c5bf5173f8?ixid=MXwxMjA3fDB8MHxzZWFyY2h8Nnx8Z29sZiUyMHZ3fGVufDB8fDB8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60'
                ]
            ];

            $now = date('Y-m-d H:i:s');

            for ($index = 0; $index < count($records); $index++) {
                DB::table('cars')->insert(
                    array(
                        'name' => $records[$index][0],
                        'production_year' => $records[$index][1],
                        'travelled_kilometers' => $records[$index][2],
                        'models_car_id' => $records[$index][3]->id,
                        'manufacturer_id' => $records[$index][4]->id,
                        'image' => $records[$index][5],
                        'created_at' => $now,
                        'updated_at' => $now
                    )
                );
            }
        } else {
            echo "\r\n\e[31m Cars table is not empty.  \r\n ";
        }
    }
}
