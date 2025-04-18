<?php

namespace App\Models;

use App\Traits\HasQueryFilters;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class PageSection extends Model
{
    use HasFactory, HasQueryFilters, SoftDeletes;

    protected $guarded = [];
    protected $appends = ['creator_name', 'editor_name'];
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

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function getImagesAttribute($value)
    {
        $imageItems = explode(',', $value);
    
        return collect($imageItems)->map(function ($item) {
            $item = trim($item);
            if (is_numeric($item)) {
                $media = \App\Models\Media::find($item);
    
                if ($media) {
                    if (!empty($media->url) && filter_var($media->url, FILTER_VALIDATE_URL)) {
                        return $media->url;
                    }
                    if (!empty($media->name)) {
                        return asset('storage/uploads/media/' . $media->name);
                    }
                }
                return null;
            }
            return filter_var($item, FILTER_VALIDATE_URL) ? $item : null;
        })->filter()->values()->toArray(); 
    }
    
    
}


