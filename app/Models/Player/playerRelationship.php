<?php

namespace App\Models\Team;

trait PlayerRelationship
{
    /**
     * Many to many with teams
     *
     */
    public function teams()
    {
        return $this->belongsToMany(\App\Models\Team\Team::class, 'players_teams', 'player_id', 'team_id');
    }
}
