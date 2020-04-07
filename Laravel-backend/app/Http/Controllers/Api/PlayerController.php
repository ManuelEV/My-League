<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function getPlayers (){
        $players = Player::select('id', 'name', 'age', 'points')->get();
        return $players;
    }

    public function store(Request $request){
        $player = new Player();
        $player->team_id = $request->team_id;
        $player->name = $request->name;
        $player->age = $request->age;
        $player->points = 0;
        $player->save();
    }

}
