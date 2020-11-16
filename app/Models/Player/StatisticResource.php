<?php

namespace App\Models\Player;

use App\Models\Match\MatchResource;
use Illuminate\Http\Resources\Json\JsonResource;

class StatisticResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'player'      => new PlayerResource($this),
            'match'       => MatchResource::collection($this->matches),
            'goals_total' => $this->matches->sum(function ($statistic) {
                                return $statistic->pivot->goals;
                            }),
            'created_at'  => $this->created_at,
            'updated_at'  => $this->updated_at,
        ];
    }
}
