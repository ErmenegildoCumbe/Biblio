<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MensagemPacote extends Model
{
    protected $fillable = [
        'corpo', 'estado', 'pedido_pacotes_id', 'operadors_id',
    ];
}
