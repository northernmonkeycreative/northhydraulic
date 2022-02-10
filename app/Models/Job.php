<?php

namespace App\Models;

use App\Models\Engineercontrolsheet;
use App\Models\Lifttestcertificatesheet;
use App\Models\Winchtestcertificatesheet;
use App\Models\LiftingVariouscertificatesheet;
use App\Models\Thouroughinspectionsheet;
use App\Models\Cranetestcertificatesheet;
use App\Models\Image;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'customer_name',
        'department',
        'start',
        'start_time',
        'start_date',
        'site_address',
        'site_contact',
        'vehicle',
        'reg',
        'mileage',
        'purchase_order_number',
        'details',
        'internal_notes',
        'engineer_id',
        'engineer_name',
        'status',
        'invoice_number',
        'title',
        'customer_address'
    ];

    /**
     * Get the engineer control sheets for the job.
     */
    public function engineercontrolsheets()
    {
        return $this->hasMany(Engineercontrolsheet::class);
    }

    /**
     * Get the lift test certificate sheets for the job.
     */
    public function lifttestcertificatessheets()
    {
        return $this->hasMany(Lifttestcertificatesheet::class);
    }

    /**
     * Get the lift test certificate sheets for the job.
     */
    public function winchtestcertificatessheets()
    {
        return $this->hasMany(Winchtestcertificatesheet::class);
    }

    /**
     * Get the lifting Various certificate sheets for the job.
     */
    public function liftingvarioustestcertificatessheets()
    {
        return $this->hasMany(LiftingVariouscertificatesheet::class);
    }

    /**
     * Get the thourough inspection sheets for the job.
     */
    public function thouroughinspectionsheets()
    {
        return $this->hasMany(Thouroughinspectionsheet::class);
    }

    /**
     * Get the crane tst certificate sheets for the job.
     */
    public function cranetestcertificatessheets()
    {
        return $this->hasMany(Cranetestcertificatesheet::class);
    }

     /**
     * Get the images for the job.
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }

}
