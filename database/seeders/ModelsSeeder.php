<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('models_cars')->get()->count() === 0) {

            $records = [
                [
                    'X5',
                    DB::table('manufacturers')->where('name', '=', 'BMW')->select('id')->first(),
                ],
                [
                    'Grand cheeroke',
                    DB::table('manufacturers')->where('name', '=', 'Jeep')->select('id')->first(),
                ],
                [
                    'CLS',
                    DB::table('manufacturers')->where('name', '=', 'Mercedes')->select('id')->first(),
                ],
                [
                    'A3',
                    DB::table('manufacturers')->where('name', '=', 'Audi')->select('id')->first(),
                ],
                [
                    'Golf',
                    DB::table('manufacturers')->where('name', '=', 'VW')->select('id')->first(),
                ],
                [
                    'Astra',
                    DB::table('manufacturers')->where('name', '=', 'Opel')->select('id')->first(),
                ],
                [
                    'Corsa',
                    DB::table('manufacturers')->where('name', '=', 'Opel')->select('id')->first(),
                ]
            ];

            $now = date('Y-m-d H:i:s');

            for ($index = 0; $index < count($records); $index++) {
                DB::table('models_cars')->insert(
                    array(
                        'name' => $records[$index][0],
                        'manufacturer_id' => $records[$index][1]->id,
                        'created_at' => $now,
                        'updated_at' => $now
                    )
                );
            }
        } else {
            echo "\r\n\e[31m Models table is not empty.  \r\n ";
        }
    }
}
