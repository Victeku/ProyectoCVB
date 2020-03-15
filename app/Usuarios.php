<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuarios extends Model
{
	protected $primaryKey = 'id_usuario';
  	protected $fillable=['id_usuario','activo','nombre','apellidop','apellidom','genero','fn','telefono','estado','municipio','direccion','tipo_u','archivo','correo','password','id_pago'];
  	protected $date=['deleted_at'];
}
