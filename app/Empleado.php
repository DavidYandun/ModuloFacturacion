<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
protected $table='empleados';
protected $primaryKey='IDEMPLEADO';
public $timestamps=false;
protected $fillable=[
	"CEDULA","NOMBRE","APELLIDO","NACIMIENTO","CIUDAD","DIRECCION","TELEFONO","ESTADO"
	];
}
