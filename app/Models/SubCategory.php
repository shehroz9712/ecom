<?php

namespace App\Models;

use App\Enums\Status;

use App\Traits\HasQueryFilters;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use HasFactory, SoftDeletes, HasQueryFilters;

    protected $guarded = [];
    protected $casts = [
        'status' => Status::class,
    ];
    public function scopeActive($query)
    {
        return $query->where('status', Status::Active);
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
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function items()
    {
        return $this->hasMany(SubCategoryItem::class)->orderBy('order');
    }

    public function activeItems()
    {
        return $this->hasMany(SubCategoryItem::class)->active()->orderBy('order');
    }
}
