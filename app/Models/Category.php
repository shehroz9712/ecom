<?php

namespace App\Models;

use App\Enums\Status;
use App\Traits\HasQueryFilters;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes, HasQueryFilters;

    protected $guarded = [];
    protected $casts = [
        'status' => Status::class,
    ];
    public function scopeActive($query)
    {
        return $query->where('status', Status::Active);
    }
    public function subCategories()
    {
        return $this->hasMany(SubCategory::class)->orderBy('order');
    }

    public function activeSubCategories()
    {
        return $this->hasMany(SubCategory::class)->active()->orderBy('order');
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    
}
