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
                    <p style="font-size:20px;">Tail Lift Certificate</p>
                    {{-- <p style="font-size:20px;">Lift Test Certificate</p> --}}
                </th>
            </tr>
        </thead>
        <tbody class="text-left">
            <tr class="text-left">
                <td><span class="formtitle">Job No:</span> {{$jobnumber}}</td>
                <td><span class="formtitle">Test Date:</span> <br>{{$date_tested}}</td>
                <td><span class="formtitle">Engineer:</span> <br>{{$engineer}}</td>
                <td><span class="formtitle">Certificate Number:</span> <br>{{$cert_no}}</td>
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
                <td colspan="4"><p style="font-size:20px;">Test Information</p></td>
            </tr>
            <tr>
                <td colspan="1"><span class="formtitle">Make:</span> {{$make}}</td>
                <td colspan="1"><span class="formtitle">Model:</span> {{$model}}</td>
                <td colspan="2"><span class="formtitle">Serial:</span> {{$serial}}</td>
            </tr>
            <tr>
                <td colspan="2"><span class="formtitle">Reg:</span> {{$reg}}</td>
                <td colspan="2"><span class="formtitle">Safe Working Load:</span> {{$safe_working_load}}kg</td>
            </tr>
            <tr style="background:#3377FF;color:white;padding:20px;" class="text-center">
                <td colspan="4"><p style="font-size:20px;">Test Carried Out</p></td>
            </tr>
            <tr>
                <td colspan="1"><span class="formtitle">Overload Test Applied:</span> @if($overload_test_applied == 0) No @else Yes @endif</td>
                <td colspan="1"><span class="formtitle">Reset Relief Valves:</span> @if($reset_relief_valves == 0) No @else Yes @endif</td>
                <td colspan="2"><span class="formtitle">Safe Working Load Test:</span> {{$safe_working_load_test}}kg</td>
            </tr>
            <tr>
                <td colspan="1"><span class="formtitle">Downward Creep in 15 mins:</span> {{$downward_creep}}mm</td>
                <td colspan="1"><span class="formtitle">Check Lift & Mountings:</span> @if($check_lift_mountings == 0) No @else Yes @endif</td>
                <td colspan="2"><span class="formtitle">Operation at SWL Floor/Height:</span>@if($operation_swl_floorheight == 0) No @else Yes @endif</td>
            </tr>
            <tr>
                <td colspan="2"><span class="formtitle">Lift Raises In:</span> {{$lift_raises_in}} seconds</td>
                <td colspan="2"><span class="formtitle">Lift Lowers In:</span> {{$lift_lowers_in}} seconds</td>
            </tr>
            <tr style="background:#3377FF;color:white;padding:20px;" class="text-center">
                <td colspan="4"><p style="font-size:20px;">Decleration & Certification</p></td>
            </tr>
            <tr>
                <td colspan="4">
                    We certify that the above equiptment was tested and throuroughly examined on the date below.
                </td>
            </tr>
            <tr>
                <td colspan="2"><span class="formtitle">Signature:</span> <img id="" src="{{$signature}}" width="200" height="100"></td>
                <td colspan="1"><span class="formtitle">Date Tested:</span><br> {{$date_tested}}</td>
                <td colspan="1"><span class="formtitle">Date Next Due:</span><br> {{$date_next_due}}</td>
            </tr>
            <tr>
                <td colspan="4"><span class="formtitle">Advisory Notes:</span> {{$advisory_notes}}</td>
            </tr>
        </tbody>
        <tfoot style="background:#3377FF;color:white;" class="text-center">
            <tr>
                <td colspan="4">
                    {{$companyname}} | {{$companyemail}} | {{$companyphone}}<br>
                    {{$companyaddress}} {{$companypostcode}}
                </td>
            </tr>
        </tfoot>
    </table>
</body>
</html>