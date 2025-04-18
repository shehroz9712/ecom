<?php

namespace App\Repositories\Interfaces;

interface OrderRepositoryInterface
{
    public function getAll($params);
    public function getActiveAll($params);
    public function findById($id);
    public function findByOrderId($id, $userId);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function getUserOrders($page = null, $userId);
    public function updateServiceRevision($orderId, $userId, array $services);
}
