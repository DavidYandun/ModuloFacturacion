<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facturaspendientes extends Model
{
  protected $table='facturas_pendientes';
  protected $primaryKey='IDPENDIENTE';
  public $timestamps=false;
  protected $fillable=[
  "IDCABECERA","ABONO","SALDO"
  ];
}
