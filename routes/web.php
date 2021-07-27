<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'LoginController@index'
);
Route::post('/', 'LoginController@loginSubmit'
);

//kinds
Route::get('admin/kinds', 'KindsController@index');
Route::get('admin/kinds/edit/{id}', 'KindsController@edit')->where('id', '[0-9]+');
Route::post('admin/kinds/detail/{id}', 'KindsController@detailAction')->where('id', '[0-9]+');
Route::get('admin/kinds/detail/{id}', 'KindsController@detail')->where('id', '[0-9]+');
Route::post('admin/kinds/edit/{id}', 'KindsController@editAction')->where('id', '[0-9]+');
Route::get('admin/kinds/add', 'KindsController@add');
Route::post('admin/kinds/add', 'KindsController@addAction');
Route::get('admin/kinds/delete/{id}', 'KindsController@delete')->where('id', '[0-9]+');
Route::post('admin/kinds/order', 'KindsController@orderAction');