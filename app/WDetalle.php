<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
  protected $table='detalle';
  protected $primaryKey='iddetalle';
  public $timestamps=false;
  protected $fillable=[
  "idcabecera","idproducto","cantidad","valor_unitario","valor_total"
  ];

  public function cabecera () {
    return $this->BelongsTo('App\Cabecera');
  }
}
