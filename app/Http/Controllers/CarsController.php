<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use App\Models\Models_car;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        $cars = DB::table('cars')
            ->select(
                'cars.id',
                'cars.name',
                'cars.production_year',
                'cars.models_car_id',
                'cars.manufacturer_id',
                'cars.image',
                'cars.travelled_kilometers',
                'models_cars.name AS modelName',
                'manufacturers.name AS manufacturerName'
            )
            ->join('models_cars', 'models_cars.id', '=', 'cars.models_car_id')
            ->join('manufacturers', 'manufacturers.id', '=', 'cars.manufacturer_id')
            ->paginate(5);

        if ($request[('search_by')] == 'year') {
            $cars = DB::table('cars')
                ->select(
                    'cars.id',
                    'cars.name',
                    'cars.production_year',
                    'cars.models_car_id',
                    'cars.manufacturer_id',
                    'cars.image',
                    'cars.travelled_kilometers',
                    'models_cars.name AS modelName',
                    'manufacturers.name AS manufacturerName'
                )
                ->join('models_cars', 'models_cars.id', '=', 'cars.models_car_id')
                ->join('manufacturers', 'manufacturers.id', '=', 'cars.manufacturer_id')
                ->where('production_year', 'like', '%' . $search . '%')
                ->paginate(5);
        } else if ($request[('search_by')] == 'model') {
            $cars = DB::table('cars')
                ->select(
                    'cars.id',
                    'cars.name',
                    'cars.production_year',
                    'cars.models_car_id',
                    'cars.manufacturer_id',
                    'cars.image',
                    'cars.travelled_kilometers',
                    'models_cars.name AS modelName',
                    'manufacturers.name AS manufacturerName'
                )
                ->join('models_cars', 'models_cars.id', '=', 'cars.models_car_id')
                ->join('manufacturers', 'manufacturers.id', '=', 'cars.manufacturer_id')
                ->where('models_cars.name', 'like', '%' . $search . '%')
                ->paginate(5);
        } else if ($request[('search_by')] == 'manufacturer') {
            $cars = DB::table('cars')
                ->select(
                    'cars.id',
                    'cars.name',
                    'cars.production_year',
                    'cars.models_car_id',
                    'cars.manufacturer_id',
                    'cars.image',
                    'cars.travelled_kilometers',
                    'models_cars.name AS modelName',
                    'manufacturers.name AS manufacturerName'
                )
                ->join('models_cars', 'models_cars.id', '=', 'cars.models_car_id')
                ->join('manufacturers', 'manufacturers.id', '=', 'cars.manufacturer_id')
                ->where('manufacturers.name', 'like', '%' . $search . '%')
                ->paginate(5);
        }

        return view('cars.index', [
            'pageTitle' => 'Cars catalog',
            'cars' => $cars
        ]);
    }
}
