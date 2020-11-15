<?php

namespace App\Models\Place;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    /**
     * Data base table
     *
     */
    protected $table = 'places';

    /**
     * Atributes to save
     *
     */
    protected $fillable = [
        'name',
        'phone'
    ];
}
