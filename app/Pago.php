<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
  protected $primaryKey = 'id_pago';
    protected $fillable=['id_pago','categoria','nombre','nip_t','monto_p'];
    protected $date=['deleted_at'];
}
