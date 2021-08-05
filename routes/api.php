<?php

use App\Http\Controllers\Api\CertificatesController;
use App\Http\Controllers\Api\CompetenciesController;
use App\Http\Controllers\Api\ConfigsController;
use App\Http\Controllers\Api\EducationsController;
use App\Http\Controllers\Api\ExperiencesController;
use App\Http\Controllers\Api\PortfoliosController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\ContactsController;
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
    Route::get('users', [UsersController::class, 'index']);
    Route::get('portfolios', [PortfoliosController::class, 'index']);
    Route::get('educations', [EducationsController::class, 'index']);
    Route::get('certificates', [CertificatesController::class, 'index']);
    Route::get('competencies', [CompetenciesController::class, 'index']);
    Route::get('contacts', [ContactsController::class, 'index']);
});
