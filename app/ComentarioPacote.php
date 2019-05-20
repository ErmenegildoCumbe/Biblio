<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComentarioPacote extends Model
{
    protected $fillable = [
        'corpo', 'estado', 'pacote_id', 'users_id', 
    ];
}
