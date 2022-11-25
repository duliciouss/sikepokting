<?php

use App\Http\Controllers\CommodityController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('markets', MarketController::class)->except('show');
    Route::group(['prefix' => 'markets'], function () {
        Route::get('json', [MarketController::class, 'json'])->name('prices.json');
    });

    Route::resource('commodities', CommodityController::class)->except('show');
    Route::group(['prefix' => 'commodities'], function () {
        Route::get('json', [CommodityController::class, 'json'])->name('prices.json');
    });

    Route::resource('prices', PriceController::class)->except('show');
    Route::group(['prefix' => 'prices'], function () {
        Route::get('json', [PriceController::class, 'json'])->name('prices.json');
        Route::post('export', [PriceController::class, 'export'])->name('prices.export');
    });

    Route::resource('users', UserController::class)->except('show');
    Route::group(['prefix' => 'users'], function () {
        Route::get('json', [UserController::class, 'json'])->name('prices.json');
    });
});


require __DIR__ . '/auth.php';
