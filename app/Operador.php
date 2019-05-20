<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operador extends Model
{
    protected $fillable = [
        'administradors_id', 'estado', 'users_id',
    ];
    //Relations
    public function user()
    {
        return $this->belongsTo('App\User', 'users_id');
    }
    public function administrador()
    {
        return $this->belongsTo('App\Administrador');
    }
    public function pacotes()
    {
        return $this->hasMany('App\PacoteViagem', 'operadors_id');
    }
}
