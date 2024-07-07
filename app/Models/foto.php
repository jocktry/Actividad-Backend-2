<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class foto extends Model
{
    use HasFactory;
    protected $table = 'foto';

    protected $fillable = [
        'id',
        'foto',
        'id_comentario',
    ];
}
