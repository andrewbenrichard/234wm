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

Route::get('/', 'MainController@index')->name('home');
Route::get('/services', 'MainController@services')->name('services');
Route::get('/about-us', 'MainController@about')->name('about');
Route::get('/locations', 'MainController@locations')->name('locations');
Route::get('/quote', 'MainController@quote')->name('quote');
Route::get('/contact-us', 'MainController@contact')->name('contact');


