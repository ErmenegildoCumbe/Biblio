<?php

namespace App\Biblioteca;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reserva extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'estudante_id', 'bibliotecario_id', 'livro_id'
    ];
    protected $with = ['bibliotecario', 'estudante'];
    // Relações
    public function estudante(){
        return $this->belongsTo('App\User', 'estudante_id');
    }
    public function bibliotecario(){
        return $this->belongsTo('App\User', 'bibliotecario_id');
    }
    public function livro(){
        return $this->belongsTo('App\Biblioteca\Livro');
    }
}
