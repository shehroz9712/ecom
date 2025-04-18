<?php

namespace App\Repositories;

use App\Models\Portfolio;
use App\Repositories\Interfaces\PortfolioRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class PortfolioRepository implements PortfolioRepositoryInterface
{
    public function getAll($params = [])
    {
        $query = Portfolio::filterAndFetch($params);
        return $query;
    }

    public function getActiveAll($params = [])
    {
        $query = Portfolio::active()->filterAndFetch($params);
        return $query;
    }

    public function findById($id)
    {
        return Portfolio::where('id', $id)
            ->where('user_id', Auth::id())
            ->where('status', 1)
            ->first();
    }

    public function create(array $data)
    {
        $data['user_id'] = Auth::user()->id;
        return Portfolio::create($data);
    }

    public function update($id, array $data)
    {
        $record = Portfolio::find($id);
        if (!$record) {
            return null;
        }
        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        $record = Portfolio::find($id);
        if (!$record) {
            return false;
        }
        return $record->delete();
    }
}
