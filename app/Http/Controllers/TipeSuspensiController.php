<?php

namespace App\Http\Controllers;

use App\Http\Requests\MasterRequest;
use App\Services\TipeSuspensiService;

class TipeSuspensiController extends Controller
{
    protected $service;
    public function __construct(
        TipeSuspensiService $service
    )
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->index();
    }

    public function store(MasterRequest $request)
    {
        return $this->service->store($request);
    }

    public function update(MasterRequest $request, $id)
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
