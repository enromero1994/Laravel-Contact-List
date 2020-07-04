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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@index');
Route::get('/contacts/create', 'ContactController@create');
Route::post('/contacts', 'ContactController@store');
Route::get('/contacts/{contact}', 'ContactController@show');
Route::get('/contacts/{contact}/delete', 'ContactController@delete');
Route::put('/contacts/{contact}','ContactController@edit');
