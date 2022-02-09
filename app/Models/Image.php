<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'image'
    ];

    /**
     * Get the Job that owns the image.
     */
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
