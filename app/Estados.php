<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Estados extends Model
{
  protected $primaryKey = 'id_estado'; 
  protected $fillable=['id_estado','nombre'];
  protected $date=['deleted_at'];
}
