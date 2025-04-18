<?php

// app/Models/City.php

namespace App\Models;

use App\Traits\HasQueryFilters;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes, HasQueryFilters;

    protected $guarded = [];

    public static function allowedColumns(): array
    {
        return [
            'name',
            'description',
            'status',
            'type',
            'duration',
            'start_date',
        ];
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
