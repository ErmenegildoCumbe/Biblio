<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificacaoPedidoPacote extends Model
{
    protected $fillable = [
        'tipo', 'descricao', 'estado', 'destinatario', 'pedido_pacotes_id', 
    ];
}
