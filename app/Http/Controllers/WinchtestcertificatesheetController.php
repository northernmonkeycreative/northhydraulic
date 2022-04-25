<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\Winchtestcertificatesheet;
use App\Models\Client;
use PDF;

class WinchtestcertificatesheetController extends Controller
{
    // Show Selected Job Sheet 
    public function show($jobsheet)
    {

        // Get The Selected Job Sheet
        $thejobsheet = Winchtestcertificatesheet::where('id', $jobsheet)->firstOrFail();

        // Get the job this job sheet belongs to - to grab other details
        $thejob = Job::where('id', $thejobsheet->job_id)->firstOrFail();

        // Get the job this job sheet belongs to - to grab other details
        $theclient = Client::where('id', $thejob->customer_id)->firstOrFail();

        // get signature to embed
        $signature = $thejobsheet->engineer_signature;

        return view('jobsheets.winchtestcertificatesheet', compact('thejobsheet', 'thejob', 'theclient', 'signature'));
    }

    // Show Edit Job Sheet Screen
    public function edit(Request $request, $jobsheet)
    {

        $thejobsheet = Winchtestcertificatesheet::where('id', $jobsheet)->firstOrFail();
        $thejob = Job::where('id', $thejobsheet->job_id)->firstOrFail();
        return view('jobsheets.editwinch', compact('thejobsheet', 'thejob'));
        
    }

    // Update Jobsheet
    public function update(Request $request, $jobsheet)
    {

        $thejobsheet = Winchtestcertificatesheet::where('id', $jobsheet)->firstOrFail();

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
         $thejobsheet = Winchtestcertificatesheet::where('id', $jobsheet)->firstOrFail();

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
            'vehicle_serial' => $thejobsheet->vehicle_serial,
            'lifting_description' => $thejobsheet->lifting_description,
            'lifting_type' => $thejobsheet->lifting_type,
            'lifting_serial' => $thejobsheet->lifting_serial,
            'lifting_swl' => $thejobsheet->lifting_swl,
            'lifting_year' => $thejobsheet->lifting_year,
            'lifting_unladen' => $thejobsheet->lifting_unladen,
            'lifting_maxladen' => $thejobsheet->lifting_maxladen,
            'tested_at' => $thejobsheet->tested_at,
            'engineer_signature' => $thejobsheet->engineer_signature,
            'engineer_name' => $thejobsheet->engineer_name,
            'date_of_exam' => $thejobsheet->date_of_exam,
            'date_next_exam' => $thejobsheet->date_next_exam,

        
        ];
          
        $pdf = PDF::loadView('jobsheets.pdf.winchtestcertificatesheetpdf', $data);
    
        return $pdf->download('winchtestcertificatesheet.pdf');
    }
}
