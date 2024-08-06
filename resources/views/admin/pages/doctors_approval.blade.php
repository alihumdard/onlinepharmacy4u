@extends('admin.layouts.default')
@section('title', 'POM Orders')
@section('content')
<!-- main stated -->
<main id="main" class="main">

    <style>
        .edit i {
            color: #4154F1;
            font-size: 20px;
            margin-right: 10px;
            margin-left: 10px;
        }

        .delete i {
            color: #E34724;
            font-size: 20px;
            margin-left: 10px;
        }

        .card-body table tr {
            background-color: #E34724 !important;
        }

        /* Custom CSS for DataTables buttons */
        .btn-blue {
            background-color: blue !important;
            color: white !important;
            border: none !important;
            border-radius: 5px !important;
            margin-right: 5px;
            font-weight: bold;
        }

        .btn-blue:hover {
            background-color: darkblue !important;
        }

        .table-stripe tbody tr:nth-child(odd) {
            background-color: lightblue;
        }

        .table-stripe tbody tr:nth-child(even) {
            background-color: deepskyblue;
        }

        /* Custom checkbox styles */
        .custom-checkbox {
            position: relative;
            display: inline-block;
            width: 19px;
            height: 21px;
            background-color: #fff;
            border: 2px solid #6c757d;
            border-radius: 5px;
            cursor: pointer;
        }

        .custom-checkbox::after {
            background-color: #03c4a5 !important;
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 12px;
            height: 12px;
            border-bottom: 2px solid #000;
            /* Changed border color to black */
            border-right: 2px solid #000;
            /* Changed border color to black */
            transform-origin: bottom right;
            opacity: 0;
            transition: opacity 0.2s ease;
        }

        /* Checkbox checked state */
        .custom-checkbox input:checked+.custom-checkbox::after {
            opacity: 1;
        }

        /* Change background color to green when checked */
        .custom-checkbox input:checked+.custom-checkbox {
            background-color: #03c4a5 !important;
            /* Green background color */
        }

        /* Hide the default checkbox */
        .custom-checkbox input[type="checkbox"] {
            opacity: 0;
            width: 0;
            height: 0;
            background-color: #03c4a5 !important;
        }

        .dataTables_wrapper .dataTables_filter {
            float: right;
            text-align: right;
            visibility: hidden;
        }

        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap");

        * {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }


        #container {
            height: 50px;
            background-color: #fff;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
        }

        #container .text {
            border: none;
            background: none;
            font-size: 1.3rem;
            font-weight: 800;
            text-align: right;

        }

        #container #menu-wrap {
            position: relative;
            height: 25px;
            width: 25px;
        }

        #container #menu-wrap .dots {
            position: absolute;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            z-index: 1;
        }

        #container #menu-wrap .dots>div,
        #container #menu-wrap .dots>div:after,
        #container #menu-wrap .dots>div:before {
            height: 6px;
            width: 6px;
            background-color: rgba(49, 49, 49, 0.8);
            border-radius: 50%;
            -webkit-transition: 0.5s;
            -o-transition: 0.5s;
            transition: 0.5s;
        }

        #container #menu-wrap .dots>div {
            position: relative;
        }

        #container #menu-wrap .dots>div:after {
            content: "";
            position: absolute;
            bottom: calc((25px / 2) - (6px / 2));
            left: 0;
        }

        #container #menu-wrap .dots>div:before {
            content: "";
            position: absolute;
            top: calc((25px / 2) - (6px / 2));
            left: 0;
        }

        #container #menu-wrap .menu {
            position: absolute;
            right: -10px;
            top: calc(-12px + 50px);
            width: 0;
            height: 0;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px 15px;
            -webkit-box-shadow: 2px 4px 6px rgba(49, 49, 49, 0.2);
            box-shadow: 2px 4px 6px rgba(49, 49, 49, 0.2);
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: flex-start;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
        }

        #container #menu-wrap .menu ul {
            list-style: none;
        }

        #container #menu-wrap .menu ul li {
            margin: 15px 0;
        }

        #container #menu-wrap .menu ul li .link {
            text-decoration: none;
            color: rgba(49, 49, 49, 0.85);
            opacity: 0;
            visibility: hidden;
        }

        #container #menu-wrap .toggler {
            position: absolute;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            cursor: pointer;
            z-index: 2;
        }

        #container #menu-wrap .toggler:hover+.dots>div,
        #container #menu-wrap .toggler:hover+.dots>div:after,
        #container #menu-wrap .toggler:hover+.dots>div:before {
            background-color: rgba(49, 49, 49, 0.6);
        }

        #container #menu-wrap .toggler:checked+.dots>div {
            -webkit-transform: translateX(calc(((25px / 2) - (6px / 2)) * -0.7071067812)) translateY(calc(((25px / 2) - (6px / 2)) * -0.7071067812));
            -ms-transform: translateX(calc(((25px / 2) - (6px / 2)) * -0.7071067812)) translateY(calc(((25px / 2) - (6px / 2)) * -0.7071067812));
            transform: translateX(calc(((25px / 2) - (6px / 2)) * -0.7071067812)) translateY(calc(((25px / 2) - (6px / 2)) * -0.7071067812));
        }

        #container #menu-wrap .toggler:checked+.dots>div:after {
            -webkit-transform: translateX(calc(((25px / 2) - (6px / 2)) * 0.7071067812)) translateY(calc((2 * (25px / 2) - (6px / 2)) * 0.7071067812));
            -ms-transform: translateX(calc(((25px / 2) - (6px / 2)) * 0.7071067812)) translateY(calc((2 * (25px / 2) - (6px / 2)) * 0.7071067812));
            transform: translateX(calc(((25px / 2) - (6px / 2)) * 0.7071067812)) translateY(calc((2 * (25px / 2) - (6px / 2)) * 0.7071067812));
        }

        #container #menu-wrap .toggler:checked+.dots>div:before {
            -webkit-transform: translateX(calc(2 * (((25px / 2) - (6px / 2)) * 0.7071067812))) translateY(calc(((25px / 2) - (6px / 2)) - (((25px / 2) - (6px / 2)) * 0.7071067812)));
            -ms-transform: translateX(calc(2 * (((25px / 2) - (6px / 2)) * 0.7071067812))) translateY(calc(((25px / 2) - (6px / 2)) - (((25px / 2) - (6px / 2)) * 0.7071067812)));
            transform: translateX(calc(2 * (((25px / 2) - (6px / 2)) * 0.7071067812))) translateY(calc(((25px / 2) - (6px / 2)) - (((25px / 2) - (6px / 2)) * 0.7071067812)));
        }

        #container #menu-wrap .toggler:checked:hover+.dots>div,
        #container #menu-wrap .toggler:checked:hover+.dots>div:after,
        #container #menu-wrap .toggler:checked:hover+.dots>div:before {
            background-color: rgba(49, 49, 49, 0.6);
            -webkit-transition: 0.5s;
            -o-transition: 0.5s;
            transition: 0.5s;
        }

        #container #menu-wrap .toggler:checked~.menu {
            opacity: 1;
            visibility: visible;
            width: 150px;
            height: 130px;
            -webkit-transition: 0.5s;
            -o-transition: 0.5s;
            transition: 0.5s;
        }

        #container #menu-wrap .toggler:checked~.menu ul .link {
            opacity: 1;
            visibility: visible;
            -webkit-transition: 0.5s ease 0.3s;
            -o-transition: 0.5s ease 0.3s;
            transition: 0.5s ease 0.3s;
        }

        #container #menu-wrap .toggler:checked~.menu ul .link:hover {
            color: #2980b9;
            -webkit-transition: 0.2s;
            -o-transition: 0.2s;
            transition: 0.2s;
        }

        #container #menu-wrap .toggler:not(:checked)~.menu {
            -webkit-transition: 0.5s;
            -o-transition: 0.5s;
            transition: 0.5s;
        }

        #container #menu-wrap .toggler:not(:checked)~.menu ul .link {
            opacity: 0;
            visibility: hidden;
            -webkit-transition: 0.1s;
            -o-transition: 0.1s;
            transition: 0.1s;
        }

        @media (max-width: 600px) {
            #container {
                position: absolute;
                top: 50px;
                width: calc(100% - 40px);
                margin: 0;
            }
        }
    </style>

    <div class="pagetitle">
        <h1><a href="javascript:void(0);" onclick="window.history.back();" class="btn btn-primary-outline fw-bold "><i class="bi bi-arrow-left"></i> Back</a> | POM Orders</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item">Pages</li>
                <li class="breadcrumb-item active">POM Orders</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header mt-3 d-flex justify-content-between align-items-center">
                        <div id="tbl_buttons" style="border: 0 !important; border-color: transparent !important;">
                        </div>
                        <div class="p-2">
                            <div id="container">
                                <input type="text" class="text" placeholder="More Actions" disabled>
                                <div id="menu-wrap">
                                    <input type="checkbox" class="toggler">
                                    <div class="dots">
                                        <div></div>
                                    </div>
                                    <div class="menu">
                                        <div>
                                            <ul>
                                                <li><a href="#" class="link" id="select-all">Select All</a></li>
                                                <li><a href="#" class="link" id="print-slips">Print Slips</a></li>
                                                <li><a href="#" class="link" id="deselect-all">Unselect</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 px-4">
                        <div class="col-md-12 mt-3 text-center d-block">
                            <label for="search" class="form-label fw-bold">Search From Table </label>
                            <input type="text" id="search" placeholder="Search here..." class="form-control py-2">
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="tbl_data" class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Action</th>
                                    <th>#</th>
                                    <th>Order No.</th>
                                    <th>Total Orders</th>
                                    <th>Date-Time</th>
                                    <th>Customer Name</th>
                                    @if($user->role == user_roles('1'))
                                    <th>Total Atm.</th>
                                    @endif
                                    <th>Order Type</th>
                                    <th>Payment Status</th>
                                    <th>Order Status</th>
                                    <th>Marked By </th>
                                    @if($user->role != user_roles('3'))
                                    <th> Shiped Order</th>
                                    @endif
                                    @if($user->role == user_roles('1'))
                                    <th> Duplicate Order</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders ?? [] as $key => $val)
                                <tr>
                                    <td style="align-items: center; ">
                                        <div class="text-center d-flex align-items-center justify-content-center">
                                            <input class="custom-checkbox" id="checkbox_{{$val['id']}}" name="checkbox_{{$val['id']}}" type="checkbox" value="{{$val['id']}}">
                                        </div>
                                    </td>
                                    <td>{{ ++$key }}</td>
                                    <td>
                                        <a href="{{ route('admin.orderDetail',['id'=> base64_encode($val['id'])]) }}" class="text-primary mb-0 font-weight-semibold fw-bold" style="font-size: smaller; display:flex; ">
                                            #{{ $val['id'] }}
                                        </a>
                                    </td>
                                    <td>
                                        @if(isset($order_history[$val['email']]))
                                        <span class=" px-5 fw-bold">{{ $order_history[$val['email']]['total_orders'] ?? 0}} </span>
                                        @endif
                                    </td>
                                    @php
                                    $isNewOrder = null;
                                    if($val['status'] == 'Received'):
                                    $createdAt = isset($val['created_at']) ? strtotime($val['created_at']) : null;
                                    $isNewOrder = $createdAt && ($createdAt > strtotime('-3 days'));
                                    endif;
                                    @endphp
                                    <td>
                                        @if($isNewOrder)
                                        <span class="badge bg-primary">New Order</span> <br>
                                        @endif
                                        {{date_time_uk($val['created_at'])}}
                                    </td>

                                    <td>{{ $val['shipingdetails']['firstName'] .' '. $val['shipingdetails']['lastName']  ?? $val['user']['name']  }}</td>
                                    @if($user->role == user_roles('1'))
                                    <td>£{{ number_format((float)str_replace(',', '', $val['total_ammount']), 2) }}</td>
                                    @endif
                                    <td><span class="btn  fw-bold rounded-pill {{ ($val['order_type'] == 'premd') ? 'btn-primary': (($val['order_type'] == 'pmd') ? 'btn-warning' : 'btn-success') }}">{{ ($val['order_type'] == 'premd') ? 'POM': (($val['order_type'] == 'pmd') ? 'P.Med' : 'O.T.C') }}</span> </td>
                                    <td><span class="btn fw-bold rounded-pill btn-success"> {{$val['payment_status'] ?? ''}}</span> </td>
                                    <td><span class="btn  fw-bold {{ $val['status'] == 'Not_Approved'  || $val['status'] == 'ShippingFail' ?  'btn-danger' :'' }} {{ $val['status'] == 'Approved' ?  'btn-success' :'' }} {{ $val['status'] == 'Received' ?  'btn-primary' :'' }} {{ $val['status'] == 'Not_Approved' ?  'btn-danger' :'' }}">{{ $val['status'] ?? '' }}</span></td>
                                    <td style="display: inline-block;">
                                        @if($val['status'] != 'Received')
                                        <span>{{ $val['approved_by']['name'] }} ({{ $val['approved_by']['email'] }} )</span>
                                        @endif
                                    </td>
                                    @if($user->role != user_roles('3'))
                                    <td style="display: inline-block;">
                                        @if($val['status'] == 'Approved' || $val['status'] == 'ShippingFail' )
                                        <span data-order_id="{{$val['id']}}" class="btn  ship_now fw-bold btn-primary no-wrap">Ship Now</span>
                                        @endif
                                        @if($val['status'] == 'Shiped')
                                        <span class="btn  fw-bold btn-success no-wrap">Shiped</span>
                                        @endif
                                    </td>
                                    @endif
                                    @if($user->role == user_roles('1'))
                                    <th style="vertical-align: middle; text-align: center;">
                                        <button type="button" data-order-id="{{ $val['id'] }}" class="btn btn-small bg-primary  rounded-pill text-center duplicate-order">
                                            <i class="bi bi-arrow-repeat"></i>
                                        </button>
                                    </th>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>

</main>
<!-- End #main -->
<form id="bulk_print" action="{{route('pdf.bulkPrint')}}" method="post">
    <input type="hidden" name="order_ids" value="" required>
    <input type="hidden" name="role" value="{{ $user->role ?? ''}}" required>
    <input type="hidden" name="view_name" value="order_bulk_print" required>
</form>
<form id="form_shiping_now" action="{{route('admin.createShippingOrder')}}" method="POST">
    @csrf
    <input type="hidden" id="shiping_order" name="id" required value="">
</form>
@stop

@pushOnce('scripts')
<script>
    $(document).ready(function() {
        $(document).on('click', '.duplicate-order', function() {
            var orderId = $(this).data('order-id');
            $.ajax({
                url: "{{route('admin.duplicateOrder')}}",
                type: 'POST',
                data: {
                    _token: "{{csrf_token()}}",
                    order_id: orderId
                },
                success: function(response) {
                    alert('Order duplicated successfully!');
                    window.location.href = "{{route('admin.ordersCreated')}}";

                },
                error: function(xhr, status, error) {
                    alert('Error duplicating order.');
                    console.error(error);
                }
            });
        });
    });


    $(function() {
        $("#tbl_data").DataTable({
            "paging": true,
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "pageLength": 50,
            "buttons": [{
                    extend: 'pdf',
                    text: 'Download PDF ',
                    className: 'btn-blue',
                },

                {
                    extend: 'print',
                    text: 'Print Out',
                    className: 'btn-blue',
                }
            ]
        }).buttons().container().appendTo('#tbl_buttons');
    });
    $(document).ready(function() {
        var tableApi = $('#tbl_data').DataTable();
        $('#search').on('input', function() {
            let text = $(this).val();
            if (text === '') {
                tableApi.search('').draw();
            } else {
                tableApi.search(text).draw();
            }
        });

        $(document).on('click', '#select-all', function() {
            $('.custom-checkbox').prop('checked', true);
        });


        $(document).on('click', '#deselect-all', function() {
            $('.custom-checkbox').prop('checked', false);
        });

        $(document).on('click', "#print-slips", function() {
            var selectedIds = [];
            $('.custom-checkbox:checked').each(function() {
                selectedIds.push($(this).val());
            });

            if (selectedIds.length > 0) {
                $('input[name="order_ids"]').val(selectedIds);
                $('#bulk_print').submit();
            } else {
                alert('Please select at least one order.');
            }
        });

        $(document).on('click', ".ship_now", function() {
            let order_id = $(this).data('order_id');
            alert(order_id);
            $('#shiping_order').val(order_id);
            $('#form_shiping_now').submit();
        });
    });
</script>
@endPushOnce