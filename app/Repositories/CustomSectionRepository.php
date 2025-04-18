<?php

namespace App\Repositories;

use App\Models\CustomSection;
use App\Repositories\Interfaces\CustomSectionRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class CustomSectionRepository implements CustomSectionRepositoryInterface
{
    public function getAll($params = [])
    {
        $query = CustomSection::filterAndFetch($params);
        return $query;
    }

    public function getActiveAll($params = [])
    {
        $query = CustomSection::active()->filterAndFetch($params);
        return $query;
    }
    public function findById($id)
    {
        return CustomSection::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();
    }

    public function create(array $data)
    {
        $data["user_id"] = Auth::user()->id;
        return CustomSection::create($data);
    }

    public function update($id, array $data)
    {
        $record = CustomSection::find($id);
        if (!$record) {
            return null;
        }
        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        $record = CustomSection::find($id);
        if (!$record) {
            return false;
        }
        return $record->delete();
    }
}
