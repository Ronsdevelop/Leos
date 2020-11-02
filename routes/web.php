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
Route::get('proveedor/{id}', function ($id) {
    return 'Proveero '.$id;
});
