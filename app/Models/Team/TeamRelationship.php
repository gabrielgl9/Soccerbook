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

    /**
     * Many to many with match
     *
     */
    public function matches()
    {
        return $this->belongsToMany(\App\Models\Match\Match::class, 'teams_matches', 'team_id', 'match_id')->withPivot(['goals']);
    }
}
