<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // ± IMPORTANTE
use Illuminate\Database\Eloquent\Model;

class HistoricoCiclista extends Model
{
    protected $fillable = [
        'id_ciclista',
        'nombre',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'objetivo',
        'activo'
    ];
    
    protected $dates = [
        'fecha_inicio',
        'fecha_fin',
    ];
}