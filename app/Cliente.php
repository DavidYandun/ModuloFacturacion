<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
protected $table='clientes';
protected $primaryKey='IDCLIENTE';
public $timestamps=false;
protected $fillable=[


	"IDTIPO","CEDULA","NOMBRE","APELLIDO","NACIMIENTO","CIUDAD","DIRECCION",'TELEFONO',"EMAIL","ESTADO"
	];
}
