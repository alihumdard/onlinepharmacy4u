@extends('web.layouts.default')
@section('title', 'Login')
@section('content')

    <!-- LOGIN AREA START -->
    <div class="ltn__login-area pb-65 pt-5">
        <div class="container">
        <div class="row my-5 shadow-custom bg-white">
            <div class="col-md-6 p-0">
                <div class="signup-right-side">
                    <div class="sign-cont">
                        <h2>Hello !</h2>
                        <h4>Welcome</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="my-log-in">
                <div class="">
                <div class="card-body">
                    <h3 class="">Sign In To Your Account</h3>
                     <div class="row">
                        <div class="col-md-12">
                        <form action="{{ route('login')}}" method="post" class="mt-4 sign-me ltn__form-box contact-form-box">
                            @csrf
                            <input type="text" name="email" placeholder="Email*">
                            <input type="password" name="password" placeholder="Password*">
                            <div class="go-to-btn mt-0 text-end">
                                <a href="#"><small>FORGOT YOUR PASSWORD?</small></a>
                            </div>
                            <div class="btn-wrapper text-center mt-3">
                                <button class="theme-btn-1 btn btn-block px-4 py-2" type="submit">SIGN IN</button>
                            </div>
                            <div class="dont-account text-center mt-3">
                                <strong>Don't have an  account? <span> <a href="/register" class="pe-2" style="font-size: 12px; color:gray">Create Account</a></span> </strong>
                            </div>
                           
                        </form>
                        </div>
                     </div>
                </div>
                </div>
                </div>
            </div>
        </div>



            <!-- <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area text-center">
                        <h1 class="section-title">Sign In<br>To Your Account</h1>
                        <p>Sign in to your account for seamless access to your health essentials and exclusive benefits.</p>
                        @if(session('msg'))
                            <div class="alert alert-success">
                                {{ session('msg') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="account-login-inner">
                        <form action="{{ route('login')}}" method="post" class="ltn__form-box contact-form-box">
                            @csrf
                            <input type="text" name="email" placeholder="Email*">
                            <input type="password" name="password" placeholder="Password*">
                            <div class="go-to-btn mt-0 text-center">
                                <a href="#"><strong>FORGOTTEN YOUR PASSWORD?</strong></a>
                            </div>
                            <div class="btn-wrapper text-center mt-3">
                                <button class="theme-btn-1 btn btn-block px-3 py-2" type="submit">SIGN IN</button>
                            </div>
                           
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="account-create text-center pt-50">
                        <h4>DON'T HAVE AN ACCOUNT?</h4>
                        <p>Add items to your wishlistget personalised recommendations <br>
                            check out more quickly track your orders register</p>
                        <div class="btn-wrapper">
                            <a href="/register" class="theme-btn-1 btn black-btn">CREATE ACCOUNT</a>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <!-- LOGIN AREA END -->


@stop

@pushOnce('scripts')
<script>

</script>
@endPushOnce