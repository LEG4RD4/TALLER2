<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buzon extends Model
{
    protected $table = 'buzon';

    protected $fillable = ['nombre', 'correo', 'mensaje'];
}