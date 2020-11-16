<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatisticPlayerRequest;
use App\Models\Match\Match;
use App\Models\Player\Player;
use App\Services\StatisticPlayerService;
use Illuminate\Support\Facades\DB;

class StatisticPlayerController extends Controller
{
    /** Success Response */
    private $successResponse = 201;

    /** Failed Response */
    private $failedResponse = 401;

    /** Statistic Service */
    private $statisticService;

    /**
     * Constructor
     *
     */
    public function __construct()
    {
        $this->statisticService = new StatisticPlayerService();
    }

    /**
     * Find statistics by player
     *
     */
    public function findStatistics(Player $player)
    {
        try {
            $statistics = $this->statisticService->findStatistics($player);
            return response()->json($statistics, $this->successResponse);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], $this->failedResponse);
        }
    }

    /**
     * Find Statistics by player at a specific match
     *
     */
    public function findStatisticsByMatch(Player $player, Match $match)
    {
        try {
            $statistics = $this->statisticService->findStatisticsByMatch($player, $match);
            return response()->json($statistics, $this->successResponse);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], $this->failedResponse);
        }
    }

    /**
     * Save statistics
     *
     */
    public function saveStatistics(StatisticPlayerRequest $request)
    {
        DB::beginTransaction();
        try {
            $statistics = $this->statisticService->saveStatistics($request);
            DB::commit();
            return response()->json($statistics, $this->successResponse);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(['message' => $th->getMessage()], $this->failedResponse);
        }
    }
}
