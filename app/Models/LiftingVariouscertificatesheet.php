<?php

namespace App\Models;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiftingVariouscertificatesheet extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_location',
        'date_last_exam',
        'cert_no',
        'vehicle_make',
        'vehicle_model',
        'vehicle_reg',
        'vehicle_vin',
        'lifting_description',
        'lifting_model',
        'lifting_serial',
        'lifting_year',
        'lifting_safe_working_load',
        'details',
        'engineer_signature',
        'engineer_name',
        'date_of_exam',
        'date_next_exam'
    ];

    /**
     * Get the Job that owns the engineer control sheet.
     */
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
