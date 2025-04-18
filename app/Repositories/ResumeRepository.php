<?php

namespace App\Repositories;

use App\Models\Resume;
use App\Repositories\Interfaces\ResumeRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ResumeRepository implements ResumeRepositoryInterface
{
    public function getAll($params = [])
    {
        $query = Resume::filterAndFetch($params);
        return $query;
    }

    public function getActiveAll($params = [])
    {
        $query = Resume::active()->filterAndFetch($params);
        return $query;
    }

    public function findById($id)
    {
        return Resume::find($id);
    }

    public function create(array $data)
    {
        $data["user_id"] = Auth::user()->id;
        

        return Resume::create($data);
    }

    public function update($id, array $data)
    {
        $record = Resume::find($id);
        if (!$record) {
            return null;
        }
        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        $record = Resume::find($id);
        if (!$record) {
            return false;
        }
        return $record->delete();
    }
}
