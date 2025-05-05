<?php

namespace App\Repositories;

use App\Models\State;
use App\Repositories\Interfaces\StateRepositoryInterface;

class StateRepository implements StateRepositoryInterface
{
  
    public function getAll($params = [])
    {

        $query = State::filterAndFetch($params);


        return $query;
    }

    public function getActiveAll($params = [])
    {
        $query = State::filterAndFetch($params)->active();
        return $query;
    }



    public function findById($id)
    {
        return State::find($id);
    }

    public function create(array $data)
    {
        return State::create($data);
    }

    public function update($id, array $data)
    {
        $record = State::find($id);
        if (!$record) {
            return null;
        }
        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        $record = State::find($id);
        if (!$record) {
            return false;
        }
        return $record->delete();
    }
}
