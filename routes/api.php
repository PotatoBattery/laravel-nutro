<?php

use App\Http\Controllers\Nutro\ApiNutroController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/chart/', [ApiNutroController::class, 'getChart'])->name('api.chart');
Route::post('/profile/', [ApiNutroController::class, 'saveProfileField'])->name('api.profile');
Route::get('/color/', [ApiNutroController::class, 'setColorTheme'])->name('api.color');
Route::get('/music/', [ApiNutroController::class, 'getMusic'])->name('api.music');
