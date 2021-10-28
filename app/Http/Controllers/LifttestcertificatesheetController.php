<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\Lifttestcertificatesheet;
use App\Models\Client;
use PDF;

class LifttestcertificatesheetController extends Controller
{
    // Show Selected Job Sheet 
    public function show($jobsheet)
    {

        // Get The Selected Job Sheet
        $thejobsheet = Lifttestcertificatesheet::where('id', $jobsheet)->firstOrFail();

        // Get the job this job sheet belongs to - to grab other details
        $thejob = Job::where('id', $thejobsheet->job_id)->firstOrFail();

        // Get the job this job sheet belongs to - to grab other details
        $theclient = Client::where('id', $thejob->customer_id)->firstOrFail();

        return view('jobsheets.lifttestcertificatesheet', compact('thejobsheet', 'thejob', 'theclient'));
    }

    // Show Edit Job Sheet Screen
    public function edit(Request $request, $jobsheet)
    {

        $thejobsheet = Lifttestcertificatesheet::where('id', $jobsheet)->firstOrFail();
        $thejob = Job::where('id', $thejobsheet->job_id)->firstOrFail();
        return view('jobsheets.editlift', compact('thejobsheet', 'thejob'));
        
    }

    // Update Jobsheet
    public function update(Request $request, $jobsheet)
    {

        $thejobsheet = Lifttestcertificatesheet::where('id', $jobsheet)->firstOrFail();

        $input = $request->all();
        $thejobsheet->fill($input)->save();

        $thejobsheet->save();
        return back()->withSuccess('Jobsheet has been Updated');
    }

    public function exportpdf($job) {

        // Get Settings to use
        $settings = Setting::get()->first();

         // Get the job this job sheet belongs to - to grab other details
         $thejob = Job::where('id', $job)->firstOrFail();

         // The Job Sheet
         $thejobsheet = Lifttestcertificatesheet::where('job_id', $thejob->id)->firstOrFail();

         // Get the job this job sheet belongs to - to grab other details
        $theclient = Client::where('id', $thejob->customer_id)->firstOrFail();

        // Check if job needs further action - to determinw what text to print out on PDF
        if($thejobsheet->advisory_notes == '' || $thejobsheet->advisory_notes == null) {
            $advisory_notes = 'No Advisory Notes';
        } else {
            $furtheraction = $thejobsheet->advisory_notes;
        }

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
            'cert_no' => $thejobsheet->cert_no,
            'make' => $thejobsheet->make,
            'model' => $thejobsheet->model,
            'serial' => $thejobsheet->serial,
            'reg' => $thejobsheet->reg,
            'safe_working_load' => $thejobsheet->safe_working_load,
            'overload_test_applied' => $thejobsheet->overload_test_applied,
            'reset_relief_valves' => $thejobsheet->reset_relief_valves,
            'safe_working_load_test' => $thejobsheet->safe_working_load_test,
            'downward_creep' => $thejobsheet->downward_creep,
            'check_lift_mountings' => $thejobsheet->check_lift_mountings,
            'operation_swl_floorheight' => $thejobsheet->operation_swl_floorheight,
            'lift_raises_in' => $thejobsheet->lift_raises_in,
            'lift_lowers_in' => $thejobsheet->lift_lowers_in,
            'signature' => $thejobsheet->signature,
            'date_tested' => $thejobsheet->date_tested,
            'date_next_due' => $thejobsheet->date_next_due,
            'advisory_notes' => $thejobsheet->advisory_notes,
        
        ];
          
        $pdf = PDF::loadView('jobsheets.pdf.lifttestcertificatesheetpdf', $data);
    
        return $pdf->download('lifttestcertificatesheet.pdf');
    }
}
