<?php

namespace App\Http\Controllers;

use App\Services\OrderItemService;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    protected $service;
    public function __construct(
        OrderItemService $service
    )
    {
        $this->service = $service;
    }

    public function index(Request $request, $id)
    {
        return $this->service->index($request, $id);
    }
}
