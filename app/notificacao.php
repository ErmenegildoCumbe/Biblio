<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notificacao extends Model
{
    protected $fillable = [
        'tipo', 'descricao', 'estado', 'destinatario', 'notificacaoable_id', 'notificacaoable_type'
    ];

    public function notificacaoable()
    {
        return $this->morphTo();
    }
}
