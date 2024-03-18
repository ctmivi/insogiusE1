<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfiles extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_usuario',
        'foto_perfil',
        'score',
        'coin',
        'fecha',
    ];

}
