<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recomendacion extends Model
{
    use HasFactory;
    protected $table = 'recomendacion';

    protected $fillable = [
        'id',
        'nombre',
    ];
}
