<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CitiesController;
use App\Http\Controllers\Api\DoctorsController;
use App\Http\Controllers\Api\PatientsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/user', [AuthController::class, 'me'])->name('me')->middleware('jwt');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::group([
    'controller' => CitiesController::class,
    'prefix' => 'cidades',
    'as' => 'cities.',
    'middleware' => 'jwt',
], function () {
    Route::get('/', 'get')->name('get')->withoutMiddleware('jwt');
    Route::get('/{id_city}/medicos','getDoctors')->name('doctor');
});

Route::group([
    'controller' => DoctorsController::class,
    'prefix' => 'medicos',
    'as' => 'doctors.',
    'middleware' => 'jwt',
], function () {
    Route::get('/', 'get')->name('get')->withoutMiddleware('jwt');
    Route::post('/', 'store')->name('store');
    Route::post('/{id_medico}/pacientes', 'linkPatientWithDoctor')->name('link');
    Route::get('/{id_medico}/pacientes', 'getPacients')->name('get.pacients');
});

Route::group([
    'controller' => PatientsController::class,
    'prefix' => 'pacientes',
    'as' => 'patients.',
    'middleware' => 'jwt',
], function () {
    Route::post('/', 'store')->name('store');
    Route::put('/{id_patient}', 'update')->name('update');
});
