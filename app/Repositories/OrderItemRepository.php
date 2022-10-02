<?php

namespace App\Repositories;

use App\Models\OrderItem;
use App\Repositories\BaseRepository;
use Carbon\Carbon;

class OrderItemRepository extends BaseRepository
{
    public function __construct(OrderItem $model)
    {
        $this->model = $model;
    }

    public function getByOrderId($request, $order_id)
    {
        $data = $this->model->where('order_id', $order_id)->orderBy('created_at', 'desc');

        if (isset($request->kendaraan_id)) {
            $data->where('kendaraan_id', $request->kendaraan_id);
        }

        if (isset($request->start_date) && isset($request->end_date)) {
            $start_date = Carbon::parse($request->start_date)->startOfDay();
            $end_date = Carbon::parse($request->end_date)->endOfDay();
            $data = $data->whereBetween('created_at', array($start_date, $end_date));
        }

        return $data;
    }
}
