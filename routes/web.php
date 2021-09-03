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

// Temporary register

Route::get('/temp/invite-register','PagesController@inviteRegister');
// Races

//Route::get('/races','RaceController@index');
Route::resource('/races','RaceController');
Route::get('/races/{race}/join','RaceController@join')->middleware('auth')->name('races.join');

// Users

Route::resource('/users', 'UserController');

// Administrace

// CKEditor

Route::get('ckeditor', 'CkeditorController@index');
Route::post('ckeditor/upload', 'CkeditorController@upload')->name('ckeditor.upload');

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

    Route::resource('/admin/pages', 'Admin\\PageController')->names([
        'index' => 'admin.pages.index',
        'create' => 'admin.pages.create',
        'store' => 'admin.pages.store',
        'edit' => 'admin.pages.edit',
        'update' => 'admin.pages.update'
    ]);

    Route::resource('/admin/circuits', 'Admin\\CircuitController')->names([
        'index' => 'admin.circuits.index',
        'create' => 'admin.circuits.create',
        'store' => 'admin.circuits.store',
        'edit' => 'admin.circuits.edit',
        'update' => 'admin.circuits.update'
    ]);

    Route::resource('/admin/users', 'Admin\\UserController')->names([
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'edit' => 'admin.users.edit',
        'update' => 'admin.users.update'
    ]);

    Route::resource('/admin/championship', 'Admin\\ChampionshipController')->names([
        'index' => 'admin.championship.index',
        'create' => 'admin.championship.create',
        'store' => 'admin.championship.store',
        'edit' => 'admin.championship.edit',
        'update' => 'admin.championship.update'
    ]);

    Route::resource('/admin/posts', 'Admin\\PostController')->names([
        'index' => 'admin.posts.index',
        'create' => 'admin.posts.create',
        'store' => 'admin.posts.store',
        'edit' => 'admin.posts.edit',
        'update' => 'admin.posts.update'
    ]);
});

