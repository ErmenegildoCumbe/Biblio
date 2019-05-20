<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanhiaViagens extends Model
{
    protected $fillable = [
        'nome', 'tipo', 'logotipo', 'estado', 
    ];
}
