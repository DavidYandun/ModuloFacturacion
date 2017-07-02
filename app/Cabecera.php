<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabecera extends Model
{
protected $table='cabecera';
protected $primaryKey='IDCABECERA';
public $timestamps=false;
protected $fillable=[
	"IDCLIENTE","IDCAJA","NUMERO","FECHA","SUBTOTAL","IVA","DESCUENTO","TOTAL"
	];
}
