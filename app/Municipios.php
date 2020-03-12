<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Municipios extends Model
{
  protected $primaryKey = 'id_municipio'; 
  protected $fillable=['id_municipio','nombre'];
  protected $date=['deleted_at'];
}
