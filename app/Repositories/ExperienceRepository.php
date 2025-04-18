<?php

namespace App\Repositories;

use App\Models\Experience;
use App\Repositories\Interfaces\ExperienceRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ExperienceRepository implements ExperienceRepositoryInterface
{
    public function getAll($params = [])
    {
        $query = Experience::filterAndFetch($params);
        return $query;
    }

    public function getActiveAll($params = [])
    {
        $query = Experience::active()->filterAndFetch($params);
        return $query;
    }
    public function findById($id)
    {
        return Experience::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();
    }

    public function create(array $data)
    {
        $data["user_id"] = Auth::user()->id;

        return Experience::create($data);
    }

    public function update($id, array $data)
    {
        $record = Experience::find($id);
        if (!$record) {
            return null;
        }

        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        $record = Experience::find($id);
        if (!$record) {
            return false;
        }
        return $record->delete();
    }
}
