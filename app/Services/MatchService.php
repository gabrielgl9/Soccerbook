<?php

namespace App\Services;

use App\Models\Match\Match;
use App\Models\Match\MatchResource;

class MatchService extends Service
{
    /**
     * Model
     *
     */
    protected $model = Match::class;

    /**
     * List all matches
     *
     */
    public function listMatches()
    {
        return MatchResource::collection($this->getModel()->all());
    }

    /**
     * Save a new match
     *
     */
    public function saveMatch($request)
    {
        // Create a new match
        $match = $this->getModel()->create($request->except('teams_matches'));

        // Transform request to collection
        $teamsMatchesCollection = collect($request->teams_matches);

        // Register teams matches to this match
        foreach($teamsMatchesCollection as $teamMatch) {
            $match->teams()->attach($teamMatch['team_id'], [
                'goals' => $teamMatch['goals']
            ]);
        }

        // Return the team
        return $match;
    }
}
