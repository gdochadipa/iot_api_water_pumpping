<?php

use App\Http\Controllers\IotController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/volume', [IotController::class, 'index']);
Route::get('/volume/last', [IotController::class, 'getLastData']);
Route::get('/status', [IotController::class, 'getStatusMachine']);
Route::post('/volume', [IotController::class, 'addVolume']);
Route::post('/volume/turn', [IotController::class, 'changeTurn']);
