<?php

namespace App\Repositories;

use App\Models\Slider;
use App\Repositories\Interfaces\SliderRepositoryInterface;

class SliderRepository implements SliderRepositoryInterface
{
  
    public function getAll($params = [])
    {

        $query = Slider::filterAndFetch($params);


        return $query;
    }

    public function getActiveAll($params = [])
    {
        $query = Slider::filterAndFetch($params)->active();
        return $query;
    }



    public function findById($id)
    {
        return Slider::find($id);
    }

    public function create(array $data)
    {
        return Slider::create($data);
    }

    public function update($id, array $data)
    {
        $record = Slider::find($id);
        if (!$record) {
            return null;
        }
        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        $record = Slider::find($id);
        if (!$record) {
            return false;
        }
        return $record->delete();
    }
}
