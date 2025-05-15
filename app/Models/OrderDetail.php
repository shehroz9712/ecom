<?php

namespace App\Models;

use App\Traits\HasQueryFilters;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory, HasQueryFilters;


    protected $guarded = [];

    public static function allowedColumns(): array
    {
        return [
            'order_id',
            'service_id',
            'cart_id',
            'price',
            'media_id',
            'is_revision',
        ];
    }
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
