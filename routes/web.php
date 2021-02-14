<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::resource('kotas', App\Http\Controllers\KotaController::class);

Route::resource('jams', App\Http\Controllers\JamController::class);

Route::resource('levels', App\Http\Controllers\LevelController::class);

Route::resource('sektors', App\Http\Controllers\SektorController::class);

Route::resource('tmpImages', App\Http\Controllers\tmpImageController::class);

Route::resource('fotoRecognitions', App\Http\Controllers\fotoRecognitionsController::class);

Route::resource('karyawans', App\Http\Controllers\KaryawanController::class);