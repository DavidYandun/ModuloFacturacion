<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
protected $table='empleados';
protected $primaryKey='idempleado';
public $timestamps=false;
protected $fillable=[
	"cedula","nombre","apellido","nacimiento","ciudad","direccion","telefono","estado"
	];
}
