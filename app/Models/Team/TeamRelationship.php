<?php

namespace App\Models\Team;

trait TeamRelationship
{
    /**
     * Many to many with players
     *
     */
    public function players()
    {
        return $this->belongsToMany(\App\Models\Player\Player::class, 'players_teams', 'team_id', 'player_id');
    }
}
