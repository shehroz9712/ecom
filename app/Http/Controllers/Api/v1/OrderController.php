<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\OrderFilterRequest;
use App\Http\Requests\ServiceRevisionRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderController extends BaseController
{
    use AuthorizesRequests;

    protected $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', Order::class);
        $data = $this->orderRepository->getAll($request->all());
        return $this->respondSuccess($data, "User orders records retrieved successfully.");
    }

    public function getAll(OrderFilterRequest $request)
    {
        $data = $this->orderRepository->getAll($request->validatedParams());
        return $this->respondSuccess($data, "User orders All records retrieved successfully.");
    }

    public function getUserOrders(Request $request, $userId = null)
    {
        $this->authorize('viewAny', Order::class);
        $data = $this->orderRepository->getUserOrders($request->page, $userId);
        return $this->respondSuccess($data, "User orders retrieved successfully.");
    }


    public function store(OrderRequest $request)
    {
        $this->authorize('create', Order::class);
        $order = $this->orderRepository->create($request->all());
        return $this->respondSuccess($order, "Order created successfully.");
    }


    public function show($id, $userId = null)
    {
        $order = $this->orderRepository->findByOrderId($id, $userId);
        return $order
            ? $this->respondSuccess($order, "Order details retrieved.")
            : $this->respondForbidden([], false, "Order not found.");
    }

    public function updateServiceRevision(ServiceRevisionRequest $request, $orderId)
    {
        $userId = Auth::id();
        $updatedOrder = $this->orderRepository->updateServiceRevision($orderId, $userId, $request->input('services'));
        return $updatedOrder
            ? $this->respondSuccess($updatedOrder, "Service revision updated successfully.")
            : $this->respondForbidden([], false, "Order not found or service not found.");
    }


    public function destroy($id)
    {
        $order = $this->orderRepository->findById($id);
        $this->authorize('delete', $order);
        $this->orderRepository->delete($id);
        return $this->respondSuccess([], "Order deleted successfully.");
    }
}
