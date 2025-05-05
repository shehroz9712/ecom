<?php

namespace App\Repositories;

use App\Models\City;
use App\Repositories\Interfaces\CityRepositoryInterface;

class CityRepository implements CityRepositoryInterface
{
  
    public function getAll($params = [])
    {

        $query = City::filterAndFetch($params);


        return $query;
    }

    public function getActiveAll($params = [])
    {
        $query = City::filterAndFetch($params)->active();
        return $query;
    }



    public function findById($id)
    {
        return City::find($id);
    }

    public function create(array $data)
    {
        return City::create($data);
    }

    public function update($id, array $data)
    {
        $record = City::find($id);
        if (!$record) {
            return null;
        }
        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        $record = City::find($id);
        if (!$record) {
            return false;
        }
        return $record->delete();
    }
}
