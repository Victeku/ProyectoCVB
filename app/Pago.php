<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
  protected $primaryKey = 'id_pago';
    protected $fillable=['id_pago','tipo_p','num_t','nip_t','monto_p'];
    protected $date=['deleted_at'];
}
