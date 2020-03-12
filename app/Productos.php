<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Productos extends Model
{
	protected $primaryKey = 'id_producto'; 
  	protected $fillable=['id_producto','nombre','categoria','precio','color','tamaño'];
  	protected $date=['deleted_at'];
}
