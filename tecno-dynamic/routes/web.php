<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    return view('/home');
})->middleware('auth');


//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/sucursal', 'SucursalController@index')->middleware('auth');

//PROVEEDOR
Route::get('/proveedor', 'ProveedorController@index')->middleware('auth');
Route::get('/proveedor/{proveedor}/show', 'ProveedorController@show')->middleware('auth');
Route::get('/proveedor/create', 'ProveedorController@create')->middleware('auth');
Route::post('/proveedor', 'ProveedorController@store')->middleware('auth');
Route::get('/proveedor/{proveedor}/edit', 'ProveedorController@edit')->middleware('auth');
Route::put('/proveedor/{proveedor}', 'ProveedorController@update')->middleware('auth');
Route::delete('/proveedor/{proveedor}', 'ProveedorController@destroy')->middleware('auth');
//PRODUCTO
Route::get('/producto', 'ProductosController@index')->middleware('auth');
Route::get('/producto/registrarProducto', 'ProductosController@create')->middleware('auth');
Route::post('/producto/registrarProducto', 'ProductosController@store')->middleware('auth');
Route::get('/producto/{id}', 'ProductosController@show')->middleware('auth');
Route::get('/producto/editar/{id}', 'ProductosController@edit')->middleware('auth');
Route::patch('/producto/editar/{id}', 'ProductosController@update')->middleware('auth');
Route::delete('/producto/{id}', 'ProductosController@destroy')->middleware('auth');
//CATEGORIA
Route::post('/producto/registrarCategoria', 'CategoriaController@store')->middleware('auth');
Route::get('/registrar','SucursalController@registro')->middleware('auth');
Route::get('/registrar','SucursalController@registro')->middleware('auth');
Route::post('/registrar','SucursalController@registrar')->middleware('auth');
//CLIENTE
Route::get('/cliente', 'ClienteController@index')->middleware('auth');
Route::get('/cliente/registrarCliente','ClienteController@create')->middleware('auth');
Route::post('/registrarCliente','ClienteController@store')->middleware('auth');
Route::get('/cliente/editar/{id}','ClienteController@edit')->middleware('auth');
Route::patch('/cliente/{id}','ClienteController@update')->middleware('auth');
Route::delete('/cliente/{id}', 'ClienteController@destroy')->middleware('auth');
