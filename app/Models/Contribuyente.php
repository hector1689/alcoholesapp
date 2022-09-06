<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contribuyente extends Model{
  protected $table = "get_contribuyente";
  protected $fillable = [
    "id",
    "nombre_propietario",
    "cuenta_estatal",
    "rfc",
    "municipio",
    "total_pagado",
  ];


}