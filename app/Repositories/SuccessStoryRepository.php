<?php

namespace App\Repositories;

use App\Models\SuccessStory;
use App\Repositories\Interfaces\SuccessStoryRepositoryInterface;

class SuccessStoryRepository implements SuccessStoryRepositoryInterface
{
    public function getAll($page = null, $limit = 10, $search = [], $where = [], $order = 'created_at', $direction = 'DESC',$status=1)
    {
        $return = SuccessStory::query()
            ->where('status', $status)
            ->when(!empty($search), function ($query) use ($search) {
                foreach ($search as $key => $value) {
                    $query->where($key, 'like', "%{$value}%");
                }
            })
            ->when(!empty($where), function ($query) use ($where) {
                foreach ($where as $key => $value) {
                    $query->where($key, $value);
                }
            })
            ->orderBy($order, $direction)
            ->when($page, fn($query) => $query->paginate($limit), fn($query) => $query->limit($limit)->get());

        return $return;
    }

    public function getActiveAll($page = null)
    {
        return $page ? SuccessStory::active()->paginate($page) : SuccessStory::active()->latest()->get();
    }

    public function findById($id)
    {
        return SuccessStory::find($id);
    }

    public function create(array $data)
    {
        return SuccessStory::create($data);
    }

    public function update($id, array $data)
    {
        $record = SuccessStory::find($id);
        if (!$record) {
            return null;
        }
        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        $record = SuccessStory::find($id);
        if (!$record) {
            return false;
        }
        return $record->delete();
    }
}
