<?php

namespace App\Http\Controllers;

use App\Http\Requests\MotorRequest;
use App\Services\MotorService;
use Illuminate\Http\Request;

class MotorController extends Controller
{
    protected $service;
    public function __construct(
        MotorService $service
    )
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->index();
    }

    public function store(MotorRequest $request)
    {
        return $this->service->store($request);
    }

    public function update(MotorRequest $request, $id)
    {
        return $this->service->update($request, $id);
    }

    public function show($id)
    {
        return $this->service->show($id);
    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }
}
