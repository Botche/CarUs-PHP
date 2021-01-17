<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use App\Models\Models_car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarsController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->get('search');

        if ($request['search_by'] == null || $search == null) {
            return back();
        }

        if ($request[('search_by')] == 'year') {
            $cars = DB::table('cars')
                ->where('production_year', 'like', '%' . $search . '%')
                ->paginate(5);
        }
        else if ($request[('search_by')] == 'model') {
            $cars = DB::table('cars')
                ->join('models_cars', 'models_car.id', '=', 'cars.models_car_id')
                ->where('models_cars.name', 'like', '%' . $search . '%')
                ->paginate(5);
        }
        else if ($request[('search_by')] == 'manufacturer') {
            $cars = DB::table('cars')
                ->join('manufacturers', 'manufacturers.id', '=', 'cars.manufacturer_id')
                ->where('manufacturers.name', 'like', '%' . $search . '%')
                ->paginate(5);
        }

        $manufacturers = Manufacturer::all();
        $models_cars = Models_car::all();

        return view('cars.index', [
            'cars' => $cars,
            'manufacturers' => $manufacturers,
            'models_cars' => $models_cars
        ]);
    }
}
