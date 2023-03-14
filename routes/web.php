<?php

use App\Http\Controllers\CommodityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TestApiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('fullscreen', [DashboardController::class, 'fullscreen'])->name('dashboard.fullscreen');
    });

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

    Route::resource('prices', PriceController::class)->except('show');
    Route::group(['prefix' => 'prices'], function () {
        Route::get('json', [PriceController::class, 'json'])->name('prices.json');
    });

    Route::resource('users', UserController::class)->except('show');
    Route::group(['prefix' => 'users'], function () {
        Route::get('json', [UserController::class, 'json'])->name('prices.json');
    });

    Route::resource('stocks', StockController::class)->except('show');
    Route::group(['prefix' => 'stocks'], function () {
        Route::get('json', [StockController::class, 'json'])->name('stocks.json');
    });

    Route::get('/get-token', [TestApiController::class, 'index']);
});


require __DIR__ . '/auth.php';
