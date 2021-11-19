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

Route::get('/', 'HomeController@index');
Route::get('/add-resep', 'HomeController@addResep');
Route::get('/view/{id}', 'HomeController@viewResep');
Route::post('/post-obat', 'HomeController@postObat');
Route::post('/post-racikan', 'HomeController@postRacik');
Route::get('/data-obat', 'HomeController@data');

Route::post('detailObat/{obatNo}', 'HomeController@getDetail');
Route::get('/delete-resep/{id}', 'HomeController@deleteResep');
