<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

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

Route::group(['prefix'=>'','as'=>env('NAVABLEPREFIX'), ], function () {
    Route::any('', function () {
        return view('pages.index');
    }) -> name('Home');
    Route::any('about', function () {
        return view('pages.about');
    }) -> name('About');
    Route::any('contact', function () {
        return view('pages.contact');
    }) -> name('Contact');
});
