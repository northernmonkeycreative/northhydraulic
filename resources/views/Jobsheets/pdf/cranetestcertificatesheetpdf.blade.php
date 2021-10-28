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
                <th colspan="4">
                    <p style="font-size:30px;">{{$companyname}}</p>
                    <p style="font-size:20px;">Crane Test Certificate</p>
                </th>
            </tr>
        </thead>
        <tbody class="text-left">
            <tr class="text-left">
                <td><span class="formtitle">Job No:</span> {{$jobnumber}}</td>
                <td><span class="formtitle">Date Of Last Test:</span> <br>{{$date_last_tested}}</td>
                <td><span class="formtitle">Engineer:</span> <br>{{$engineer}}</td>
                <td><span class="formtitle">Date Of Test:</span> <br>{{$date_tested}}</td>
            </tr>
            <tr style="background:#3377FF;color:white;padding:20px;" class="text-center">
                <td colspan="4"><p style="font-size:20px;">Customer Information</p></td>
            </tr>
            <tr>
                <td colspan="4"><span class="formtitle">Customer Name:</span> {{$customer}}</td>
            </tr>
            <tr>
                <td colspan="4"><span class="formtitle">Customer Address:</span> {{$customeraddress}}</td>
            </tr>
            <tr style="background:#3377FF;color:white;padding:20px;" class="text-center">
                <td colspan="4"><p style="font-size:20px;">Vehicle Details</p></td>
            </tr>

            <tr>
                <td colspan="4"><span class="formtitle">Vehicle Make:</span> {{$vehicle_make}}</td>
            </tr>
            <tr>
                <td colspan="4"><span class="formtitle">Vehicle Model:</span> {{$vehicle_model}}</td>
            </tr>
            <tr>
                <td colspan="4"><span class="formtitle">Vehicle Reg:</span> {{$vehicle_reg}}</td>
            </tr>
            <tr>
                <td colspan="4"><span class="formtitle">Vehicle Chassis #:</span> {{$vehicle_chass_no}}</td>
            </tr>
            <tr>
                <td colspan="4"><span class="formtitle">Vehicle Mileage:</span> {{$vehicle_mileage}}</td>
            </tr>
            <tr style="background:#3377FF;color:white;padding:20px;" class="text-center">
                <td colspan="6"><p style="font-size:20px;">Crane Details</p></td>
            </tr>
        </tbody>
    </table>

    <table class="table table-bordered text-center">
        <tbody class="text-left">
            
            <tr class="text-left">
                <td><span class="formtitle">Position:</span> <br>{{$crane_position}}</td>
                <td><span class="formtitle">Make:</span> <br>{{$crane_make}}</td>
                <td><span class="formtitle">Model:</span> <br>{{$crane_model}}</td>
                <td><span class="formtitle">Serial:</span> <br>{{$crane_serial}}</td>
                <td><span class="formtitle">Yr of Manufacture:</span> <br>{{$crane_manufacture_year}}</td>
                <td><span class="formtitle">Duties:</span> <br>{{$crane_lifting_duties}}</td>
            </tr>

            <tr style="background:#3377FF;color:white;padding:20px;" class="text-center">
                <td colspan="6"><p style="font-size:20px;">Rotator</p></td>
            </tr>
            <tr>
                <td colspan="2"><span class="formtitle">Make:</span> {{$rotator_make}}</td>
                <td colspan="2"><span class="formtitle">Model:</span> {{$rotator_model}}</td>
                <td colspan="2"><span class="formtitle">Serial:</span> {{$rotator_serial}}</td>
            </tr>

            <tr style="background:#3377FF;color:white;padding:20px;" class="text-center">
                <td colspan="6"><p style="font-size:20px;">Grab</p></td>
            </tr>
            <tr>
                <td colspan="2"><span class="formtitle">Make:</span> {{$grab_make}}</td>
                <td colspan="2"><span class="formtitle">Model:</span> {{$grab_model}}</td>
                <td colspan="2"><span class="formtitle">Serial:</span> {{$grab_serial}}</td>
            </tr>

            <tr style="background:#3377FF;color:white;padding:20px;" class="text-center">
                <td colspan="6"><p style="font-size:20px;">Bucket</p></td>
            </tr>
            <tr>
                <td colspan="2"><span class="formtitle">Make:</span> {{$bucket_make}}</td>
                <td colspan="2"><span class="formtitle">Model:</span> {{$bucket_model}}</td>
                <td colspan="2"><span class="formtitle">Serial:</span> {{$bucket_serial}}</td>
            </tr>
            <tr style="background:#3377FF;color:white;padding:10px;" class="text-center">
                <td colspan="6">
                    <p style="font-size:12px;">
                        Safe Working Load - To Cover Rage of SWL's & PArticulars of any Test. (i.e, 10% for ANNUAL or 25% OTHERWISE)
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="6"><span class="formtitle">Load Radius (Mtr):</span> {{$load_radius}}</td>
            </tr>
            <tr>
                <td colspan="6"><span class="formtitle">Safe Working Load (KGs):</span> {{$safe_working_load}}kg</td>
            </tr>
            <tr>
                <td colspan="6"><span class="formtitle">Test Load (KGs):</span> {{$test_load}}kg</td>
            </tr>
            <tr>
                <td colspan="6"><span class="formtitle">Overload (%):</span> {{$overload}}</td>
            </tr>
            <tr style="background:#3377FF;color:white;padding:20px;" class="text-center">
                <td colspan="6"><p style="font-size:20px;">Test</p></td>
            </tr>
            <tr>
                <td colspan="3"><span class="formtitle">Locking Pins On Legs & Leg Operation</span></td>
                <td colspan="1"><span class="formtitle"></span>{{$test1}}</td>
                <td colspan="2"><span class="formtitle">Work Done:</span><br> {{$test1_workdone}}</td>
            </tr>

            <tr>
                <td colspan="3"><span class="formtitle">Flitch Plates Movement Under Crane</span></td>
                <td colspan="1"><span class="formtitle"></span>{{$test2}}</td>
                <td colspan="2"><span class="formtitle">Work Done:</span><br> {{$test2_workdone}}</td>
            </tr>

            <tr>
                <td colspan="3"><span class="formtitle">Movement To Crane Bolts</span></td>
                <td colspan="1"><span class="formtitle"></span>{{$test3}}</td>
                <td colspan="2"><span class="formtitle">Work Done:</span><br> {{$test3_workdone}}</td>
            </tr>

            <tr>
                <td colspan="3"><span class="formtitle">Height Warning and Overhead</span></td>
                <td colspan="1"><span class="formtitle"></span>{{$test4}}</td>
                <td colspan="2"><span class="formtitle">Work Done:</span><br> {{$test4_workdone}}</td>
            </tr>

            <tr>
                <td colspan="3"><span class="formtitle">All Moving Points i.e. Pins.</span></td>
                <td colspan="1"><span class="formtitle"></span>{{$test5}}</td>
                <td colspan="2"><span class="formtitle">Work Done:</span><br> {{$test5_workdone}}</td>
            </tr>

            <tr>
                <td colspan="3"><span class="formtitle">Movement To Column</span></td>
                <td colspan="1"><span class="formtitle"></span>{{$test6}}</td>
                <td colspan="2"><span class="formtitle">Work Done:</span><br> {{$test6_workdone}}</td>
            </tr>

            <tr>
                <td colspan="3"><span class="formtitle">Nylon Slides On Tele Ext</span></td>
                <td colspan="1"><span class="formtitle"></span>{{$test7}}</td>
                <td colspan="2"><span class="formtitle">Work Done:</span><br> {{$test7_workdone}}</td>
            </tr>

            <tr>
                <td colspan="3"><span class="formtitle">Any Cracks or Defects To Crane</span></td>
                <td colspan="1"><span class="formtitle"></span>{{$test8}}</td>
                <td colspan="2"><span class="formtitle">Work Done:</span><br> {{$test8_workdone}}</td>
            </tr>

            <tr>
                <td colspan="3"><span class="formtitle">Movement To Valve Block Levers & Teleflex</span></td>
                <td colspan="1"><span class="formtitle"></span>{{$test9}}</td>
                <td colspan="2"><span class="formtitle">Work Done:</span><br> {{$test9_workdone}}</td>
            </tr>

            <tr>
                <td colspan="3"><span class="formtitle">Control Box Operation & Illumination</span></td>
                <td colspan="1"><span class="formtitle"></span>{{$test10}}</td>
                <td colspan="2"><span class="formtitle">Work Done:</span><br> {{$test10_workdone}}</td>
            </tr>

            <tr>
                <td colspan="3"><span class="formtitle">Any Leaks</span></td>
                <td colspan="1"><span class="formtitle"></span>{{$test11}}</td>
                <td colspan="2"><span class="formtitle">Work Done:</span><br> {{$test11_workdone}}</td>
            </tr>

            <tr>
                <td colspan="3"><span class="formtitle">Any Pipes Worn To Excess</span></td>
                <td colspan="1"><span class="formtitle"></span>{{$test12}}</td>
                <td colspan="2"><span class="formtitle">Work Done:</span><br> {{$test12_workdone}}</td>
            </tr>

            <tr>
                <td colspan="3"><span class="formtitle">Pipe Guides</span></td>
                <td colspan="1"><span class="formtitle"></span>{{$test13}}</td>
                <td colspan="2"><span class="formtitle">Work Done:</span><br> {{$test13_workdone}}</td>
            </tr>

            <tr>
                <td colspan="3"><span class="formtitle">Load Test</span></td>
                <td colspan="1"><span class="formtitle"></span>{{$test14}}</td>
                <td colspan="2"><span class="formtitle">Work Done:</span><br> {{$test14_workdone}}</td>
            </tr>

            <tr>
                <td colspan="3"><span class="formtitle">Overload Warning</span></td>
                <td colspan="1"><span class="formtitle"></span>{{$test15}}</td>
                <td colspan="2"><span class="formtitle">Work Done:</span><br> {{$test15_workdone}}</td>
            </tr>

            <tr>
                <td colspan="6"><span class="formtitle">Advisory</span> {{$advisory}}</td>
            </tr>

            <tr>
                <td colspan="3"><span class="formtitle">Examination Date:</span><br> {{$date_tested}}</td>
                <td colspan="3"><span class="formtitle">Engineer Signature:</span><br> {{$engineer_signature}}</td>
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