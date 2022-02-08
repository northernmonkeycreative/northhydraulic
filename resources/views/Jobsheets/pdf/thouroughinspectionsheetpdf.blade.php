<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Document</title>

    <style>
 
 .table {
  --bs-table-bg: transparent;
  --bs-table-accent-bg: transparent;
  --bs-table-striped-color: #212529;
  --bs-table-striped-bg: rgba(0, 0, 0, 0.05);
  --bs-table-active-color: #212529;
  --bs-table-active-bg: rgba(0, 0, 0, 0.1);
  --bs-table-hover-color: #212529;
  --bs-table-hover-bg: rgba(0, 0, 0, 0.075);
  width: 100%;
  margin-bottom: 1rem;
  color: #212529;
  vertical-align: top;
  border-color: #dee2e6;
}
.table > :not(caption) > * > * {
  padding: 0.5rem 0.5rem;
  background-color: var(--bs-table-bg);
  border-bottom-width: 1px;
  box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
}
.table > tbody {
  vertical-align: inherit;
}
.table > thead {
  vertical-align: bottom;
}
.table > :not(:first-child) {
  border-top: 2px solid currentColor;
}
th {
  text-align: inherit;
  text-align: -webkit-match-parent;
}

thead,
tbody,
tfoot,
tr,
td,
th {
  border-color: inherit;
  border-style: solid;
  border-width: 0;
}

.caption-top {
  caption-side: top;
}

.table-sm > :not(caption) > * > * {
  padding: 0.25rem 0.25rem;
}

.table-bordered > :not(caption) > * {
  border-width: 1px 0;
}
.table-bordered > :not(caption) > * > * {
  border-width: 0 1px;
}
 .formtitle {
     font-weight:bold;
 }
 body {
    font-family: 'Open Sans', sans-serif;
 }
 h2,h3,h4 {font-family: 'Arial', sans-serif;}

 table{
     font-size: 12px;
 }

 th, td {
  padding: 15px;
  vertical-align: middle;
}
.text-center {
    text-align: center;
}

.text-left {
    text-align: left;
}

.table{border-collapse:collapse!important}
.table-bordered td,
.table-bordered th{border:1px solid #ddd!important}}
.table th {
    text-align: center;
}
</style>
</head>
<body>


    <table class="table table-bordered text-center">
        <thead style="background:#3377FF;color:white;padding:40px;">
            <tr>
                <th colspan="3">
                    <p style="font-size:30px;">{{$companyname}}</p>
                    <p style="font-size:20px;">Thourough Inspection Sheet For Access Platforms</p>
                    {{-- <p style="font-size:20px;">Thourough Inspection Sheet For Access Platforms</p> --}}
                </th>
            </tr>
        </thead>
        <tbody class="text-left">
            <tr class="text-left">
                <td><span class="formtitle">Customer:</span> {{$customer}}</td>
                <td colspan="2"><span class="formtitle">Address:</span> {{$customeraddress}}</td>
            </tr>
            <tr class="text-left">
                <td><span class="formtitle">Last Inspection Date:</span> {{$date_last_inspection}}</td>
                <td><span class="formtitle">Date Of Man:</span> {{$date_of_man}}</td>
                <td><span class="formtitle">Job No:</span> {{$jobnumber}}</td>
            </tr>
            <tr class="text-left">
                <td><span class="formtitle">Vehicle Type:</span> {{$vehicle_type}}</td>
                <td><span class="formtitle">Platform Make:</span> {{$platform_make}}</td>
                <td><span class="formtitle">Inspection Date:</span> {{$start_date}}</td>
            </tr>
            <tr class="text-left">
                <td><span class="formtitle">Vehicle Reg:</span> {{$vehicle_reg}}</td>
                <td><span class="formtitle">Model:</span> {{$platform_model}}</td>
                <td><span class="formtitle">S.W.L:</span> {{$swl}}</td>
            </tr>
            <tr class="text-left">
                <td><span class="formtitle">Mileage:</span> {{$vehicle_mileage}}</td>
                <td><span class="formtitle">Serial No:</span> {{$platform_serial}}</td>
                <td><span class="formtitle">Tested @ 10% 0/Loag kg:</span> {{$tested_at}}kg</td>
            </tr>
            <tr style="background:#3377FF;color:white;padding:20px;" class="text-center">
                <td colspan="3"><p style="font-size:20px;">Inspection Information</p></td>
            </tr>
   
        </tbody>
    </table>

    <table class="table table-bordered text-center">
            
        <tbody class="text-left">
            <tr class="text-center">
                <td style="background:#3377FF;color:white;" colspan="5"><span class="formtitle">Work Platform</span></td>
                <td colspan="1"><span class="formtitle text-muted">Y, N, N/A</span></td>
            </tr>
            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Flooring Intact & Self Draining:</span></td>
                <td colspan="1"><span class="formtitle">{{$work_platform_flooring}}</span></td>
            </tr>
            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Toe Boards Intact & 150mm High:</span></td>
                <td colspan="1"><span class="formtitle">{{$work_platform_toeboards}}</span></td>
            </tr>
            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Top Guard Rail Intact Pin/Bolts 1100mm high:</span></td>
                <td colspan="1"><span class="formtitle">{{$work_platform_topguard}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Mid Guard Rail Intact Pin/Bolts:</span></td>
                <td colspan="1"><span class="formtitle">{{$work_platform_midguard}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Gates In Good Order & Self Closing/Latching:</span></td>
                <td colspan="1"><span class="formtitle">{{$work_platform_gates}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Cage Mounts:</span></td>
                <td colspan="1"><span class="formtitle">{{$work_platform_cagemounts}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Harness Points Secure:</span></td>
                <td colspan="1"><span class="formtitle">{{$work_platform_harnesspoints}}</span></td>
            </tr>

            <tr class="text-center">
                <td style="background:#3377FF;color:white;" colspan="5"><span class="formtitle">Structure</span></td>
                <td colspan="1"><span class="formtitle text-muted">Y, N, N/A</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Scissor/Booms Arms Intact:</span></td>
                <td colspan="1"><span class="formtitle">{{$structure_scissorbooms_arms}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Scissor/Booms Pins & Retainer Secure:</span></td>
                <td colspan="1"><span class="formtitle">{{$structure_scissorbooms_pins}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Bushes Bearing Serviceable:</span></td>
                <td colspan="1"><span class="formtitle">{{$structure_bushes}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Zoom Wear Pads Serviceable:</span></td>
                <td colspan="1"><span class="formtitle">{{$structure_zoom}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">External/Internal Structure Free From Corrosion:</span></td>
                <td colspan="1"><span class="formtitle">{{$structure_corrosion}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Outriggers Operate & Free From Distortion:</span></td>
                <td colspan="1"><span class="formtitle">{{$structure_outriggers}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Pothole Protection Secure & Operational:</span></td>
                <td colspan="1"><span class="formtitle">{{$structure_pothole}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Slew Ring Bearing Serviceable:</span></td>
                <td colspan="1"><span class="formtitle">{{$structure_slew_ring_serviceable}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Slew Ring Bearing Bolts Secure:</span></td>
                <td colspan="1"><span class="formtitle">{{$structure_slew_ring_bolts}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Power Track Serviceable:</span></td>
                <td colspan="1"><span class="formtitle">{{$structure_powertrack}}</span></td>
            </tr>

            <tr class="text-center">
                <td style="background:#3377FF;color:white;" colspan="5"><span class="formtitle">Operating Systems</span></td>
                <td colspan="1"><span class="formtitle text-muted">Y, N, N/A</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Fuel Tank Free From Leaks:</span></td>
                <td colspan="1"><span class="formtitle">{{$os_fueltank}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Control Cables:</span></td>
                <td colspan="1"><span class="formtitle">{{$os_controlcables}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Battery Secure & Terminal/Levels Serviceable:</span></td>
                <td colspan="1"><span class="formtitle">{{$os_battery}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Battery Charger & Lead Secure/Operational:</span></td>
                <td colspan="1"><span class="formtitle">{{$os_battery_charger}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Pump Free from Leaks & Secure:</span></td>
                <td colspan="1"><span class="formtitle">{{$os_pump}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Slew Drive & Gears Correctly Adjusted:</span></td>
                <td colspan="1"><span class="formtitle">{{$os_slew_drive}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Gear Box Oil Level:</span></td>
                <td colspan="1"><span class="formtitle">{{$os_gearbox}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Hydraulic Tank Free From Oil:</span></td>
                <td colspan="1"><span class="formtitle">{{$os_hydraulic_tank}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Hydraulic Filter & Oil Serviceable:</span></td>
                <td colspan="1"><span class="formtitle">{{$os_hydraulic_filter}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Hydraulic Hoses & Pipes:</span></td>
                <td colspan="1"><span class="formtitle">{{$os_hydraulic_hoses}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Control Cables:</span></td>
                <td colspan="1"><span class="formtitle">{{$os_control_cables}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Hydraulic Cylinders Secure & Free From Leaks:</span></td>
                <td colspan="1"><span class="formtitle">{{$os_hydraulic_cylinders_secure}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Hydraulic Cylinders Not Distorted or Corroded:</span></td>
                <td colspan="1"><span class="formtitle">{{$os_hydraulic_cylinders_distorted}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Platforms Levelling/Rotation Serviceable:</span></td>
                <td colspan="1"><span class="formtitle">{{$os_platforms_levelling}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Drive Travel Components Secure:</span></td>
                <td colspan="1"><span class="formtitle">{{$os_drive_travel}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Brakes Operate To Manufacture Spec:</span></td>
                <td colspan="1"><span class="formtitle">{{$os_brakes}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Tie Rods/Steering Linkage Secure:</span></td>
                <td colspan="1"><span class="formtitle">{{$os_tie_rods}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Wheel Nuts & Tyres Secure/Serviceable:</span></td>
                <td colspan="1"><span class="formtitle">{{$os_wheelnuts}}</span></td>
            </tr>

            <tr class="text-center">
                <td style="background:#3377FF;color:white;" colspan="5"><span class="formtitle">Control Systems Hydraulic</span></td>
                <td colspan="1"><span class="formtitle text-muted">Y, N, N/A</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Control Valves Manual-Functional:</span></td>
                <td colspan="1"><span class="formtitle">{{$control_hydraulic_valves_manual}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Control Valves Electric-Functional:</span></td>
                <td colspan="1"><span class="formtitle">{{$control_hydraulic_valves_electric}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Check Valves/Over Centre-Functional:</span></td>
                <td colspan="1"><span class="formtitle">{{$control_hydraulic_check_valves}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Cylinder & Drive Speed Controls-Functional:</span></td>
                <td colspan="1"><span class="formtitle">{{$control_hydraulic_cylinder}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Emergency Lowering Controls-Functional:</span></td>
                <td colspan="1"><span class="formtitle">{{$control_hydraulic_emergency}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">System Pressures:</span></td>
                <td colspan="1"><span class="formtitle">{{$control_hydraulic_system_pressures}}</span></td>
            </tr>

            <tr class="text-center">
                <td style="background:#3377FF;color:white;" colspan="5"><span class="formtitle">Control Systems Electric</span></td>
                <td colspan="1"><span class="formtitle text-muted">Y, N, N/A</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Ground Controls-Functional:</span></td>
                <td colspan="1"><span class="formtitle">{{$control_electric_ground}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Platform Controls-Functional:</span></td>
                <td colspan="1"><span class="formtitle">{{$control_electric_platform}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Emergency Lower Controls (electrical/manual):</span></td>
                <td colspan="1"><span class="formtitle">{{$control_electric_emergency}}</span></td>
            </tr>
            
            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Indicator Lights/Aux Motor Function:</span></td>
                <td colspan="1"><span class="formtitle">{{$control_electric_indicator}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Wiring/Harness Cable:</span></td>
                <td colspan="1"><span class="formtitle">{{$control_electric_wiring}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Speed Controls/Foot Pedal/Dead Man Switch:</span></td>
                <td colspan="1"><span class="formtitle">{{$control_electric_speed}}</span></td>
            </tr>

            <tr class="text-center">
                <td style="background:#3377FF;color:white;" colspan="5"><span class="formtitle">Safety Systems</span></td>
                <td colspan="1"><span class="formtitle text-muted">Y, N, N/A</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Level Sensors & Alarms Operational:</span></td>
                <td colspan="1"><span class="formtitle">{{$safety_level_sensor}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Limit Switches, Interiors & Valves Operational:</span></td>
                <td colspan="1"><span class="formtitle">{{$safety_limit_switch}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Warning Lights/Guages Functional:</span></td>
                <td colspan="1"><span class="formtitle">{{$safety_warning_lights}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Functional Test:</span></td>
                <td colspan="1"><span class="formtitle">{{$safety_functional_test}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Overload Test Required:</span></td>
                <td colspan="1"><span class="formtitle">{{$safety_overload}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">S.W.L Test Required:</span></td>
                <td colspan="1"><span class="formtitle">{{$safety_swl}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Load Applied:</span></td>
                <td colspan="1"><span class="formtitle">{{$safety_load_applied}}kg</span></td>
            </tr>

            <tr class="text-center">
                <td style="background:#3377FF;color:white;" colspan="5"><span class="formtitle">Additional For Trailer Mounts</span></td>
                <td colspan="1"><span class="formtitle text-muted">Y, N, N/A</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Brakes/Handbrake:</span></td>
                <td colspan="1"><span class="formtitle">{{$additional_brakes}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Emergency Brake Cable Fitted:</span></td>
                <td colspan="1"><span class="formtitle">{{$additional_emergency}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Tow Hitch:</span></td>
                <td colspan="1"><span class="formtitle">{{$additional_tow}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Wheel Bearings:</span></td>
                <td colspan="1"><span class="formtitle">{{$additional_wheel}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Lights & Light Board:</span></td>
                <td colspan="1"><span class="formtitle">{{$additional_lights}}</span></td>
            </tr>

            <tr class="text-center">
                <td style="background:#3377FF;color:white;" colspan="5"><span class="formtitle">Decals/Labels Present & Ligible</span></td>
                <td colspan="1"><span class="formtitle text-muted">Y, N, N/A</span></td>
            </tr>
    
            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Manufacture Plate:</span></td>
                <td colspan="1"><span class="formtitle">{{$decals_manufacture}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Safe Working Load:</span></td>
                <td colspan="1"><span class="formtitle">{{$decals_safe_load}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Ground Controls & Platform Instructions:</span></td>
                <td colspan="1"><span class="formtitle">{{$decals_platform_instructions}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Emergency Lowering:</span></td>
                <td colspan="1"><span class="formtitle">{{$decals_emergency}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Instruction Manual:</span></td>
                <td colspan="1"><span class="formtitle">{{$decals_instruction}}</span></td>
            </tr>

            <tr class="text-left">
                <td colspan="5"><span class="formtitle">Safety/Instruction Decals:</span></td>
                <td colspan="1"><span class="formtitle">{{$decals_safety}}</span></td>
            </tr>
            
            
            <tr>
                <td colspan="6"><span class="formtitle">Additional Comments/Advisory:</span> {{$additional_info}}</td>
            </tr>
            <tr>
                <td colspan="3"><span class="formtitle">Customer Signature:</span> <img id="" src="{{$customer_signature}}" width="200" height="100"></td>
                <td colspan="3"><span class="formtitle">Engineer Signature:</span><img id="" src="{{$engineer_signature}}" width="200" height="100"></td>
            </tr>
        </tbody>
        <tfoot style="background:#3377FF;color:white;" class="text-center">
            <tr>
                <td colspan="6">
                    {{$companyname}} | {{$companyemail}} | {{$companyphone}}<br>
                    {{$companyaddress}} {{$companypostcode}}
                </td>
            </tr>
        </tfoot>
    </table>
</body>
</html>