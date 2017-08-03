<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;

//use App\Producto;

class NuevafacturaController extends Controller
{
	public function __construct(){
 	$this->middleware('auth');// debe autenticar el usuario para poder usar el controlador
 	}
    public function index(){
 		return view('nuevafactura.index');
    }
}
