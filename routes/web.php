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

Route::get('home', 'CabeceraController@create');

//Route::resource('producto','ProductoController');

Auth::routes();

Route::get('register', [
    'as'   => 'register',
    'uses' => 'RegisterController@signUp'
]);



Route::get('/export/pdf',
    [
        'as' => 'export.pdf',
        'uses' => 'EmpleadoController@ExportPDF'
    ]);
Route::get('/expo/pdf',
    [
        'as' => 'export.pdf',
        'uses' => 'ClienteController@ExportPDF'
    ]);
Route::get('/export/pdf/{id}',
    [
        'as' => 'export.pdf',
        'uses' => 'CabeceraController@ExportPDF'
    ]);


Route::resource('cabecera','CabeceraController');
Route::resource('caja','CajaController');
Route::resource('cliente','ClienteController');
Route::resource('detalle','DetalleController');
Route::resource('empleado','EmpleadoController');
Route::resource('facturaspendientes','FacturaspendientesController');
Route::resource('producto','ProductoController');
Route::resource('tipocliente','TipoclienteController');
//Route::resource('tipousuario','TipousuarioController');

Route::resource('vistafecha','VistaclienteController');
Route::resource('vistacliente','VistaclienteController');
Route::resource('vistapendiente','VistapendienteController');
Route::resource('nuevafactura','NuevafacturaController');
Route::resource('usuarios','UserController');

Route::get('cabecera/delete/{id}','CabeceraController@delete') ;
Route::get('caja/delete/{id}','CajaController@delete') ;
Route::get('cabecera/update/{id}','CabeceraController@actualizar') ;
Route::get('cliente/delete/{id}','ClienteController@delete') ;
Route::get('detalle/delete/{id}','DetalleController@delete') ;
Route::get('empleado/delete/{id}','EmpleadoController@delete') ;
Route::get('facturaspendientes/delete/{id}','FacturaspendientesController@delete') ;
Route::get('producto/delete/{id}','ProductoController@delete') ;
Route::get('tipocliente/delete/{id}','TipoclienteController@delete') ;

Route::get('cabecera/delete/{id}','CabeceraController@delete') ;

Route::get('tipousuario/delete/{id}','TipousuarioController@delete') ;

// Route::group(['prefix' => 'cajero', 'middleware' => ['auth', 'cajero']],function(){
// 	Route::get('/', 'cajeroController@index');
// });
// Route::group(['prefix' => 'administrador', 'middleware' => ['auth', 'administrador']],function(){
// 	Route::get('/', 'administradorController@home');
// });

/////////////RUTAS WEB SERVICES ///////////////////////
Route::resource('cabeceras', 'WCabeceraController');
Route::resource('clientes', 'WClienteController');
Route::resource('detalles', 'WDetalleController');
Route::resource('FacturasPendientes', 'WFacturaspendientesController');
Route::resource('cliente/{id}/facturaspendientes', 'WClientesFacturasPendientesController', ['only' => ['index']]);

Route::resource('cabeceras.detalles', 'WCabeceraDetallesController', ['only' => ['index']]);
Route::resource('cabeceras.facturaspendientes', 'WCabeceraFacturasPendientesController', ['only' => ['index']]);
Route::resource('clientes.cabeceras', 'WClienteCabecerasController', ['only' => ['index']]);

Route::get('cabecera/{id}/facturaspendientes/{abonito}','WFacturaspendientesController@actualizarFact') ;



//Agrupamiento de rutas


/*Route::get('delete/{id}','TipoclienteController@destroy') ;
Route::get('delete/{id}','ClienteController@destroy') ;

Route::get('delete/{id}','DetalleController@destroy') ;
Route::get('delete/{id}','FacturaspendientesController@destroy') ;

Route::get('delete/{id}','CabeceraController@destroy') ;
Route::get('delete/{id}','EmpleadoController@destroy') ;
Route::get('delete/{id}','CajaController@destroy') ;

Route::get('delete/{id}','TipousuarioController@destroy') ;*/
