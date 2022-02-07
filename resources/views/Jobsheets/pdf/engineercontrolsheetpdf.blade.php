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
                    <p style="font-size:20px;">Engineer Control Sheet</p>
                </th>
            </tr>
        </thead>
        <tbody class="text-left">
            <tr class="text-left">
                <td><span class="formtitle">Job No:</span> {{$jobnumber}}</td>
                <td><span class="formtitle">Start Date:</span> {{$startdate}}</td>
                <td><span class="formtitle">Engineer:</span> {{$engineer}}</td>
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
                <td colspan="3"><p style="font-size:20px;">Job Description</p></td>
            </tr>
            <tr>
                <td colspan="3"><span class="formtitle">Vehicle Registration:</span> {{$vehiclereg}}</td>
            </tr>
            <tr>
                <td colspan="3"><span class="formtitle">Vehicle Description:</span> {{$vehicledescription}}</td>
            </tr>
            <tr>
                <td colspan="3"><span class="formtitle">Action Taken:</span> {{$actiontaken}}</td>
            </tr>
            <tr>
                <td colspan="3"><span class="formtitle">Parts Used:</span> {{$partsused}}</td>
            </tr>
            <tr>
                <td colspan="3"><span class="formtitle">Further Action:</span> {{$furtheraction}}</td>
            </tr>
            <tr>
                <td colspan="2"><span class="formtitle">Customer Signature:</span> <img id="" src="{{$customersignature}}" width="auto"></td>
                <td><span class="formtitle">Date:</span> {{$customersignaturedate}}</td>
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