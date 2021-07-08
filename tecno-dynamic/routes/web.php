<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    return view('/home');
})->middleware('auth');


//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/sucursal', 'SucursalController@index');

//proveedor
Route::get('/proveedor', 'ProveedorController@index');
Route::get('/proveedor/create', 'ProveedorController@create');
Route::post('/proveedor', 'ProveedorController@store');
//
Route::get('/proveedor/{proveedor}/edit', 'ProveedorController@edit');
Route::put('/proveedor/{proveedor}', 'ProveedorController@update');
//producto
Route::get('/producto', 'ProductosController@index');
Route::get('/registrarProducto', 'ProductosController@create');
Route::get('/registrar','SucursalController@registro');
Route::get('/registrar','SucursalController@registro');
Route::post('/registrar','SucursalController@registrar');

Route::get('/cliente', 'ClienteController@index');
Route::get('/registrarCliente','ClienteController@registro');
Route::post('/registrarCliente','ClienteController@registrarCliente');
