<?php

namespace App\Models\Match;

trait MatchRelationship
{
    /**
     * Many to many with players
     *
     */
    public function players()
    {
        return $this->belongsToMany(\App\Models\Player\Player::class, 'personal_statistics', 'match_id', 'player_id')->withPivot(['goals']);
    }

    /**
     * Many to many with teams
     *
     */
    public function teams()
    {
        return $this->belongsToMany(\App\Models\Team\Team::class, 'teams_matches', 'match_id', 'team_id')->withPivot(['goals']);
    }

    /**
     * A match belongs to a type
     *
     */
    public function type()
    {
        return $this->belongsTo(\App\Models\Type\Type::class, 'type_id');
    }

    /**
     * A match belongs to a place
     *
     */
    public function place()
    {
        return $this->belongsTo(\App\Models\Place\Place::class, 'place_id');
    }

}
