<?php

namespace App\Models\Player;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use PlayerRelationship;

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
