<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role_user extends Model
{
protected $table='role_user';
protected $primarykey='user_id';
public $timestamps=false;
protected $fillable=[
	'user_id','role_id'
	];
}
