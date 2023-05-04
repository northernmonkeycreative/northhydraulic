<?php

namespace App\Http\Controllers;
use App\Models\Job;
use Illuminate\Http\Request;
use Redirect,Response;

class DashboardController extends Controller
{



    public function index(Request $request)
    {

        $jobs = Job::get()->all();
        $ongoing = Job::where('status', 'ongoing')->get()->all();
        $complete = Job::where('status', 'complete')->get()->all();
        $furtheraction = Job::where('status', 'furtheraction')->get()->all();
        $invoice = Job::where('status', 'invoice')->get()->all();
        $unassinged = Job::where('status', 'unassinged')->get()->all();
        $Invoiced = Job::where('status', 'Invoiced')->get()->all();
        
        if($request->ajax()) {  
            $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
            $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
 
         $data = Job::whereDate('start', '>=', $start)
         ->whereDate('start', '<=', $end)
         ->where('department', '!=', 'workshop')
         ->get(['id','title','start','start_time','status', 'customer_name']);

         $data2 = Job::whereDate('start', '>=', $start)
         ->whereDate('start', '<=', $end)
         ->where('department', 'workshop')
         ->get(['id','title','start','start_time','status', 'customer_name']);

         return Response::json($data);
        
     
        }
        
        return view('dashboard', compact('jobs', 'ongoing', 'complete', 'furtheraction', 'invoice', 'unassinged', 'Invoiced'));
    }

    public function workshop(Request $request)
    {

        $jobs = Job::get()->all();
        $ongoing = Job::where('status', 'ongoing')->get()->all();
        $complete = Job::where('status', 'complete')->get()->all();
        $furtheraction = Job::where('status', 'furtheraction')->get()->all();
        $invoice = Job::where('status', 'invoice')->get()->all();
        $unassinged = Job::where('status', 'unassinged')->get()->all();
        $Invoiced = Job::where('status', 'Invoiced')->get()->all();

        
        if($request->ajax()) {  
            $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
            $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
 
         $data = Job::whereDate('start', '>=', $start)
         ->whereDate('start', '<=', $end)
         ->where('department', 'workshop')
         ->get(['id','title','start','start_time','status', 'customer_name']);

         

         return Response::json($data);
        
     
        }
        
        return view('dashboard-workshop', compact('jobs', 'ongoing', 'complete', 'furtheraction', 'invoice', 'unassinged', 'Invoiced'));
    }
 
    public function calendarEvents(Request $request)
    {
 
        switch ($request->type) {
           case 'create':
              $event = Job::create([
                  'event_name' => $request->event_name,
                  'event_start' => $request->event_start,
                  'event_end' => $request->event_end,
              ]);
 
              return response()->json($event);
             break;
  
           case 'edit':
              $event = Job::find($request->id)->update([
                  'event_name' => $request->engineer_name,
                  'start' => $request->start,
                  'start_time' => $request->start_time,
                  'start_date' => $request->start_date,
                  'event_end' => $request->start,
              ]);
 
              return response()->json($event);
             break;
  
           case 'delete':
              $event = Job::find($request->id)->delete();
  
              return response()->json($event);
             break;
             
           default:
             # ...
             break;
        }
    }
    
}
