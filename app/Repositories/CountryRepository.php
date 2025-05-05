<?php

namespace App\Repositories;

use App\Models\Country;
use App\Repositories\Interfaces\CountryRepositoryInterface;

class CountryRepository implements CountryRepositoryInterface
{
  
    public function getAll($params = [])
    {

        $query = Country::filterAndFetch($params);


        return $query;
    }

    public function getActiveAll($params = [])
    {
        $query = Country::filterAndFetch($params)->active();
        return $query;
    }



    public function findById($id)
    {
        return Country::find($id);
    }

    public function create(array $data)
    {
        return Country::create($data);
    }

    public function update($id, array $data)
    {
        $record = Country::find($id);
        if (!$record) {
            return null;
        }
        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        $record = Country::find($id);
        if (!$record) {
            return false;
        }
        return $record->delete();
    }
}
