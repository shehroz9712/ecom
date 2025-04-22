<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
  
    public function getAll($params = [])
    {

        $query = Product::filterAndFetch($params);


        return $query;
    }

    public function getActiveAll($params = [])
    {
        $query = Product::filterAndFetch($params)->active();
        return $query;
    }



    public function findById($id)
    {
        return Product::find($id);
    }

    public function create(array $data)
    {
        return Product::create($data);
    }

    public function update($id, array $data)
    {
        $record = Product::find($id);
        if (!$record) {
            return null;
        }
        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        $record = Product::find($id);
        if (!$record) {
            return false;
        }
        return $record->delete();
    }
}
