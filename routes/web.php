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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return Auth::user()->hello();
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/profile/{slug}', 'ProfilesController@index')->name('profile');
    Route::get('/profile/edit/profile', 'ProfilesController@edit')->name('profile.edit');
    Route::post('/profile/update/profile', 'ProfilesController@update')->name('profile.update');
});
