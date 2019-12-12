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
    
    Route::get('profile','ProfileController@editProfile');
    Route::put('update_profile','ProfileController@updateProfile');
    Route::patch('changepassword','ProfileController@changePassword');
    Route::get('events/create','EventController@create');
    Route::get('feedback/create','feedbackController@create');
    Route::post('feedback/create','feedbackController@store');
    Route::get('/', 'Controller@home');

    Route::group(['middleware'=>'admin'], function(){
        Route::resource('categories','CategoryController');
        Route::resource('users','UserController');
    });

});

Route::get('feedback/manage','feedbackController@index');

Route::get('/nopermission',function() {
    return view('nopermission');
});

Route::get('/test', function() {
    return view('auth.register');
});
