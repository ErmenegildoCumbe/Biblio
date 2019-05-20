<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MensagemPassagem extends Model
{
    protected $fillable = [
        'corpo', 'estado', 'pedido_passagems_id', 'operadors_id', 
    ];
}
