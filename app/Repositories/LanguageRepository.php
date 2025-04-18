<?php

namespace App\Repositories;

use App\Models\Language;
use App\Repositories\Interfaces\LanguageRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class LanguageRepository implements LanguageRepositoryInterface
{
    public function getAll($params = [])
    {
        $query = Language::filterAndFetch($params);
        return $query;
    }

    public function getActiveAll($params = [])
    {
        $query = Language::active()->filterAndFetch($params);
        return $query;
    }
    public function findById($id)
    {
        return Language::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();
    }

    public function create(array $data)
    {
        $data["user_id"] = Auth::user()->id;
        return Language::create($data);
    }

    public function update($id, array $data)
    {
        $record = Language::find($id);
        if (!$record) {
            return null;
        }

        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        $record = Language::find($id);
        if (!$record) {
            return false;
        }
        return $record->delete();
    }
}
