<?php

namespace App\Repositories;

use App\Models\Vendor;
use App\Repositories\Interfaces\VendorRepositoryInterface;

class VendorRepository implements VendorRepositoryInterface
{
  
    public function getAll($params = [])
    {

        $query = Vendor::filterAndFetch($params);


        return $query;
    }

    public function getActiveAll($params = [])
    {
        $query = Vendor::filterAndFetch($params)->active();
        return $query;
    }



    public function findById($id)
    {
        return Vendor::find($id);
    }

    public function create(array $data)
    {
        return Vendor::create($data);
    }

    public function update($id, array $data)
    {
        $record = Vendor::find($id);
        if (!$record) {
            return null;
        }
        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        $record = Vendor::find($id);
        if (!$record) {
            return false;
        }
        return $record->delete();
    }
}
