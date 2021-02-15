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
Route::get('/cliente/clientlist', 'ClienteController@clientList')->name('clientes');
Route::get('cliente/detalle/{id}', ['as'=> 'detalle', 'uses'=>'ClienteController@detalle']);
Route::get('cliente/datoscliente/{id}', ['as'=> 'detalleEdit', 'uses'=>'ClienteController@detalleEdit']);
Route::post('cliente/crear', 'ClienteController@store' )->name('cliente.crear');
Route::patch('cliente/update','ClienteController@update')->name('cliente.edit');
Route::delete('cliente/delete','ClienteController@destroy')->name('cliente.delete');

Route::get('/producto', 'ProductoController@index')->name('producto');
Route::get('/producto/lista', 'ProductoController@list')->name('producto.lista');
Route::get('productos/select/{id}', ['as'=> 'Producto', 'uses'=>'ProductoController@producto']);
Route::get('producto/datoscliente/{id}', ['as'=> 'detalleEdit', 'uses'=>'ProductoController@detalleEdit']);
Route::post('producto/crear', 'ProductoController@store' )->name('producto.crear');
Route::patch('producto/update','ProductoController@update')->name('producto.edit');
Route::delete('producto/delete','ProductoController@destroy')->name('producto.delete');

Route::get('/pedidos', 'PedidoController@index')->name('pedidos.all');
Route::get('/pedidos/deldia', 'PedidoController@dia')->name('pedidos.dia');
Route::get('/pedidos/pendientes', 'PedidoController@pendientes')->name('pedidos.pendientes');
Route::get('/pedidos/xcobrar', 'PedidoController@xcobrar')->name('pedidos.xcobrar');
/*Route::get('/pedidos', 'PedidoController@todos')->name('pedido');*/
Route::get('/pedidos/lista', 'PedidoController@list')->name('pedido.lista');
Route::get('pedidos/detalle/{id}', ['as'=> 'detalle', 'uses'=>'PedidoController@detallePedido']);
Route::get('pedidos/datoscliente/{id}', ['as'=> 'detalleEdit', 'uses'=>'PedidoController@detalleEdit']);
Route::post('pedidos/crear', 'PedidoController@create' )->name('pedido.crear');
Route::patch('pedidos/update','PedidoController@update')->name('pedido.edit');
Route::delete('pedidos/delete','PedidoController@destroy')->name('pedido.delete');
Route::get('pedidos/cliente','PedidoController@cliente')->name('pedido.cliente');
Route::get('pedidos/producto','PedidoController@producto')->name('pedido.producto');

Route::get('pos','PosController@index')->name('pos');
Route::post('pos/store','PosController@store')->name('pos.productos');
Route::post('pos/producto','PosController@producto')->name('pos.producto');
Route::get('prueba','PosController@prueba')->name('prueba');






