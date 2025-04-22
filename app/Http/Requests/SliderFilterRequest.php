<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Slider;

class SliderFilterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function allowedColumns()
    {
        return \App\Models\Slider::allowedColumns();
    }

    public function rules()
    {
        return [
            'search'    => 'sometimes|array',
            'search.*'  => 'sometimes|string|nullable|in:' . implode(',', $this->allowedColumns()),

            'where'     => 'sometimes|array',
            'where.*'   => 'sometimes|string|nullable|in:' . implode(',', $this->allowedColumns()),

            'order_by'  => 'string|in:' . implode(',', $this->allowedColumns()),
            'direction' => 'in:asc,desc',
            'limit'     => 'integer|min:1|max:100',
            'paginate'  => 'boolean',
        ];
    }


    // Process validated parameters for safe use in query
    public function validatedParams()
    {
        $validated = $this->validated();

        // Filter only allowed columns from search and where
        $allowed = $this->allowedColumns();

        $search = collect($validated['search'] ?? [])
            ->only($allowed)
            ->toArray();

        $where = collect($validated['where'] ?? [])
            ->only($allowed)
            ->toArray();

        return [
            'search'    => $search,
            'where'     => $where,
            'order_by'  => $validated['order_by'] ?? 'created_at',
            'direction' => $validated['direction'] ?? 'desc',
            'limit'     => $validated['limit'] ?? 15,
            'paginate'  => $validated['paginate'] ?? true,
        ];
    }
}
