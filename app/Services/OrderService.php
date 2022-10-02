<?php

namespace App\Services;

use App\Helpers\Pagination;
use App\Repositories\CartRepository;
use App\Repositories\KendaraanRepository;
use App\Repositories\OrderItemRepository;
use App\Repositories\OrderRepository;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\Log;
use stdClass;

class OrderService extends BaseService
{
    protected $repo;
    protected $repoItem;
    protected $repoCart;
    protected $repoKendaraan;

    public function __construct(
        OrderRepository $repo,
        OrderItemRepository $repoItem,
        CartRepository $repoCart,
        KendaraanRepository $repoKendaraan,
    ) {
        parent::__construct();
        $this->repo = $repo;
        $this->repoItem = $repoItem;
        $this->repoCart = $repoCart;
        $this->repoKendaraan = $repoKendaraan;
    }

    public function index($request)
    {
        try {
            $item = $this->repo->getAll($request);

            return Pagination::paginate($item, $request);
        } catch (Exception $exc) {
            Log::error($exc);
            return $this->responseMessage(__('content.message.read.failed'), 400, false);
        }
    }

    public function store()
    {
        try {
            $total_price = 0;
            $carts = $this->repoCart->getByUserId();
            if ($carts->count() == 0) {
                return $this->responseMessage(__('content.message.cart.empty'), 400, false);
            }
            $dataOrder['user_id'] = $this->user->id;
            $createdOrder = $this->repo->create($dataOrder);
            foreach ($carts as $item) {
                $dataOrderItem['order_id'] = $createdOrder->id;
                $dataOrderItem['kendaraan_id'] = $item->kendaraan_id;
                $dataOrderItem['qty'] = $item->qty;
                $checkItem = $this->repoKendaraan->getById($item->kendaraan_id);
                if ($item->qty > $checkItem->stok) {
                    return $this->responseMessage(__('content.message.cart.not_available'), 400, false);
                }
                $createdOrderItem = $this->repoItem->create($dataOrderItem);
                // $this->repoCart->delete($item->id);
                $findById = $this->repoItem->getById($createdOrderItem->id);
                $total_price += $findById->total_price;
            }
            $dataOrder['total_price'] = $total_price;
            $dataOrder['gross_price'] = $total_price;
            $this->repo->update($dataOrder, $createdOrder->id);
            $this->processDecreasing($createdOrder->id);

            return $this->responseMessage(__('content.message.create.success'), 200, true, $createdOrder);
        } catch (Exception $exc) {
            Log::error($exc);
            return $this->responseMessage(__('content.message.create.failed'), 400, false, new stdClass());
        }
    }

    public function update($request, $id)
    {
        try {
            $data = $request->all();
            $this->repo->update($data, $id);

            return $this->responseMessage(__('content.message.create.success'), 200, true, new stdClass());
        } catch (Exception $exc) {
            Log::error($exc);
            return $this->responseMessage(__('content.message.create.failed'), 400, false, new stdClass());
        }
    }


    public function show($id)
    {
        try {
            $data = $this->repo->getById($id);

            return $this->responseMessage(__('content.message.read.success'), 200, true, $data);
        } catch (Exception $exc) {
            Log::error($exc);
            return $this->responseMessage(__('content.message.read.failed'), 400, false, new stdClass());
        }
    }

    public function processDecreasing($order_id)
    {
        $orderItems = $this->repoItem->getByOrderId(null, $order_id)->get();
        foreach ($orderItems as $item) {
            $checkItem = $this->repoKendaraan->getById($item->kendaraan_id);
            $result = $checkItem->stok - $item->qty;
            $dataKendaraan['stok'] = $result;
            $this->repoKendaraan->update($dataKendaraan, $item->kendaraan_id);
        }

        return true;
    }
}
