<?php

namespace App\Repositories;

use App\Models\Education;
use App\Repositories\Interfaces\EducationRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class EducationRepository implements EducationRepositoryInterface
{
    public function getAll($params = [])
    {
        $query = Education::filterAndFetch($params);
        return $query;
    }

    public function getActiveAll($params = [])
    {
        $query = Education::active()->filterAndFetch($params);
        return $query;
    }

    public function findById($id)
    {
        return Education::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();
    }

    public function create(array $data)
    {
        $data["user_id"] = Auth::user()->id;


        return Education::create($data);
    }

    public function update($id, array $data)
    {
        $record = Education::find($id);
        if (!$record) {
            return null;
        }

        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        $record = Education::find($id);
        if (!$record) {
            return false;
        }
        return $record->delete();
    }
}
