<?php

namespace App\Models;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cranetestcertificatesheet extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'date_last_tested',
        'vehicle_make',
        'vehicle_model',
        'vehicle_reg',
        'vehicle_chass_no',
        'vehicle_mileage',
        'crane_position',
        'crane_make',
        'crane_model',
        'crane_serial',
        'crane_manufacture_year',
        'crane_lifting_duties',
        'rotator_make',
        'rotator_model',
        'rotator_serial',
        'grab_make',
        'grab_model',
        'grab_serial',
        'bucket_make',
        'bucket_model',
        'bucket_serial',
        'load_radius',
        'safe_working_load',
        'test_load',
        'overload',
        'test1',
        'test1_workdone',
        'test2',
        'test2_workdone',
        'test3',
        'test3_workdone',
        'test4',
        'test4_workdone',
        'test5',
        'test5_workdone',
        'test6',
        'test6_workdone',
        'test7',
        'test7_workdone',
        'test8',
        'test8_workdone',
        'test9',
        'test9_workdone',
        'test10',
        'test10_workdone',
        'test11',
        'test11_workdone',
        'test12',
        'test12_workdone',
        'test13',
        'test13_workdone',
        'test14',
        'test14_workdone',
        'test15',
        'test15_workdone',
        'advisory',
        'date_tested',
        'engineer_signature',
    ];

    /**
     * Get the Job that owns the engineer control sheet.
     */
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
