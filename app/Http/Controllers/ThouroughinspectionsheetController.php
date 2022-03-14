<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\Thouroughinspectionsheet;
use App\Models\Client;
use PDF;

class ThouroughinspectionsheetController extends Controller
{
    // Show Selected Job Sheet 
    public function show($jobsheet)
    {

        // Get The Selected Job Sheet
        $thejobsheet = Thouroughinspectionsheet::where('id', $jobsheet)->firstOrFail();

        // Get the job this job sheet belongs to - to grab other details
        $thejob = Job::where('id', $thejobsheet->job_id)->firstOrFail();

        // Get the job this job sheet belongs to - to grab other details
        $theclient = Client::where('id', $thejob->customer_id)->firstOrFail();

         // get engineer signature to embed
         $engineersignature = $thejobsheet->engineer_signature;

          // get customer signature to embed
          $customersignature = $thejobsheet->customer_signature;

        return view('jobsheets.thouroughinspectionsheet', compact('thejobsheet', 'thejob', 'theclient', 'engineersignature', 'customersignature'));
    }

    // Show Edit Job Sheet Screen
    public function edit(Request $request, $jobsheet)
    {

        $thejobsheet = Thouroughinspectionsheet::where('id', $jobsheet)->firstOrFail();
        $thejob = Job::where('id', $thejobsheet->job_id)->firstOrFail();
        return view('jobsheets.editthourough', compact('thejobsheet', 'thejob'));
        
    }

    // Update Jobsheet
    public function update(Request $request, $jobsheet)
    {

        $thejobsheet = Thouroughinspectionsheet::where('id', $jobsheet)->firstOrFail();

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
         $thejobsheet = Thouroughinspectionsheet::where('job_id', $thejob->id)->firstOrFail();



         if($thejobsheet->work_platform_flooring == 'y') $work_platform_flooring = 'Y';
         else if ($thejobsheet->work_platform_flooring == 'n') $work_platform_flooring = 'N';
         else $work_platform_flooring = 'N/A';

         if($thejobsheet->work_platform_toeboards == 'y') $work_platform_toeboards = 'Y';
         else if ($thejobsheet->work_platform_toeboards == 'n') $work_platform_toeboards = 'N';
         else $work_platform_toeboards = 'N/A';

         if($thejobsheet->work_platform_topguard == 'y') $work_platform_topguard = 'Y';
         else if ($thejobsheet->work_platform_topguard == 'n') $work_platform_topguard = 'N';
         else $work_platform_topguard = 'N/A';

         if($thejobsheet->work_platform_midguard == 'y') $work_platform_midguard = 'Y';
         else if ($thejobsheet->work_platform_midguard == 'n') $work_platform_midguard = 'N';
         else $work_platform_midguard = 'N/A';

         if($thejobsheet->work_platform_gates == 'y') $work_platform_gates = 'Y';
         else if ($thejobsheet->work_platform_gates == 'n') $work_platform_gates = 'N';
         else $work_platform_gates = 'N/A';

         if($thejobsheet->work_platform_cagemounts == 'y') $work_platform_cagemounts = 'Y';
         else if ($thejobsheet->work_platform_cagemounts == 'n') $work_platform_cagemounts = 'N';
         else $work_platform_cagemounts = 'N/A';

         if($thejobsheet->work_platform_harnesspoints == 'y') $work_platform_harnesspoints = 'Y';
         else if ($thejobsheet->work_platform_harnesspoints == 'n') $work_platform_harnesspoints = 'N';
         else $work_platform_harnesspoints = 'N/A';

         if($thejobsheet->structure_scissorbooms_arms == 'y') $structure_scissorbooms_arms = 'Y';
         else if ($thejobsheet->structure_scissorbooms_arms == 'n') $structure_scissorbooms_arms = 'N';
         else $structure_scissorbooms_arms = 'N/A';

         if($thejobsheet->structure_scissorbooms_pins == 'y') $structure_scissorbooms_pins = 'Y';
         else if ($thejobsheet->structure_scissorbooms_pins == 'n') $structure_scissorbooms_pins = 'N';
         else $structure_scissorbooms_pins = 'N/A';

         if($thejobsheet->structure_bushes == 'y') $structure_bushes = 'Y';
         else if ($thejobsheet->structure_bushes == 'n') $structure_bushes = 'N';
         else $structure_bushes = 'N/A';

         if($thejobsheet->structure_zoom == 'y') $structure_zoom = 'Y';
         else if ($thejobsheet->structure_zoom == 'n') $structure_zoom = 'N';
         else $structure_zoom = 'N/A';

         if($thejobsheet->structure_corrosion == 'y') $structure_corrosion = 'Y';
         else if ($thejobsheet->structure_corrosion == 'n') $structure_corrosion = 'N';
         else $structure_corrosion = 'N/A';

         if($thejobsheet->structure_outriggers == 'y') $structure_outriggers = 'Y';
         else if ($thejobsheet->structure_outriggers == 'n') $structure_outriggers = 'N';
         else $structure_outriggers = 'N/A';

         if($thejobsheet->structure_pothole == 'y') $structure_pothole = 'Y';
         else if ($thejobsheet->structure_pothole == 'n') $structure_pothole = 'N';
         else $structure_pothole = 'N/A';

         if($thejobsheet->structure_slew_ring_serviceable == 'y') $structure_slew_ring_serviceable = 'Y';
         else if ($thejobsheet->structure_slew_ring_serviceable == 'n') $structure_slew_ring_serviceable = 'N';
         else $structure_slew_ring_serviceable = 'N/A';

         if($thejobsheet->structure_slew_ring_bolts == 'y') $structure_slew_ring_bolts = 'Y';
         else if ($thejobsheet->structure_slew_ring_bolts == 'n') $structure_slew_ring_bolts = 'N';
         else $structure_slew_ring_bolts = 'N/A';

         if($thejobsheet->structure_powertrack == 'y') $structure_powertrack = 'Y';
         else if ($thejobsheet->structure_powertrack == 'n') $structure_powertrack = 'N';
         else $structure_powertrack = 'N/A';

         if($thejobsheet->os_fueltank == 'y') $os_fueltank = 'Y';
         else if ($thejobsheet->os_fueltank == 'n') $os_fueltank = 'N';
         else $os_fueltank = 'N/A';

         if($thejobsheet->os_controlcables == 'y') $os_controlcables = 'Y';
         else if ($thejobsheet->os_controlcables == 'n') $os_controlcables = 'N';
         else $os_controlcables = 'N/A';

         if($thejobsheet->os_battery == 'y') $os_battery = 'Y';
         else if ($thejobsheet->os_battery == 'n') $os_battery = 'N';
         else $os_battery = 'N/A';

         if($thejobsheet->os_battery_charger == 'y') $os_battery_charger = 'Y';
         else if ($thejobsheet->os_battery_charger == 'n') $os_battery_charger = 'N';
         else $os_battery_charger = 'N/A';

         if($thejobsheet->os_pump == 'y') $os_pump = 'Y';
         else if ($thejobsheet->os_pump == 'n') $os_pump = 'N';
         else $os_pump = 'N/A';

         if($thejobsheet->os_slew_drive == 'y') $os_slew_drive = 'Y';
         else if ($thejobsheet->os_slew_drive == 'n') $os_slew_drive = 'N';
         else $os_slew_drive = 'N/A';

         if($thejobsheet->os_gearbox == 'y') $os_gearbox = 'Y';
         else if ($thejobsheet->os_gearbox == 'n') $os_gearbox = 'N';
         else $os_gearbox = 'N/A';

         if($thejobsheet->os_hydraulic_tank == 'y') $os_hydraulic_tank = 'Y';
         else if ($thejobsheet->os_hydraulic_tank == 'n') $os_hydraulic_tank = 'N';
         else $os_hydraulic_tank = 'N/A';

         if($thejobsheet->os_hydraulic_filter == 'y') $os_hydraulic_filter = 'Y';
         else if ($thejobsheet->os_hydraulic_filter == 'n') $os_hydraulic_filter = 'N';
         else $os_hydraulic_filter = 'N/A';

         if($thejobsheet->os_hydraulic_hoses == 'y') $os_hydraulic_hoses = 'Y';
         else if ($thejobsheet->os_hydraulic_hoses == 'n') $os_hydraulic_hoses = 'N';
         else $os_hydraulic_hoses = 'N/A';

         if($thejobsheet->os_control_cables == 'y') $os_control_cables = 'Y';
         else if ($thejobsheet->os_control_cables == 'n') $os_control_cables = 'N';
         else $os_control_cables = 'N/A';

         if($thejobsheet->os_hydraulic_cylinders_secure == 'y') $os_hydraulic_cylinders_secure = 'Y';
         else if ($thejobsheet->os_hydraulic_cylinders_secure == 'n') $os_hydraulic_cylinders_secure = 'N';
         else $os_hydraulic_cylinders_secure = 'N/A';

         if($thejobsheet->os_hydraulic_cylinders_distorted == 'y') $os_hydraulic_cylinders_distorted = 'Y';
         else if ($thejobsheet->os_hydraulic_cylinders_distorted == 'n') $os_hydraulic_cylinders_distorted = 'N';
         else $os_hydraulic_cylinders_distorted = 'N/A';

         if($thejobsheet->os_platforms_levelling == 'y') $os_platforms_levelling = 'Y';
         else if ($thejobsheet->os_platforms_levelling == 'n') $os_platforms_levelling = 'N';
         else $os_platforms_levelling = 'N/A';

         if($thejobsheet->os_drive_travel == 'y') $os_drive_travel = 'Y';
         else if ($thejobsheet->os_drive_travel == 'n') $os_drive_travel = 'N';
         else $os_drive_travel = 'N/A';

         if($thejobsheet->os_brakes == 'y') $os_brakes = 'Y';
         else if ($thejobsheet->os_brakes == 'n') $os_brakes = 'N';
         else $os_brakes = 'N/A';

         if($thejobsheet->os_tie_rods == 'y') $os_tie_rods = 'Y';
         else if ($thejobsheet->os_tie_rods == 'n') $os_tie_rods = 'N';
         else $os_tie_rods = 'N/A';

         if($thejobsheet->os_wheelnuts == 'y') $os_wheelnuts = 'Y';
         else if ($thejobsheet->os_wheelnuts == 'n') $os_wheelnuts = 'N';
         else $os_wheelnuts = 'N/A';

         if($thejobsheet->control_hydraulic_valves_manual == 'y') $control_hydraulic_valves_manual = 'Y';
         else if ($thejobsheet->control_hydraulic_valves_manual == 'n') $control_hydraulic_valves_manual = 'N';
         else $control_hydraulic_valves_manual = 'N/A';

         if($thejobsheet->control_hydraulic_valves_electric == 'y') $control_hydraulic_valves_electric = 'Y';
         else if ($thejobsheet->control_hydraulic_valves_electric == 'n') $control_hydraulic_valves_electric = 'N';
         else $control_hydraulic_valves_electric = 'N/A';

         if($thejobsheet->control_hydraulic_check_valves == 'y') $control_hydraulic_check_valves = 'Y';
         else if ($thejobsheet->control_hydraulic_check_valves == 'n') $control_hydraulic_check_valves = 'N';
         else $control_hydraulic_check_valves = 'N/A';

         if($thejobsheet->control_hydraulic_cylinder == 'y') $control_hydraulic_cylinder = 'Y';
         else if ($thejobsheet->control_hydraulic_cylinder == 'n') $control_hydraulic_cylinder = 'N';
         else $control_hydraulic_cylinder = 'N/A';

         if($thejobsheet->control_hydraulic_emergency == 'y') $control_hydraulic_emergency = 'Y';
         else if ($thejobsheet->control_hydraulic_emergency == 'n') $control_hydraulic_emergency = 'N';
         else $control_hydraulic_emergency = 'N/A';

         if($thejobsheet->control_hydraulic_system_pressures == 'y') $control_hydraulic_system_pressures = 'Y';
         else if ($thejobsheet->control_hydraulic_system_pressures == 'n') $control_hydraulic_system_pressures = 'N';
         else $control_hydraulic_system_pressures = 'N/A';

         if($thejobsheet->control_electric_ground == 'y') $control_electric_ground = 'Y';
         else if ($thejobsheet->control_electric_ground == 'n') $control_electric_ground = 'N';
         else $control_electric_ground = 'N/A';

         if($thejobsheet->control_electric_platform == 'y') $control_electric_platform = 'Y';
         else if ($thejobsheet->control_electric_platform == 'n') $control_electric_platform = 'N';
         else $control_electric_platform = 'N/A';

         if($thejobsheet->control_electric_emergency == 'y') $control_electric_emergency = 'Y';
         else if ($thejobsheet->control_electric_emergency == 'n') $control_electric_emergency = 'N';
         else $control_electric_emergency = 'N/A';

         if($thejobsheet->control_electric_indicator == 'y') $control_electric_indicator = 'Y';
         else if ($thejobsheet->control_electric_indicator == 'n') $control_electric_indicator = 'N';
         else $control_electric_indicator = 'N/A';

         if($thejobsheet->control_electric_wiring == 'y') $control_electric_wiring = 'Y';
         else if ($thejobsheet->control_electric_wiring == 'n') $control_electric_wiring = 'N';
         else $control_electric_wiring = 'N/A';

         if($thejobsheet->control_electric_speed == 'y') $control_electric_speed = 'Y';
         else if ($thejobsheet->control_electric_speed == 'n') $control_electric_speed = 'N';
         else $control_electric_speed = 'N/A';

         if($thejobsheet->safety_level_sensor == 'y') $safety_level_sensor = 'Y';
         else if ($thejobsheet->safety_level_sensor == 'n') $safety_level_sensor = 'N';
         else $safety_level_sensor = 'N/A';

         if($thejobsheet->safety_limit_switch == 'y') $safety_limit_switch = 'Y';
         else if ($thejobsheet->safety_limit_switch == 'n') $safety_limit_switch = 'N';
         else $safety_limit_switch = 'N/A';

         if($thejobsheet->safety_warning_lights == 'y') $safety_warning_lights = 'Y';
         else if ($thejobsheet->safety_warning_lights == 'n') $safety_warning_lights = 'N';
         else $safety_warning_lights = 'N/A';

         if($thejobsheet->safety_functional_test == 'y') $safety_functional_test = 'Y';
         else if ($thejobsheet->safety_functional_test == 'n') $safety_functional_test = 'N';
         else $safety_functional_test = 'N/A';

         if($thejobsheet->safety_overload == 'y') $safety_overload = 'Y';
         else if ($thejobsheet->safety_overload == 'n') $safety_overload = 'N';
         else $safety_overload = 'N/A';

         if($thejobsheet->safety_swl == 'y') $safety_swl = 'Y';
         else if ($thejobsheet->safety_swl == 'n') $safety_swl = 'N';
         else $safety_swl = 'N/A';

         if($thejobsheet->safety_load_applied){
            $safety_load_applied = $thejobsheet->safety_load_applied;
         } else{
            $safety_load_applied = 0;
         }

         if($thejobsheet->additional_brakes == 'y') $additional_brakes = 'Y';
         else if ($thejobsheet->additional_brakes == 'n') $additional_brakes = 'N';
         else $additional_brakes = 'N/A';

         if($thejobsheet->additional_emergency == 'y') $additional_emergency = 'Y';
         else if ($thejobsheet->additional_emergency == 'n') $additional_emergency = 'N';
         else $additional_emergency = 'N/A';

         if($thejobsheet->additional_tow == 'y') $additional_tow = 'Y';
         else if ($thejobsheet->additional_tow == 'n') $additional_tow = 'N';
         else $additional_tow = 'N/A';

         if($thejobsheet->additional_wheel == 'y') $additional_wheel = 'Y';
         else if ($thejobsheet->additional_wheel == 'n') $additional_wheel = 'N';
         else $additional_wheel = 'N/A';

         if($thejobsheet->additional_lights == 'y') $additional_lights = 'Y';
         else if ($thejobsheet->additional_lights == 'n') $additional_lights = 'N';
         else $additional_lights = 'N/A';

         if($thejobsheet->decals_manufacture == 'y') $decals_manufacture = 'Y';
         else if ($thejobsheet->decals_manufacture == 'n') $decals_manufacture = 'N';
         else $decals_manufacture = 'N/A';

         if($thejobsheet->decals_safe_load == 'y') $decals_safe_load = 'Y';
         else if ($thejobsheet->decals_safe_load == 'n') $decals_safe_load = 'N';
         else $decals_safe_load = 'N/A';

         if($thejobsheet->decals_platform_instructions == 'y') $decals_platform_instructions = 'Y';
         else if ($thejobsheet->decals_platform_instructions == 'n') $decals_platform_instructions = 'N';
         else $decals_platform_instructions = 'N/A';

         if($thejobsheet->decals_emergency == 'y') $decals_emergency = 'Y';
         else if ($thejobsheet->decals_emergency == 'n') $decals_emergency = 'N';
         else $decals_emergency = 'N/A';

         if($thejobsheet->decals_instruction == 'y') $decals_instruction = 'Y';
         else if ($thejobsheet->decals_instruction == 'n') $decals_instruction = 'N';
         else $decals_instruction = 'N/A';

         if($thejobsheet->decals_safety == 'y') $decals_safety = 'Y';
         else if ($thejobsheet->decals_safety == 'n') $decals_safety = 'N';
         else $decals_safety = 'N/A';

         




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
            'start_date' => $thejob->start,
            'engineer' => $thejob->engineer_name,
            'customer' => $theclient->company_name,
            'customeraddress' => $theclient->site_address,
            'date_last_inspection' => $thejobsheet->date_last_inspection,
            'vehicle_type' => $thejobsheet->vehicle_type,
            'vehicle_reg' => $thejobsheet->vehicle_reg,
            'vehicle_mileage' => $thejobsheet->vehicle_mileage,
            'date_of_man' => $thejobsheet->date_of_man,
            'platform_make' => $thejobsheet->platform_make,
            'platform_model' => $thejobsheet->platform_model,
            'platform_serial' => $thejobsheet->platform_serial,
            'date_inspection' => $thejobsheet->date_inspection,
            'swl' => $thejobsheet->swl,
            'tested_at' => $thejobsheet->tested_at,

            'work_platform_flooring' => $work_platform_flooring,
            'work_platform_toeboards' => $work_platform_flooring,
            'work_platform_topguard' => $work_platform_topguard,
            'work_platform_midguard' => $work_platform_midguard,
            'work_platform_gates' => $work_platform_gates,
            'work_platform_cagemounts' => $work_platform_cagemounts,
            'work_platform_harnesspoints' => $work_platform_harnesspoints,
            'structure_scissorbooms_arms' => $structure_scissorbooms_arms,
            'structure_scissorbooms_pins' => $structure_scissorbooms_pins,
            'structure_bushes' => $structure_bushes,
            'structure_zoom' => $structure_zoom,
            'structure_corrosion' => $structure_corrosion,
            'structure_outriggers' => $structure_outriggers,
            'structure_pothole' => $structure_pothole,
            'structure_slew_ring_serviceable' => $structure_slew_ring_serviceable,
            'structure_slew_ring_bolts' => $structure_slew_ring_bolts,
            'structure_powertrack' => $structure_powertrack,
            'os_fueltank' => $os_fueltank,
            'os_controlcables' => $os_controlcables,
            'os_battery' => $os_battery,
            'os_battery_charger' => $os_battery_charger,
            'os_pump' => $os_pump,
            'os_slew_drive' => $os_slew_drive,
            'os_gearbox' => $os_gearbox,
            'os_hydraulic_tank' => $os_hydraulic_tank,
            'os_hydraulic_filter' => $os_hydraulic_filter,
            'os_hydraulic_hoses' => $os_hydraulic_hoses,
            'os_control_cables' => $os_control_cables,
            'os_hydraulic_cylinders_secure' => $os_hydraulic_cylinders_secure,
            'os_hydraulic_cylinders_distorted' => $os_hydraulic_cylinders_distorted,
            'os_platforms_levelling' => $os_platforms_levelling,
            'os_drive_travel' => $os_drive_travel,
            'os_brakes' => $os_brakes,
            'os_tie_rods' => $os_tie_rods,
            'os_wheelnuts' => $os_wheelnuts,
            'control_hydraulic_valves_manual' => $control_hydraulic_valves_manual,
            'control_hydraulic_valves_electric' => $control_hydraulic_valves_electric,
            'control_hydraulic_check_valves' => $control_hydraulic_check_valves,
            'control_hydraulic_cylinder' => $control_hydraulic_cylinder,
            'control_hydraulic_emergency' => $control_hydraulic_emergency,
            'control_hydraulic_system_pressures' => $control_hydraulic_system_pressures,
            'control_electric_ground' => $control_electric_ground,
            'control_electric_platform' => $control_electric_platform,
            'control_electric_emergency' => $control_electric_emergency,
            'control_electric_indicator' => $control_electric_indicator,
            'control_electric_wiring' => $control_electric_wiring,
            'control_electric_speed' => $control_electric_speed,
            'safety_level_sensor' => $safety_level_sensor,
            'safety_limit_switch' => $safety_limit_switch,
            'safety_warning_lights' => $safety_warning_lights,
            'safety_functional_test' => $safety_functional_test,
            'safety_overload' => $safety_overload,
            'safety_swl' => $safety_swl,
            'safety_load_applied' => $safety_load_applied,
            'additional_brakes' => $additional_brakes,
            'additional_emergency' => $additional_emergency,
            'additional_tow' => $additional_tow,
            'additional_wheel' => $additional_wheel,
            'additional_lights' => $additional_lights,
            'decals_manufacture' => $decals_manufacture,
            'decals_safe_load' => $decals_safe_load,
            'decals_platform_instructions' => $decals_platform_instructions,
            'decals_emergency' => $decals_emergency,
            'decals_instruction' => $decals_instruction,
            'decals_safety' => $decals_safety,

            'additional_info' => $thejobsheet->additional_info,
            'engineer_signature' => $thejobsheet->engineer_signature,
            'customer_signature' => $thejobsheet->customer_signature,



        
        ];
          
        $pdf = PDF::loadView('jobsheets.pdf.thouroughinspectionsheetpdf', $data);
    

        return $pdf->download('thouroughinspectionsheet.pdf');
    }

    
}
