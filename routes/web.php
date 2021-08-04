<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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

if (App::environment('production')) {
    URL::forceScheme('https');
}

Route::get('/', [AuthController::class, 'index']);
Route::post('/', [AuthController::class, 'authenticate'])->name('login');

Route::group(['middleware' => 'auth'], function () {

    Route::prefix('admin')->group(function () {
        Route::get('/', [HomeController::class, 'index']);
    });
});
