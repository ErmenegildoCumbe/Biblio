<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passagem extends Model
{
    protected $fillable = [
        'nome', 'data_criaco', 'descricao', 'estado', 'passagemable_id', 'passagemable_type', 'companhia_viagens_id', 'operadors_id', 
    ];

    public function passagemable()
    {
        return $this->morphTo();
    }
}
