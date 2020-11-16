<?php

namespace App\Models\Player;

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

    /**
     * Many to many with matches
     *
     */
    public function matches()
    {
        return $this->belongsToMany(\App\Models\Match\Match::class, 'personal_statistics', 'player_id', 'match_id')->withPivot(['goals']);
    }

}
