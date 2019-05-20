<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoPassagem extends Model
{
    protected $fillable = [
        'nr_passageiros', 'ponto_partida', 'ponto_chegada', 'data_partida', 'descricao', 'tipo_reserva', 'data_retorno', 'estado', 'clientes_id',  
    ];

    //Polimorfismos
    public function passagens()
    {
        return $this->morphMany('App\Passagem', 'passagemable');
    }

    public function passageiros()
    {
        return $this->morphMany('App\Passageiro', 'passageiroable');
    }
    
    public function notificacoes()
    {
        return $this->morphMany('App\notificacao', 'notificacaoable');
    }
    public function comentarios()
    {
        return $this->morphMany('App\Comentario', 'comentarable');
    }
    public function contacto()
    {
        return $this->morphOne('App\Contacto', 'contactable');
    }
    //Relations
    public function cliente()
    {
        return $this->belongsTo('App\Cliente', 'clientes_id');
    }
}
