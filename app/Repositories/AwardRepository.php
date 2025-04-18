<?php

namespace App\Repositories;

use App\Models\Award;
use App\Repositories\Interfaces\AwardRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class AwardRepository implements AwardRepositoryInterface
{
    public function getAll($params = [])
    {
        $query = Award::filterAndFetch($params);

        return $query;
    }

    public function getActiveAll($params = [])
    {
        $query = Award::active()->filterAndFetch($params);
        return $query;
    }

    public function findById($id)
    {
        return Award::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();
    }

    public function create(array $data)
    {
        $data["user_id"] = Auth::user()->id;
        return Award::create($data);
    }

    public function update($id, array $data)
    {
        $record = Award::find($id);
        if (!$record) {
            return null;
        }

        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        $record = Award::find($id);
        if (!$record) {
            return false;
        }
        return $record->delete();
    }
}
