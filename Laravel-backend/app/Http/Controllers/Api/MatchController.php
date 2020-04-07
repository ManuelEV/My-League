<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Match;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function getMatches(){
        $matches = Match::select('id', 'away_team_score', 'home_team_score', 'date')
        ->get();

        $full_matches = [];
        foreach ($matches as $match){
            $full_match = [];
            $full_match['match'] = $match;

            $away_team = Match::findOrFail($match->id)->away_team()
                ->select('id', 'name')
                ->get();

            $full_match['away_team'] = $away_team;

            $home_team = Match::findOrFail($match->id)->home_team()
                ->select('id', 'name')
                ->get();

            $full_match['home_team'] = $home_team;

            array_push($full_matches, $full_match);
        }

        return $full_matches;
    }
}
