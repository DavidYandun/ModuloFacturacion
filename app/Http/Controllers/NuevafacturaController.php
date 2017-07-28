<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;

//use App\Producto;

class NuevafacturaController extends Controller
{
    public function index(){
 		return view('nuevafactura.index');
    }
}
