<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\League;
use Illuminate\Http\Request;

class LeagueController extends Controller
{
    public function getLeague(){
        $leagues = League::get();

        return $leagues;
    }

    public function getTeams(){
        $teams = League::find(1)->teams()->get();
        return $teams;
    }

    public function store(Request $request){

    }

}
