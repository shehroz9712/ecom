<?php

namespace App\Repositories;

use App\Models\Package;
use App\Repositories\Interfaces\PackageRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class PackageRepository implements PackageRepositoryInterface
{
    public function getAll($params = [])
    {
        $query = Package::filterAndFetch($params);
        return $query;
    }

    public function getActiveAll($params = [])
    {
        $query = Package::active()->filterAndFetch($params);
        return $query;
    }
    public function findById($id)
    {
        return Package::find($id);
    }

    public function create(array $data)
    {
        $data["user_id"] = Auth::user()->id;


        return Package::create($data);
    }

    public function update($id, array $data)
    {
        $record = Package::find($id);
        if (!$record) {
            return null;
        }

        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        $record = Package::find($id);
        if (!$record) {
            return false;
        }
        return $record->delete();
    }
}
