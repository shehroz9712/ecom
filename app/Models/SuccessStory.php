<?php

namespace App\Models;

use App\Traits\HasQueryFilters;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class SuccessStory extends Model
{
    use HasFactory, HasQueryFilters, SoftDeletes;

    protected $guarded = [];
    protected $appends = ['creator_name', 'editor_name','user_image'];
    protected static function boot()
    {
        parent::boot();

        // Automatically set `created_by` when creating
        static::creating(function ($model) {
            $model->created_by = Auth::id() ?? 1; // Default to 1 if no auth user (for testing)

            if (empty($model->slug)) {
                $baseSlug = Str::slug($model->title);
                $slug = $baseSlug;
                $counter = 1;

                while (SuccessStory::where('slug', $slug)->exists()) {
                    $slug = $baseSlug . '-' . $counter++;
                }

                $model->slug = $slug;
            }
        });

        // Automatically set `updated_by` when updating
        static::updating(function ($model) {
            $model->updated_by = Auth::id();

                $baseSlug = Str::slug($model->title);
                $slug = $baseSlug;
                $counter = 1;

                while (SuccessStory::where('slug', $slug)->exists()) {
                    $slug = $baseSlug . '-' . $counter++;
                }

                $model->slug = $slug;
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

    public function imageMedia()
    {
        return $this->belongsTo(Media::class, 'image','id');
    }

    public function getUserImageAttribute()
    {
        if ($this->imageMedia) {
            return $this->imageMedia->name ?? $this->imageMedia->name ?? $this->imageMedia->url;
        }
    }
}
