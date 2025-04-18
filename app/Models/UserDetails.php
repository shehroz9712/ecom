<?php

namespace App\Models;

use App\Traits\HasQueryFilters;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class UserDetails extends Model
{
    use HasFactory, HasQueryFilters, SoftDeletes;

    protected $guarded = [];
    // protected $appends = ['creator_name', 'editor_name'];
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
    protected static function boot()
    {
        parent::boot();
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
