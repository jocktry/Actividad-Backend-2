<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'ciudad';
    protected $fillable = [
        'foto',
        'calificacion',
        'nombre',
        'latitud',
        'longitud',
    ];
}
