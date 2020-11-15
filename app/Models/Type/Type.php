<?php

namespace App\Models\Type;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';

    protected $fillable = [
        'name'
    ];
}
