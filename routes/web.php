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
Route::resource('tipousuario','TipousuarioController');

Route::get('cliente/delete/{id}','ClienteController@delete') ;
<<<<<<< HEAD
Route::get('cabecera/delete/{id}','CabeceraController@delete') ;
=======
Route::get('empleado/delete/{id}','EmpleadoController@delete') ;
Route::get('tipocliente/delete/{id}','TipoclienteController@delete') ;
<<<<<<< HEAD
Route::get('cabecera/delete/{id}','CabeceraController@delete') ;

>>>>>>> 3ed065e5894645cb6d61318aa697099c2cd95716

//Agrupamiento de rutas


/*Route::get('delete/{id}','TipoclienteController@destroy') ;
Route::get('delete/{id}','ClienteController@destroy') ;

Route::get('delete/{id}','DetalleController@destroy') ;
Route::get('delete/{id}','FacturaspendientesController@destroy') ;

Route::get('delete/{id}','CabeceraController@destroy') ;
Route::get('delete/{id}','EmpleadoController@destroy') ;
Route::get('delete/{id}','CajaController@destroy') ;

Route::get('delete/{id}','TipousuarioController@destroy') ;*/
=======
>>>>>>> b42063bcdf6ca4c5f07481a3c6316b8bbdbffe1e
