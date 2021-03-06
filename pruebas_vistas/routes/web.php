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
Route::get('/', 'HomeController@getHome');
Route::get('catalog', 'CatalogController@getIndex')->name('catalog');
Route::get('catalog/create', 'CatalogController@getCreate');
Route::get('catalog/show/{id}', 'CatalogController@getShow')->name('catalogShow');
Route::get('catalog/edit/{id}', 'CatalogController@getEdit');
Route::put('catalog/edit/{id}', 'CatalogController@putEdit');
Route::post('catalog/create', 'CatalogController@postCreate');
Route::delete('catalog/delete/{id}', 'CatalogController@putDelete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('sendbasicemail', 'MailController@basic_email');
