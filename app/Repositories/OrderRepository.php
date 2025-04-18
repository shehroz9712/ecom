<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Cart;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class OrderRepository implements OrderRepositoryInterface
{
    public function getAll($params = [])
    {
        $query = Order::filterAndFetch($params);
        return $query;
    }

    public function getActiveAll($params = [])
    {
        $query = Order::active()->filterAndFetch($params);
        return $query;
    }
    public function getUserOrders($page = null, $userId)
    {
        $userId = $userId ?? Auth::id();
        $query = Order::with('orderDetails')->where('user_id', $userId);
        return $page ? $query->paginate($page) : $query->get();
    }


    public function findByOrderId($id, $userId)
    {
        $userId = Auth::user()->id;
        $order = Order::with('orderDetails')
            ->where('id', $id)
            ->where('user_id', $userId)
            ->first();

        return $order ?: null;
    }

    public function findById($id)
    {
        return Order::find($id);
    }

    public function create(array $data)
    {
        $data['user_id'] = Auth::id();

        $services = $data['services'] ?? [];
        $cartId = $data['cart_id'] ?? null;

        unset($data['services'], $data['cart_id']);

        if ($cartId === null) {
            throw new \Exception("Cart ID is required but is missing.");
        }

        // Create the order
        $order = Order::create($data);

        // Insert services into order_details
        if (!empty($services)) {
            $orderDetails = [];
            foreach ($services as $service) {
                $orderDetails[] = [
                    'order_id'    => $order->id,
                    'service_id'  => $service['id'],
                    'cart_id'     => $cartId,
                    'price'       => (float) $service['price'],
                    'media_id'    => $service['media_id'] ?? null,
                    'is_revision' => (int) $service['is_revision'],
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ];
            }

            // Bulk insert order details
            if (!empty($orderDetails)) {
                OrderDetail::insert($orderDetails);
            }
        }

        // Delete cart record
        if ($cartId) {
            Cart::where('id', $cartId)->delete();
        }

        return $order;
    }


    public function updateServiceRevision($orderId, $userId, array $services)
    {
        $userId = Auth::user()->id;
        // Find the order by ID and user ID
        $order = Order::where('id', $orderId)
            ->where('user_id', $userId)
            ->first();

        if (!$order) {
            return null;
        }

        foreach ($services as $serviceData) {
            $serviceId = $serviceData['service_id'];
            $isRevision = $serviceData['is_revision'];

            // Find the specific order detail
            $orderDetail = OrderDetail::where('order_id', $orderId)
                ->where('service_id', $serviceId)
                ->first();

            if ($orderDetail) {
                $orderDetail->update([
                    'is_revision' => $isRevision,
                ]);
            }
        }

        return $order->load('orderDetails');
    }

    public function update($id, array $data)
    {
        $record = Order::find($id);
        if (!$record) {
            return null;
        }
        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        $record = Order::find($id);
        if (!$record) {
            return false;
        }
        return $record->delete();
    }
}
