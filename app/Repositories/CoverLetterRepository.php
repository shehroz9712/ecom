<?php

namespace App\Repositories;

use App\Models\CoverLetter;
use App\Repositories\Interfaces\CoverLetterRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class CoverLetterRepository implements CoverLetterRepositoryInterface
{
  
    public function getAll($params = [])
    {
        $query = CoverLetter::filterAndFetch($params);
        return $query;
    }

    public function getActiveAll($params = [])
    {
        $query = CoverLetter::active()->filterAndFetch($params);
        return $query;
    }
    public function findById($id)
    {
        return CoverLetter::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();
    }

    public function create(array $data)
    {
        $data['user_id'] = Auth::user()->id;
        return CoverLetter::create($data);
    }

    public function update($id, array $data)
    {
        $record = CoverLetter::find($id);
        if (!$record) {
            return null;
        }
        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        $record = CoverLetter::find($id);
        if (!$record) {
            return false;
        }
        return $record->delete();
    }
}
