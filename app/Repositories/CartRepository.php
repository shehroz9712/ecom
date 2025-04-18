<?php

namespace App\Repositories;

use App\Models\Cart;
use App\Repositories\Interfaces\CartRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class CartRepository implements CartRepositoryInterface
{
   
    public function getAll($params = [])
    {
        $query = Cart::filterAndFetch($params);
        return $query;
    }

    public function getActiveAll($params = [])
    {
        $query = Cart::active()->filterAndFetch($params);
        return $query;
    }

    public function findById($id)
    {
        return Cart::find($id);
    }

    public function create(array $data)
    {
        $data["user_id"] = Auth::user()->id;
        return Cart::create($data);
    }

    public function update($id, array $data)
    {
        $record = Cart::find($id);
        if (!$record) {
            return null;
        }
        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        $record = Cart::find($id);
        if (!$record) {
            return false;
        }
        return $record->delete();
    }
}
