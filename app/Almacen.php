<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
  protected $primaryKey = 'id_almacen';
    protected $fillable=['id_almacen','estado_p','cantidad_p','fecha_ing','fecha_sal','id_producto'];
    protected $date=['deleted_at'];
}
