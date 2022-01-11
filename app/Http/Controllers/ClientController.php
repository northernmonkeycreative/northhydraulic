<?php

namespace App\Http\Controllers;
use App\Models\Job;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Show Clients Screen
    public function index()
    {
        $clients = Client::get()->all();
        return view('clients.index', compact('clients'));
    }

    // Create New Client Screen
    public function create()
    {
        return view('clients.create');
    }

    // Save Client
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'company_name' => 'required',
            'contact_name' => 'required',
            'contact_number' => 'required',
            'contact_email' => 'email',
            'site_name' => 'required',
            'site_address' => 'required',
            'postcode' => 'required',
            'company_notes' => 'nullable',
        ]);


        $client = Client::create($validatedData);

        return redirect('clients')->withSuccess('New Client has been Created');
    }


    // Show Selected Job 
    public function show($client)
    {
        $theclient = Client::where('id', $client)->firstOrFail();
        $jobs = Job::where('customer_id', $client)->get();
        return view('clients.show', compact('theclient', 'jobs'));
    }


    // Update Client
    public function update(Request $request, $client)
    {
        // Find the user to update
        $theclient = Client::where('id', $client)->firstOrFail();

        // Validate the fields
        $validatedData = $request->validate([
            'company_name' => 'required',
            'contact_name' => 'required',
            'contact_number' => 'required',
            'contact_email' => 'email',
            'site_name' => 'required',
            'site_address' => 'required',
            'postcode' => 'required',
            'company_notes' => 'nullable',
        ]);
        
        
        // Handle the data
        $theclient->company_name = $request->company_name;
        $theclient->contact_name = $request->contact_name;
        $theclient->contact_number = $request->contact_number;
        $theclient->contact_email = $request->contact_email;
        $theclient->site_name = $request->site_name;
        $theclient->site_address = $request->site_address;
        $theclient->postcode = $request->postcode;
        $theclient->company_notes = $request->company_notes;

        // Update the client
        $theclient->update($validatedData);

        return back()->withSuccess('This Client has been Updated');
    }


    public function exportcsv(Request $request) {

        // Get all users who subscribe to newsletter
        $clients = Client::get()->all();

        // Build the CSV
        $filename = "Clients.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array('Company Name', 'Contact Name', 'Contact Number', 'Contact Email', 'Site Name', 'Site Address', 'Postcode', 'Company Notes'));

        foreach($clients as $row) {
            fputcsv($handle, array($row['company_name'], $row['contact_name'], $row['contact_number'], $row['contact_email'], $row['site_name'], $row['site_address'], $row['postcode'], $row['company_notes']));
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        // Download the CSV         
        return response()->download($filename, 'Clients.csv', $headers);

    }
}
