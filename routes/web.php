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
Auth::routes();
Route::group(['middleware' => 'auth'],function(){
    Route::get('/', function () {
        return view('dashboard');
    });
    Route::get('profile','ProfileController@editProfile');
    Route::put('update_profile','ProfileController@updateProfile');
    Route::patch('changepassword','ProfileController@changePassword');

});
Route::get('/test', function() {
    return view('profiles.profile');
});
