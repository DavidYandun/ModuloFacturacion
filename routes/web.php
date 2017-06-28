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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::resource('producto','ProductoController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('cabecera','CabeceraController');
Route::resource('empleado','EmpleadoController');
Route::resource('cliente','ClienteController');
Route::resource('tipocliente','TipoclienteController');
Route::resource('detalle','DetalleController');
Route::resource('facturaspendientes','FacturaspendientesController');
Route::resource('caja','CajaController');

Route::get('delete/{id}','TipoclienteController@destroy') ;
Route::get('delete/{id}','ClienteController@destroy') ;

Route::get('delete/{id}','DetalleController@destroy') ;
Route::get('delete/{id}','FacturaspendientesController@destroy') ;

Route::get('delete/{id}','CabeceraController@destroy') ;
Route::get('delete/{id}','EmpleadoController@destroy') ;
Route::get('delete/{id}','CajaController@destroy') ;

