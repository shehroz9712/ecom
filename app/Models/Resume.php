<?php

namespace App\Models;

use App\Traits\HasQueryFilters;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Resume extends Model
{
    use HasFactory, HasQueryFilters, SoftDeletes;

    protected $guarded = [];
    protected $appends = ['creator_name', 'editor_name'];
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

        // Automatically set `created_by` when creating
        static::creating(function ($model) {
            $model->created_by = Auth::id() ?? 1; // Default to 1 if no auth user (for testing)
        });

        // Automatically set `updated_by` when updating
        static::updating(function ($model) {
            $model->updated_by = Auth::id();
        });
    }
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    public function editor()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
    public function getCreatorNameAttribute()
    {
        return $this->creator?->name ?? 'N/A';
    }

    public function getEditorNameAttribute()
    {
        return $this->editor?->name ?? 'N/A';
    }

    public function resume_details()
    {
        return $this->hasMany(ResumeDetail::class, 'resume_id');
    }
}
