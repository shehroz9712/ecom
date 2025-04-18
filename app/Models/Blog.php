<?php

namespace App\Models;


use App\Traits\HasQueryFilters;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory, SoftDeletes, HasQueryFilters;

    protected $guarded = [];
    protected $appends = ['creator_name', 'editor_name', 'blog_image','author_profile']; // Update here

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_by = Auth::id() ?? 1;
            $model->user_id = Auth::id() ?? 1;

            if (empty($model->slug)) {
                $baseSlug = Str::slug($model->title);
                $slug = $baseSlug;
                $counter = 1;

                while (Blog::where('slug', $slug)->exists()) {
                    $slug = $baseSlug . '-' . $counter++;
                }

                $model->slug = $slug;
            }
        });

        static::updating(function ($model) {
            $model->updated_by = Auth::id();

                $baseSlug = Str::slug($model->title);
                $slug = $baseSlug;
                $counter = 1;

                while (Blog::where('slug', $slug)->exists()) {
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
        return $this->belongsTo(Media::class, 'image');
    }

    public function getBlogImageAttribute()
    {
        return $this->imageMedia?->name ??  $this->imageMedia?->url;
    }

    public function authorImageMedia()
    {
        return $this->belongsTo(Media::class, 'author_image');
    }

    public function getAuthorProfileAttribute()
    {
        return $this->authorImageMedia?->name ??  $this->authorImageMedia?->url;
    }

}
