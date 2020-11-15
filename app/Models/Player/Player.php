<?php

namespace App\Models\Player;

use App\Models\Team\TeamRelationship;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use TeamRelationship;

    /**
     * Data base table
     *
     */
    protected $table = 'players';

    /**
     * Atributes to save
     *
     */
    protected $fillable = [
        'name'
    ];
}
