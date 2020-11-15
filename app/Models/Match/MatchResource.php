<?php

namespace App\Models\Match;

use App\Models\Place\PlaceResource;
use App\Models\Type\TypeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MatchResource extends JsonResource
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
            'id'             => $this->id,
            'schedule_start' => $this->schedule_start,
            'duration'       => $this->duration,
            'place'          => new PlaceResource($this->place),
            'type'           => new TypeResource($this->type),
            'created_at'     => $this->created_at,
            'updated_at'     => $this->updated_at,
        ];
    }
}
