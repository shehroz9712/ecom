<?php

namespace App\Models;

use App\Traits\HasQueryFilters;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResumeDetail extends Model
{
    use HasFactory, HasQueryFilters, SoftDeletes;
    protected $fillable = [
        'resume_id',
        'shareable_type',
        'shareable_id',
        'created_by',
        'updated_by',
    ];

    public static function allowedColumns(): array
    {
        return [
            'resume_id',
            'shareable_type',
            'shareable_id',
            'created_by',
            'updated_by',
        ];
    }
    public function shareable()
    {
        return $this->morphTo();
    }
}
