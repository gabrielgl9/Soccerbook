<?php

namespace App\Services;

use App\Models\Match\Match;
use App\Models\Player\Player;
use App\Models\Player\StatisticResource;

class StatisticPlayerService extends Service
{
    /**
     * Match Service
     *
     */
    protected $matchService;

    /**
     * Player Service
     *
     */
    protected $playerService;

    /**
     * Constructor
     *
     */
    public function __construct()
    {
        $this->matchService  = new MatchService();
        $this->playerService = new PlayerService();
    }

    /**
     * Find statistics by player
     *
     */
    public function findStatistics(Player $player)
    {
        return new StatisticResource($player);
    }

    /**
     * Find Statistics by player at a specific match
     *
     */
    public function findStatisticsByMatch(Player $player, Match $match)
    {
        return new StatisticResource(collect($match->players)->where('id', $player->id)->first());
    }

    /**
     * Save statistics by player
     *
     */
    public function saveStatistics($request)
    {
        $player = $this->playerService->getModel()->find($request->player_id);
        return $this->matchService->getModel()
                                ->find($request->match_id)
                                ->players()
                                ->attach($player, [
                                    'goals' => $request->goals
                                ]);
    }

}
