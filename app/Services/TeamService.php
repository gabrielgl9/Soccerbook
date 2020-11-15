<?php

namespace App\Services;

use App\Models\Team\Team;
use App\Models\Team\TeamResource;

class TeamService extends Service
{
    /**
     * Model
     *
     */
    protected $model = Team::class;

    /**
     * List all teams
     *
     */
    public function listTeams()
    {
        return TeamResource::collection($this->getModel()->all());
    }

    /**
     * Save a new team, including players
     *
     */
    public function saveTeam($request)
    {
        // Create a new team
        $team = $this->getModel()->create($request->except('players'));

        // Transform request to collection
        $playersCollection = collect($request->players);

        // Register players to this team
        $team->players()->sync($playersCollection->flatten());

        // Return the team
        return $team;
    }
}
