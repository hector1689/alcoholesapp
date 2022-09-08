<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuariosVerificadores extends Model{
  protected $table = "usuarios_verificadores";
  protected $fillable = [
    "id",
    "NOMBRE_EJECUTOR",
    "ID_EJECUTOR",
    "PASSWORD",
  ];


}
