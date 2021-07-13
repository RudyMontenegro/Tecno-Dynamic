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
Route::get('/proveedor/{proveedor}/edit', 'ProveedorController@edit');
Route::put('/proveedor/{proveedor}', 'ProveedorController@update');

//PRODUCTO
Route::get('/producto', 'ProductosController@index');
Route::get('/producto/{id}', 'ProductosController@show');
Route::get('/producto/editar/{id}', 'ProductosController@edit');
Route::patch('/producto/editar/{id}', 'ProductosController@update');
Route::delete('/producto/{id}', 'ProductosController@destroy');
Route::get('/registrarProducto', 'ProductosController@create');
Route::post('/registrarProducto', 'ProductosController@store');

Route::get('/registrar','SucursalController@registro');
Route::get('/registrar','SucursalController@registro');
Route::post('/registrar','SucursalController@registrar');

Route::get('/cliente', 'ClienteController@index');
Route::get('/registrarCliente','ClienteController@create');
Route::post('/registrarCliente','ClienteController@store');
