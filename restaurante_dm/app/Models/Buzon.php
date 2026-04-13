<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buzon extends Model
{
    // Obligamos a usar la tabla que definiste en la migración
    protected $table = 'buzon';

    protected $fillable = ['nombre', 'correo', 'mensaje'];
}