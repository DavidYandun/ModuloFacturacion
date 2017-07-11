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
Route::resource('caja','CajaController');
Route::resource('cliente','ClienteController');
Route::resource('detalle','DetalleController');
Route::resource('empleado','EmpleadoController');
Route::resource('facturaspendientes','FacturaspendientesController');
Route::resource('producto','ProductoController');
Route::resource('tipocliente','TipoclienteController');
Route::resource('tipousuario','TipousuarioController');

Route::get('cabecera/delete/{id}','CabeceraController@delete') ;
Route::get('caja/delete/{id}','CajaController@delete') ;
Route::get('cliente/delete/{id}','ClienteController@delete') ;
Route::get('detalle/delete/{id}','DetalleController@delete') ;
Route::get('empleado/delete/{id}','EmpleadoController@delete') ;
Route::get('facturaspendientes/delete/{id}','FacturaspendientesController@delete') ;
Route::get('producto/delete/{id}','ProductoController@delete') ;
Route::get('tipocliente/delete/{id}','TipoclienteController@delete') ;


Route::get('cabecera/delete/{id}','CabeceraController@delete') ;

Route::get('tipousuario/delete/{id}','TipousuarioController@delete') ;


Route::group(['prefix' => 'cajero', 'middleware' => ['auth', 'cajero']],function(){
	Route::get('/', 'cajeroController@index');
});
Route::group(['prefix' => 'administrador', 'middleware' => ['auth', 'administrador']],function(){
	Route::get('/', 'administradorController@home');
});



//Agrupamiento de rutas


/*Route::get('delete/{id}','TipoclienteController@destroy') ;
Route::get('delete/{id}','ClienteController@destroy') ;

Route::get('delete/{id}','DetalleController@destroy') ;
Route::get('delete/{id}','FacturaspendientesController@destroy') ;

Route::get('delete/{id}','CabeceraController@destroy') ;
Route::get('delete/{id}','EmpleadoController@destroy') ;
Route::get('delete/{id}','CajaController@destroy') ;

Route::get('delete/{id}','TipousuarioController@destroy') ;*/

