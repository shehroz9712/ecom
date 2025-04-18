<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function tour()
    {
        return $this->belongsTo(ToursAndTransfer::class, 'tour_id');
    }
}
