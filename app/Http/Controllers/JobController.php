<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Notification;
use App\Notifications\JobAdded;

class JobController extends Controller
{
    // Show Jobs Screen
    public function index()
    {
        $jobs = Job::where('status', '!=', 'paid')->get();
        return view('jobs.index', compact('jobs'));
    }

    public function getpaidJobs()
    {
        $jobs = Job::where('status', 'paid')->get();
        return view('jobs.index', compact('jobs'));
    }

    // Show Selected Job 
    public function show($job)
    {
        $thejob = Job::where('id', $job)->firstOrFail();

        $engineercontrolsheets = Job::find($job)->engineercontrolsheets()->get();
        $lifttestcertificates = Job::find($job)->lifttestcertificatessheets()->get();
        $winchtestcertificates = Job::find($job)->winchtestcertificatessheets()->get();
        $liftvarioustestcertificates = Job::find($job)->liftingvarioustestcertificatessheets()->get();
        $thouroughinspections = Job::find($job)->thouroughinspectionsheets()->get();
        $cranetestcertificates = Job::find($job)->cranetestcertificatessheets()->get();

        $engineers = User::where('is_admin', 0)->get()->all();

        return view('jobs.show', compact('thejob', 'engineercontrolsheets', 'lifttestcertificates', 'winchtestcertificates', 'liftvarioustestcertificates', 'thouroughinspections', 'cranetestcertificates', 'engineers'));
    }

    // Create New Job Screen
    public function create()
    {
        $clients = Client::get()->all();
        $engineers = User::where('is_admin', 0)->get()->all();

        return view('jobs.create', compact('clients', 'engineers'));
    }


    // Save Job
    public function store(Request $request)
    {
      
        // get client name from client_id
        if($request->department == 'tradecounter') {
            

            $job = new Job([
                'customer_id' => NULL,
                'customer_name' => NULL,
                'department' => $request->department,
                'start' => $request->start_date .' '. $request->start_time.':00',
                'start_time' => $request->start_time,
                'start_date' => $request->start_date,
                'site_address' => NULL,
                'site_contact' => NULL,
                'vehicle' => $request->vehicle,
                'reg' => strtoupper($request->reg),
                'purchase_order_number' => $request->purchase_order_number,
                'details' => $request->details,
                'internal_notes' => $request->internal_notes,
                'engineer_id' => NULL,
                'engineer_name' => NULL,
                'title' => NULL,
                'status' => 'ongoing',
                'invoice_number' => $request->invoice_number,
                'customer_address' => NULL,
            ]);
        } else {

            $client = Client::where('id', $request->customer_id)->firstOrFail();
            $engineer = User::where('id', $request->engineer_id)->firstOrFail();
            $clientaddress = $client->site_address.' '.$client->postcode;

            
            $job = new Job([
                'customer_id' => $request->customer_id,
                'customer_name' => $client->company_name,
                'department' => $request->department,
                'start' => $request->start_date .' '. $request->start_time.':00',
                'start_time' => $request->start_time,
                'start_date' => $request->start_date,
                'site_address' => $request->site_address,
                'site_contact' => $request->site_contact,
                'vehicle' => $request->vehicle,
                'reg' => strtoupper($request->reg),
                'purchase_order_number' => $request->purchase_order_number,
                'details' => $request->details,
                'internal_notes' => $request->internal_notes,
                'engineer_id' => $request->engineer_id,
                'engineer_name' => $engineer->name,
                'title' => $engineer->name,
                'status' => 'ongoing',
                'invoice_number' => $request->invoice_number,
                'customer_address' => $clientaddress,
            ]);
        }
        

        


        

        $job->save();

        // Send Email to Engineer About Job
        // Notification::send($engineer, new JobAdded($job));

        return redirect('jobs')->withSuccess('New Job has been Created');
    }


    // Show Edit Job Screen
    public function edit(Request $request, $job)
    {
        $clients = Client::get()->all();
        $engineers = User::where('is_admin', 0)->get()->all();
        $thejob = Job::where('id', $job)->firstOrFail();
        return view('jobs.edit', compact('thejob', 'clients', 'engineers'));
        
    }


    // Update Job
    public function update(Request $request, $job)
    {


        $thejob = Job::where('id', $job)->firstOrFail();
        $theclient = Client::where('id', $request->customer_id)->firstOrFail();
        $engineer = User::where('id', $request->engineer_id)->firstOrFail();


        $thejob->customer_id = $request->customer_id;
        $thejob->customer_name = $theclient->company_name;
        $thejob->department = $request->department;
        $thejob->start_time = $request->start_time;
        $thejob->start = $request->start_date .' '. $request->start_time.':00';
        $thejob->start_date = $request->start_date;
        $thejob->site_address = $request->site_address;
        $thejob->site_contact = $request->site_contact;
        $thejob->vehicle = $request->vehicle;
        $thejob->reg = strtoupper($request->reg);
        $thejob->purchase_order_number = $request->purchase_order_number;
        $thejob->details = $request->details;
        $thejob->internal_notes = $request->internal_notes;
        $thejob->engineer_id = $request->engineer_id;
        $thejob->engineer_name = $engineer->name;
        $thejob->title = $engineer->name;
        if($thejob->status == 'unassinged'){
            $thejob->status = 'ongoing';
        }

        if($thejob->status == 'unassinged'){
            $thejob->status = 'ongoing';
        }

        // check if invoice number has been added
        if($request->invoice_number != ''){
            // if so, add the invoice number and update status to paid automatically
            $thejob->invoice_number = $request->invoice_number;
            $thejob->status = 'paid';
        } else {
            // else leave the invoice number empty
            $thejob->invoice_number = '';
        }
        // $thejob->invoice_number = $request->invoice_number;

        


        $thejob->save();
        return back()->withSuccess('Job has been Updated');
    }




    // Job Quick Status Update
    public function status(Request $request, $job)
    {
        // dd($request);
        $thejob = Job::where('id', $job)->firstOrFail();

        if($request->ongoing) {
            $thejob->status = 'ongoing';
        }
        if($request->furtheraction) {
            $thejob->status = 'furtheraction';
        }
        if($request->complete) {
            $thejob->status = 'complete';
        }
        if($request->invoice) {
            $thejob->status = 'invoice';
        }
        if($request->paid) {
            $thejob->status = 'Invoiced';
        }
        
        $thejob->save();
        return back()->withSuccess('Job Status has been Updated');
    }


    // Job Quick Engineer Update
    public function updateengineer(Request $request, $jobid)
    {
        
        // dd($request);
        $thejob = Job::where('id', $jobid)->firstOrFail();
        $engineer = User::where('id', $request->engineerid)->firstOrFail();

        $thejob->engineer_id = $request->engineerid;
        $thejob->engineer_name = $request->engineername;
        $thejob->title = $request->engineername;
        
        $thejob->save();

        // Send Email to Engineer About Job
        // Notification::send($engineer, new JobAdded($thejob));


        return back()->withSuccess('This Job has been Assigned To '.$request->engineername);
    }

    




    public function exportcsv(Request $request) {

        // Get all users who subscribe to newsletter
        $jobs = Job::get()->all();

        // Build the CSV
        $filename = "Jobs.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array('Job Number', 'Customer Name', 'Department', 'Start Date', 'Vehicle', 'Reg', 'purchase_order_number', 'Details', 'Engineer', 'Status'));

        foreach($jobs as $row) {
            fputcsv($handle, array($row['id'], $row['customer_name'], $row['department'], $row['start'], $row['vehicle'], $row['reg'], $row['purchase_order_number'], $row['details'], $row['engineer_name'], $row['status']));
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        // Download the CSV         
        return response()->download($filename, 'Jobs.csv', $headers);

    }

}