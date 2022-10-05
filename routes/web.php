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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/markets', function () {
    return view('markets.index');
})->name('markets.index');

Route::get('/commodities', function () {
    return view('commodities.index');
})->name('commodities.index');

Route::get('/prices', function () {
    return view('prices.index');
})->name('prices.index');

Route::get('/users', function () {
    return view('users.index');
})->name('users.index');

require __DIR__ . '/auth.php';
