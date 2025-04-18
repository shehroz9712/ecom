<?php

namespace App\Repositories;

use App\Models\Summary;
use App\Repositories\Interfaces\SummaryRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class SummaryRepository implements SummaryRepositoryInterface
{
    public function getAll($params = [])
    {
        $query = Summary::filterAndFetch($params);
        return $query;
    }

    public function getActiveAll($params = [])
    {
        $query = Summary::active()->filterAndFetch($params);
        return $query;
    }
    public function findById($id)
    {
        return Summary::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();
    }

    public function create(array $data)
    {
        $data['user_id'] = Auth::user()->id;
        return Summary::create($data);
    }

    public function update($id, array $data)
    {
        $record = Summary::find($id);
        if (!$record) {
            return null;
        }
        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        $record = Summary::find($id);
        if (!$record) {
            return false;
        }
        return $record->delete();
    }
}
