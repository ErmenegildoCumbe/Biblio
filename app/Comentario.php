<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable = [
        'corpo', 'estado', 'comentarable_id', 'comentarable_type', 'operadors_id',
    ];

    public function comentarable()
    {
        return $this->morphTo();
    }
}
