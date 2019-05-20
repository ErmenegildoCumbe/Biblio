<?php

namespace App\Biblioteca;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Emprestimo extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'data_entrega', 'estudante_id', 'livro_id', 'bibliotecario_id'
    ];
    protected $with = ['livro', 'estudante', 'bibliotecario'];
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
