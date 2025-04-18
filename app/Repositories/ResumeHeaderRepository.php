<?php

namespace App\Repositories;

use App\Models\ResumeHeader;
use App\Repositories\Interfaces\ResumeHeaderRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ResumeHeaderRepository implements ResumeHeaderRepositoryInterface
{
    public function getAll($params = [])
    {
        $query = ResumeHeader::filterAndFetch($params);
        return $query;
    }

    public function getActiveAll($params = [])
    {
        $query = ResumeHeader::active()->filterAndFetch($params);
        return $query;
    }
    public function findById($id)
    {
        return ResumeHeader::find($id);
    }

    public function create(array $data)
    {
        $data['user_id'] = Auth::user()->id;
        return ResumeHeader::create($data);
    }

    public function update($id, array $data)
    {
        $record = ResumeHeader::find($id);
        if (!$record) {
            return null;
        }
        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        $record = ResumeHeader::find($id);
        if (!$record) {
            return false;
        }
        return $record->delete();
    }
}
