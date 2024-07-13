<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comentario extends Model
{
    use HasFactory;
    protected $table = 'comentario';
    public $timestamps = false;

    protected $fillable = [
        'fecha_de_publicacion',
        'calificacion',
        'descripcion',
        'id_usuario',
        'id_sitio_turistico',
    ];
}
