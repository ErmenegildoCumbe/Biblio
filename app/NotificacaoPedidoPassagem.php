<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificacaoPedidoPassagem extends Model
{
    protected $fillable = [
        'tipo', 'descricao', 'destinatario', 'estado', 'pedido_passagems_id', 
    ];
}
