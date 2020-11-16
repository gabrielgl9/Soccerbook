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

Route::prefix('v1')->group(function() {
    Route::resource('/player', 'PlayerController')->only(['index', 'store']);
    Route::resource('/team', 'TeamController')->only(['index', 'store']);
    Route::resource('/match', 'MatchController')->only(['index', 'store']);
    Route::get('/player-statistics/{player}', 'StatisticPlayerController@findStatistics');
    Route::get('/player-statistics/{player}/{match}', 'StatisticPlayerController@findStatisticsByMatch');
    Route::post('/player-statistics', 'StatisticPlayerController@saveStatistics');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
