<?php

namespace App\Models;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Engineercontrolsheet extends Model
{
    use HasFactory;

    protected $fillable = [
        'action_taken',
        'parts_used',
        'further_action',
        'customer_signature',
        'customer_signature_date',
    ];

    /**
     * Get the Job that owns the engineer control sheet.
     */
    public function job()
    {
        return $this->belongsTo(Job::class);
    }

}
