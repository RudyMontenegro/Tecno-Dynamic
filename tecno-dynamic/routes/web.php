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
//SUCURSALES
Route::get('/sucursal', 'SucursalController@index')->middleware('auth');
Route::get('/sucursal/registrarSucursal', 'SucursalController@create')->middleware('auth');
Route::post('/sucursal/registrarSucursal', 'SucursalController@store')->middleware('auth');
Route::get('/sucursal/editar/{id}', 'SucursalController@edit')->middleware('auth')->name('sucursal.edit');
Route::patch('/sucursal/editar/{id}', 'SucursalController@update')->middleware('auth');
Route::delete('/sucursal/{id}', 'SucursalController@destroy')->middleware('auth');
Route::post('/sucursal/validar', 'SucursalController@validar')->middleware('auth');
//TRANFERENCIAS
Route::get('/transferencia', 'TransferenciaController@index')->middleware('auth');
Route::get('transferencia/envio/{id}', 'TransferenciaController@sucursal')->middleware('auth');
Route::get('transferencia/envioP/{id}', 'TransferenciaController@producto')->middleware('auth');
Route::get('transferencia/envioC/{id}', 'TransferenciaController@codigo')->middleware('auth');//no da mientras tanto
Route::get('/transferencia/registrarTransferencia', 'TransferenciaController@create')->middleware('auth');
Route::post('/transferencia/registrarTransferencia', 'TransferenciaController@store')->middleware('auth');
Route::get('/transferencia/editar/{id}', 'TransferenciaController@edit')->middleware('auth');
Route::patch('/transferencia/editar/{id}', 'TransferenciaController@update')->middleware('auth');
//PRODUCTO
Route::get('/producto', 'ProductosController@index')->middleware('auth');
Route::get('/producto/prueba', 'ProductosController@prueba')->middleware('auth');
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
Route::patch('/cliente/editar/{id}','ClienteController@update')->middleware('auth');
Route::delete('/cliente/{id}', 'ClienteController@destroy')->middleware('auth');
//VENTA
Route::get('/venta', 'VentaController@index')->middleware('auth');
Route::get('/venta/{ventas}/show', 'VentaController@show')->middleware('auth');
Route::get('/venta/create', 'VentaController@create')->middleware('auth');
Route::post('/venta', 'VentaController@store')->middleware('auth');
Route::post('/ventaDetalle', 'VentaController@store')->middleware('auth');
Route::get('/venta/{ventas}/edit', 'VentaController@edit')->middleware('auth');
Route::put('/venta/{ventas}', 'VentaController@update')->middleware('auth');
Route::delete('/venta/{ventas}', 'VentaController@destroy')->middleware('auth');     
//COMPRA
Route::get('/compra', 'CompraController@index')->middleware('auth');
Route::get('/compra/{compras}/show', 'CompraController@show')->middleware('auth');
Route::get('/compra/registrarCompra','CompraController@create')->middleware('auth');
Route::post('/registrarCompra','CompraController@store')->middleware('auth');
Route::get('/compra/{compras}/edit', 'CompraController@edit')->middleware('auth');
Route::put('/compra/{compras}', 'CompraController@update')->middleware('auth');
Route::delete('/compra/{compras}', 'CompraController@destroy')->middleware('auth');
//jquery
Route::post('/autocomplete', 'VentaController@fetch');