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


// Route::get('/add_friend', function () {
//     return \App\User::find(1)->add_friend(4);
// });

// Route::get('/accept_friend', function () {
//     return \App\User::find(4)->accept_friend(1);
// });

// Route::get('/pending_friends', function () {
//     return \App\User::find(4)->pending_friend_requests();
// });

// Route::get('/ids', function () {
//     return \App\User::find(4)->friends_ids();
// });

// Route::get('/is', function () {
//     return \App\User::find(1)->is_friends_with(2);
// });

// Route::get('/friends', function () {
//     return \App\User::find(1)->friends();
// });

Route::get('ch', function () {
    return \App\User::find(5)->add_friend(3);
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/profile/{slug}', 'ProfilesController@index')->name('profile');
    Route::get('/profile/edit/profile', 'ProfilesController@edit')->name('profile.edit');
    Route::post('/profile/update/profile', 'ProfilesController@update')->name('profile.update');

    Route::get('/check_relationship_status/{id}', 'FriendshipsController@check')->name('check');

    Route::get('/add_friend/{id}', 'FriendshipsController@add_friend')->name('add_friend');
    Route::get('/accept_friend/{id}', 'FriendshipsController@accept_friend')->name('accept_friend');
});
