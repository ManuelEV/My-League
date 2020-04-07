<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function getTeams(){
        $teams = Team::select('id','name', 'description', 'wins', 'loses')
        ->orderBy('name')->get();
        return $teams;
    }

    public function getTeamPlayers(Request $request){
        $team_id = $request->id;

        $players = Team::findOrFail($team_id)->players()
            ->select('id','name', 'age', 'points')
            ->get();

        return $players;

    }

    public function store(Request $request){
        $team = new Team();
        $team->name = $request->name;
        $team->description = $request->description;
        $team->league_id = 1;
        $team->wins = 0;
        $team->loses = 0;
        $team->save();
        return ['OK'];
    }

}
