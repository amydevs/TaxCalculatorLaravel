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
    // This is for making my a dynamic link to my about page.
    $basehome = "";
    foreach (Request::query() as $key => $query) {
        $index = array_search($key, Request::query());
        $length = sizeof(Request::query()) - 1;
        if ($index == 0) { $basehome = "?"; }
        $basehome = "$basehome$key=$query";
        if ($index != $length) { $basehome = "$basehome&"; }
    }
    $basehome = "$basehome#about";
    Route::any($basehome, function (Request $request) {
        return view('pages.index');
    }) -> name('About');
    // End of that section.

    Route::any('contact', function () {
        return view('pages.contact');
    }) -> name('Contact');

    Route::get('legal', function () {
        return view('pages.legal');
    }) -> name('Legal');
});
