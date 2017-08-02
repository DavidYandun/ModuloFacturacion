<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role_user;
use App\Role;
use DB;
use App\Http\Requests;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{

	 public function __construct(){
      $this->middleware('role:admin');// debe autenticar el usuario para poder usar el controlador
    }

	
 	
 	public function create(){
 		$user=User::all();
 		return view('usuarios.create',compact('user'));
 	}	
 	
 	public function store(UserRequest $request){
 		User::create($request->all());
 		return Redirect::to('usuarios');
}


}
