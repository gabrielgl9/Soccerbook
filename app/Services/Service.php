<?php

namespace App\Services;

class Service
{
    /**
     * Service Model
     *
     * @var Eloquent
     */
    protected $model;

    /**
     * Get Model
     *
     */
    public function getModel()
    {
        return new $this->model;
    }
}
