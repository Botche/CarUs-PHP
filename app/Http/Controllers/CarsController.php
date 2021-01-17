<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $results = DB::select(DB::raw(
            "SELECT c.id,
                c.name, 
                c.image, 
                m.name AS manufacturerName, 
                mc.name AS modelName,
                COUNT(c.id) AS countCars 
            FROM cars AS c
            JOIN manufacturers AS m
            ON c.manufacturer_id = m.id
            JOIN models_cars AS mc 
            ON c.models_car_id = mc.id
            WHERE c.name LIKE '%$search%'
            OR m.name LIKE '%$search%'
            OR mc.name LIKE '%$search%'
            GROUP BY c.id, c.name, c.image, m.name, mc.name"
        ), array(
            'search' => $search,
        ));

        return view(
            'cars.index',
            [
                'title' => 'Here you will find your next car!',
                'results' => $results,
            ]
        );
    }
}
