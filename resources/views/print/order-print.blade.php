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
     <link rel="icon" href="../assets/images/favicon/1.png" type="image/x-icon">
     <link rel="shortcut icon" href="../assets/images/favicon/1.png" type="image/x-icon">
     <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
     <link href="https://fonts.googleapis.com/css?family=Lato|Poppins&display=swap" rel="stylesheet">
</head>

<body>
    <table>
        <thead>

            <th>Date</th>
            <th>Order Number</th>
            <th>Package</th>
            <th>Customer</th>
            <th>Phone</th>
            <th>Invoice ($)</th>
            <th>Delivery Date</th>
            {{-- <th>Return Date</th> --}}
            <th>Status</th>

        </thead>
        <tbody>
            {{-- @foreach($datas as $order)
            <tr>

                <td>{{$order['created_at']->format('d-m-Y')}}</td>
                <td>{{$order['order_no']}}</td>
                <td>{{$order['package_name']}}</td>
                <td>{{$order['customer']}}</td>
                <td>{{$order['phone_no']}}</td>
                <td>{{$order['amount']}}</td>
                <td>{{$order['delivery_date']->format('d-m-Y')}}</td>
                <td>{{$order['return_date']->format('d-m-Y')}}</td>
                <td>{{$order['order_status']}}</td>

            </tr>
            @endforeach --}}
        </tbody>
    </table>
</body>

</html>