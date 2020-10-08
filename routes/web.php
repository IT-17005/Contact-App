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

Route::get('/','StudentsController@index')->name('index');
Route::post('/store','StudentsController@store')->name('store');
Route::post('/delete/{id}','StudentsController@delete')->name('delete');
Route::get('/edit/{id}','StudentsController@edit')->name('edit');
Route::post('/update/{id}','StudentsController@update')->name('update');
//Route::post('/update/{id}','StudentsController@update')->name('update');


