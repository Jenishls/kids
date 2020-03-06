<html>
<head>
    <title>Title</title>
    <style>
        .body {
            font-size: 11px;
            font-family: 'Poppins', sans-serif;
        }

        .searchArea {
            width: 100%;
            float: left;
            font-size: 11px;
            font-family: 'Poppins', sans-serif;
        }

        .searchArea .part {
            width: 50%;
            float: left;
            text-align: right;
        }

        table.headerArea {
            width: 100%;
            margin-bottom: 20px;
        }

        table.headerArea tr td {
            width: 40%;
            font-family: 'Poppins', sans-serif;
        }

        table.options {
            width: 80%;
            float: left;
            margin-bottom: 20px;
        }

        table.options tr td {
            padding: 5px;
            font-size: 11px;
            font-family: 'Poppins', sans-serif;
        }

        /*table.options tr td:first-child {*/
            /*text-align: right;*/
        /*}*/

        table.dataTable {
            margin-top: 20px;
            width: 100%;
        }

        table.dataTable tr th {
            text-align: left;
        }

        table.dataTable tr th, table.dataTable tr td {
            padding: 5px;
            font-size: 11px;
            font-family: 'Poppins', sans-serif;
        }

        table.dataTable tbody tr:last-child {
            font-weight: bolder;
        }
    </style>
</head>
<body>
<?php
if (isset($datas)) {
	$data = $datas;
}

if (isset($fields)) {
	$field = $fields;
}

$request = array_key_exists('request', $data) ? $data['request'] : [];
$table = array_key_exists('table', $data) ? $data['table'] : '';
unset($data['request']);
unset($data['table']);
$dateArr = ['jul', 'aug', 'sept', 'oct', 'nov', 'dec', 'jan', 'feb', 'mar', 'apr', 'may', 'jun']
?>
<table class="headerArea">
    <tr style="width: 100%;">
        <td style="width: 20%">
            <img src="data:image/png;base64, {{ base64_encode(file_get_contents(public_path('cratesOnSkatesImages\\crates-logo.png'))) }}" style="max-width: 100%;">
        </td>
        <td style="width:60%; font-family: 'Poppins', sans-serif;font-size: 12px; text-align: center;">
            <strong style="font-size: 13px;">{{ config('app.name') }}</strong><br>
            <strong style="margin-top: 10px">{{strtoupper($table)}}</strong>
        </td>
        <td style="width: 20%; font-family: 'Poppins', sans-serif;font-size: 11px; text-align: right;">
            <?php echo 'Date: ' . date('m/d/Y H:i:s'); ?><br>
            <span style="margin-bottom: 30px;margin-top:0px;font-size:14px;">
                {{ default_company('address') }}
            </span>
        </td>
    </tr>
</table>

<table class="options">
    {{--<tr>--}}
        {{--<td></td>--}}
        {{--<td><strong>Search Criteria </strong></td>--}}
    {{--</tr>--}}
    @foreach($request as $d=>$v)
        <tr>
            <td style="width:20%;">{{$d}}:</td>
            <td>@if($v==null) All @elseif(is_array($v) && count($v)>0) {{implode(', ',$v)}} @else {{$v}} @endif</td>
        </tr>
    @endforeach
</table>

<table class="dataTable" border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse;" align="center">
    <thead>
    <tr>
        @foreach($field as $key => $value)
            <th>{{$value}}</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($data as $da)
        <tr>
            @foreach($da as $k=>$v)
                <td>{!! ucfirst($v) !!}</td>
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>