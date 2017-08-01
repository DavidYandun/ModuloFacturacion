<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Cabecera extends Model
{
protected $table='cabecera';
protected $primaryKey='idcabecera';
public $timestamps=false;
protected $fillable=[
	"idcliente","idcaja","fecha","subtotal","iva","total","estado"
	];
}
