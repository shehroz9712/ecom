<?php

namespace App\Repositories\Interfaces;

interface TestimonialRepositoryInterface
{
    public function getAll($page = null, $limit = 10, $search = [], $where = [], $order = 'created_at', $direction = 'DESC'); 
    public function getActiveAll($page = null);
    public function findById($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}
