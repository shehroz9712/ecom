<?php

namespace App\Repositories;

use App\Models\Service;
use App\Models\Media;
use App\Repositories\Interfaces\ServiceRepositoryInterface;

class ServiceRepository implements ServiceRepositoryInterface
{
    public function getAll($params = [])
    {
        $query = Service::filterAndFetch($params);
        return $query;
    }

    public function getActiveAll($params = [])
    {
        $query = Service::active()->filterAndFetch($params);
        return $query;
    }
    public function findById($id)
    {
        return Service::find($id);
    }

    public function create(array $data)
    {
        return Service::create($data);
    }

    public function update($id, array $data)
    {
        $record = Service::find($id);
        if (!$record) {
            return null;
        }
        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        $record = Service::find($id);
        if (!$record) {
            return false;
        }
        return $record->delete();
    }
}
