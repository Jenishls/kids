<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th {
            background: #ebedf2;
            text-align: left;
            color:#575962;
        }

        th,
        td {
            border: 1px solid #e8e8e8;
            padding: 8px;
            text-align: left;
            color:#6c7293;
        }

        tr:nth-child(even) {
            background: #f9fafb;
        }
    </style>
</head>

<body>
    <table>
        <thead>

            <th>Name</th>
            <th>Coupon Code</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Minimum Price</th>
            <th>Usage</th>
            <th>Amount</th>
            <th>Type</th>
            <th>Created At</th>

        </thead>
        <tbody>
            @foreach($datas as $coupon)
            <tr>

                <td>{{$coupon['name']}}</td>
                <td>{{$coupon['code']}}</td>
                <td>{{$coupon['description']}}</td>
                <td>{{$coupon['start_date']}}</td>
                <td>{{$coupon['end_date']}}</td>
                <td>{{$coupon['min_price']}}</td>
                <td>{{$coupon['usage']}}</td>
                <td>{{$coupon['value']}}</td>
                <td>{{$coupon['type']}}</td>
                <td>{{$coupon['created_at']->format('d-m-Y')}}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>