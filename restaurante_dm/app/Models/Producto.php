<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    // Esto permite que Laravel guarde los datos del formulario
    protected $fillable = ['nombre', 'precio', 'descripcion'];
}