<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = [
        'rua_avenida', 'provincia', 'cidade', 'detalhes',
    ];
    //Relations
    public function user()
    {
        return $this->hasOne('App\User', 'enderecos_id');
    }
}
