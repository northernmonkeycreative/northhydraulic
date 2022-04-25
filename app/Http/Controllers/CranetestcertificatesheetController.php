<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\Cranetestcertificatesheet;
use App\Models\Client;
use PDF;

class CranetestcertificatesheetController extends Controller
{
    // Show Selected Job Sheet 
    public function show($jobsheet)
    {

        // Get The Selected Job Sheet
        $thejobsheet = Cranetestcertificatesheet::where('id', $jobsheet)->firstOrFail();

        // Get the job this job sheet belongs to - to grab other details
        $thejob = Job::where('id', $thejobsheet->job_id)->firstOrFail();

        // Get the job this job sheet belongs to - to grab other details
        $theclient = Client::where('id', $thejob->customer_id)->firstOrFail();

        // get signature to embed
        $signature = $thejobsheet->engineer_signature;

        return view('jobsheets.cranetestcertificatesheet', compact('thejobsheet', 'thejob', 'theclient', 'signature'));
    }


    // Show Edit Job Sheet Screen
    public function edit(Request $request, $jobsheet)
    {

        $thejobsheet = Cranetestcertificatesheet::where('id', $jobsheet)->firstOrFail();
        $thejob = Job::where('id', $thejobsheet->job_id)->firstOrFail();
        return view('jobsheets.editcrane', compact('thejobsheet', 'thejob'));
        
    }

    // Update Jobsheet
    public function update(Request $request, $jobsheet)
    {

        $thejobsheet = Cranetestcertificatesheet::where('id', $jobsheet)->firstOrFail();

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
         $thejobsheet = Cranetestcertificatesheet::where('id', $jobsheet)->firstOrFail();

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
            'date_last_tested' => $thejobsheet->date_last_tested,
            'vehicle_make' => $thejobsheet->vehicle_make,
            'vehicle_model' => $thejobsheet->vehicle_model,
            'vehicle_reg' => $thejobsheet->vehicle_reg,
            'vehicle_chass_no' => $thejobsheet->vehicle_chass_no,
            'vehicle_mileage' => $thejobsheet->vehicle_mileage,
            'crane_position' => $thejobsheet->crane_position,
            'crane_make' => $thejobsheet->crane_make,
            'crane_model' => $thejobsheet->crane_model,
            'crane_serial' => $thejobsheet->crane_serial,
            'crane_manufacture_year' => $thejobsheet->crane_manufacture_year,
            'crane_lifting_duties' => $thejobsheet->crane_lifting_duties,
            'rotator_make' => $thejobsheet->rotator_make,
            'rotator_model' => $thejobsheet->rotator_model,
            'rotator_serial' => $thejobsheet->rotator_serial,
            'grab_make' => $thejobsheet->grab_make,
            'grab_model' => $thejobsheet->grab_model,
            'grab_serial' => $thejobsheet->grab_serial,
            'bucket_make' => $thejobsheet->bucket_make,
            'bucket_model' => $thejobsheet->bucket_model,
            'bucket_serial' => $thejobsheet->bucket_serial,
            'load_radius' => $thejobsheet->load_radius,
            'safe_working_load' => $thejobsheet->safe_working_load,
            'test_load' => $thejobsheet->test_load,
            'overload' => $thejobsheet->overload,
            'test1' => $thejobsheet->test1,
            'test1_workdone' => $thejobsheet->test1_workdone,
            'test2' => $thejobsheet->test2,
            'test2_workdone' => $thejobsheet->test2_workdone,
            'test3' => $thejobsheet->test3,
            'test3_workdone' => $thejobsheet->test3_workdone,
            'test4' => $thejobsheet->test4,
            'test4_workdone' => $thejobsheet->test4_workdone,
            'test5' => $thejobsheet->test5,
            'test5_workdone' => $thejobsheet->test5_workdone,
            'test6' => $thejobsheet->test6,
            'test6_workdone' => $thejobsheet->test6_workdone,
            'test7' => $thejobsheet->test7,
            'test7_workdone' => $thejobsheet->test7_workdone,
            'test8' => $thejobsheet->test8,
            'test8_workdone' => $thejobsheet->test8_workdone,
            'test9' => $thejobsheet->test9,
            'test9_workdone' => $thejobsheet->test9_workdone,
            'test10' => $thejobsheet->test10,
            'test10_workdone' => $thejobsheet->test10_workdone,
            'test11' => $thejobsheet->test11,
            'test11_workdone' => $thejobsheet->test11_workdone,
            'test12' => $thejobsheet->test12,
            'test12_workdone' => $thejobsheet->test12_workdone,
            'test13' => $thejobsheet->test13,
            'test13_workdone' => $thejobsheet->test13_workdone,
            'test14' => $thejobsheet->test14,
            'test14_workdone' => $thejobsheet->test14_workdone,
            'test15' => $thejobsheet->test15,
            'test15_workdone' => $thejobsheet->test15_workdone,
            'advisory' => $thejobsheet->advisory,
            'date_tested' => $thejobsheet->date_tested,
            'engineer_signature' => $thejobsheet->engineer_signature,

        
        ];
          
        $pdf = PDF::loadView('jobsheets.pdf.cranetestcertificatesheetpdf', $data);
    
        return $pdf->download('cranetestcertificatesheet.pdf');
    }
}
