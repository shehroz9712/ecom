<?php

// app/Models/State.php

namespace App\Models;

use App\Traits\HasQueryFilters;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    use HasQueryFilters, SoftDeletes;

    protected $fillable = [
        'name',
        'country_id',
        'status',
    ];
    public static function allowedColumns(): array
    {
        return [
            'name',
            'country_id',
            'status',
        ];
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
