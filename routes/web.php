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



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function()
        {
            Route::get('/', function () {
                return view('home');
            });
            Route::get('gold', function () {
                return view('gold');
            });
            Route::get('currency', function () {
                return view('currency');
            });
            Route::get('currencies', function () {
                return view('currencies');
            });
            Route::get('news', function () {
                return view('news');
            });

            Route::get('article', function () {
                return view('article');
            });
        });