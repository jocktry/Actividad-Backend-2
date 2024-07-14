<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comentarioRecomendacion extends Model
{
    use HasFactory;
    protected $table = 'comentario_recomendacion';
    public $timestamps = false;

    protected $fillable = [
        'id_comentario',
        'id_recomendacion',
    ];
}
