<?php

namespace App\Repositories;

use App\Models\Brand;
use App\Repositories\Interfaces\BrandRepositoryInterface;

class BrandRepository implements BrandRepositoryInterface
{
  
    public function getAll($params = [])
    {

        $query = Brand::filterAndFetch($params);


        return $query;
    }

    public function getActiveAll($params = [])
    {
        $query = Brand::filterAndFetch($params)->active();
        return $query;
    }



    public function findById($id)
    {
        return Brand::find($id);
    }

    public function create(array $data)
    {
        return Brand::create($data);
    }

    public function update($id, array $data)
    {
        $record = Brand::find($id);
        if (!$record) {
            return null;
        }
        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        $record = Brand::find($id);
        if (!$record) {
            return false;
        }
        return $record->delete();
    }
}
