<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confimations</title>
    <style>
        .container {
            width: 90%;
            margin: auto;
            max-width: 1100px;
        }

        .main-content {
            max-width: 800px;
            margin: auto;
        }

        .order {
            float: right;
        }

        .button-container {
            display: flex;
            align-items: center;
            margin: 30px 0;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: none;
            border-bottom: 1px solid #dddddd !important;
            text-align: left;
            padding: 8px;
        }

        td ul {
            padding-left: 0px !important;
        }

        td ul li {
            list-style: none;
        }

        .button-container .button {
            padding: 16px;
            background-color: #2D90D5;
            color: #ffffff;
            border: none;
            font-size: 20px;
        }

        .button-container span {
            margin: 0 20px;
        }

        .button-container a {
            color: #000 !important;
            font-size: 20px;
            cursor: pointer;
        }

        .your-order {
            margin-top: 60px;
        }

        @media (max-width: 500px) {
            .container {
                width: 100%;
                padding: 10px;
            }

            .order {
                float: none;
                text-align: center;
                display: block;
                margin: 10px 0;
            }

            .button-container {
                flex-direction: column;
                align-items: center;
            }

            .button-container button {
                font-size: 16px;
                padding: 10px;
                margin-bottom: 10px;
            }

            .button-container span {
                display: none;
            }

            .button-container a {
                font-size: 16px;
            }

            table {
                font-size: 14px;
            }

            td ul li {
                font-size: 14px;
            }

            .your-order h2,
            .your-order p {
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="main-content">
            <h2>{{ $order->shipingdetails->firstName }}</h2>
            <p class="order">Order #{{$order->id }}</p>

            <div class="your-order">
                <h2>Your order is on the way</h2>
                <p>Your order is on the way. Track your shipment to see the delivery status</p>
                <div class="button-container">
                    <a href="{{url('/admin')}}" style="text-decoration: none;" class="button">Visit your order</a><span>or</span>
                    <a href="{{url('/')}}" style="text-decoration: none;">Visit our store</a>
                </div>
                <!-- <p>Royal mail tracking number <strong>QPOOYYDHB90</strong></p> -->
            </div>

            <h2 style="margin-top: 40px;">Items in this shipment</h2>
            <table>
                @foreach($order->orderdetails ?? [] as $key => $val)
                <tr>
                    @php
                    $src = isset($val->variant) ? $val->variant->image : $val->product->main_image;
                    @endphp
                    <td>
                        <img style="height:55px; margin:0 !important; padding:0 !important;" src="{{ public_path('storage/'.$src) }} " alt="Product Image">
                    </td>
                    <td>
                        <ul>
                            <li>{{ $val->product_name ?? $val->product->title }} x {{ $val->product_qty }}</li>
                            <li>{!! $val->variant_details ?? '' !!}</li>
                            <li>{{ $val->variant->barcode ?? $val->product->barcode }}</li>
                        </ul>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>

</html>