<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // ± IMPORTANTE
use Illuminate\Database\Eloquent\Model;

class HistoricoCiclista extends Model
{
    protected $fillable = [
        'id_ciclista',
        'fecha',
        'peso',
        'ftp',
        'pulso_max',
        'pulso_reposo',
        'potencia_max',
        'grasa_corporal',
        'vo2max',
        'comentario'
    ];
    
    protected $dates = [
        'fecha'
    ];
}