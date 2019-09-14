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


Route::group(['middleware'=>['auth','admin']],function()
{
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get('/role-register','Admin\DashboardController@registered');

    Route::get('/role-edit/{id}','Admin\DashboardController@registeredit');

    Route::put('/role-register-update/{id}','Admin\DashboardController@registerupdate');

    Route::delete('/role-delete/{id}','Admin\DashboardController@registerdelete');

    Route::post('/update-admin-profile','Admin\DashboardController@profileupdate');

    Route::get('/create-post','Admin\PostController@create');

    Route::get('/post','Admin\PostController@index');

    Route::get('/edit-post/{id}','Admin\PostController@edit');

    Route::put('/update-post/{id}','Admin\PostController@update');

    Route::delete('/delete-post/{id}','Admin\PostController@destroy');

    Route::put('/post-store','Admin\PostController@store');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('roles','RolesController');
Route::resource('roles','RolesController');

Route::get('/profile','UserController@profile')->name('profile');
Route::post('/update-profile','UserController@profileupdate');

