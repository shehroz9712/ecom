<?php

namespace App\Models;

use App\Traits\HasQueryFilters;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Enums\Status;

class ReviewImages extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'image', 'created_at', 'review_id', 'updated_at']; // Replace with actual column names


}
