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



//список всех сообщений
Route::get('/messages', 'MessageController@index');

//store Новое сообщение в БД
Route::post('/messages', 'MessageController@store');
