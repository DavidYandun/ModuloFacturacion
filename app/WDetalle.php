<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
  protected $table='detalle';
  protected $primaryKey='IDDETALLE';
  public $timestamps=false;
  protected $fillable=[
  "IDCABECERA","IDPRODUCTO","CANTIDAD","VALOR_UNITARIO","VALOR_TOTAL"
  ];

  public function cabecera () {
    return $this->BelongsTo('App\Cabecera');
  }
}
