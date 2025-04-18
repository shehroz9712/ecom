<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasQueryFilters
{
    public static function filterAndFetch(array $params = [])
    {
        $query = static::query(); // Static reference to the model

        // 1. LIKE Filters
        if (!empty($params['search'])) {
            foreach ($params['search'] as $key => $value) {
                if ($value !== null && $value !== '') {
                    $query->where($key, 'like', '%' . $value . '%');
                }
            }
        }

        // 2. WHERE Filters
        if (!empty($params['where'])) {
            foreach ($params['where'] as $key => $value) {
                if ($value !== null && $value !== '') {
                    $query->where($key, $value);
                }
            }
        }

        // 3. Order By
        $orderBy = $params['order_by'] ?? 'created_at';
        $direction = $params['direction'] ?? 'desc';
        $query->orderBy($orderBy, $direction);

        // 4. Limit & Pagination
        $limit = $params['limit'] ?? 15;
        $paginate = $params['paginate'] ?? true;

        return $paginate
            ? $query->paginate($limit)
            : $query->limit($limit)->get();
    }
}
