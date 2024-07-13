<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sitioTuristico extends Model
{
    use HasFactory;

    protected $table = 'sitio_turistico';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'calificacion',
        'foto',
        'descripcion',
        'latitud',
        'longitud',
        'id_ciudad',
    ];
}
