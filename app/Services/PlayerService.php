<?php

namespace App\Services;

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
     * List all players
     *
     */
    public function listPlayers()
    {
        return PlayerResource::collection($this->getModel()->all());
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
