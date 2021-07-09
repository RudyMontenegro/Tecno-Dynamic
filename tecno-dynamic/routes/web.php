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
Route::get('/proveedor/{proveedorid}/editar', 'ProveedorController@edit');
Route::post('/proveedor', 'ProveedorController@store');

//PRODUCTO
Route::get('/producto', 'ProductosController@index');
Route::get('/registrarProducto', 'ProductosController@create');
Route::post('/registrarProducto', 'ProductosController@store');

Route::get('/registrar','SucursalController@registro');
Route::get('/registrar','SucursalController@registro');
Route::post('/registrar','SucursalController@registrar');

Route::get('/cliente', 'ClienteController@index');
Route::get('/registrarCliente','ClienteController@registro');
Route::post('/registrarCliente','ClienteController@registrarCliente');
