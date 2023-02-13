<?php

use App\Http\Controllers\passRouteParametersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function (Request $request) {
    if (isset($request->error));
    return view('capture')->with('error', $request->error);
})->name('create.parameter');

Route::controller(passRouteParametersController::class)->group(function() {
    Route::post('/capture/parameter', 'capture')->name('capture.parameter');
    Route::get('/display/parameter', 'display')->name('display.parameter');
});