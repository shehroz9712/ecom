<?php

namespace App\Repositories;

use App\Models\DigitalSignature;
use App\Repositories\Interfaces\DigitalSignatureRepositoryInterface;

class DigitalSignatureRepository implements DigitalSignatureRepositoryInterface
{
    public function getAll($params = [])
    {
        $query = DigitalSignature::filterAndFetch($params);
        return $query;
    }

    public function getActiveAll($params = [])
    {
        $query = DigitalSignature::active()->filterAndFetch($params);
        return $query;
    }

    public function findById($id)
    {
        return DigitalSignature::find($id);
    }

    public function create(array $data)
    {
        return DigitalSignature::create($data);
    }

    public function update($id, array $data)
    {
        $record = DigitalSignature::find($id);
        if (!$record) {
            return null;
        }
        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        $record = DigitalSignature::find($id);
        if (!$record) {
            return false;
        }
        return $record->delete();
    }
}
