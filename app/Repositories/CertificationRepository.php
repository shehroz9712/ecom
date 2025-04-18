<?php

namespace App\Repositories;

use App\Models\Certification;
use App\Repositories\Interfaces\CertificationRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class CertificationRepository implements CertificationRepositoryInterface
{
  
    public function getAll($params = [])
    {
        $query = Certification::filterAndFetch($params);
        return $query;
    }

    public function getActiveAll($params = [])
    {
        $query = Certification::active()->filterAndFetch($params);
        return $query;
    }
    public function findById($id)
    {
        return Certification::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();
    }

    public function create(array $data)
    {
        $data["user_id"] = Auth::user()->id;
        return Certification::create($data);
    }

    public function update($id, array $data)
    {
        $record = Certification::find($id);
        if (!$record) {
            return null;
        }


        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        $record = Certification::find($id);
        if (!$record) {
            return false;
        }
        return $record->delete();
    }
}
