<?php

namespace App\Models;

use App\Traits\HasQueryFilters;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Enums\Status;

class Certification extends Model
{

    use HasFactory, SoftDeletes, HasQueryFilters;


    protected $fillable = [
        'title',
        'description',
        'institute',
        'date',
        'sort',
        'user_id',
        'status',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'status' => Status::class,
    ];


    protected $guarded = [];
    protected $appends = ['creator_name', 'editor_name'];
    protected static function boot()
    {
        parent::boot();

        // Automatically set `created_by` when creating
        static::creating(function ($model) {
            $model->created_by = Auth::id() ?? 1; // Default to 1 if no auth user (for testing)
            $model->user_id = Auth::id() ?? 1; // Default to 1 if no auth user (for testing)
        });

        // Automatically set `updated_by` when updating
        static::updating(function ($model) {
            $model->updated_by = Auth::id();
        });
    }
    public static function allowedColumns(): array
    {
        return [
            'title',
            'description',
            'institute',
            'date',
            'sort',
            'status',
        ];
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

    public function resumeDetails()
    {
        return $this->morphMany(ResumeDetail::class, 'shareable');
    }
}
