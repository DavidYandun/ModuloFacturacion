<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabecera extends Model
{
  // Tabla a usar
  protected $table='cabecera';

  // Clave primaria
  protected $primaryKey='idcabecera';

  // Ocultar datos inecesarios
  protected $hidden = ['created_at', 'updated_at'];
  public $timestamps=false;

  // atributos de llenado de la tabla
  protected $fillable=[
  "idcliente", "idcaja","numero","fecha","subtotal","iva","total"
  ];

  // Clave foranea a los clientes
  public function cliente () {
    return $this->BelongsTo('App\Cliente');
  }

  // public function caja () {
  //   return $this->BelongsTo('App\Caja');
  // }

  // relacion N a *
  public function detalles(){
    return $this->hasMany('App\Detalle', 'idcabecera');
  }

  public function facturaspendientes(){
    return $this->hasMany('App\Facturaspendientes', 'idcabecera');
  }
}
