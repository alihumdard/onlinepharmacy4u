<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 100%;
            max-width: 960px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .main-cont {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .pdf-load li {
            list-style: none;
        }

        .pdf-load ul {
            padding-left: 0;
        }

        .ship,
        .item {
            margin-bottom: 20px;
        }

        .item h4 {
            margin: 0;
        }

        .text-end {
            text-align: end;
        }

        .thank-u {
            margin-top: 20px;
            text-align: center;
        }

        .thank-u p {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1px !important;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            max-width: 100px;
            height: auto;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        #tbl_header,
        #tbl_shiping {
            border: none;
            width: 100%;
        }

        #tbl_header td:first-child {
            text-align: left;
        }

        #tbl_header td:last-child {
            text-align: right;
        }

        #tbl_shiping td {
            text-align: left;
            padding: 10px 10px;
        }

        #tbl_pro_details td {
            text-align: center;
            padding: 10px 10px;
        }
    </style>
</head>

<body>
    <div class="container pdf-load">

        <div class="main-cont">
            <table id="tbl_header" style="border: none !important;">
                <tr style="border: none !important;">
                    <td style="border: none !important;">
                        <h2>Online Pharmacy 4U</h2>
                    </td>
                    <td style="border: none !important;">
                        <ul>
                            <li>#{{$order['id'] ?? ''}}</li>
                            <li>{{ \Carbon\Carbon::parse($order['created_at'] ?? '')->format('M, d, Y - H:i') }}</li>
                        </ul>
                    </td>
                </tr>
            </table>
            <table id="tbl_shiping">
                <tr>
                    <td style="border: none !important;">
                        <div class="col-6">
                            <div class="ship">
                                <h4>Ship to</h4>
                                <ul>
                                    <li>City: {{$order['shipingdetails']['city'] ?? ''}}</li>
                                    <li>Postal Code: {{$order['shipingdetails']['zip_code'] ?? ''}}</li>
                                    <li>Address: {{$order['shipingdetails']['address'] ?? ''}}</li>
                                    <li>Apartment: {{$order['shipingdetails']['address2'] ?? ''}}</li>
                                    <li>Phone: {{$order['shipingdetails']['phone'] ?? ''}}</li>
                                </ul>
                            </div>
                        </div>
                    </td>
                    <td style="border: none !important;">
                        <div class="col-6">
                            <div class="ship">
                                <h4>Bill to</h4>
                                <ul>
                                    <li>City: {{$order['shipingdetails']['city'] ?? ''}}</li>
                                    <li>Postal Code: {{$order['shipingdetails']['zip_code'] ?? ''}}</li>
                                    <li>Address: {{$order['shipingdetails']['address'] ?? ''}}</li>
                                    <li>Apartment: {{$order['shipingdetails']['address2'] ?? ''}}</li>
                                    <li>Phone: {{$order['shipingdetails']['phone'] ?? ''}}</li>
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="item">
                    <h4>Items</h4>
                    <table id="tbl_pro_details">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order['orderdetails'] ?? [] as $key => $val)
                            <tr>
                                @php
                                $src = (isset($val['variant']))? $val['variant']['image'] : $val['product']['main_image'];
                                @endphp
                                <td>
                                    <img src="{{ public_path('storage/'.$src) }}" alt="Product Image">
                                </td>
                                <td>
                                    <ul>
                                        <li>
                                            <p class="text-muted mb-0">{{$val['product_name'] ?? $val['product']['title']}}</p>
                                        </li>
                                        <li>2%</li>
                                        <li>00994</li>
                                    </ul>
                                </td>
                                <td class="text-end">{{$val['product_qty']}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="thank-u">
                <h5>Dear Valued Customer, Thank you for choosing us for your pharmacy needs!</h5>
                <h6>Registered Office: 20-22 Wenlock Road, London N1 7GU.Company No: 13991146 VAT No: 440660907</h6>
                <p>Would you consider recommending our services to your Friends & Family? We take pride in providing hassle-free NHS prescription services, absolutely FREE of charge.</p>
                <p>Download our FREE app directly from our website today! </p>
                <p>https://nhs-prescriptions.uk/</p>
                <p>Enjoy the ease of having your prescriptions delivered to your door, FREE and FAST. </p>
                <p>Yours sincerely, </p>
                <p>Online Pharmacy 4U</p>
                <p>info@online-pharmacy4u.co.uk</p>
                <p>www.online-pharmacy4u.co.uk</p>
            </div>
        </div>
    </div>
</body>

</html>