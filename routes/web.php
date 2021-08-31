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

// @todo use group prefix
Route::middleware('role:administrator')->group(function () {
    Route::get('/admin','Admin\\AdminController@index')->name('admin.index');

    Route::resource('/admin/races', 'Admin\\RaceController')->names([
        'index' => 'admin.races.index',
        'create' => 'admin.races.create',
        'store' => 'admin.races.store',
        'edit' => 'admin.races.edit',
        'update' => 'admin.races.update'
    ]);
});

