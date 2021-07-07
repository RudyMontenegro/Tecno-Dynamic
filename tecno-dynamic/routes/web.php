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
Auth::routes();

Route::get('/', function () {
    return view('home');
})->middleware('auth');


//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/sucursal', 'SucursalController@index');
Route::get('/registrar','SucursalController@registro');
Route::post('/registrar','SucursalController@registrar');

Route::get('/cliente', 'ClienteController@index');
Route::get('/registrarCliente','ClienteController@registro');
Route::post('/registrarCliente','ClienteController@registrarCliente');