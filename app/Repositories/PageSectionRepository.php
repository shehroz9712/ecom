<?php

namespace App\Repositories;

use App\Models\PageSection;
use App\Repositories\Interfaces\PageSectionRepositoryInterface;

class PageSectionRepository implements PageSectionRepositoryInterface
{
    public function getAll($page = null, $limit = 10, $search = [], $where = [], $order = 'created_at', $direction = 'DESC')
    {
        $return = PageSection::with('page')
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
        return $page ? PageSection::active()->paginate($page) : PageSection::active()->latest()->get();
    }

    public function findById($id)
    {
        return PageSection::with('page')->find($id);
    }

    public function create(array $data)
    {
        return PageSection::create($data);
    }

    public function update($id, array $data)
    {

        $record = PageSection::find($id);
        if (!$record) {
            return null;
        }
        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        $record = PageSection::find($id);
        if (!$record) {
            return false;
        }
        return $record->delete();
    }
}
