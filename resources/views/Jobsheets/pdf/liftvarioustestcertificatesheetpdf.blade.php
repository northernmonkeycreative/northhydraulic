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
                    <p style="font-size:20px;">Miscellaneous Test Certificate</p>
                    {{-- <p style="font-size:20px;">Equipment Test Certificate</p> --}}
                </th>
            </tr>
        </thead>
        <tbody class="text-left">
            <tr>
                <td colspan="3">CERTIFICATE OF TEST AND THOROUGH EXAMINATION OF EQUIPMENT LIFTING OPERATIQN AND LIFTING EQUIPMENT REGULATIONS 1998 (REGULATION 9)</td>
            </tr>
            <tr class="text-left">
                <td><span class="formtitle">Address Where Exam took Place:</span> {{$exam_location}}</td>
                <td><span class="formtitle">Date Of Last Examination:</span> {{$date_last_exam}}</td>
                <td><span class="formtitle">Certificate Number:</span> {{$cert_no}}</td>
            </tr>
            <tr style="background:#3377FF;color:white;padding:20px;" class="text-center">
                <td colspan="3"><p style="font-size:20px;">Customer Information</p></td>
            </tr>
            <tr>
                <td colspan="3"><span class="formtitle">Customer Name:</span> {{$customer}}</td>
            </tr>
            <tr>
                <td colspan="3"><span class="formtitle">Customer Address:</span> {{$customeraddress}}</td>
            </tr>
            <tr style="background:#3377FF;color:white;padding:20px;" class="text-center">
                <td colspan="3"><p style="font-size:20px;">Vehicle Details</p></td>
            </tr>
            <tr>
                <td colspan="3"><span class="formtitle">Vehicle Make:</span> {{$vehicle_make}}</td>
            </tr>
            <tr>
                <td colspan="3"><span class="formtitle">Vehicle Model:</span> {{$vehicle_model}}</td>
            </tr>
            <tr>
                <td colspan="3"><span class="formtitle">Vehicle Reg:</span> {{$vehicle_reg}}</td>
            </tr>
            <tr>
                <td colspan="3"><span class="formtitle">Vehicle VIN No:</span> {{$vehicle_vin}}</td>
            </tr>
            <tr>
                <td colspan="3"><span class="formtitle">Job Number:</span> {{$jobnumber}}</td>
            </tr>
            <tr style="background:#3377FF;color:white;padding:20px;" class="text-center">
                <td colspan="3"><p style="font-size:20px;">Lifting Equipment Details</p></td>
            </tr>
            <tr>
                <td colspan="3"><span class="formtitle">Description Of Equipment:</span> {{$lifting_description}}</td>
            </tr>
            <tr>
                <td colspan="3"><span class="formtitle">Model:</span> {{$lifting_model}}</td>
            </tr>
            <tr>
                <td colspan="3"><span class="formtitle">Serial:</span> {{$lifting_serial}}</td>
            </tr>
            <tr>
                <td colspan="3"><span class="formtitle">Year:</span> {{$lifting_year}}</td>
            </tr>
            <tr>
                <td colspan="3"><span class="formtitle">Safe Working Load:</span> {{$lifting_safe_working_load}}kg</td>
            </tr>
            <tr>
                <td colspan="3"><span class="formtitle">DETAILS OF TEST AND THOROUGH EXAMINATION CARRIED OUT INSPECTION OF ALL SAFETY DEVICES, & MOVING PARTS</span></td>
            </tr>
            <tr>
                <td colspan="3"> {{$details}}</td>
            </tr>
            <tr>
                <td colspan="3"><span class="formtitle">I hereby certify that the equipment detailed above was thoroughly examined (unless otherwise stated) and subject to any remedial action to defects shown on this report which are or could become a danger to persons, the equipment is safe to operate, This report relates only to ihe condition of the equipment at the time of examination. lt should not be regarded as evidence of the condition at any other time. Nor does it remove the requirement for the user lo ensure that the equipment is fit for purpose at all other times.</span></td>
            </tr>
            <tr style="background:#3377FF;color:white;padding:20px;" class="text-center">
                <td colspan="3"><p style="font-size:20px;">FOR AND BEHALF OF NORTH HYDRAULIC SERVICES LTD </p></td>
            </tr>
            <tr>
                <td colspan="2"><span class="formtitle">Signature of Engineer:</span> <img id="" src="{{$engineer_signature}}" width="200" height="100"></td>
                <td colspan="1"><span class="formtitle">Engineer Name:</span> {{$engineer_name}}</td>
            </tr>
            <tr>
                <td colspan="2"><span class="formtitle">Date Of Examination:</span> {{$date_of_exam}}</td>
                <td colspan="1"><span class="formtitle">Date Next Exam Due:</span> {{$date_next_exam}}</td>
            </tr>
        </tbody>
        <tfoot style="background:#3377FF;color:white;" class="text-center">
            <tr>
                <td colspan="3">
                    {{$companyname}} | {{$companyemail}} | {{$companyphone}}<br>
                    {{$companyaddress}} {{$companypostcode}}
                </td>
            </tr>
        </tfoot>
    </table>
</body>
</html>