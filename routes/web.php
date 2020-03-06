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

$router->get('/wallets', 'WalletsController@index');
$router->get('/wallets/{id}', 'WalletsController@show')->name('wallet-show');
$router->get('/wallet-balance/{id}', 'WalletsController@walletBalance')->name('walletBalance');

$router->get('/financial-movements', 'FinancialMovementController@index');
$router->get('/financial-movements/{id}', 'FinancialMovementController@show');

