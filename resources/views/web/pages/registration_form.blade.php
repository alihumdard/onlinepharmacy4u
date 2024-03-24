@extends('web.layouts.default')
@section('title', 'Registration Form')
@section('content')
<style>
    input[type="number"], input[type="date"]{
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
</style>

<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image "  data-bs-bg="img/allbanners/signin.webp">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">Account</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="index.html"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                            <li>Register</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- LOGIN AREA START (Register) -->
<div class="ltn__login-area pb-110">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area text-center">
                    <h1 class="section-title">Register <br>Your Account</h1>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. <br>
                         Sit aliquid,  Non distinctio vel iste.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="account-login-inner">
                    <form action="{{ route('web.user_register') }}" method="post" class="ltn__form-box contact-form-box needs-validation" type="post">
                        @csrf

                        <input type="email" name="email" placeholder="Email*" value="{{ old('email') }}" required>
                        <div class="invalid-feedback">Please enter your email!</div>
                        @error('email')
                        <div class="alert-danger text-danger ">{{ $message }}</div>
                        @enderror

                        <input type="text" name="name" placeholder="Full Name" value="{{ old('name') }}" required>
                        <div class="invalid-feedback">Please enter your name!</div>
                        @error('name')
                        <div class="alert-danger text-danger ">{{ $message }}</div>
                        @enderror

                        <input type="number" name="phone" placeholder="Phone Number" value="{{ old('phone') }}" required>
                        <div class="invalid-feedback">Please enter Phone Number!</div>
                        @error('phone')
                        <div class="alert-danger text-danger ">{{ $message }}</div>
                        @enderror

                        <input type="date" id="dob" name="dob" class="form-control" value="{{ old('dob') }}" required>
                        <div class="invalid-feedback">Please enter Phone Number!</div>
                        @error('dob')
                        <div class="alert-danger text-danger ">{{ $message }}</div>
                        @enderror

                        <input type="password" name="password" placeholder="Password*" value="{{ old('password') }}" required>
                        <div class="invalid-feedback">Please enter your password!</div>
                        @error('password')
                        <div class="alert-danger text-danger ">{{ $message }}</div>
                        @enderror
                        <div class="mt-1">
                            <p style="color: #3d7de8 ;">* Make a strong password</p>
                        </div>

                        <input type="text" name="city" placeholder="city" value="{{ old('city') }}" required>
                        <div class="invalid-feedback">Please enter your city!</div>
                        @error('city')
                        <div class="alert-danger text-danger ">{{ $message }}</div>
                        @enderror

                        <input type="text" name="zip_code" placeholder="Zip Code" value="{{ old('zip_code') }}" required>
                        <div class="invalid-feedback">Please enter your name!</div>
                        @error('zip_code')
                        <div class="alert-danger text-danger ">{{ $message }}</div>
                        @enderror

                        <input type="text" name="address" placeholder="address" value="{{ old('address') }}" required>
                        <div class="invalid-feedback">Please enter your name!</div>
                        @error('address')
                        <div class="alert-danger text-danger ">{{ $message }}</div>
                        @enderror
                        
                        <div class="btn-wrapper">
                            <button class="theme-btn-1 btn reverse-color btn-block" type="submit">CREATE ACCOUNT</button>
                        </div>
                    </form>
                    <div class="by-agree text-center">
                        <p>By creating an account, you agree to our:</p>
                        <p><a href="#">TERMS OF CONDITIONS  &nbsp; &nbsp; | &nbsp; &nbsp;  PRIVACY POLICY</a></p>
                        <div class="go-to-btn mt-50">
                            <a href="login.html">ALREADY HAVE AN ACCOUNT ?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- LOGIN AREA END -->

@stop

@pushOnce('scripts')
<script>

</script>
@endPushOnce