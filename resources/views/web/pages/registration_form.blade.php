@extends('web.layouts.default')
@section('title', 'Registration Form')
@section('content')
<style>
    input[type="number"],
    input[type="date"] {
        background-color: var(--white);
        border: 2px solid;
        border-color: var(--border-color-9);
        height: 65px;
        -webkit-box-shadow: none;
        box-shadow: none;
        padding-left: 20px;
        font-size: 16px;
        color: var(--ltn__paragraph-color);
        width: 100%;
        margin-bottom: 30px;
        border-radius: 0;
        padding-right: 40px;
    }

    select {
        background-color: var(--white);
        border: 2px solid;
        border-color: var(--border-color-9);
        height: 65px;
        -webkit-box-shadow: none;
        box-shadow: none;
        padding-left: 20px;
        font-size: 16px;
        color: var(--ltn__paragraph-color);
        width: 100%;
        margin-bottom: 30px;
        border-radius: 30px !important;
        padding-right: 40px;
    }

    #phone::-webkit-inner-spin-button,
    #phone::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>


<!-- LOGIN AREA START (Register) -->
<div class="ltn__login-area pb-110 py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area text-center">
                    <h1 class="section-title">Register <br>Your Account</h1>
                    <!-- <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. <br>
                         Sit aliquid,  Non distinctio vel iste.</p> -->
                </div>
            </div>
        </div>
        <div class="row shadow-custom">
            <div class="col-lg-5 p-0">
                <div class="signup-right-side">
                    <div class="sign-cont">
                    </div>
                </div>
            </div>
            <div class="col-lg-7 pt-5">
                <form action="{{ route('web.user_register') }}" method="post" class=" reg-me ltn__form-box contact-form-box needs-validation" type="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="text" name="name" placeholder="Full Name" value="{{ old('name') }}" required>
                            <div class="invalid-feedback">Please enter your name!</div>
                            @error('name')
                            <div class="alert-danger text-danger ">{{ $message }}</div>
                            @enderror

                            <input type="number" id="phone" name="phone" placeholder="Phone Number" value="{{ old('phone') }}" required>
                            <div class="invalid-feedback">Please enter Phone Number!</div>
                            @error('phone')
                            <div class="alert-danger text-danger ">{{ $message }}</div>
                            @enderror
                            <select name="gender" id="gender" class="form-select mt-4" required>
                                <option value=""> Select Gender</option>
                                <option {{ old('gender') == 'male' ? 'selected' : ''}} value="male"> Male</option>
                                <option {{ old('gender') == 'female' ? 'selected' : ''}} value="female"> Female</option>
                            </select>
                            <div class="invalid-feedback">Please select your gender!</div>
                            @error('gender')
                            <div class="alert-danger text-danger ">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <input type="email" name="email" placeholder="Email*" value="{{ old('email') }}" required>
                            <div class="invalid-feedback">Please enter your email!</div>
                            @error('email')
                            <div class="alert-danger text-danger ">{{ $message }}</div>
                            @enderror

                            <!-- Text input for selecting the date -->
                            <input type="text" id="dob" name="dob" class="form-control" value="{{old('dob') }}" placeholder="dd-mm-yyyy" required>
                            <div class="invalid-feedback">Please enter DOB!</div>
                            @error('dob')
                            <div class="alert-danger text-danger ">{{ $message }}</div>
                            @enderror
                            <div class="mt-0">
                                <p style="color: #3d7de8 ;">* Make a strong password</p>
                            </div>
                            <input type="password" name="password" placeholder="Password*" value="{{ old('password') }}" required>
                            <div class="invalid-feedback">Please enter your password!</div>
                            @error('password')
                            <div class="alert-danger text-danger ">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="mb-1 small px-1">
                                <p style="color: #3d7de8 ;">* We need to verify your identity before providing treatments. Please use your home address below. You can add a different shipping address at the checkout.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="zip_code" placeholder="Postal Code" value="{{ old('zip_code') }}" required>
                            <div class="invalid-feedback">Please enter your postal code!</div>
                            @error('zip_code')
                            <div class="alert-danger text-danger ">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="city" placeholder="city" value="{{ old('city') }}" required>
                            <div class="invalid-feedback">Please enter your city!</div>
                            @error('city')
                            <div class="alert-danger text-danger ">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <input type="text" name="address" placeholder="address" value="{{ old('address') }}" required>
                            <div class="invalid-feedback">Please enter your address!</div>
                            @error('address')
                            <div class="alert-danger text-danger ">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" name="apartment" placeholder="apartment, suite, etc(optional)" value="{{ old('address') }}">
                            @error('apartment')
                            <div class="alert-danger text-danger ">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 mb-4">
                            <div class="mb-1 small px-1">
                                <h3 style="color: #3d7de8; margin-bottom: 5px;">Identity Verification</h3>
                                <p style="color: #3d7de8 ;">
                                    Due to new policy, you are required to upload one of the documents mentioned below. Please take a photo of yourself holding the identity document and ensure the document is clear and legible. If not, it may be refused and your order may be delayed or canceled.
                                </p>
                                <p style="color: #00c4a3; font-weight:bolder;">Accepted Documentation:</p>
                                <p style="color: #3d7de8;">Please upload one of the following documents, by doing so we will verify these documents with 3rd party agencies to validate you.</p>
                                <ul style="color: #3d7de8; font-weight:bolder; padding-left:2.3rem; margin-top:0rem !important; ">
                                    <li style="margin-top:0.1rem !important; ">Birth Certificate</li>
                                    <li style="margin-top:0.1rem !important; " >Full / Provisional Driving License</li>
                                    <li style="margin-top:0.1rem !important; " >UK / EU Passport</li>
                                </ul>
                            </div>
                            <input class="form-control " type="file" name="id_document" id="id_document" required>
                            @error('id_document')
                            <div class="alert-danger text-danger ">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="text-center px-3 mb-3">
                            <button class="theme-btn-1 btn reverse-color btn-block text-center px-4" type="submit">CREATE ACCOUNT</button>
                        </div>
                        <div class="by-agree text-center">
                            <p>By creating an account, you agree to our:</p>
                            <p><a href="/terms_and_conditions/">TERMS OF CONDITIONS &nbsp; &nbsp; | &nbsp; &nbsp; PRIVACY POLICY</a></p>
                            <div class="go-to-btn mt-25">
                                <a href="/admin"><strong>ALREADY HAVE AN ACCOUNT?</strong></a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- LOGIN AREA END -->

@stop

@pushOnce('scripts')
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- jQuery UI -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

<!-- Script to initialize the datepicker -->
<script>
    $(document).ready(function() {
        $("#dob").datepicker({
            dateFormat: 'dd-mm-yy',
            maxDate: new Date(2005, 11, 31),
            changeMonth: true,
            changeYear: true,
            yearRange: "c-100:c",
            onClose: function(selectedDate) {
                var parts = selectedDate.split('-');
                var day = parseInt(parts[0]);
                var month = parseInt(parts[1]) - 1;
                var year = parseInt(parts[2]);
                $("#dob").datepicker("setDate", new Date(year, month, day));
            }
        });

        // $(".ui-datepicker").css("background-color", "#fff");
    });
</script>


@endPushOnce