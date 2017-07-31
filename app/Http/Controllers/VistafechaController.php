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

class VistafechaController extends Controller
{
    public function index(){
        $cabecera = DB::table('cabecera')
                ->where('FECHA','=','2017-07-29')
                ->get();
        $cliente= Cliente::all();
        $caja= Caja::all();

        return view('vistafecha.show',compact('cabecera'),compact('cliente','caja'));

    }
    public function show(){
        $cabecera = DB::table('cabecera')
                ->whereDate('created_at', '2017-07-30')
                ->get();
        $cliente= Cliente::all();
        $caja= Caja::all();

        return view('vistafecha.show',compact('cabecera'),compact('cliente','caja'));

    }
}
