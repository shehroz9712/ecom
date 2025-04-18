<?php

namespace App\Repositories;

use App\Models\Project;
use App\Repositories\Interfaces\ProjectRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ProjectRepository implements ProjectRepositoryInterface
{
    public function getAll($params = [])
    {
        $query = Project::filterAndFetch($params);
        return $query;
    }

    public function getActiveAll($params = [])
    {
        $query = Project::active()->filterAndFetch($params);
        return $query;
    }

    public function findById($id)
    {
        return Project::where('id', $id)
            ->where('user_id', Auth::id())
            ->where('status', 1)
            ->first();
    }

    public function create(array $data)
    {
        $data['user_id'] = Auth::user()->id;
        return Project::create($data);
    }

    public function update($id, array $data)
    {
        $record = Project::find($id);
        if (!$record) {
            return null;
        }
        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        $record = Project::find($id);
        if (!$record) {
            return false;
        }
        return $record->delete();
    }
}
