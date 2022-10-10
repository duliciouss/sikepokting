<?php

use App\Http\Controllers\CommodityController;
use App\Http\Controllers\PriceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/markets', function () {
        return view('markets.index');
    })->name('markets.index');

    Route::get('/commodities', [CommodityController::class, 'index'])->name('commodities.index');
    Route::get('/commodities/{commodity}', [CommodityController::class, 'show'])->name('commodities.show');

    Route::get('/prices/json', [PriceController::class, 'json'])->name('prices.json');

    Route::group(['prefix' => 'prices'], function () {
        Route::get('/', [PriceController::class, 'index'])->name('prices.index');
        Route::post('/', [PriceController::class, 'store'])->name('prices.store');
        // Route::get('/export', function () {
        //     return view('prices.export');
        // })->name('prices.export');
        Route::post('/export', [PriceController::class, 'export'])->name('prices.export');
    });

    Route::get('/users', function () {
        return view('users.index');
    })->name('users.index');
});


require __DIR__ . '/auth.php';
