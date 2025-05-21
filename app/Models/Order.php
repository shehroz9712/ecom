<?php

namespace App\Models;

use App\Traits\HasQueryFilters;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderDetail;
use App\Enums\Status;

class Order extends Model
{
    use HasFactory, SoftDeletes, HasQueryFilters;


    protected $casts = [
        'status' => Status::class,
    ];

    protected $guarded = [];
    protected $appends = ['creator_name', 'editor_name'];

    public static function allowedColumns(): array
    {
        return [
            'invoice_number',
            'currency',
            'discount_amount',
            'fees_amount',
            'subtotal',
            'total_amount',
            'description',
            'payment_type',
            'card_holder_email',
            'address',
            'postal_code',
            'city',
            'state',
            'country',
            'decline_issue',
            'coupon_code',
            'coupon_discount_percent',
            'used_coins',
            'template_id',
            'is_resume_template',
            'is_cover_template',
        ];
    }
    protected static function boot()
    {
        parent::boot();

        // Automatically set `created_by` when creating
        static::creating(function ($model) {
            $model->created_by = Auth::id() ?? 1; // Default to 1 if no auth user (for testing)
            $model->user_id = Auth::id() ?? 1; // Default to 1 if no auth user (for testing)
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

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
}
