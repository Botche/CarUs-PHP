<?php

namespace App\Http\Controllers;

use App\Models\Models_car;

class Models_carController extends Controller
{
    public function searchById ($id) {
        return Models_car::all()->where('manufacturer_id', $id);
    }
}
