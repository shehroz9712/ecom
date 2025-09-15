<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariant extends Model
{
    use SoftDeletes;

    protected $fillable = ['product_id', 'sku', 'price', 'sale_price', 'stock', 'is_default'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function attributes()
    {
        return $this->hasMany(ProductVariantAttribute::class);
    }

    public function attributeValues()
    {
        return $this->belongsToMany(AttributeValue::class, 'product_variant_attributes');
    }

    public function getFinalPriceAttribute()
    {
        $price = $this->sale_price ?? $this->price;

        $activeCampaign = $this->product->campaigns()
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

        return $price;
    }
    public function getSalePriceAttribute($value)
    {
        return $this->getFinalPriceAttribute();
    }
    // 👉 Discount percentage (optional)
    public function getDiscountAttribute()
    {
        $basePrice = $this->price;
        $finalPrice = $this->final_price;

        if ($finalPrice < $basePrice) {
            return round((($basePrice - $finalPrice) / $basePrice) * 100, 2);
        }

        return 0;
    }
}
