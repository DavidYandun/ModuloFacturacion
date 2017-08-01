<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
protected $table='roles';
protected $primarykey='id';
public $timestamps=false;
protected $fillable=[
	"name","display_name","description","created_at","updated_at"
	];
}
