<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialProvider extends Model
{
    protected $fillable = [ 'provider', 'client_id', 'users_id'];
    //Relations
    public function user()
    {
        return $this->belongsTo('App\User', 'users_id');
    }
}
