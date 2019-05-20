<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotoPacote extends Model
{
    protected $fillable = [
        'designacao', 'tipo', 'pacote_viagems_id', 
    ];
    //Relations
    public function pacote()
    {
        return $this->belongsTo('App\PacoteViagem', 'pacote_viagems_id');
    }
}
