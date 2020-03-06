<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/images/favicon/1.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon/1.png" type="image/x-icon">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Lato|Poppins&display=swap" rel="stylesheet">

    <title>Order Reservation Mail</title>

    <style type="text/css">
        body {
            font-family: poppins;
        }

        .enqMailContent {
            padding: 15px;
            background: #fbfbfb;
        }

        .enqHeader {
            display: flex;
            justify-content: space-between;
        }
        .enqHeadAdd{
            width: 267px;
        }
        .enqHeadLogo{
            width:300px
        }

        .enqClientInfo label {
            font-weight: 600;

        }

        .enqClientInfo span {
            /* font-weight: 300; */
        }

        /* .enqClientInfo {
            display: flex;
            flex-direction: column;
        } */

        .enqMsg {
            display: flex;
            flex-direction: column;
        }

        .enqInfoTable table {
            width: 50% !important;
        }

        table {
            width: 100%;
            text-align:left;
        }
        table {
            border-collapse: collapse;
        }

        th {
            background:#f4f4f4;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding-left:15px;
        }
        address{
            text-align:right;
            font-weight: bold;
        }
    </style>
</head>
<body style="width:600px">
    <div class="enqMailContent">
        <div class="enqHeader" style="display: flex;justify-content: space-between !important;padding-bottom: 18px;width:600px">
            <div class="enqHeadLogo">
                <img src="{{request()->root().'/admin/companylogo'}}" class="main-logo" style="height: 70px;width: auto;">
            </div>
            <div class="enqHeadAdd">
                <address>
                    {{custom_exploder('|',default_company('address'))[0]}}<br>
                    {{custom_exploder('|',default_company('address'))[1]}}<br>
                    @if(isset(custom_exploder('|',default_company('address'))[2]))
                    {!! custom_exploder('|',default_company('address'))[2]."<br />" !!}
                    @endif
                    {{preg_replace('/(\d{3})(\d{3})(\d{4})/','($1) $2-$3',default_company('phone_number'))}}
                </address>
            </div>
        </div>
        <hr>
        <div class="enqInfoReceived">
            <div>
                <strong>
                    We have received the following information from <a href="{{request()->root()}}"> {{request()->root}} </a>
                </strong>
            </div>
            <br>
            <div class="enqClientInfo">                
                <div class="enqInfoTable">
                    <table>
                        <tr>
                            <th style="font-weight:500">
                                <p>Name</p>
                            </th>
                            <td>
                                <p>{{ucfirst($enquiry->fname)." ".ucfirst($enquiry->lname)}}</p>
                            </td>
                        </tr>
                        <tr>
                            <th style="font-weight:500">
                                <p>Company</p>
                            </th>
                            <td>
                                <p>{{ucfirst($enquiry->company)." ".ucfirst($enquiry->company)}}</p>
                            </td>
                        </tr>
                        <tr>
                            <th style="font-weight:500">
                                <p>Phone</p>
                            </th>

                            <td>
                                <p>{{$enquiry->phone ? preg_replace('/(\d{3})(\d{3})(\d{1,4})/', '($1) $2-$3', $enquiry->phone) : ''}}</p>
                            </td>
                        </tr>
                    </table>
                </div>
                <br>
                <div class="enqMsg">
                    <label>Message:</label>
                    <span style="margin-left:10px;"> 
                        {{$enquiry->desc ? ucfirst($enquiry->desc) : ''}}
                    </span>
                </div>
                <br>         
                <div class="userAgentTable">
                    <label>User Agent:</label>
                    <table style="margin-top:5px;">                       
                        <tbody>
                            <tr>
                                <th style="font-weight:500">
                                    <p>Date</p>
                                </th>
                                <td>
                                    <p>{{date('m/d/Y h:i', strtotime($enquiry->created_at))}}</p>
                                </td>
                            </tr>
                            <tr>
                                <th style="font-weight:500">
                                    <p>IP Address</p>
                                </th>
                                <td>
                                    <p>{{$enquiry->ip}}</p>
                                </td>
                            </tr>
                            <tr>
                                <th style="font-weight:500">
                                    <p>Browser</p>
                                </th>
                                <td>
                                    <p>{{ucfirst($enquiry->browser)}}</p>
                                </td>  
                            </tr>
                            <tr>       
                                <th style="font-weight:500">
                                    <p>Fingerprint</p>
                                </th>                   
                                <td>
                                    <p>{{$enquiry->fingerprint}}</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>