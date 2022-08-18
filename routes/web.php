<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BayController;
use App\Http\Controllers\CalendlyController;
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

Route::any('/create-contact',[BayController::class, 'createContact']);
Route::any('/get-events',[CalendlyController::class, 'getEvents']);
Route::any('/webhook',[CalendlyController::class, 'webhook']);
Route::any('/db-test',[CalendlyController::class, 'dbTest']);
Route::any('/create-event',[BayController::class, 'createEvents']);
