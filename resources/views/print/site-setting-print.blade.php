<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .body{
            font-family: Arial, Helvetica, sans-serif;
        }
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
        .fixedWidth{
            width:400px;
        }
        .header{
            width: 100%;
            display: flex;
            justify-content: center;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h3 style="margin:0 auto;">Site Settings</h3>
    </div>
    <table>
        <thead>

            <th>S.No.</th>
            <th>Code</th>
            <th>Value</th>
            <th>Description</th>
            <th>Created At</th>

        </thead>
        <tbody>
            @foreach($datas as $key=> $siteSetting)
            <tr>

                <td>{{$key+1}}</td>
                <td>{{$siteSetting['code']}}</td>
                <td>{{$siteSetting['value']}}</td>
                <td class="fixedWidth">{{$siteSetting['description']}}</td>
                <td>{{$siteSetting['created_at']->format('d-m-Y')}}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>