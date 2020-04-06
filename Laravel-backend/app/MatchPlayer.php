<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchPlayer extends Model
{
    public function matches(){
        return $this->belongsToMany('App\Match');
    }

    public function players(){
        return $this->belongsToMany('App\Player');
    }
}
