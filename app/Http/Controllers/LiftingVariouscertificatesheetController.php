<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\LiftingVariouscertificatesheet;
use App\Models\Client;
use PDF;

class LiftingVariouscertificatesheetController extends Controller
{
    // Show Selected Job Sheet 
    public function show($jobsheet)
    {

        // Get The Selected Job Sheet
        $thejobsheet = LiftingVariouscertificatesheet::where('id', $jobsheet)->firstOrFail();

        // Get the job this job sheet belongs to - to grab other details
        $thejob = Job::where('id', $thejobsheet->job_id)->firstOrFail();

        // Get the job this job sheet belongs to - to grab other details
        $theclient = Client::where('id', $thejob->customer_id)->firstOrFail();

         // get signature to embed
         $signature = $thejobsheet->engineer_signature;

        return view('jobsheets.liftvarioustestcertificatesheet', compact('thejobsheet', 'thejob', 'theclient', 'signature'));
    }

    // Show Edit Job Sheet Screen
    public function edit(Request $request, $jobsheet)
    {

        $thejobsheet = LiftingVariouscertificatesheet::where('id', $jobsheet)->firstOrFail();
        $thejob = Job::where('id', $thejobsheet->job_id)->firstOrFail();
        return view('jobsheets.editvarious', compact('thejobsheet', 'thejob'));
        
    }

    // Update Jobsheet
    public function update(Request $request, $jobsheet)
    {

        $thejobsheet = LiftingVariouscertificatesheet::where('id', $jobsheet)->firstOrFail();

        $input = $request->all();
        $thejobsheet->fill($input)->save();

        $thejobsheet->save();
        return back()->withSuccess('Jobsheet has been Updated');
    }

    public function exportpdf($job, $jobsheet) {

        // Get Settings to use
        $settings = Setting::get()->first();

         // Get the job this job sheet belongs to - to grab other details
         $thejob = Job::where('id', $job)->firstOrFail();

         // The Job Sheet
         $thejobsheet = LiftingVariouscertificatesheet::where('id', $jobsheet)->firstOrFail();

         // Get the job this job sheet belongs to - to grab other details
        $theclient = Client::where('id', $thejob->customer_id)->firstOrFail();

        // Prepare the data for the PDF
        $data = [
            'companyname' => $settings->company_name,
            'companyemail' => $settings->company_email,
            'companyphone' => $settings->company_phone,
            'companyaddress' => $settings->company_address,
            'companypostcode' => $settings->company_postcode,
            'jobnumber' => $thejob->id,
            'engineer' => $thejob->engineer_name,
            'customer' => $theclient->company_name,
            'customeraddress' => $theclient->site_address,
            'exam_location' => $thejobsheet->exam_location,
            'date_last_exam' => $thejobsheet->date_last_exam,
            'cert_no' => $thejobsheet->cert_no,
            'vehicle_make' => $thejobsheet->vehicle_make,
            'vehicle_model' => $thejobsheet->vehicle_model,
            'vehicle_reg' => $thejobsheet->vehicle_reg,
            'vehicle_vin' => $thejobsheet->vehicle_vin,
            'lifting_description' => $thejobsheet->lifting_description,
            'lifting_model' => $thejobsheet->lifting_model,
            'lifting_serial' => $thejobsheet->lifting_serial,
            'lifting_year' => $thejobsheet->lifting_year,
            'lifting_safe_working_load' => $thejobsheet->lifting_safe_working_load,
            'details' => $thejobsheet->details,
            'engineer_signature' => $thejobsheet->engineer_signature,
            'engineer_name' => $thejobsheet->engineer_name,
            'date_of_exam' => $thejobsheet->date_of_exam,
            'date_next_exam' => $thejobsheet->date_next_exam,

        
        ];
          
        $pdf = PDF::loadView('jobsheets.pdf.liftvarioustestcertificatesheetpdf', $data);
    
        return $pdf->download('liftvarioustestcertificatesheet.pdf');
    }
}
