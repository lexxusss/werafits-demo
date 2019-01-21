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
});


// admin
Route::resource('admin/garment-name', 'Admin\GarmentNameController');

Route::resource('admin/avatar', 'Admin\AvatarController');

Route::resource('admin/garment-size', 'Admin\GarmentSizeController');