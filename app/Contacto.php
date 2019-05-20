<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $fillable = [
        'emailprincipal', 'telefoneprincipal', 'emailemergencia', 'telefoneemergencia', 'contactable_id', 'contactable_type',
    ];
    //Polimorphic
    public function contactable()
    {
        return $this->morphTo();
    }
}
