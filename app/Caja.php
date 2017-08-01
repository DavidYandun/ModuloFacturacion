<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
 protected $table='caja';
 protected $primaryKey='idcaja';
 public $timestamps=false;
 protected $fillable=[
 "idusuario","numero"
 ];
}
