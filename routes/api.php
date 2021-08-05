<?php

use App\Http\Controllers\Api\ConfigsController;
use App\Http\Controllers\Api\ExperiencesController;
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

Route::group(['middleware' => ['enablecors', 'verifytoken']], function () {
    Route::get('configs', [ConfigsController::class, 'index']);
    Route::get('experiences', [ExperiencesController::class, 'index']);
});
