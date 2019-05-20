<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoPacote extends Model
{
    protected $fillable = [
        'nr_viajantes', 'ponto_partida', 'ponto_chegada', 'meio_transporte', 'categoria_meio_transporte', 'data_inicio', 'data_fim','estado', 'detalhes', 'pacote_id', 'clientes_id',
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
    public function pacote()
    {
        return $this->belongsTo('App\PacoteViagem', 'pacote_id');
    }

}
