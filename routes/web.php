<?php

use App\Http\Controllers\CarsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Models\Models_car;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'index']);
Route::get('/cars', [CarsController::class, 'index']);
Route::get('/search', [CarsController::class, 'search']);
Route::get('/models/{id}', function ($id) {
    return Models_car::all()->where('manufacturer_id', $id);
});
