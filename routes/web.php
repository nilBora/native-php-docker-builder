<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DockerLoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('main');
});


Route::post('/api/v1/make/dockerfile', [\App\Http\Controllers\Generator::class, 'make']);

Route::get('/docker/login', [DockerLoginController::class, 'showLogin'])->name('login');
