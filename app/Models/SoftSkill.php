<?php

namespace App\Models;

use App\Traits\HasQueryFilters;
use Illuminate\Database\Eloquent\Model;

class SoftSkill extends Model
{

    use HasQueryFilters;

    protected $fillable = [
        'name',
        'status',
    ];
    public static function allowedColumns(): array
    {
        return [
            'name',
            'status',
        ];
    }
    public function userSkills()
    {
        return $this->morphMany(UserSkill::class, 'skillable');
    }
}
