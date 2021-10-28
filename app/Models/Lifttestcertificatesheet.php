<?php

namespace App\Models;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lifttestcertificatesheet extends Model
{
    use HasFactory;

    protected $fillable = [
        'cert_no',
        'make',
        'model',
        'serial',
        'reg',
        'safe_working_load',
        'overload_test_applied',
        'reset_relief_valves',
        'safe_working_load_test',
        'downward_creep',
        'check_lift_mountings',
        'operation_swl_floorheight',
        'lift_raises_in',
        'lift_lowers_in',
        'signature',
        'date_tested',
        'date_next_due',
        'advisory_notes',
    ];

    /**
     * Get the Job that owns the engineer control sheet.
     */
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}

