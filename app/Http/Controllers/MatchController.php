<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatchRequest;
use App\Models\Match\MatchResource;
use App\Services\MatchService;
use Illuminate\Support\Facades\DB;

class MatchController extends Controller
{
        /** Success Response */
        private $successResponse = 201;

        /** Failed Response */
        private $failedResponse = 401;

        /** Match Service */
        private $matchService;

        /**
         * Constructor
         *
         */
        public function __construct()
        {
            $this->matchService = new MatchService();
        }

        /**
         * List all matches
         *
         */
        public function index()
        {
            try {
                $matches = $this->matchService->listMatches();
                return response()->json($matches, $this->successResponse);
            } catch (\Throwable $th) {
                return response()->json($th->getMessage(), $this->failedResponse);
            }
        }

        /**
         * Save a new match
         *
         */
        public function store(MatchRequest $matchRequest)
        {
            DB::beginTransaction();
            try {
                $match = $this->matchService->saveMatch($matchRequest);
                DB::commit();
                return response()->json(new MatchResource($match), $this->successResponse);
            } catch (\Throwable $th) {
                DB::rollback();
                return response()->json($th->getMessage(), $this->failedResponse);
            }
        }
}
