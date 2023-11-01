<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LineChartController;
use App\Http\Controllers\ChartController;

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


Route::get('/readdata', [ChartController::class, 'readdata']) -> name ('readdata');
Route::get('/', [LineChartController::class, 'index']) -> name ('linechart');
