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

Route::get('/', function () {
    return view('welcome');
});


//Route::view('/','auth.login');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user', 'UserController@index');

Route::get('/proveedor', 'ProveedoresController@index')->name('proveedor');
Route::get('/proveedor/lista', 'ProveedoresController@list')->name('proveedor.lista');
Route::get('proveedor/detalle/{id}', ['as'=> 'detalle', 'uses'=>'ProveedoresController@detalle']);
Route::get('proveedor/datosprov/{id}', ['as'=> 'detalleEdit', 'uses'=>'ProveedoresController@detalleEdit']);
//Route::get('/proveedor/detalle', 'ProveedoresController@detalleprov')->name('proveedor.detalle');
Route::post('proveedores/crear', 'ProveedoresController@store' )->name('proveedores.crear');
Route::patch('proveedores/update','ProveedoresController@update')->name('proveedores.edit');
Route::delete('proveedores/delete','ProveedoresController@destroy')->name('proveedores.delete');

Route::get('/usuarios', 'UserController@index')->name('usuarios');
Route::get('usuarios/detalle/{id}', ['as'=> 'detalle', 'uses'=>'UserController@detalle']);
Route::post('usuarios', 'UserController@store')->name('usuario.crear');
Route::patch('usuarios/update','UserController@update')->name('usuario.edit');
Route::get('usuarios/datosuser/{id}', ['as'=> 'detalleEdit', 'uses'=>'UserController@detalleEdit']);

Route::get('/cliente', 'ClienteController@index')->name('cliente');
Route::get('/cliente/lista', 'ClienteController@list')->name('cliente.lista');
Route::get('cliente/detalle/{id}', ['as'=> 'detalle', 'uses'=>'ClienteController@detalle']);
Route::get('cliente/datoscliente/{id}', ['as'=> 'detalleEdit', 'uses'=>'ClienteController@detalleEdit']);
Route::post('cliente/crear', 'ClienteController@store' )->name('cliente.crear');
Route::patch('cliente/update','ClienteController@update')->name('cliente.edit');
Route::delete('cliente/delete','ClienteController@destroy')->name('cliente.delete');

Route::get('/producto', 'ProductoController@index')->name('producto');
Route::get('/producto/lista', 'ProductoController@list')->name('producto.lista');
Route::get('producto/detalle/{id}', ['as'=> 'detalle', 'uses'=>'ProductoController@detalle']);
Route::get('producto/datoscliente/{id}', ['as'=> 'detalleEdit', 'uses'=>'ProductoController@detalleEdit']);
Route::post('producto/crear', 'ProductoController@store' )->name('producto.crear');
Route::patch('producto/update','ProductoController@update')->name('producto.edit');
Route::delete('producto/delete','ProductoController@destroy')->name('producto.delete');



