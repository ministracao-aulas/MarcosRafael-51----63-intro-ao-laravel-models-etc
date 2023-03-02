<?php

use App\Http\Controllers\passRouteParametersController;
use Illuminate\Http\Request;
use App\Http\Controllers\CustomerController;
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

// Route::get('/', function (Request $request) {
//     if (!isset($request->error)) {
//         return;
//     }

//     return view('capture')->with('error', $request->error);
// })->name('create.parameter');

Route::controller(passRouteParametersController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/capture/parameter', 'capture')->name('capture.parameter');
    Route::get('/display/parameter', 'display')->name('display.parameter');
});

Route::prefix('customers')->name('customers.')->group(function () {
    Route::get('/create', [CustomerController::class, 'create'])->name('create');
    Route::post('/store', [CustomerController::class, 'store'])->name('store');
});
