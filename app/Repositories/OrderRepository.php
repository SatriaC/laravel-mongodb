<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\BaseRepository;
use Carbon\Carbon;

class OrderRepository extends BaseRepository
{
    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    public function getAll($request)
    {
        $data = $this->model;

        if (isset($request->start_date) && isset($request->end_date)) {
            $start_date = Carbon::parse($request->start_date)->startOfDay();
            $end_date = Carbon::parse($request->end_date)->endOfDay();
            $data = $data->whereBetween('kendaraan.created_at', array($start_date, $end_date));
        }

        return $data;
    }
}
