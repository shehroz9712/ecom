<?php

namespace App\Repositories;

use App\Models\Blog;
use App\Repositories\Interfaces\BlogRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class BlogRepository implements BlogRepositoryInterface
{
    

    public function getAll($params = [])
    {
        $query = Blog::filterAndFetch($params);
        return $query;
    }

    public function getActiveAll($params = [])
    {
        $query = Blog::active()->filterAndFetch($params);
        return $query;
    }
    public function findById($id)
    {
        return Blog::where('id', $id)
            ->first();
    }

    public function create(array $data)
    {
        return Blog::create($data);
    }

    public function update($id, array $data)
    {
        $record = Blog::where('id', $id)
            ->first();
        if (!$record) {
            return null;
        }
        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        $record = Blog::where('id', $id)
            ->first();
        if (!$record) {
            return false;
        }
        return $record->delete();
    }
}
