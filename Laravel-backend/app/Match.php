<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    public function away_team(){
        return $this->belongsTo('App\Team');
    }

    public function home_team(){
        return $this->belongsTo('App\Team');
    }
}
