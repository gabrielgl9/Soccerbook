<?php

namespace App\Models\Match;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    /**
     * Data base table
     *
     */
    protected $table = 'matches';

    /**
     * Atributes to save
     *
     */
    protected $fillable = [
        'schedule_start',
        'time',
        'place_id',
        'type_id'
    ];
}
