<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Regiration/Login</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="{{ asset('assets/admin/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/admin/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    {{-- font-Awesome --}}
    <link rel="stylesheet" href=https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css>
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('/assets/web/css/modul.css') }}" />

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="{{ asset('/assets/admin/plugins/bootstrap/css/bootstrap.min.css') }}">
    </link>

    <!-- date picker link  -->
    <!-- <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">  -->
    <!-- <script src="{{ asset('/assets/web/js/jquery-3.5.1.min.js') }}"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


    <!-- Bootstrap Datepicker CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <!-- Bootstrap Datepicker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>


    <!-- custome styling -->
    <link rel="stylesheet" href="{{ asset('/assets/admin/dist/css/style.css') }}">
    <style>
        /*Bootstrap Calendar*/
        .datepicker {
            border-radius: 0;
            padding: 0;
        }

        .datepicker-days table thead,
        .datepicker-days table tbody,
        .datepicker-days table tfoot {
            padding: 10px;
            display: list-item;
        }

        .datepicker-days table thead,
        .datepicker-months table thead,
        .datepicker-years table thead,
        .datepicker-decades table thead,
        .datepicker-centuries table thead {
            background: #3546b3;
            color: #ffffff;
            border-radius: 0;
        }

        .datepicker-days table thead tr:nth-child(2n+0) td,
        .datepicker-days table thead tr:nth-child(2n+0) th {
            border-radius: 3px;
        }

        .datepicker-days table thead tr:nth-child(3n+0) {
            text-transform: uppercase;
            font-weight: 300 !important;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.7);
        }

        .table-condensed>tbody>tr>td,
        .table-condensed>tbody>tr>th,
        .table-condensed>tfoot>tr>td,
        .table-condensed>tfoot>tr>th,
        .table-condensed>thead>tr>td,
        .table-condensed>thead>tr>th {
            padding: 11px 13px;
        }

        .datepicker-months table thead td,
        .datepicker-months table thead th,
        .datepicker-years table thead td,
        .datepicker-years table thead th,
        .datepicker-decades table thead td,
        .datepicker-decades table thead th,
        .datepicker-centuries table thead td,
        .datepicker-centuries table thead th {
            border-radius: 0;
        }

        .datepicker td,
        .datepicker th {
            border-radius: 50%;
            padding: 0 12px;
        }

        .datepicker-days table thead,
        .datepicker-months table thead,
        .datepicker-years table thead,
        .datepicker-decades table thead,
        .datepicker-centuries table thead {
            background: #3546b3;
            color: #ffffff;
            border-radius: 0;
        }

        .datepicker table tr td.active,
        .datepicker table tr td.active:hover,
        .datepicker table tr td.active.disabled,
        .datepicker table tr td.active.disabled:hover {
            background-image: none;
        }

        .datepicker .prev,
        .datepicker .next {
            color: rgba(255, 255, 255, 0.5);
            transition: 0.3s;
            width: 37px;
            height: 37px;
        }

        .datepicker .prev:hover,
        .datepicker .next:hover {
            background: transparent;
            color: rgba(255, 255, 255, 0.99);
            font-size: 21px;
        }

        .datepicker .datepicker-switch {
            font-size: 24px;
            font-weight: 400;
            transition: 0.3s;
        }

        .datepicker .datepicker-switch:hover {
            color: rgba(255, 255, 255, 0.7);
            background: transparent;
        }

        .datepicker table tr td span {
            border-radius: 2px;
            margin: 3%;
            width: 27%;
        }

        .datepicker table tr td span.active,
        .datepicker table tr td span.active:hover,
        .datepicker table tr td span.active.disabled,
        .datepicker table tr td span.active.disabled:hover {
            background-color: #3546b3;
            background-image: none;
        }

        .dropdown-menu {
            border: 1px solid rgba(0, 0, 0, .1);
            box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
        }

        .datepicker-dropdown.datepicker-orient-top:before {
            border-top: 7px solid rgba(0, 0, 0, .1);
        }
    </style>

</head>

<body>



    <main>
        <div class="text-center bg-white p-3">
            <a href="{{ route('web.index') }}" style="margin: auto; width: 200px">
                <img class="align-top" width="200" src="{{ asset('/assets/web/consultation/img/Weighloss_final_logo.png')}}">

            </a>
        </div>
        <div class="container">
            <div class="itl-container">
                <div class="itl-container__inner px-1">
                    <div class="w-100">
                        <div class="steps mt-5 mb-1 is-tablet-medium">
                            <div class="step-item is-active">
                                <div class="step-marker" style="background: #4DC4D8;">
                                    <span class="icon-your-details-icon f--white-before">
                                        <i class="fa fa-address-card"></i>
                                    </span>
                                </div>
                                <div class="step-details">
                                    <p class="step-title" style="color: #4DC4D8;">Your Details</p>
                                </div>
                            </div>
                            <div class="step-item">
                                <div class="step-marker" style="background: #4DC4D8;"><span class="step-number-text">2</span><span class="icon-consultation-icon"></span>
                                </div>
                                <div class="step-details">
                                    <p class="step-title" style="color: #4DC4D8;">Consultation</p>
                                </div>
                            </div>
                            <div class="step-item">
                                <div class="step-marker" style="background: #4DC4D8;">
                                    <span class="icon-your-treatment-icon">
                                        <i class="fa fa-plus text-white"></i>
                                    </span>
                                </div>
                                <div class="step-details">
                                    <p class="step-title" style="color: #4DC4D8;">Your Treatment</p>
                                </div>
                            </div>
                            <div class="step-item">
                                <div class="step-marker" style="background: #4DC4D8;">
                                    <span class="icon-checkout-icon">
                                        <i class="fa fa-cart-plus text-white"></i>
                                    </span>
                                </div>
                                <div class="step-details">
                                    <p class="step-title" style="color: #4DC4D8;">Checkout</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="main-sec mt-4 mb-5">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-5 left-boxs" style=" border-right: 1px solid #e5eef3;">
                        <div class="text-center mt-5">
                            <a href="#">
                                <img class="img-fluid" src="{{ asset('/assets/web/images/logo/reviews-title.png') }}">
                            </a>
                        </div>
                        <div class="d-flex flex-column review-description">
                            <div class="review-list-content d-flex align-items-start">
                                <i class="fa fa-check" aria-hidden="true"></i>
                                <p>Run by healthcare professionals<br> specialised in weight management</p>
                            </div>
                            <div class="review-list-content d-flex align-items-start">
                                <i class="fa fa-check" aria-hidden="true"></i>
                                <p>Fast and free tracked delivery on all treatments</p>
                            </div>
                            <div class="review-list-content d-flex align-items-start">
                                <i class="fa fa-check" aria-hidden="true"></i>
                                <p>Genuine UK sourced medical treatments</p>
                            </div>
                            <div class="review-list-content d-flex align-items-start">
                                <i class="fa fa-check" aria-hidden="true"></i>
                                <p>UK regulated pharmacy</p>
                            </div>
                        </div>

                        <div class="user-review-section mt-4">
                            <div class="user-heading">
                                <h4 class="its-font-w--700 mb-2">What do others say about us?</h4>
                            </div>

                        </div>
                        <div class="testimonial-section mt-4">
                            <div class="testimonial-content">
                                <div class="testimonial-img text-center">
                                    <img class="img-fluid form-user-img" src="https://i.ibb.co/KGVbyHz/anime.png" alt="info">
                                </div>
                                <div class="testimonial-right-content" style="font-style: italic;">
                                    <p class="has-text-white its-font-w--600 mb-2">"My Weightloss Centre has access to the market
                                        leading treatments for weight loss which we have been prescribing to our
                                        patients for several years now with excellent clinical outcomes. The clinical
                                        processes and support structures are all designed to give you the opportunity to
                                        achieve your target weight with many exciting new developments on the way.
                                        Congratulations on starting your weight loss journey. Together we can do it."
                                    </p>
                                    <span class="has-text-white its-font-w--400">
                                        James O’Loan - PHARMACEUTICAL LEAD, PRESCRIBING PHARMACIST &amp; WEIGHT
                                        MANAGEMENT EXPERT</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-7">
                        <div class="full-form">
                            <div class="user-text mt-2">
                                <button class="imbtn"><i class="fa fa-check"></i>I'm new</button>
                                <button id="btnlogin" class="account-btn" data-toggle="modal" data-target="#loginModal">ٰI have an account</button>
                            </div>
                            <div>

                                <form class="mt-3 needs-validation" method="post" action="{{ route('web.register') }}" novalidate>
                                    @csrf
                                    <input type="hidden" name="role" required value="{{ user_roles('4')}}">

                                    <label for="name" class="label d-md-block mt-3">Name</label>
                                    <input class="form-control" type="text" name="name" id="name" value="" placeholder="Enter your name">
                                    <!-- <div class="d-flex gap-3">
                                        <input class="form-control" type="text" name="user_first_name" value="" placeholder="First name">
                                        <input class="form-control" type="text" name="user_last_name" value="" placeholder="Last name">
                                    </div> -->

                                    <label for="email" class="label d-md-block mt-3">Email</label>
                                    <input class="form-control" type="email" name="email" id="email" value="" placeholder="write email address">

                                    <label for="password" class="label d-md-block mt-3">Password</label>
                                    <input class="form-control" type="password" name="password" id="password" value="" placeholder="password">
                                    <div class="mt-1">
                                        <p style="color: #00e5d2;">* Make a strong password</p>
                                    </div>

                                    <label for="dob" class="label d-md-block ">Date of Birth</label>
                                    <input type="text" id="datepicker" name="dob" class="form-control" placeholder="mm/dd/yy">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone" class="label d-md-block mt-3">Phone Number</label>
                                                <input class="form-control" type="number" name="phone" id="phone" value="" placeholder="Contact number">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="zip_code" class="label d-md-block mt-3">Postal Code</label>
                                                <input class="form-control" type="text" name="zip_code" id="zip_code" value="" placeholder="Enter your Postal code">
                                                <p style="color: #00e5d2;" class="pt-1">* Enter valid Postal Code</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="mt-1">
                                        <p style="color: #00e5d2;">* Enter valid Zip Code</p>
                                    </div> -->
                                    <label for="address" class="label d-md-block ">Address</label>
                                    <input class="form-control" type="text" name="address" id="address" value="" placeholder="Enter your address">
                                    <div class="mt-1">
                                        <p style="color: #00e5d2;">* Enter address manually</p>
                                    </div>
                                    <div>
                                        <button type="submit" class="continue-btn mx-auto">Continue</button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main><!-- End #main -->
    @if(session('status'))
    <script>
        $(document).ready(function() {
            $("#loginModal").modal('show');
        });
    </script>
    @endif
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center font-weight-bold" id="exampleModalLabel" style="font-family: sans-serif; letter-spacing: 2px;">LogIn</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form class="row  needs-validation px-5" action="{{ route('web.login')}}" method="post" novalidate>
                    @csrf
                    <div class="modal-body">
                        <div class="col-12 mx-auto">
                            <!-- Display Validation Errors -->
                            @if(session('status') === 'error')
                            <div class="alert alert-danger">
                                <strong>Error:</strong>
                                @foreach(session('message')->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                            @endif

                            <!-- Display Success Message -->
                            @if(session('status') === 'success')
                            <div class="alert alert-success">
                                <strong>Success:</strong> {{ session('message') }}
                            </div>
                            @endif

                            <!-- Display Invalid Credentials or Admin Contact Message -->
                            @if(session('status') === 'invalid')
                            <div class="alert alert-danger">
                                <strong>Error:</strong> {{ session('message') }}
                            </div>
                            @endif

                            <!-- Display Unverified User Message -->
                            @if(session('status') === 'Unverfied')
                            <div class="alert alert-warning">
                                <strong>Warning:</strong> {{ session('message') }}
                            </div>
                            @endif

                            <!-- Display Deactivated User Message -->
                            @if(session('status') === 'Deactive')
                            <div class="alert alert-danger">
                                <strong>Error:</strong> {{ session('message') }}
                            </div>
                            @endif

                            @if(session('status') === 'noexitance')
                            <div class="alert alert-danger">
                                <strong>Error:</strong> {{ session('message') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group mb-2">
                            <label for="user_email" class="font-weight-bold mb-2">Email address</label>
                            <input type="email" name="email" class="form-control" id="user_email" value="{{ session('email') ?? ''}}" required aria-describedby="emailHelp" placeholder="Enter your email">
                            <small id="emailHelp" class="form-text text-muted"><span class="text-danger">*</span> We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="yourPassword" class="font-weight-bold mb-2">Password</label>
                            <input type="password" name="password" class="form-control" id="yourPassword" required placeholder="Password">
                        </div>
                        <div class="form-group mt-2">
                            <input type="checkbox" class="form-check-input" name="rememberme" id="rememberme">
                            <label class="form-check-label small" for="rememberme">Remember Password</label>
                        </div>
                        <div class="row mt-3 mb-2">
                            <div class="col-12">
                                <button type="submit" class="btn btn-block bg-info w-100">Sign In</button>
                            </div>
                        </div>



                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#btnlogin").click(function() {
                $("#loginModal").modal('show');
            });
            $(document).on('click', function(e) {
                if ($(e.target).is('.modal') || $(e.target).closest('.modal-content').length === 0) {
                    $('#loginModal').modal('hide');
                }
            });
            $('#loginModal .close, #loginModal [data-dismiss="modal"]').on('click', function() {
                $('#loginModal').modal('hide');
            });
        });

        $(document).ready(function() {
            $('#datepicker').datepicker({
                format: 'mm/dd/yyyy',
                autoclose: true
            });
        });
    </script>


</body>

</html>