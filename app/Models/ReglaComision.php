<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReglaComision extends Model
{
    use HasFactory;

    protected $table = 'reglas_comision';

    protected $fillable = [
        'umbral',
        'porcentaje',
    ];

    protected $casts = [
        'umbral' => 'decimal:2',
        'porcentaje' => 'decimal:2',
    ];
}