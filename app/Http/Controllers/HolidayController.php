<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Notification;
// use App\Notifications\JobAdded;
// use App\Models\Image;
use Redirect,Response;

class HolidayController extends Controller
{
    // Show Holiday Screen
    public function index(Request $request)
    {

        if($request->ajax()) {  

            $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
            $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
 
         $data = Holiday::whereDate('start', '>=', $start)
         ->whereDate('start', '<=', $end)
         ->get(['id','title','start','end','start_time','type', 'start_date', 'end_date','end_time']);
     
 
        //  $data = Holiday::get(['id','title','start','start_time']);



         return Response::json($data);
        
     
        }
        
        return view('holidays.index');
    }



     // Save holiday
     public function store(Request $request)
     {
       
//   dd($request);

             $validated = $request->validate([
                 'title' => 'required',
                 'start_date' => 'required',
             ]);
 
             
             $holiday = new Holiday([
                 'start' => $request->start_date .' '. $request->start_time.':00',
                 'end' => $request->end_date .' '. $request->end_time.':00',
                 'title' => $request->title,
                 'start_date' => $request->start_date,
                 'start_time' => $request->start_time,
                 'end_date' => $request->end_date,
                 'end_time' => $request->end_time,
             ]);
         
         
 
         
 
             
         
 
         $holiday->save();
 
         // Send Email to Engineer About Job
         // Notification::send($engineer, new JobAdded($job));
 
         return redirect('dashboard')->withSuccess('New Holiday has been Created');
     }






     // Show Edit holiday Screen
    public function edit(Request $request, $holiday)
    {

        $theholiday = Holiday::where('id', $holiday)->firstOrFail();
        return view('holidays.edit', compact('theholiday'));
        
    }


    // Update Holiday
    public function update(Request $request, $holiday)
    {


        $theholiday = holiday::where('id', $holiday)->first();


        $validated = $request->validate([
            'title' => 'required',
            'start_date' => 'required',
        ]);

        $theholiday->start = $request->start_date .' '. $request->start_time.':00';
        $theholiday->end = $request->end_date .' '. $request->end_time.':00';
        $theholiday->start_date = $request->start_date;
        $theholiday->end_date = $request->end_date;
        $theholiday->start_time = $request->start_time;
        $theholiday->end_time = $request->end_time;
        $theholiday->title = $request->title;
        

        $theholiday->save();
        return back()->withSuccess('Holiday has been Updated');
    }


}
