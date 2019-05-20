<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passageiro extends Model
{
    protected $fillable = [
        'nome', 'apelido', 'forma_tratamento', 'data_nascimento', 'sexo', 'tipo', 'passageiroable_id', 'passageiroable_type',
    ];

    public function passageiroable()
    {
        return $this->morphTo();
    }
}
