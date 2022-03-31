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
                <td colspan="2"><span class="formtitle">Customer Signature:</span> <img id="" src="data:image/png;base64,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AAQgAAEIQAACEIAABCAAAQhAAAIQgAAEIAABCEAAAhCAAAQgAAEIQAACEIAABCAAAQhAAAIQgAAEIAABCEAAAhCAAAQgAAEIQAACEIAABCAAAQhAAAIQgAAEIAABCEAAAhCAAAQgAAEIQAACEIAABCAAAQhAAAIQgAAEIAABCEAAAhCAAAQgAAEIQAACEIAABCAAAQhAAAIQgAAEIAABCEAAAhCAAAQgAAEIQAACEIAABCAAAQhAAAIQgAAEIAABCEAAAhCAAAQgAAEIQAACEIAABCAAAQhAAAIQgAAEIAABCEAAAhCAAAQgAAEIQAACEIAABCAAAQhAAAIQgAAEIAABCEAAAhCAAAQgAAEIQAACEIAABCAAAQhAAAIQgAAEIAABCEAAAhCAAAQgAAEIQAACEIAABCAAAQhAAAIQgAAEIAABCEAAAhCAAAQgAAEIQAACEIAABCAAAQhAAAIQgAAEIAABCEAAAhCAAAQgAAEIQAACEIAABCAAAQhAAAIQgAAEIAABCEAAAhCAAAQgAAEIQAACEIAABCAAAQhAAAIQgAAEIAABCEAAAhCAAAQgAAEIQAACEIAABCAAAQhAAAIQgAAEIAABCEAAAhCAAAQgAAEIQAACEIAABCAAAQhAAAIQgAAEIAABCEAAAhCAAAQgAAEIQAACEIAABCAAAQhAAAIQgAAEIAABCEAAAhCAAAQgAAEIQAACEIAABCAAAQhAAAIQgAAEIAABCEAAAhCAAAQgAAEIQAACEIAABCAAAQhAAAIQgAAEIAABCEAAAhCAAAQgAAEIQAACEIAABCAAAQhAAAIQgAAEIAABCEAAAhCAAAQgAAEIQAACEIAABCAAAQhAAAIQgAAEIAABCEAAAhCAAAQgAAEIQAACEIAABCAAAQhAAAIQgAAEIAABCEAAAhCAAAQgAAEIQAACEIAABCAAAQhAAAIQgAAEIAABCEAAAhCAAAQgAAEIQAACEIAABCAAAQhAAAIQgAAEIAABCEAAAhCAAAQgAAEIQAACEIAABCAAAQg0i8D/Af8whgR5yYIBAAAAAElFTkSuQmCC" width="200" height="100"></td>
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