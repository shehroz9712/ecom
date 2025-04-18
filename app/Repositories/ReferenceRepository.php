<?php

namespace App\Repositories;

use App\Models\Reference;
use App\Repositories\Interfaces\ReferenceRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ReferenceRepository implements ReferenceRepositoryInterface
{
    public function getAll($params = [])
    {
        $query = Reference::filterAndFetch($params);
        return $query;
    }

    public function getActiveAll($params = [])
    {
        $query = Reference::active()->filterAndFetch($params);
        return $query;
    }

    public function findById($id)
    {
        return Reference::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();
    }

    public function create(array $data)
    {
        $data["user_id"] = Auth::user()->id;
        return Reference::create($data);
    }

    public function update($id, array $data)
    {
        $record = Reference::find($id);
        if (!$record) {
            return null;
        }

        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        $record = Reference::find($id);
        if (!$record) {
            return false;
        }
        return $record->delete();
    }
}
