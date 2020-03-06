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

            <th>City</th>
            <th>County</th>
            <th>State</th>
            <th>Zip Code</th>
            <th>Price</th>
            <th>Created At</th>

        </thead>
        <tbody>
            @foreach($datas as $location)
            <tr>

                <td>{{$location['city']}}</td>
                <td>{{$location['county']}}</td>
                <td>{{$location['state']}}</td>
                <td>{{$location['zipcode']}}</td>
                <td>{{$location['price']}}</td>
                <td>{{$location['created_at']->format('d-m-Y')}}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>