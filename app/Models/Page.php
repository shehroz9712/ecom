<?php

namespace App\Models;

use App\Traits\HasQueryFilters;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Page extends Model
{
    use HasFactory, HasQueryFilters;

    protected $guarded = [];
    protected $appends = ['creator_name', 'editor_name', 'page_image_url']; // Add 'page_image_url' to be appended

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

                while (Page::where('slug', $slug)->exists()) {
                    $slug = $baseSlug . '-' . $counter++;
                }

                $model->slug = $slug;
            }
        });

        // Automatically set `updated_by` when updating
        static::updating(function ($model) {
            $model->updated_by = Auth::id();

            if (!empty($model->title)) {
                $baseSlug = Str::slug($model->title);
                $slug = $baseSlug;
                $counter = 1;

                while (Page::where('slug', $slug)->where('id', '!=', $model->id)->exists()) {
                    $slug = $baseSlug . '-' . $counter++;
                }

                $model->slug = $slug;
            }
        });
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

    public function getPageImageUrlAttribute()
    {
        $media = $this->imageMedia;
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

    public function imageMedia()
    {
        return $this->belongsTo(Media::class, 'page_image');
    }

    public function sections()
    {
        return $this->hasMany(PageSection::class);
    }
}
