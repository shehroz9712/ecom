<?php

namespace App\Repositories;

use App\Models\Review;
use App\Repositories\Interfaces\ReviewRepositoryInterface;

class ReviewRepository implements ReviewRepositoryInterface
{
  
    public function getAll($params = [])
    {

        $query = Review::filterAndFetch($params);


        return $query;
    }

    public function getActiveAll($params = [])
    {
        $query = Review::filterAndFetch($params)->active();
        return $query;
    }



    public function findById($id)
    {
        return Review::find($id);
    }

    public function create(array $data)
    {
        return Review::create($data);
    }

    public function update($id, array $data)
    {
        $record = Review::find($id);
        if (!$record) {
            return null;
        }
        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        $record = Review::find($id);
        if (!$record) {
            return false;
        }
        return $record->delete();
    }
}
