<?php

use App\Http\Controllers\CommodityController;
use App\Http\Controllers\PriceController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/markets', function () {
    return view('markets.index');
})->name('markets.index');

Route::get('/commodities', [CommodityController::class, 'index'])->name('commodities.index');
Route::get('/commodities/{commodity}', [CommodityController::class, 'show'])->name('commodities.show');

Route::get('/prices', [PriceController::class, 'index'])->name('prices.index');
Route::post('/prices', [PriceController::class, 'store'])->name('prices.store');

Route::get('/users', function () {
    return view('users.index');
})->name('users.index');

require __DIR__ . '/auth.php';
