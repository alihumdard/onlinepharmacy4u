<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Prints</title>
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
        <h2 style="text-align: center;">Online Pharmacy 4U</h2>
        @foreach($orders as $key => $order)
        <div class="main-cont">
            <table id="tbl_header" style="border: none !important;">
                <tr style="border: none !important;">
                    <td style="border: none !important;">
                        <ul>
                            <li><b>{{++$key}}. </b>Order No: #{{$order['id'] ?? ''}}</li>
                        </ul>
                    </td>
                    <td style="border: none !important;">
                        <ul>
                            <li>{{ \Carbon\Carbon::parse($order['created_at'] ?? '')->format('M, d, Y - H:i') }}</li>
                        </ul>
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
                                    <img style="height:60px" src="{{ public_path('storage/'.$src) }}" alt="Product Image">
                                </td>
                                <td style="text-align: left !important;">
                                    <ul>
                                        <li><b>Product Name:</b> {{$val['product_name'] ?? $val['product']['title']}}</li>
                                        <li><b>Variant:</b> 2%</li>
                                        <li><b>SKU:</b> 00994</li>
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
        @endforeach
        <div class="row">
            <div class="thank-u">
                <p>info@online-pharmacy4u.co.uk</p>
                <p>www.online-pharmacy4u.co.uk</p>
            </div>
        </div>
    </div>
</body>

</html>