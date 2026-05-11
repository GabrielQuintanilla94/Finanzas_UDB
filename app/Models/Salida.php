<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tipo', 
        'monto', 
        'fecha', 
        'factura_ruta'
    ];
}