<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('kotas', App\Http\Controllers\API\KotaAPIController::class);

Route::resource('jams', App\Http\Controllers\API\JamAPIController::class);

Route::resource('levels', App\Http\Controllers\API\LevelAPIController::class);

Route::resource('sektors', App\Http\Controllers\API\SektorAPIController::class);

Route::resource('tmp_images', App\Http\Controllers\API\tmpImageAPIController::class);

Route::resource('foto_recognitions', App\Http\Controllers\API\fotoRecognitionsAPIController::class);

Route::resource('karyawans', App\Http\Controllers\API\KaryawanAPIController::class);

Route::resource('name_positions', App\Http\Controllers\API\NamePositionAPIController::class);

Route::resource('absensis', App\Http\Controllers\API\AbsensiAPIController::class);