<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlayerRequest;
use App\Models\Player\Player;
use App\Models\Player\PlayerResource;
use App\Services\PlayerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{
    /** Success Response */
    private $successResponse = 201;

    /** Failed Response */
    private $failedResponse = 401;

    /** Player Service */
    private $playerService;

    /**
     * Constructor
     *
     */
    public function __construct()
    {
        $this->playerService = new PlayerService();
    }

    /**
     * List all players
     *
     */
    public function index()
    {
        try {
            $players = $this->playerService->listPlayers();
            return response()->json($players, $this->successResponse);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), $this->failedResponse);
        }
    }

    /**
     * Show all statistics of a specific player
     *
     */
    public function findStatistics(Player $player)
    {
        try {
            $playerStatistics = $this->playerService->findStatistics($player);
            return response()->json($playerStatistics, $this->successResponse);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), $this->failedResponse);
        }
    }

    /**
     * Save a new player
     *
     */
    public function store(PlayerRequest $playerRequest)
    {
        DB::beginTransaction();
        try {
            $player = $this->playerService->savePlayer($playerRequest);
            DB::commit();
            return response()->json(new PlayerResource($player), $this->successResponse);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json($th->getMessage(), $this->failedResponse);
        }
    }
}
