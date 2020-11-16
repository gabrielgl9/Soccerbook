<?php

namespace App\Services;

use App\Models\Match\Match;
use App\Models\Player\Player;
use App\Models\Player\PlayerResource;

class PlayerService extends Service
{
    /**
     * Model
     *
     */
    protected $model = Player::class;

    /**
     * Match Service
     *
     */
    protected $matchService;

    /**
     * Constructor
     *
     */
    public function __construct()
    {
        $this->matchService = new MatchService();
    }

    /**
     * List all players
     *
     */
    public function listPlayers()
    {
        return PlayerResource::collection($this->getModel()->all());
    }

    /**
     * Find statistics by player
     *
     */
    public function findStatistics(Player $player)
    {
        dd($player->matches()->get());
        // return $this->getModel()->select(
        //     'players.*', 'personal_statistics.goals'
        // )->join('personal_statistics', function ($join) use ($player) {
        //     $join->on('players.id', '=', 'personal_statistics.player_id')
        //     ->where('players.id', '=', $player->id);
        // })->get();
    }

    /**
     * Find Statistics by player at a specific match
     *
     */
    public function findStatisticsByMatch(Player $player, Match $match)
    {
        dd($player->matches()->where('id', $match->id)->get());
    }

    /**
     * Save statistics by player
     *
     */
    public function saveStatistics($request)
    {
        $player = $this->getModel()->find($request->player_id);
        $this->matchService->getModel()
                                ->find($request->match_id)
                                ->players()
                                ->attach($player, [
                                    'goals' => $request->goals
                                ]);
    }

    /**
     * Save a new player
     *
     */
    public function savePlayer($request)
    {
        return $this->getModel()->create($request->all());
    }
}
