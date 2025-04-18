<?php

namespace App\Observers;

use App\Models\ResumeDetail;
use App\Models\Resume;

class ResumeDetailObserver
{
    public function created($model)
    {
        // Find user resume
        $resume = Resume::where('user_id', $model->user_id)->first();
        
        if ($resume) {
            ResumeDetail::create([
                'resume_id' => $resume->id,
                'shareable_type' => get_class($model),
                'shareable_id' => $model->id,
                'created_by' => $model->user_id,
                'updated_by' => $model->user_id,
            ]);
        }
    }
}
