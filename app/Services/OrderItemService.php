<?php

namespace App\Services;

use App\Helpers\Pagination;
use App\Repositories\OrderItemRepository;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\Log;

class OrderItemService extends BaseService
{
    protected $repo;

    public function __construct(
        OrderItemRepository $repo
    ) {
        parent::__construct();
        $this->repo = $repo;
    }

    public function index($request, $id)
    {
        try {
            $item = $this->repo->getByOrderId($request, $id);

            return Pagination::paginate($item, $request);
        } catch (Exception $exc) {
            Log::error($exc);
            return $this->responseMessage(__('content.message.read.failed'), 400, false);
        }
    }
}
