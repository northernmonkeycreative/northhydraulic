<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Image;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Response;
use App\Models\Engineercontrolsheet;
use App\Models\Lifttestcertificatesheet;
use App\Models\LiftingVariouscertificatesheet;
use App\Models\Winchtestcertificatesheet;
use App\Models\Cranetestcertificatesheet;
use App\Models\Thouroughinspectionsheet;

class JobsController extends Controller
{


    // get single engineer control sheet
    public function uploadimages(Request $request)
    {
        $images = json_decode($request->images);
        $jobid = $request->job_id;

        $arr = $request->images;
        for ($i = 0; $i < count($arr); $i++) {
    

            $image = new Image;
                $image->job_id =$jobid ;
                $image->image = $arr[$i];
                $image->save();

        }


            // foreach($images as $i) {
            //     $image = new Image;
            //     $image->job_id =$jobid ;
            //     $image->image = $i;
            //     $image->save();
            // }
        

        

        return Response::json('ok');
        // if ($request) {
        //     return Response::json($request);
        // } else {
        //     return response()->json('Error.', 404);
        // }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $engineer = request()->user();
        // $jobs =  $user->jobs()->get();
        $jobs = Job::where('engineer_id', $engineer->id)
            ->where('department', 'mobileengineer')
            ->where('status', '!=', 'paid')
            ->where('status', '!=', 'Invoiced')
            ->orderby('start_date', 'asc')->get();
        if ($jobs->count()) {
            return Response::json($jobs);
            // return response()->json(['jobs' => $jobs], 200);
        } else {
            return response()->json('You Have No Jobs.', 404);
        }
    }

    public function jobsongoing(Request $request)
    {
        $engineer = request()->user();
        // $jobs =  $user->jobs()->get();
        $jobs = Job::where('engineer_id', $engineer->id)
            ->where('department', 'mobileengineer')
            ->where('status', '!=', 'paid')
            ->where('status', '!=', 'Invoiced')
            ->where('status', '!=', 'complete')
            ->where('status', '!=', 'furtheraction')
            ->orderby('start_date', 'asc')->get();
        if ($jobs->count()) {
            return Response::json($jobs);
            // return response()->json(['jobs' => $jobs], 200);
        } else {
            return response()->json('No Ongoing Jobs.', 404);
        }
    }

    public function jobsfurtheraction(Request $request)
    {
        $engineer = request()->user();
        // $jobs =  $user->jobs()->get();
        $jobs = Job::where('engineer_id', $engineer->id)
            ->where('department', 'mobileengineer')
            ->where('status', '!=', 'paid')
            ->where('status', '!=', 'Invoiced')
            ->where('status', '!=', 'complete')
            ->where('status', '!=', 'ongoing')
            ->orderby('start_date', 'asc')->get();
        if ($jobs->count()) {
            return Response::json($jobs);
            // return response()->json(['jobs' => $jobs], 200);
        } else {
            return response()->json('No Further Action Jobs.', 404);
        }
    }

    public function jobscomplete(Request $request)
    {
        $engineer = request()->user();
        // $jobs =  $user->jobs()->get();
        $jobs = Job::where('engineer_id', $engineer->id)
            ->where('department', 'mobileengineer')
            ->where('status', '!=', 'paid')
            ->where('status', '!=', 'Invoiced')
            ->where('status', '!=', 'ongoing')
            ->where('status', '!=', 'furtheraction')
            ->orderby('start_date', 'asc')->get();
        if ($jobs->count()) {
            return Response::json($jobs);
            // return response()->json(['jobs' => $jobs], 200);
        } else {
            // return response()->json(['error' => 'No Complete Jobs.'], 401);
            return response()->json('No Complete Jobs.', 404);
        }
    }

    // get all engineer control sheets from job ID
    public function engineercontrolsheets(Request $request, $id)
    {
        $thejob = Job::where('id', $id)->firstOrFail();
        // get the engineer control sheets for the job
        $engineercontrolsheets = $thejob->engineercontrolsheets()->get();
        // return the job sheets
        if ($engineercontrolsheets->count()) {
            return Response::json($engineercontrolsheets);
            // return response()->json(['jobs' => $jobs], 200);
        } else {
            return response()->json('No Engineer Control Sheets.', 404);
        }
    }

    // get single engineer control sheet
    public function engineercontrolsheet(Request $request, $id)
    {
        $engineercontrolsheet = Engineercontrolsheet::where('id', $id)->firstOrFail();

        if ($engineercontrolsheet) {
            return Response::json($engineercontrolsheet);
        } else {
            return response()->json('Engineer Control Sheet cannot be found.', 404);
        }

    }

    // update single engineer control sheet
    public function updateengineercontrolsheet(Request $request, $id)
    {
        $engineercontrolsheet = Engineercontrolsheet::where('id', $id)->firstOrFail();
        $engineercontrolsheet->action_taken = $request->action_taken;
        $engineercontrolsheet->parts_used = $request->parts_used;
        $engineercontrolsheet->further_action = $request->further_action;
        $engineercontrolsheet->customer_signature = $request->customer_signature;
        $engineercontrolsheet->customer_signature_date = $request->customer_signature_date;
        $engineercontrolsheet->save();


        if ($engineercontrolsheet) {
            return Response::json('Sheet Has Been Updated Successfully');
        } else {
            return response()->json('Error Updating The Control Sheet.', 404);
        }

    }

    // Add single engineer control sheet
    public function addengineercontrolsheet(Request $request)
    {
        $engineercontrolsheet = new Engineercontrolsheet($request->all());
        $input = $request->all();
        $engineercontrolsheet->fill($input)->save();
        $engineercontrolsheet->save();

        if ($engineercontrolsheet) {
            return Response::json('Sheet Saved Successfully');
        } else {
            return response()->json('Error Adding The Control Sheet.', 404);
        }

    }






    // get all Lift Test sheets from job ID
    public function lifttestsheets(Request $request, $id)
    {
        $thejob = Job::where('id', $id)->firstOrFail();
        // get the engineer control sheets for the job
        $lifttestcertificatesheets = $thejob->lifttestcertificatessheets()->get();
        // return the job sheets
        if ($lifttestcertificatesheets->count()) {
            return Response::json($lifttestcertificatesheets);
            // return response()->json(['jobs' => $jobs], 200);
        } else {
            return response()->json('No Engineer Control Sheets.', 404);
        }
    }

    // get single Lift Test sheet
    public function lifttestsheet(Request $request, $id)
    {
        $lifttestcertificatesheet = Lifttestcertificatesheet::where('id', $id)->firstOrFail();

        if ($lifttestcertificatesheet) {
            return Response::json($lifttestcertificatesheet);
        } else {
            return response()->json('Lift Test Sheet cannot be found.', 404);
        }

    }

    // update single Lift Test sheet
    public function updatelifttestsheet(Request $request, $id)
    {
        $lifttestcertificatesheet = Lifttestcertificatesheet::where('id', $id)->firstOrFail();
        $lifttestcertificatesheet->cert_no = $request->cert_no;
        $lifttestcertificatesheet->make = $request->make;
        $lifttestcertificatesheet->model = $request->model;
        $lifttestcertificatesheet->serial = $request->serial;
        $lifttestcertificatesheet->reg = $request->reg;
        $lifttestcertificatesheet->safe_working_load = $request->safe_working_load;
        $lifttestcertificatesheet->overload_test_applied = $request->overload_test_applied;
        $lifttestcertificatesheet->reset_relief_valves = $request->reset_relief_valves;
        $lifttestcertificatesheet->safe_working_load_test = $request->safe_working_load_test;
        $lifttestcertificatesheet->downward_creep = $request->downward_creep;
        $lifttestcertificatesheet->check_lift_mountings = $request->check_lift_mountings;
        $lifttestcertificatesheet->operation_swl_floorheight = $request->operation_swl_floorheight;
        $lifttestcertificatesheet->lift_raises_in = $request->lift_raises_in;
        $lifttestcertificatesheet->lift_lowers_in = $request->lift_lowers_in;
        $lifttestcertificatesheet->signature = $request->signature;
        $lifttestcertificatesheet->date_tested = $request->date_tested;
        $lifttestcertificatesheet->date_next_due = $request->date_next_due;
        $lifttestcertificatesheet->advisory_notes = $request->advisory_notes;
        // Save
        $lifttestcertificatesheet->save();


        if ($lifttestcertificatesheet) {
            return Response::json('Sheet Has Been Updated Successfully');
        } else {
            return response()->json('Error Updating The Control Sheet.', 404);
        }

    }

    // Add single lift test sheet
    public function addlifttestsheet(Request $request)
    {
        $lifttestcertificatesheet = new Lifttestcertificatesheet($request->all());
        $input = $request->all();
        $lifttestcertificatesheet->fill($input)->save();
        $lifttestcertificatesheet->save();

        if ($lifttestcertificatesheet) {
            return Response::json('Sheet Saved Successfully');
        } else {
            return response()->json('Error Adding The Control Sheet.', 404);
        }

    }








    // get all Lift Various sheets from job ID
    public function liftvariousheets(Request $request, $id)
    {
        $thejob = Job::where('id', $id)->firstOrFail();
     // get the engineer control sheets for the job
        $liftvariouscertificatesheets = $thejob->liftingvarioustestcertificatessheets()->get();
     // return the job sheets
        if ($liftvariouscertificatesheets->count()) {
            return Response::json($liftvariouscertificatesheets);
         // return response()->json(['jobs' => $jobs], 200);
        } else {
            return response()->json('No Engineer Control Sheets.', 404);
        }
    }

    // get single Lift Various sheet
    public function liftvarioussheet(Request $request, $id)
    {
        $liftvariouscertificatesheet = LiftingVariouscertificatesheet::where('id', $id)->firstOrFail();

        if ($liftvariouscertificatesheet) {
            return Response::json($liftvariouscertificatesheet);
        } else {
            return response()->json('Lift Various Sheet cannot be found.', 404);
        }

    }

    // update single Lift Test sheet
    public function updateliftvarioussheet(Request $request, $id)
    {
        $liftvariouscertificatesheet = LiftingVariouscertificatesheet::where('id', $id)->firstOrFail();
        $liftvariouscertificatesheet->exam_location = $request->exam_location;
        $liftvariouscertificatesheet->cert_no = $request->cert_no;
        $liftvariouscertificatesheet->vehicle_make = $request->vehicle_make;
        $liftvariouscertificatesheet->vehicle_model = $request->vehicle_model;
        $liftvariouscertificatesheet->vehicle_reg = $request->vehicle_reg;
        $liftvariouscertificatesheet->vehicle_vin = $request->vehicle_vin;
        $liftvariouscertificatesheet->lifting_description = $request->lifting_description;
        $liftvariouscertificatesheet->lifting_model = $request->lifting_model;
        $liftvariouscertificatesheet->lifting_serial = $request->lifting_serial;
        $liftvariouscertificatesheet->lifting_year = $request->lifting_year;
        $liftvariouscertificatesheet->lifting_safe_working_load = $request->lifting_safe_working_load;
        $liftvariouscertificatesheet->details = $request->details;
        $liftvariouscertificatesheet->engineer_signature = $request->engineer_signature;
        $liftvariouscertificatesheet->engineer_name = $request->engineer_name;
        $liftvariouscertificatesheet->date_last_exam = $request->date_last_exam;
        $liftvariouscertificatesheet->date_of_exam = $request->date_of_exam;
        $liftvariouscertificatesheet->date_next_exam = $request->date_next_exam;

     // Save
        $liftvariouscertificatesheet->save();


        if ($liftvariouscertificatesheet) {
            return Response::json('Sheet Has Been Updated Successfully');
        } else {
            return response()->json('Error Updating The Control Sheet.', 404);
        }

    }

    // Add single lift various sheet
    public function addliftvarioussheet(Request $request)
    {
        $liftvariouscertificatesheet = new LiftingVariouscertificatesheet($request->all());
        $input = $request->all();
        $liftvariouscertificatesheet->fill($input)->save();
        $liftvariouscertificatesheet->save();

        if ($liftvariouscertificatesheet) {
            return Response::json('Sheet Saved Successfully');
        } else {
            return response()->json('Error Adding The Control Sheet.', 404);
        }

    }






     // get all Winch Test sheets from job ID
    public function winchtestsheets(Request $request, $id)
    {
        $thejob = Job::where('id', $id)->firstOrFail();
         // get the engineer control sheets for the job
        $winchtestcertificatessheets = $thejob->winchtestcertificatessheets()->get();
         // return the job sheets
        if ($winchtestcertificatessheets->count()) {
            return Response::json($winchtestcertificatessheets);
             // return response()->json(['jobs' => $jobs], 200);
        } else {
            return response()->json('No Winch Test Sheets.', 404);
        }
    }
 
     // get single Winch Test sheet
    public function winchtestsheet(Request $request, $id)
    {
        $winchtestcertificatessheet = Winchtestcertificatesheet::where('id', $id)->firstOrFail();

        if ($winchtestcertificatessheet) {
            return Response::json($winchtestcertificatessheet);
        } else {
            return response()->json('Winch Test Sheet cannot be found.', 404);
        }

    }
 
     // update single Winch Test sheet
    public function updatewinchtestsheet(Request $request, $id)
    {
        $winchtestcertificatessheet = Winchtestcertificatesheet::where('id', $id)->firstOrFail();
        $winchtestcertificatessheet->exam_location = $request->exam_location;
        $winchtestcertificatessheet->cert_no = $request->cert_no;
        $winchtestcertificatessheet->vehicle_make = $request->vehicle_make;
        $winchtestcertificatessheet->vehicle_model = $request->vehicle_model;
        $winchtestcertificatessheet->vehicle_reg = $request->vehicle_reg;
        $winchtestcertificatessheet->vehicle_serial = $request->vehicle_serial;
        $winchtestcertificatessheet->lifting_description = $request->lifting_description;
        $winchtestcertificatessheet->lifting_type = $request->lifting_type;
        $winchtestcertificatessheet->lifting_serial = $request->lifting_serial;
        $winchtestcertificatessheet->lifting_swl = $request->lifting_swl;
        $winchtestcertificatessheet->lifting_year = $request->lifting_year;
        $winchtestcertificatessheet->lifting_unladen = $request->lifting_unladen;
        $winchtestcertificatessheet->lifting_maxladen = $request->lifting_maxladen;
        $winchtestcertificatessheet->tested_at = $request->tested_at;
        $winchtestcertificatessheet->engineer_signature = $request->engineer_signature;
        $winchtestcertificatessheet->engineer_name = $request->engineer_name;
        $winchtestcertificatessheet->date_last_exam = $request->date_last_exam;
        $winchtestcertificatessheet->date_of_exam = $request->date_of_exam;
        $winchtestcertificatessheet->date_next_exam = $request->date_next_exam;
         // Save
        $winchtestcertificatessheet->save();


        if ($winchtestcertificatessheet) {
            return Response::json('Sheet Has Been Updated Successfully');
        } else {
            return response()->json('Error Updating The Winch Sheet.', 404);
        }

    }
 
     // Add single lift test sheet
    public function addwinchtestsheet(Request $request)
    {
        $winchtestcertificatessheet = new Winchtestcertificatesheet($request->all());
        $input = $request->all();
        $winchtestcertificatessheet->fill($input)->save();
        $winchtestcertificatessheet->save();

        if ($winchtestcertificatessheet) {
            return Response::json('Sheet Saved Successfully');
        } else {
            return response()->json('Error Adding The Winch Sheet.', 404);
        }

    }










    // get all crane Test sheets from job ID
    public function cranetestsheets(Request $request, $id)
    {
        $thejob = Job::where('id', $id)->firstOrFail();
         // get the engineer control sheets for the job
        $cranetestcertificatessheets = $thejob->cranetestcertificatessheets()->get();
         // return the job sheets
        if ($cranetestcertificatessheets->count()) {
            return Response::json($cranetestcertificatessheets);
             // return response()->json(['jobs' => $jobs], 200);
        } else {
            return response()->json('No Crane Test Sheets.', 404);
        }
    }
 
     // get single crane Test sheet
    public function cranetestsheet(Request $request, $id)
    {
        $cranetestcertificatessheet = Cranetestcertificatesheet::where('id', $id)->firstOrFail();

        if ($cranetestcertificatessheet) {
            return Response::json($cranetestcertificatessheet);
        } else {
            return response()->json('Crane Test Sheet cannot be found.', 404);
        }

    }
 
     // update single crane Test sheet
    public function updatecranetestsheet(Request $request, $id)
    {
        $cranetestcertificatessheet = Cranetestcertificatesheet::where('id', $id)->firstOrFail();
        $cranetestcertificatessheet->vehicle_make = $request->vehicle_make;
        $cranetestcertificatessheet->vehicle_model = $request->vehicle_model;
        $cranetestcertificatessheet->vehicle_reg = $request->vehicle_reg;
        $cranetestcertificatessheet->vehicle_chass_no = $request->vehicle_chass_no;
        $cranetestcertificatessheet->vehicle_mileage = $request->vehicle_mileage;
        $cranetestcertificatessheet->crane_position = $request->crane_position;
        $cranetestcertificatessheet->crane_make = $request->crane_make;
        $cranetestcertificatessheet->crane_model = $request->crane_model;
        $cranetestcertificatessheet->crane_serial = $request->crane_serial;
        $cranetestcertificatessheet->crane_manufacture_year = $request->crane_manufacture_year;
        $cranetestcertificatessheet->crane_lifting_duties = $request->crane_lifting_duties;
        $cranetestcertificatessheet->rotator_make = $request->rotator_make;
        $cranetestcertificatessheet->rotator_model = $request->rotator_model;
        $cranetestcertificatessheet->rotator_serial = $request->rotator_serial;
        $cranetestcertificatessheet->grab_make = $request->grab_make;
        $cranetestcertificatessheet->grab_model = $request->grab_model;
        $cranetestcertificatessheet->grab_serial = $request->grab_serial;
        $cranetestcertificatessheet->bucket_make = $request->bucket_make;
        $cranetestcertificatessheet->bucket_model = $request->bucket_model;
        $cranetestcertificatessheet->bucket_serial = $request->bucket_serial;
        $cranetestcertificatessheet->load_radius = $request->load_radius;
        $cranetestcertificatessheet->safe_working_load = $request->safe_working_load;
        $cranetestcertificatessheet->test_load = $request->test_load;
        $cranetestcertificatessheet->overload = $request->overload;
        $cranetestcertificatessheet->test1 = $request->test1;
        $cranetestcertificatessheet->test1_workdone = $request->test1_workdone;
        $cranetestcertificatessheet->test2 = $request->test2;
        $cranetestcertificatessheet->test2_workdone = $request->test2_workdone;
        $cranetestcertificatessheet->test3 = $request->test3;
        $cranetestcertificatessheet->test3_workdone = $request->test3_workdone;
        $cranetestcertificatessheet->test4 = $request->test4;
        $cranetestcertificatessheet->test4_workdone = $request->test4_workdone;
        $cranetestcertificatessheet->test5 = $request->test5;
        $cranetestcertificatessheet->test5_workdone = $request->test5_workdone;
        $cranetestcertificatessheet->test6 = $request->test6;
        $cranetestcertificatessheet->test6_workdone = $request->test6_workdone;
        $cranetestcertificatessheet->test7 = $request->test7;
        $cranetestcertificatessheet->test7_workdone = $request->test7_workdone;
        $cranetestcertificatessheet->test8 = $request->test8;
        $cranetestcertificatessheet->test8_workdone = $request->test8_workdone;
        $cranetestcertificatessheet->test9 = $request->test9;
        $cranetestcertificatessheet->test9_workdone = $request->test9_workdone;
        $cranetestcertificatessheet->test10 = $request->test10;
        $cranetestcertificatessheet->test10_workdone = $request->test10_workdone;
        $cranetestcertificatessheet->test11 = $request->test11;
        $cranetestcertificatessheet->test11_workdone = $request->test11_workdone;
        $cranetestcertificatessheet->test12 = $request->test12;
        $cranetestcertificatessheet->test12_workdone = $request->test12_workdone;
        $cranetestcertificatessheet->test13 = $request->test13;
        $cranetestcertificatessheet->test13_workdone = $request->test13_workdone;
        $cranetestcertificatessheet->test14 = $request->test14;
        $cranetestcertificatessheet->test14_workdone = $request->test14_workdone;
        $cranetestcertificatessheet->test15 = $request->test15;
        $cranetestcertificatessheet->test15_workdone = $request->test15_workdone;
        $cranetestcertificatessheet->advisory = $request->advisory;
        $cranetestcertificatessheet->engineer_signature = $request->engineer_signature;

        $cranetestcertificatessheet->date_last_tested = $request->date_last_tested;
        $cranetestcertificatessheet->date_tested = $request->date_tested;
         // Save
        $cranetestcertificatessheet->save();


        if ($cranetestcertificatessheet) {
            return Response::json('Sheet Has Been Updated Successfully');
        } else {
            return response()->json('Error Updating The Crane Sheet.', 404);
        }

    }
 
     // Add single crane test sheet
    public function addcranetestsheet(Request $request)
    {
        $cranetestcertificatessheet = new Cranetestcertificatesheet($request->all());
        $input = $request->all();
        $cranetestcertificatessheet->fill($input)->save();
        $cranetestcertificatessheet->save();

        if ($cranetestcertificatessheet) {
            return Response::json('Sheet Saved Successfully');
        } else {
            return response()->json('Error Adding The Crane Sheet.', 404);
        }

    }







    // get all Thourough Test sheets from job ID
    public function thouroughtestsheets(Request $request, $id)
    {
        $thejob = Job::where('id', $id)->firstOrFail();
         // get the engineer control sheets for the job
        $thouroughtestcertificatessheets = $thejob->thouroughinspectionsheets()->get();
         // return the job sheets
        if ($thouroughtestcertificatessheets->count()) {
            return Response::json($thouroughtestcertificatessheets);
             // return response()->json(['jobs' => $jobs], 200);
        } else {
            return response()->json('No Thourough Inspection Sheets.', 404);
        }
    }
 
     // get single Thourough Test sheet
    public function thouroughtestsheet(Request $request, $id)
    {
        $thouroughtestcertificatessheet = Thouroughinspectionsheet::where('id', $id)->firstOrFail();

        if ($thouroughtestcertificatessheet) {
            return Response::json($thouroughtestcertificatessheet);
        } else {
            return response()->json('Crane Test Sheet cannot be found.', 404);
        }

    }
 
     // update single Thourough Test sheet
    public function updatethouroughtestsheet(Request $request, $id)
    {
        $thouroughtestcertificatessheet = Thouroughinspectionsheet::where('id', $id)->firstOrFail();
        $thouroughtestcertificatessheet->date_last_inspection = $request->date_last_inspection;
        $thouroughtestcertificatessheet->vehicle_type = $request->vehicle_type;
        $thouroughtestcertificatessheet->vehicle_reg = $request->vehicle_reg;
        $thouroughtestcertificatessheet->vehicle_mileage = $request->vehicle_mileage;
        $thouroughtestcertificatessheet->date_of_man = $request->date_of_man;
        $thouroughtestcertificatessheet->platform_make = $request->platform_make;
        $thouroughtestcertificatessheet->platform_model = $request->platform_model;
        $thouroughtestcertificatessheet->platform_serial = $request->platform_serial;
        $thouroughtestcertificatessheet->date_inspection = $request->date_inspection;
        $thouroughtestcertificatessheet->swl = $request->swl;
        $thouroughtestcertificatessheet->tested_at = $request->tested_at;
        $thouroughtestcertificatessheet->work_platform_flooring = $request->work_platform_flooring;
        $thouroughtestcertificatessheet->work_platform_toeboards = $request->work_platform_toeboards;
        $thouroughtestcertificatessheet->work_platform_topguard = $request->work_platform_topguard;
        $thouroughtestcertificatessheet->work_platform_midguard = $request->work_platform_midguard;
        $thouroughtestcertificatessheet->work_platform_gates = $request->work_platform_gates;
        $thouroughtestcertificatessheet->work_platform_cagemounts = $request->work_platform_cagemounts;
        $thouroughtestcertificatessheet->work_platform_harnesspoints = $request->work_platform_harnesspoints;
        $thouroughtestcertificatessheet->structure_scissorbooms_arms = $request->structure_scissorbooms_arms;
        $thouroughtestcertificatessheet->structure_scissorbooms_pins = $request->structure_scissorbooms_pins;
        $thouroughtestcertificatessheet->structure_bushes = $request->structure_bushes;
        $thouroughtestcertificatessheet->structure_zoom = $request->structure_zoom;
        $thouroughtestcertificatessheet->structure_corrosion = $request->structure_corrosion;
        $thouroughtestcertificatessheet->structure_outriggers = $request->structure_outriggers;
        $thouroughtestcertificatessheet->structure_pothole = $request->structure_pothole;
        $thouroughtestcertificatessheet->structure_slew_ring_serviceable = $request->structure_slew_ring_serviceable;
        $thouroughtestcertificatessheet->structure_slew_ring_bolts = $request->structure_slew_ring_bolts;
        $thouroughtestcertificatessheet->structure_powertrack = $request->structure_powertrack;
        $thouroughtestcertificatessheet->os_fueltank = $request->os_fueltank;
        $thouroughtestcertificatessheet->os_controlcables = $request->os_controlcables;
        $thouroughtestcertificatessheet->os_battery = $request->os_battery;
        $thouroughtestcertificatessheet->os_battery_charger = $request->os_battery_charger;
        $thouroughtestcertificatessheet->os_pump = $request->os_pump;
        $thouroughtestcertificatessheet->os_slew_drive = $request->os_slew_drive;
        $thouroughtestcertificatessheet->os_gearbox = $request->os_gearbox;
        $thouroughtestcertificatessheet->os_hydraulic_tank = $request->os_hydraulic_tank;
        $thouroughtestcertificatessheet->os_hydraulic_filter = $request->os_hydraulic_filter;
        $thouroughtestcertificatessheet->os_hydraulic_hoses = $request->os_hydraulic_hoses;
        $thouroughtestcertificatessheet->os_control_cables = $request->os_control_cables;
        $thouroughtestcertificatessheet->os_hydraulic_cylinders_secure = $request->os_hydraulic_cylinders_secure;
        $thouroughtestcertificatessheet->os_hydraulic_cylinders_distorted = $request->os_hydraulic_cylinders_distorted;
        $thouroughtestcertificatessheet->os_platforms_levelling = $request->os_platforms_levelling;
        $thouroughtestcertificatessheet->os_drive_travel = $request->os_drive_travel;
        $thouroughtestcertificatessheet->os_brakes = $request->os_brakes;
        $thouroughtestcertificatessheet->os_tie_rods = $request->os_tie_rods;
        $thouroughtestcertificatessheet->os_wheelnuts = $request->os_wheelnuts;
        $thouroughtestcertificatessheet->control_hydraulic_valves_manual = $request->control_hydraulic_valves_manual;
        $thouroughtestcertificatessheet->control_hydraulic_valves_electric = $request->control_hydraulic_valves_electric;
        $thouroughtestcertificatessheet->control_hydraulic_check_valves = $request->control_hydraulic_check_valves;
        $thouroughtestcertificatessheet->control_hydraulic_cylinder = $request->control_hydraulic_cylinder;
        $thouroughtestcertificatessheet->control_hydraulic_emergency = $request->control_hydraulic_emergency;
        $thouroughtestcertificatessheet->control_hydraulic_system_pressures = $request->control_hydraulic_system_pressures;
        $thouroughtestcertificatessheet->control_electric_ground = $request->control_electric_ground;
        $thouroughtestcertificatessheet->control_electric_platform = $request->control_electric_platform;
        $thouroughtestcertificatessheet->control_electric_emergency = $request->control_electric_emergency;
        $thouroughtestcertificatessheet->control_electric_indicator = $request->control_electric_indicator;
        $thouroughtestcertificatessheet->control_electric_wiring = $request->control_electric_wiring;
        $thouroughtestcertificatessheet->control_electric_speed = $request->control_electric_speed;
        $thouroughtestcertificatessheet->safety_level_sensor = $request->safety_level_sensor;
        $thouroughtestcertificatessheet->safety_limit_switch = $request->safety_limit_switch;
        $thouroughtestcertificatessheet->safety_warning_lights = $request->safety_warning_lights;
        $thouroughtestcertificatessheet->safety_functional_test = $request->safety_functional_test;
        $thouroughtestcertificatessheet->safety_overload = $request->safety_overload;
        $thouroughtestcertificatessheet->safety_swl = $request->safety_swl;
        $thouroughtestcertificatessheet->safety_load_applied = $request->safety_load_applied;
        $thouroughtestcertificatessheet->additional_brakes = $request->additional_brakes;
        $thouroughtestcertificatessheet->additional_emergency = $request->additional_emergency;
        $thouroughtestcertificatessheet->additional_tow = $request->additional_tow;
        $thouroughtestcertificatessheet->additional_wheel = $request->additional_wheel;
        $thouroughtestcertificatessheet->additional_lights = $request->additional_lights;
        $thouroughtestcertificatessheet->decals_manufacture = $request->decals_manufacture;
        $thouroughtestcertificatessheet->decals_safe_load = $request->decals_safe_load;
        $thouroughtestcertificatessheet->decals_platform_instructions = $request->decals_platform_instructions;
        $thouroughtestcertificatessheet->decals_emergency = $request->decals_emergency;
        $thouroughtestcertificatessheet->decals_instruction = $request->decals_instruction;
        $thouroughtestcertificatessheet->decals_safety = $request->decals_safety;
        $thouroughtestcertificatessheet->additional_info = $request->additional_info;
        $thouroughtestcertificatessheet->engineer_signature = $request->engineer_signature;
        $thouroughtestcertificatessheet->customer_signature = $request->customer_signature;
         // Save
        $thouroughtestcertificatessheet->save();


        if ($thouroughtestcertificatessheet) {
            return Response::json('Sheet Has Been Updated Successfully');
        } else {
            return response()->json('Error Updating The Thourough Inspection Sheet.', 404);
        }

    }
 
     // Add single thourough test sheet
    public function addthouroughtestsheet(Request $request)
    {
        $thouroughtestcertificatessheet = new Thouroughinspectionsheet($request->all());
        $input = $request->all();
        $thouroughtestcertificatessheet->fill($input)->save();
        $thouroughtestcertificatessheet->save();

        if ($thouroughtestcertificatessheet) {
            return Response::json('Sheet Saved Successfully');
        } else {
            return response()->json('Error Adding The Thourough Inspection Sheet.', 404);
        }

    }
















    public function updateStatus(Request $request, $id)
    {
        $job = Job::findOrFail($id);
        $job->status = $request->status;
        $job->save();
        return response()->json(['success' => 'Job Status Updated.'], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Job::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}