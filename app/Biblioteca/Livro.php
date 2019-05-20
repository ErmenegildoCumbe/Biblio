<?php

namespace App\Biblioteca;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Livro extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'titulo', 'autor', 'edicao', 'editora', 'ano_publicacao', 'bibliotecario_id'
    ];
    protected $with = ['bibliotecario'];
    // Relações
    public function bibliotecario(){
        return $this->belongsTo('App\User', 'bibliotecario_id');
    }
}
