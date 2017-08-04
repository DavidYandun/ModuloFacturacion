<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Role_user;
use App\Role;
use DB;
use App\Http\Requests;
use App\Http\Requests\Role_userRequest;

class Role_userController extends Controller
{

	 public function __construct(){
	 	$this->middleware('auth');
      $this->middleware('role:admin');// debe autenticar el usuario para poder usar el controlador
    }

	
 	
 	public function index(){
 		$role_user=Role_user::all();
 		$role=Role::all();
 		$user=User::all();
 		return view('role.index',compact('role_user','role','user'));
 	}	
 	
 	public function store(Role_userRequest $request){
 	//Role_user::create($request->all());
 		Role_user::create(['user_id'=>$request->get('user_id'),'role_id'=>$request->get('role_id')]);
 	return Redirect::to('role');
}
public function create(){
 		$user=User::all();
 		$role=Role::all();
 		return view('role.create',compact('user','role'));
 	}
public function edit($id){
	$role=Role::all();
	$roles=DB::table('role_user as rs')
            ->join('users as u','rs.user_id','=','u.id')
            ->join('roles as r','rs.role_id','=','r.id')
            ->select('rs.user_id','rs.role_id','u.name')
            ->where('rs.user_id','=',$id)            
            ->get();

 		return view('role.edit',compact('roles','role'));

 	}
 	public function update(Role_userRequest $request, $id){
 			Role_user::updateOrCreate(['user_id'=>$id],$request->all());
 			return Redirect::to('tipocliente');
 	}

 	public function delete($id){
 		Role_user::destroy($id);
 		return Redirect::to('role');
 	}

}