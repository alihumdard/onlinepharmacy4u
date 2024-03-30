@extends('admin.layouts.default')
@section('title', 'Order Detail')
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



        .date {
            font-size: 11px
        }

        .comment-text {
            font-size: 12px
        }

        .fs-12 {
            font-size: 12px
        }

        .shadow-none {
            box-shadow: none
        }

        .name {
            color: #007bff
        }

        .cursor:hover {
            color: blue
        }

        .cursor {
            cursor: pointer
        }

        .textarea {
            resize: none
        }
    </style>

    <div class="pagetitle">
        <h1>Order Detail</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Pages</li>
                <li class="breadcrumb-item active">Order Detail</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <!-- Display Success Message -->
            @if(session('status') == 'ShippingFail')
            <div class="alert alert-danger">
                <strong>Error:</strong> {{ session('msg') }}
            </div>
            @endif

            @if(session('status'))
            <div class="alert alert-success">
                <strong>Success:</strong> {{ session('msg') }}
            </div>
            @endif

            <div class="col-md-4">
                <div class="card  d-flex flex-column">
                    <div class="card-header mt-2" style="border: 0 !important; border-color: transparent !important;"></div>
                    <div class="card-body flex-grow-1">
                        <div class="text">
                            <h4 class="fw-bold">Customer Details</h4>
                            <span><b>Name: </b>{{ ($order['shipingdetails']['firstName']) ? $order['shipingdetails']['firstName'].' '.$order['shipingdetails']['lastName'] : $order['user']['name'] }}</span><br>
                            <span><b>Order Id: </b><span class="text-primary">#00{{$order['id']}}</span></span>
                        </div>
                        <div class="text">
                            <p class="pr-2">
                                <span><b>Phone #:</b> {{$order['shipingdetails']['phone'] ?? $order['user']['phone'] }}</span>
                            </p>
                            <a href="mailTo:{{$order['shipingdetails']['email'] ?? $order['user']['email']}}">
                                <p class="fw-bold m-0">Send Mail: </p>
                                <p class="mt-0 text-dark">
                                    <b class="">Email: </b>{{$order['shipingdetails']['email'] ?? $order['user']['email']}}
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card  d-flex flex-column">
                    <div class="card-header mt-2" style="border: 0 !important; border-color: transparent !important;"></div>
                    <div class="card-body flex-grow-1">
                        <div class="text">
                            <h4 class="fw-bold">Shipping Address</h4>
                            <span><b>City: </b>{{$order['shipingdetails']['city'] ?? $order['user']['city'] }}</span><br>
                            <span><b>Postal Code: </b>{{$order['shipingdetails']['zip_code'] ?? $order['user']['zip_code'] }}</span><br>
                            <span><b>Address 1: </b>{{$order['shipingdetails']['address'] ?? $order['user']['address'] }}</span><br>
                            <span><b>Address 2: </b>{{$order['shipingdetails']['address2'] ?? $order['user']['apartment'] }}</span><br>
                        </div>
                        <div class="text mt-2">
                            <h5 class="fw-bold mb-0 ">Billing Address</h5>
                            <span>Same as shipping address</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 ">
                <div class="card  d-flex flex-column my-auto">
                    <div class="card-header mt-3" style="border: 0 !important; border-color: transparent !important;"></div>
                    <div class="card-body flex-grow-1">
                        <div class="text">
                            <h4 class="fw-bold">Customer Additional Note</h4>
                        </div>
                        <div class="text">
                            <span>{{$order['note'] ?? 'No notes from customer'}}</span><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- status -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header mt-3" id="tbl_buttons" style="border: 0 !important; border-color: transparent !important;">
                    </div>
                    <div class="card-body">
                        <div class="row d-flex justify-content-center align-items-center">
                            <div class="col-lg-12">
                                <div class="text">
                                    <h4 class="fw-bold">Fulfill By</h4>
                                    <p>{{ \Carbon\Carbon::parse($order['created_at'])->format('M, d, Y - H:i') }}</p>

                                </div>
                                <div class="card shadow-0 border mb-4">
                                    <div class="card-body">
                                        @foreach($order['orderdetails'] as $key => $val)
                                        <div class="row">
                                            <div class="col-md-1" style="height:150px; width:150px;">
                                                <img class="img-fluid pt-3 h-100 w-100" id="product_img" src="{{ asset('storage/') }}" loading="lazy" alt="Prodcut Image">
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0"><b>Title: </b> {{$val['product_name'] ?? '' }}</p>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small"><b>Variant: </b> {{$order['variant']['title'] ?? '' }}</p>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small"><b>Quantity: </b> {{$val['product_qty']}}</p>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small"><b>Barcode: </b> {{$val['barcode'] ?? ''}}</p>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small"><b>Price: </b>£ {{$val['product_price'] ?? ''}}</p>
                                            </div>
                                        </div>
                                        <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                                        @if($val['consultation_type'] != 'one_over')
                                        <div class="row d-flex ">
                                            <div class="col-lg-12 text-center ">
                                                <a target="_blank" href="{{ route('admin.consultationView', ['odd_id' => base64_encode($val['id'])]) }}" class="btn btn-link fw-bold large">
                                                    See Consultations
                                                </a>
                                            </div>
                                        </div>
                                        <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">

                                        @endif
                                        @endforeach

                                        <div class="row">
                                            <div class="col-md-12 gy-1">
                                                <h5 class="fw-bold underline">User Previous Orders History:</h5>
                                                <div class="button-container" style="display: flex; flex-wrap: wrap;">
                                                    @forelse($userOrders as $index => $val)
                                                    <a target="_blank" href="{{ route('admin.orderDetail',['id'=> base64_encode($val['id'])]) }}" class="btn btn-primary m-1">
                                                        <b>{{ $index + 1 }}.</b> #00343{{ $val['id'] }}
                                                    </a>
                                                    @empty
                                                    <p class="px-5">No Previous Orders Of that Customer.</p>
                                                    @endforelse

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between pt-2">
                                    <p class="fw-bold mb-0">Order Status: </p>
                                    <p class="mb-0 fw-bold text-success">{{$order['status']}} </p>
                                </div>
                                @if($order['status'] != 'Recieved')
                                <div class="d-flex justify-content-between pt-2">
                                    <p class="fw-bold mb-0 ">Health Care Professional Notes:</p>
                                    <p class="mb-0">{{$order['hcp_remarks']}} </p>
                                </div>
                                @endif
                                <div class="d-flex justify-content-between pt-2">
                                    <p class="fw-bold mb-0">Subtotal: </p>
                                    <p class="text-muted mb-0">£ {{$order['total_ammount'] - $order['shiping_cost']}}</p>
                                </div>
                                <div class="d-flex justify-content-between pt-2">
                                    <p class="fw-bold  mb-0">Shipping Charges: </p>
                                    <p class="text-muted mb-0"> £ {{$order['shiping_cost']}}</p>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <p class="fw-bold  mb-0">Total: </p>
                                    <p class="text-muted mb-0">£ {{$order['total_ammount']}}</p>
                                </div>
                                <div class="card-footer border-0 px-4 ">
                                    <h5 class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0">Total
                                        paid: <span class="h2 mb-0 ms-2">£ {{$order['total_ammount']}}</span></h5>
                                </div>
                                @if($order['status'] == 'Approved' || $order['status'] == 'ShippingFail' )
                                <form id="form_shiping_now" action="{{route('admin.createShippingOrder')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" required value="{{$order['id']}}">
                                </form>
                                <div class="card  mt-1">
                                    <div class="card-body d-flex justify-content-center align-items-center py-3">
                                        <button form="form_shiping_now" type="submit" class="btn btn-primary rounded-pill px-5 py-2 fw-bold">
                                            <i class="bi bi-arrow-right-circle"></i> Ship Now
                                        </button>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- comment section   -->
            <style>
                .adiv {
                    background: #06c;
                    border-radius: 15px;
                    border-bottom-right-radius: 0;
                    border-bottom-left-radius: 0;
                    font-size: 1.4rem;
                    height: 46px;
                    font-weight: 700;

                }

                .chat {
                    border: none;
                    background: #E2FFE8;
                    font-size: 1rem;
                    border-radius: 20px;
                }

                .bg-white {
                    border: 1px solid #E7E7E9;
                    font-size: 1rem;
                    border-radius: 20px;
                }

                .myvideo img {
                    border-radius: 20px
                }

                .dot {
                    font-weight: bold;
                }

                .form-control {
                    border-radius: 12px;
                    border: 2px solid #F0F0F0;
                    font-size: 1rem;
                }

                .form-control:focus {
                    font-size: 1rem;
                    border: 1px solid #F0F0F0;
                }

                .form-control::placeholder {
                    font-size: 1rem;
                    color: #C4C4C4;
                }
            </style>
            <div class="col-lg-12">
                <div class="w-100 ">
                    <div class="card mt-3 ">
                        <div class="d-flex flex-row justify-content-center pt-2 adiv text-white">
                            <span class=" fw-bold ">Comment Here</span>
                        </div>
                        <div class="comment_data px-2 py-4">
                            <!-- <div class="d-flex flex-row p-3">
                                <div class="bg-white mr-2 p-3">Hello and thankyou for visiting birdlymind. Please click the video above</div>
                                <img src="https://img.icons8.com/color/48/000000/circled-user-female-skin-type-7.png" width="50" height="50">
                            </div> -->
                        </div>

                        <div class="no_comment px-2 py-4">
                            <div class="d-flex flex-row p-3">
                                <div class="bg-white mx-auto pt-2 pb-1 px-3">
                                    <h4 class="text-center"> No comment yet! Against that order</h4>
                                </div>
                            </div>
                        </div>

                        <form class="row px-2  needs-validation" action="{{ route('admin.commentStore') }}" id="commentform" method="POST" novalidate>
                            @csrf
                            <input type="hidden" id="comment_for_id" name="comment_for_id" value="{{$order['id']}}">
                            <input type="hidden" id="comment_for" name="comment_for" value="Orders">
                            <div class="form-group px-3 mb-2">
                                <textarea class="form-control" rows="4" id="comment" name="comment" placeholder="Type your message" required></textarea>
                            </div>
                            <div class="form-group  mb-4 d-flex flex-row justify-content-end px-3">
                                <button type="submit" id="btn_comment" class="btn btn-primary fw-bold">
                                    <div class="spinner-border spinner-border-sm text-white d-none" id="spinner_coment"></div>
                                    <span id="coment_btn">Push You'r Comment </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <input type="hidden" id="user_id" value="{{auth()->user()->id}}">
</main>
<!-- End #main -->

@stop

@pushOnce('scripts')
<script>
    $(function() {
        $("#tbl_data").DataTable({
            "paging": true,
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "searching": true,
            "ordering": true,
            "info": true,
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
        setInterval(comments, 10000);
        comments();
        // get comments  data in through the api...
        function comments() {
            var apiurl = @json(route('admin.comments', ['id' => $order['id']]));
            var user_id = parseInt($('#user_id').val());
            $.ajax({
                url: apiurl,
                type: 'GET',
                beforeSend: function() {

                },
                success: function(response) {
                    if (response.status === 'success') {
                        var comment_html = '';

                        if (response.data && response.data.length > 0) {
                            $('.no_comment').addClass('d-none');
                            response.data.forEach(function(data) {
                                let createdDate = new Date(data.created_at);
                                let formattedDate = createdDate.toLocaleString();
                                formattedDate = formattedDate.replace(/\//g, '-');
                                let user_pic = data.user_pic ?? '/assets/admin/img/profile-img1.png';
                                let comment_data = '';
                                if (user_id == data.user_id) {
                                    comment_data = `<div class="d-flex flex-row p-3">
                                    <img class="img-fuild " src="${user_pic}" width="45" height="45" style="border-radius:50% !important">
                                    <div class=" chat ml-2 p-3"><span class="text-muted">${data.comment}</span></div>
                                    </div>`;
                                } else {
                                    comment_data = `<div class="d-flex flex-row p-3">
                                    <div class=" bg-white mr-2 p-3"><span class="text-muted">${data.comment}</span></div>
                                    <img class="img-fuild " src="${user_pic}" width="45" height="45" style="border-radius:50% !important">
                                    </div>`;
                                }
                                comment_html += comment_data;
                            });
                        } else {
                            $('.no_comment').removeClass('d-none');
                        }

                        $('.comment_data').html(comment_html);
                    } else {
                        alert('contact to developer');
                        console.log(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    alert('contact to developer');
                    console.log(status);
                    showAlert("Error", 'Request Can not Proceed', 'Cannot proceed further');
                }
            });
        }
        // Adding  comment in through the api...
        $('#commentform').on('submit', function(e) {
            e.preventDefault();
            var apiname = $(this).attr('action');
            var apiurl = apiname;
            var formData = new FormData(this);
            var comment = formData.get('comment');
            var user_pic = "{{ ($user->user_pic ?? '') ? asset('storage/'.$user->user_pic) : asset('assets/admin/img/profile-img1.png') }}";
            if (comment) {
                $.ajax({
                    url: apiurl,
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('#spinner_coment').removeClass('d-none');
                        $('#coment_btn').addClass('d-none');
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            $('.no_comment').addClass('d-none');
                            comments();
                            $('#comment').val('');
                            $('#spinner_coment').addClass('d-none');
                            $('#coment_btn').removeClass('d-none').prop('disabled', false);
                        } else if (response.status === 'error') {
                            alert('contact to developer');
                            console.log(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('contact to developer');
                        console.log(status);
                        $('#spinner_coment').addClass('d-none');
                        $('#coment_btn').removeClass('d-none').prop('disabled', false);
                    }
                });
            }
        });


    });
</script>
@endPushOnce