<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function league(){
        return $this->belongsTo('App\League');
    }

    public function players(){
        return $this->hasMany('App\Player');
    }

    public function matches(){
        return $this->hasMany('App\Match');
    }

}
