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

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/', ['as' => 'admin', 'uses' => 'AdminController@index']);

    Route::resource('garment-name', 'GarmentNameController');
    Route::resource('avatar', 'AvatarController');
    Route::resource('garment-size', 'GarmentSizeController');
    Route::resource('symulation', 'SymulationController');
});
