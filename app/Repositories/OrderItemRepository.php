<?php

namespace App\Repositories;

use App\Models\OrderItem;
use App\Repositories\BaseRepository;

class OrderItemRepository extends BaseRepository
{
    public function __construct(OrderItem $model)
    {
        $this->model = $model;
    }

    public function getByOrderId($order_id)
    {
        $data = $this->model->where('order_id', $order_id)->orderBy('created_at', 'desc')->get();

        return $data;
    }
}
