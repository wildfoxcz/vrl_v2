<?php

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

// Authorization
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

// Core Pages

Route::get('/', 'PagesController@homepage');
Route::get('/page/{slug}', array('as' => 'page.show', 'uses' => 'PageController@show'));


// Races

//Route::get('/races','RaceController@index');
Route::resource('/races','RaceController');

// Users

Route::resource('/users', 'UserController');

// Administrace

Route::middleware('role:administrator')->group(function () {
    Route::get('/admin','Admin\\AdminController@index')->name('admin.index');
});

