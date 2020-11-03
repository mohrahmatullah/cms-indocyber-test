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

Route::group(['namespace' => 'Auth'], function () {
  //admin login route
  Route::get( '/bakpau982/me/login', [
    'uses' => 'AuthController@goToAdminLoginPage',
    'as'   => 'admin.login'
  ]);
  Route::post( '/bakpau982/me/login' , [
    'uses' => 'AuthController@postAdminLogin',
    'as'   => 'admin.post_login'
  ]);  
  //admin logout route
  Route::post( '/bakpau982/me/logout', [
    'uses' => 'AuthController@logoutFromLogin',
    'as'   => 'admin.logout'
  ]);
});

Route::group(['prefix' => 'admin'], function () {
	route::get('products', 'DashboardController@index')->name('products');
	route::get('products/{id}', 'DashboardController@productsUpdate')->name('update-products');
	route::post('products/{id}', 'DashboardController@saveProducts')->name('save-products');

	Route::post('/ajax/delete-item', 'AjaxController@selectedItemDeleteById')->name('selected-item-delete');
});