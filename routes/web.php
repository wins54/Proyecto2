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
Route::get('/producto', 'productoController@index');
Route::get('/borrarp', 'productoController@destroy');
Route::post('/nuevos', 'productoController@create');
Route::post('/talla', 'productoController@talla');
Route::post('/pagosnuevo', 'productoController@pagosnuevo');
Route::get('/borrart', 'productoController@destroyt');
Route::get('/borrarpago', 'productoController@destroyp');
Route::post('/editpro', 'productoController@edit');
Route::get('/busca', 'productoController@update');
Route::get('/pedidos', 'pedidoController@index');
Route::post('/nuevospedidos', 'pedidoController@create');
Route::post('/editarpedidos', 'pedidoController@edit');
Route::get('/borrarpedido', 'pedidoController@destroy');
Route::get('/reportes', 'pedidoController@reportes');


Route::get('/', function () {
    return view('welcome');
});
