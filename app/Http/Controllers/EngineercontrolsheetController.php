<?php

namespace App\Http\Controllers;
use App\Models\Job;
use App\Models\Setting;
use App\Models\Engineercontrolsheet;
use App\Models\Client;
use Illuminate\Http\Request;
use PDF;


class EngineercontrolsheetController extends Controller
{
    // Show Selected Job Sheet 
    public function show($jobsheet)
    {

        // Get The Selected Job Sheet
        $thejobsheet = Engineercontrolsheet::where('id', $jobsheet)->firstOrFail();


        // get customer signature to embed
        $customersignature = $thejobsheet->customer_signature;

        // Get the job this job sheet belongs to - to grab other details
        $thejob = Job::where('id', $thejobsheet->job_id)->firstOrFail();

        // Get the job this job sheet belongs to - to grab other details
        $theclient = Client::where('id', $thejob->customer_id)->firstOrFail();

        return view('jobsheets.engineercontrolsheet', compact('thejobsheet', 'thejob', 'theclient', 'customersignature'));
    }

    // Show Edit Job Sheet Screen
    public function edit(Request $request, $jobsheet)
    {

        $thejobsheet = Engineercontrolsheet::where('id', $jobsheet)->firstOrFail();
        $thejob = Job::where('id', $thejobsheet->job_id)->firstOrFail();
        return view('jobsheets.editcontrolsheet', compact('thejobsheet', 'thejob'));
        
    }

     // Update Jobsheet
     public function update(Request $request, $jobsheet)
     {
 
         $thejobsheet = Engineercontrolsheet::where('id', $jobsheet)->firstOrFail();
 
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
         $thejobsheet = Engineercontrolsheet::where('job_id', $thejob->id)->firstOrFail();

         // Get the job this job sheet belongs to - to grab other details
        $theclient = Client::where('id', $thejob->customer_id)->firstOrFail();

        // Check if job needs further action - to determinw what text to print out on PDF
        if($thejobsheet->further_action == '' || $thejobsheet->further_action == null) {
            $furtheraction = 'No Further Action Required';
        } else {
            $furtheraction = $thejobsheet->further_action;
        }

        // Prepare the data for the PDF
        $data = [
            'companyname' => $settings->company_name,
            'companyemail' => $settings->company_email,
            'companyphone' => $settings->company_phone,
            'companyaddress' => $settings->company_address,
            'companypostcode' => $settings->company_postcode,
            'jobnumber' => $thejob->id,
            'startdate' => $thejob->start,
            'engineer' => $thejob->engineer_name,
            'customer' => $theclient->company_name,
            'customeraddress' => $theclient->site_address,
            'vehiclereg' => $thejob->reg,
            'vehicledescription' => $thejob->vehicle,
            'actiontaken' => $thejobsheet->action_taken,
            'partsused' => $thejobsheet->parts_used,
            'furtheraction' => $furtheraction,
            // 'customersignature' => $thejobsheet->customer_signature,
            'customersignature' => $thejobsheet->customer_signature,
            'customersignaturedate' => $thejobsheet->customer_signature_date,
        ];

        //dd($data);
          
        $pdf = PDF::loadView('jobsheets.pdf.engineercontrolsheetpdf', $data);
    
        return $pdf->download('engineercontrolsheet.pdf');
    }
}
