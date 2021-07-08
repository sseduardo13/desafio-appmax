<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ReportController;

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

Route::resource('products', ProductController::class);

Route::get('stock/add-stock/{id}', [StockController::class, 'addProduct']);
Route::post('stock/add/{id}', [StockController::class, 'storeAddStock']);
Route::get('stock/down-stock/{id}', [StockController::class, 'downProduct']);
Route::post('stock/down/{id}', [StockController::class, 'storeDownStock']);

Route::get('reports', [ReportController::class, 'index']);
Route::post('reports', [ReportController::class, 'getStockReport']);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
