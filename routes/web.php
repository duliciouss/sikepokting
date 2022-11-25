<?php

use App\Http\Controllers\CommodityController;
use App\Http\Controllers\PriceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/markets', function () {
        return view('markets.index');
    })->name('markets.index');

    Route::resource('commodities', CommodityController::class)->except('show');
    Route::group(['prefix' => 'commodities'], function () {
        Route::get('json', [CommodityController::class, 'json'])->name('prices.json');
    });

    Route::resource('prices', PriceController::class)->except('show');
    Route::group(['prefix' => 'prices'], function () {
        Route::get('json', [PriceController::class, 'json'])->name('prices.json');
        Route::post('export', [PriceController::class, 'export'])->name('prices.export');
    });

    Route::get('/users', function () {
        return view('users.index');
    })->name('users.index');
});


require __DIR__ . '/auth.php';
