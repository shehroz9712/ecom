<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
   public function products()
    {
        return $this->belongsToMany(Product::class, 'campaign_product');
    }
}
