<?php

namespace App\Repositories;

use App\Models\Page;
use App\Repositories\Interfaces\PageRepositoryInterface;

class PageRepository implements PageRepositoryInterface
{
    public function getAll($page = null, $limit = 10, $search = [], $where = [], $order = 'created_at', $direction = 'DESC')
    {
        $return = Page::with('sections')
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
        return $page ? Page::active()->paginate($page) : Page::active()->latest()->get();
    }

    public function findById($id)
    {
        return Page::with('sections')->find($id);
    }

    public function create(array $data)
    {
        return Page::create($data);
    }

    public function update($id, array $data)
    {
        $record = Page::find($id);
        if (!$record) {
            return null;
        }
        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        $record = Page::find($id);
        if (!$record) {
            return false;
        }
        return $record->delete();
    }
}
