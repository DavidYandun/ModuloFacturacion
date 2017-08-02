<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
  protected $table='clientes';
  protected $primaryKey='idcliente';
  public $timestamps=false;
  protected $fillable=[
  "idtipo","cedula","nombre","apellido","nacimiento","ciudad","direccion","telefono","email","estado"
  ];

  public function cabeceras(){
    return $this->hasMany('App\Cabecera', 'idcliente');
  }

}
