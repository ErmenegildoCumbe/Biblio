<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    protected $fillable = [
        'estado', 'users_id',
    ];

    //relations
    public function user()
{
    return $this->belongsTo('App\User', 'users_id');
}
public function operadores()
{
    return $this->hasMany('App\Operador', 'administradors_id');
}
}
