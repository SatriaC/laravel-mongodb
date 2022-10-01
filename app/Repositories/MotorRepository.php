<?php

namespace App\Repositories;

use App\Models\Motor;
use App\Repositories\BaseRepository;

class MotorRepository extends BaseRepository
{
    public function __construct(Motor $model)
    {
        $this->model = $model;
    }
}
