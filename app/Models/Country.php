<?php

// app/Models/Country.php

namespace App\Models;

use App\Traits\HasQueryFilters;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes,HasQueryFilters;

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
    public function states()
    {
        return $this->hasMany(State::class);
    }
}
