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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    return view('/home');
})->middleware('auth');


//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/sucursal', 'SucursalController@index');
Route::get('/producto', 'ProductosController@index');
Route::get('/registrarProducto', 'ProductosController@create');
Route::get('/registrar','SucursalController@registro');