<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oder Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        .pdf-load li {
            list-style: none;

        }

        .pdf-load ul {
            padding-left: 0 !important;
        }
    </style>
</head>

<body>
    <div class="container pdf-load">
        <div class="main-cont d-flex justify-content-between">
            <h2>Online Phamarcy 4U</h2>
            <ul>
                <li>#{{$order['id'] ?? ''}}</li>
                <li>{{ \Carbon\Carbon::parse($order['created_at'])->format('M, d, Y - H:i') }}</li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="ship">
                    <h4>Ship to</h4>
                    <ul>
                        <li>City: {{$order['shipingdetails']['city'] ?? ''}}</li>
                        <li>Postal Code: {{$order['shipingdetails']['zip_code'] ?? ''}}</li>
                        <li>Address: {{$order['shipingdetails']['address'] ?? ''}}</li>
                        <li>Appartment: {{$order['shipingdetails']['address2'] ?? ''}}</li>
                        <li>Phone: {{$order['shipingdetails']['phone'] ?? ''}}</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="ship">
                    <h4>Bill to</h4>
                    <ul>
                        <li>City: {{$order['shipingdetails']['city'] ?? ''}}</li>
                        <li>Postal Code: {{$order['shipingdetails']['zip_code'] ?? ''}}</li>
                        <li>Address: {{$order['shipingdetails']['address'] ?? ''}}</li>
                        <li>Appartment: {{$order['shipingdetails']['address2'] ?? ''}}</li>
                        <li>Phone: {{$order['shipingdetails']['phone'] ?? ''}}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="item d-flex justify-content-between">
                    <h4>items</h4>
                    <h4>items</h4>
                </div>
                <table class="table">
                    <tbody>
                        @foreach($order['orderdetails'] as $key => $val)
                        <tr class="align-items-center">
                            @php
                            $src = (isset($val['variant']))? $val['variant']['image'] : $val['product']['main_image'];
                            @endphp
                            <td>
                                <div class="col-md-1" style="width:100px;">
                                    <img class="img-fluid pt-3 h-100 w-100" id="product_img" src="{{ asset('storage/'.$src) }}" loading="lazy" alt="Prodcut Image">
                                </div>
                            </td>
                            <td>
                                <ul>
                                    <li>
                                        <p class="text-muted mb-0"> {{$val['product_name'] ?? $val['product']['title'] }}</p>
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

        <div class="row">
            <div class="thank-u text-center">
                <h5>thank u</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas vitae nesciunt, consequatur, repellat quis inventore perferendis, minus reprehenderit esse aspernatur cum saepe perspiciatis? Adipisci officiis est veritatis! Blanditiis, ea impedit. Sapiente distinctio, asperiores nostrum aliquid iusto sit reiciendis adipisci, perspiciatis similique quia mollitia optio, fugiat est officiis voluptatem eligendi ipsam?</p>
                <p>Online Phamarcy 4U</p>
                <p>info@gmail.com</p>
                <p>onlineinfo@gmail.com</p>
            </div>
        </div>
    </div>

</body>

</html>