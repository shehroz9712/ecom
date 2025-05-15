<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function values()
    {
        return $this->hasMany(AttributeValue::class);
    }
}
