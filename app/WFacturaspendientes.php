<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facturaspendientes extends Model
{
  protected $table='facturas_pendientes';
  protected $primaryKey='idpendiente';
  public $timestamps=false;
  protected $fillable=[
  "idcabecera", "abono","saldo"
  ];

  public function cabecera () {
    return $this->BelongsTo('App\Cabecera');
  }
}
