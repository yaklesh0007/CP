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

Route::get('/', 'HomeController@welcome');
Route::get('/showdoctor/{id}','UserController@show');

Route::group(['middleware'=>['auth','admin']],function()
{
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    // users list shown in Admin panel route
    Route::get('/role-register','Admin\DashboardController@registered');

    Route::get('/role-edit/{id}','Admin\DashboardController@registeredit');

    Route::put('/role-register-update/{id}','Admin\DashboardController@registerupdate');

    Route::delete('/role-delete/{id}','Admin\DashboardController@registerdelete');

    //update profile picture of admin route
    Route::post('/update-admin-profile','Admin\DashboardController@profileupdate');

    //admin posts route
    Route::get('/create-post','Admin\PostController@create');

    Route::get('/post','Admin\PostController@index');

    Route::get('/edit-post/{id}','Admin\PostController@edit');

    Route::put('/update-post/{id}','Admin\PostController@update');

    Route::delete('/delete-post/{id}','Admin\PostController@destroy');

    Route::put('/post-store','Admin\PostController@store');
    // admin slider route
    Route::get('/create-slider','Admin\SliderController@create');

    Route::get('/slider','Admin\SliderController@index');

    Route::get('/edit-slider/{id}','Admin\SliderController@edit');

    Route::put('/update-slider/{id}','Admin\SliderController@update');

    Route::delete('/delete-slider/{id}','Admin\SliderController@destroy');

    Route::post('/slider-store','Admin\SliderController@store');
    // admin feedback route
    Route::get('/feedback','Admin\FeedbackController@index');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::put('/store-rating','RatesController@store');

Route::resource('roles','RolesController');
Route::resource('roles','RolesController');

Route::get('/profile','UserController@profile')->name('profile');
Route::post('/update-profile','UserController@profileupdate');

