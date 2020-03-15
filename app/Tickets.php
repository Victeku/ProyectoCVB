<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Tickets extends Model
{
	protected $primaryKey = 'id_ticket'; 
  	protected $fillable=['id_ticket','id_producto','id_pago','fechainicial','fechaentrega','total'];
  	protected $date=['deleted_at'];
}
