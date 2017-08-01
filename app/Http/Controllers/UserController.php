<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role_user;
use App\Role;
use DB;

class UserController extends Controller
{

	 public function __construct(){
      $this->middleware('role:admin');// debe autenticar el usuario para poder usar el controlador
    }

	public function index(){ 
 		$role_user=Role_user::all();
 		return view('usuarios.index',compact('role_user'));
 	}

    public function store(UserRequest $request){
 		$user=(new User)->fill($request->except('role'));
 		$user->save();
 		$role=Role::where('name',$request->role)->firstOrFail();
 		$user->attachRole($role);
 		return Redirect::to('cliente');
 	}
}
