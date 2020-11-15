<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'schedule_start'          => 'required|date_format:"Y-m-d H:i:s"',
            'duration'                => 'required|date_format:"H:i"',
            'place_id'                => 'required|numeric|exists:places,id',
            'type_id'                 => 'required|numeric|exists:types,id',
            'teams_matches'           => 'required|array',
            'teams_matches.*.team_id' => 'required|numeric|exists:teams,id',
            'teams_matches.*.goals'   => 'required|numeric',
        ];
    }
}
