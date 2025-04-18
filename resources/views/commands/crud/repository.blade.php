<?php

namespace App\Repositories;

use App\Models\{{name}};
use App\Repositories\Interfaces\{{name}}RepositoryInterface;

class {{name}}Repository implements {{name}}RepositoryInterface
{
  
    public function getAll($params = [])
    {

        $query = {{name}}::filterAndFetch($params);


        return $query;
    }

    public function getActiveAll($params = [])
    {
        $query = {{name}}::filterAndFetch($params)->active();
        return $query;
    }



    public function findById($id)
    {
        return {{name}}::find($id);
    }

    public function create(array $data)
    {
        return {{name}}::create($data);
    }

    public function update($id, array $data)
    {
        $record = {{name}}::find($id);
        if (!$record) {
            return null;
        }
        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        $record = {{name}}::find($id);
        if (!$record) {
            return false;
        }
        return $record->delete();
    }
}
