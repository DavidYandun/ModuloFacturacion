<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cajeroController extends Controller
{
    //
    public function index(){
    	return view('cajero.index');
    }
}
