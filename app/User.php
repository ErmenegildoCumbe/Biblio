<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'email', 'telefone', 'password', 'tipoUsuario', 'apelido', 'sexo','estado', 'nr_estudante', 'nr_bi', 'is_estudante', 'is_bibliotecario',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //Relations
    public function permissions()
    {
        return $this->belongsToMany('App\Permission','user_permissions','user_id','permission_id');
    }
    public function reservas()
    {
        return $this->hasMany('App\Biblioteca\Reserva', 'estudante_id');
    }
    public function emprestimos()
    {
        return $this->hasMany('App\Biblioteca\Emprestimo', 'estudante_id');
    }
    public function livros()
    {
        return $this->hasMany('App\Biblioteca\Livro', 'bibliotecario_id');
    }
    public function socialProviders()
    {
        return $this->hasMany('App\SocialProvider','users_id');
    }
}
