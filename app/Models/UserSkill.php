<?php

namespace App\Models;

use App\Traits\HasQueryFilters;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Enums\Status;

class UserSkill extends Model
{
    use HasFactory, SoftDeletes, HasQueryFilters;

    protected $fillable = [
        'skillable_type',
        'skillable_id',
        'user_id',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'status' => Status::class,
    ];


    protected $guarded = [];
    // protected $appends = ['creator_name', 'editor_name'];
    public static function allowedColumns(): array
    {
        return [
            'skillable_type',
            'skillable_id',
            'user_id',
        ];
    }
    protected static function boot()
    {
        parent::boot();

        // Automatically set `created_by` when creating
        // static::creating(function ($model) {
        //     $model->created_by = Auth::id() ?? 1; // Default to 1 if no auth user (for testing)
        // });

        // // Automatically set `updated_by` when updating
        // static::updating(function ($model) {
        //     $model->updated_by = Auth::id();
        // });
    }
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }


    // public function creator()
    // {
    //     return $this->belongsTo(User::class, 'created_by', 'id');
    // }
    // public function editor()
    // {
    //     return $this->belongsTo(User::class, 'updated_by', 'id');
    // }
    // public function getcreatornameattribute()
    // {
    //     return $this->creator?->name ?? 'n/a';
    // }

    // public function geteditornameattribute()
    // {
    //     return $this->editor?->name ?? 'n/a';
    // }

    public function skillable()
    {
        return $this->morphTo();
    }
}
