<?php

namespace App\Models;

use App\Traits\HasQueryFilters;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Enums\Status;

class Product extends Model
{
    use HasFactory, SoftDeletes, HasQueryFilters;

    protected $guarded = []; // Replace with actual column names

    protected $append = ['main_image', 'final_price'];
    public static function allowedColumns(): array
    {
        return ['id', 'created_by', 'created_at', 'updated_by', 'updated_at'];
    }
    protected $casts = [
        'status' => Status::class,
    ];
    protected $appends = ['creator_name', 'editor_name'];
    protected static function boot()
    {
        parent::boot();

        // Automatically set `created_by` when creating
        static::creating(function ($model) {
            $model->created_by = Auth::id() ?? 1;
        });

        // Automatically set `updated_by` when updating
        static::updating(function ($model) {
            $model->updated_by = Auth::id();
        });
    }
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

    public function getMainImageAttribute()
    {
        return $this->images->where('is_main', true)->first() ?? $this->images->first();
    }

    public function getCurrentPriceAttribute()
    {
        return $this->sale_price ?? $this->price;
    }


    public function getRatingAttribute()
    {
        return $this->reviews()->avg('rating') ?? 0;
    }



    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class)->withDefault();
    }

    public function subCategoryItem()
    {
        return $this->belongsTo(SubCategoryItem::class)->withDefault();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }



    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function defaultVariant()
    {
        return $this->hasOne(ProductVariant::class)->where('is_default', true);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Accessors


    public function getInWishlistAttribute()
    {
        if (!Auth::check()) {
            return false;
        }

        return Wishlist::where('user_id', Auth::id())
            ->where('product_id', $this->id)
            ->exists();
    }
    public function campaigns()
    {
        return $this->belongsToMany(Campaign::class, 'campaign_product');
    }
    public function getFinalPriceAttribute()
    {
        $price = $this->price;
        // agar active campaign hai to uska discount apply hoga
        $activeCampaign = $this->campaigns()
            ->where('status', 'active')
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->first();


        if ($activeCampaign) {
            if ($activeCampaign->discount_type === 'percentage') {

                return $price - ($price * $activeCampaign->discount_value / 100);
            } else {
                return max(0, $price - $activeCampaign->discount_value);
            }
        }

        // agar simple sale_price di gayi hai to wo use hogi
        return $this->sale_price ?? $price;
    }
    public function getSalePriceAttribute($value)
    {
        return $this->getFinalPriceAttribute();
    }


    public function getDiscountAttribute()
    {
        $basePrice = $this->price;
        $finalPrice = $this->final_price;

        if ($finalPrice < $basePrice) {
            return round((($basePrice - $finalPrice) / $basePrice) * 100, 2);
        }

        return 0;
    }


    public function getCampaignEndDateAttribute()
    {
        $activeCampaign = $this->campaigns()
            ->where('status', 'active')
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->first();

        return $activeCampaign?->end_date;
    }
}
