<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipios extends Model{
  protected $table = "c_municipios";
  protected $fillable = [
    "id",
    "municipio",
  ];


}