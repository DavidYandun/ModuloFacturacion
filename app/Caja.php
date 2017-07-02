<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
 protected $table='caja';
 protected $primaryKey='IDCAJA';
 public $timestamps=false;
 protected $fillable=[
 "IDUSUARIO","NUMERO"
 ];
}
