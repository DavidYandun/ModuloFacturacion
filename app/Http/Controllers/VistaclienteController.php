<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Http\Requests\CabeceraRequest;
use App\Cabecera;
use App\Detalle;
use Illuminate\Support\Collections;

use App\Cliente;
use App\Caja;
use App\Producto;
use DB;

class VistaclienteController extends Controller
{
    public function index(){
        $cabecera=Cabecera::all(10);
        $cliente= Cliente::all();
        $caja= Caja::all();

        return view('vistacliente.index',compact('cabecera'),compact('cliente','caja'));

    }
    
    public function show($id){
        $cabecera=Cabecera::paginate(10);
        $cliente= Cliente::find($id);
        $caja= Caja::all();

        return view('vistacliente.show',compact('cabecera'),compact('cliente','caja'));

    }
}
