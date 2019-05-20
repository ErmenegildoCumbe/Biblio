<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'estado', 'users_id', 'tipoCliente',
    ];
        //Relations
        public function user()
        {
            return $this->belongsTo('App\User', 'users_id');
        }
        public function pedidosPacote()
        {
            return $this->hasMany('App\PedidoPacote', 'clientes_id');
        }
        public function pedidosPassagem()
        {
            return $this->hasMany('App\PedidoPassagem', 'clientes_id');
        }
}
