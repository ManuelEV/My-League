<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*Route::middleware(['auth:api', 'scope:show-products'])
	->get('/products', 'Api\ProductsController@all');*/

/*
Route::middleware(['auth:api', 'scope:user'])
    ->get('/league', 'Api\LeagueController@getLeague');

Route::middleware(['auth:api', 'scope:user'])
    ->get('/teamPlayers', 'Api\TeamController@getTeamPlayers');*/

Route::middleware(['auth:api', 'scope:user'])->group(function (){
    Route::get('/league', 'Api\LeagueController@getLeague');
    Route::get('/team', 'Api\TeamController@getTeams');
    Route::get('/player', 'Api\PlayerController@getPlayers');
    Route::get('/teamPlayers', 'Api\TeamController@getTeamPlayers');
    Route::get('/match', 'Api\MatchController@getMatches');
});

Route::middleware(['auth:api', 'scope:manager'])->group(function (){

});

Route::middleware(['auth:api', 'scope:admin'])->group(function (){
    Route::post('/league', 'Api\LeagueController@store');
    Route::post('/team', 'Api\TeamController@store');
    Route::post('/player', 'Api\PlayerController@store');
    Route::post('/teamPlayers', 'Api\TeamController@store');
    Route::post('/match', 'Api\MatchController@store');
});

Route::post('/login', 'Api\UserController@login');
Route::post('/register', 'Api\UserController@register');
