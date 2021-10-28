<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Job;
use Illuminate\Http\Request;

class EngineerController extends Controller
{
    // Show all engineers screen
    public function index()
    {
        $engineers = User::where('is_admin', 0)->get()->all();
        $jobs = Job::get()->all();
        return view('engineers.index', compact('engineers', 'jobs'));
    }

    // Show Selected Engineer 
    public function show($engineer)
    {
        $theengineer = User::where('id', $engineer)->firstOrFail();
        $jobs = Job::where('engineer_id', $engineer)->get();
        return view('engineers.show', compact('theengineer', 'jobs'));
    }

    // Update User
    public function update(Request $request, $engineer)
    {
        // Find the engineer to update
        $theengineer = User::where('id', $engineer)->firstOrFail();

        // Validate the fields
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$engineer,
            'phone'=> 'min:10|nullable',
            'device_id'=> 'nullable',
        ]);
        
        
        // Handle the data
        $theengineer->name = $request->name;
        $theengineer->email = $request->email;
        $theengineer->phone = $request->phone;
        $theengineer->device_id = $request->device_id;

        // Update the engineer
        $theengineer->update($validatedData);

        return back()->withSuccess($request->name .' has been Updated');
    }
}
