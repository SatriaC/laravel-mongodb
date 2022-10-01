<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $service;
    public function __construct(
        CartService $service
    )
    {
        $this->service = $service;
    }
    public function updateOrCreate(CartRequest $request)
    {
        return $this->service->updateOrCreate($request);
    }

    public function show()
    {
        return $this->service->show();
    }
}
