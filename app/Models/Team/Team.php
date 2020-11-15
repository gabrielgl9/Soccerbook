<?php

namespace App\Models\Team;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    /**
     * Data base table
     *
     */
    protected $table = 'teams';

    /**
     * Atributes to save
     *
     */
    protected $fillable = [
        'name'
    ];
}
