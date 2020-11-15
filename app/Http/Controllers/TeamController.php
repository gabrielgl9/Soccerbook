<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Models\Team\TeamResource;
use App\Services\TeamService;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    /** Success Response */
    private $successResponse = 201;

    /** Failed Response */
    private $failedResponse = 401;

    /** Team Service */
    private $teamService;

    /**
     * Constructor
     *
     */
    public function __construct()
    {
        $this->teamService = new TeamService();
    }

    /**
     * List all teams
     *
     */
    public function index()
    {
        try {
            $teams = $this->teamService->listTeams();
            return response()->json($teams, $this->successResponse);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), $this->failedResponse);
        }
    }

    /**
     * Save a new team
     *
     */
    public function store(TeamRequest $teamRequest)
    {
        DB::beginTransaction();
        try {
            $team = $this->teamService->saveTeam($teamRequest);
            DB::commit();
            return response()->json(new TeamResource($team), $this->successResponse);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json($th->getMessage(), $this->failedResponse);
        }
    }
}
