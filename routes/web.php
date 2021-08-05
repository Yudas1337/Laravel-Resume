<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CompetenciesController;
use App\Http\Controllers\ConfigsController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfoliosController;
use App\Http\Controllers\UserDetailsController;
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
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
        Route::prefix('password')->group(function () {
            Route::get('/', [HomeController::class, 'password']);
            Route::post('/', [HomeController::class, 'update'])->name('updatePassword');
        });
        Route::resource('configs', ConfigsController::class)->only(['index', 'update']);
        Route::resource('profiles', UserDetailsController::class)->only(['index', 'update']);
        Route::resources([
            'competencies' => CompetenciesController::class,
            'experiences'  => ExperienceController::class,
            'portfolios'   => PortfoliosController::class
        ]);
    });
});
