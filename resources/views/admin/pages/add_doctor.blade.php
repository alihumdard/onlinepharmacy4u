@extends('admin.layouts.default')
@section('title', 'Add Health Care Professionals')
@section('content')
<!-- main stated -->
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Add Health Care Professional</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Pages</li>
                <li class="breadcrumb-item active">Add health care professional</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card vh-100">
                    <div class="card-body">
                        <form class="row g-3 mt-3 needs-validation" method="post" action="{{ route('admin.storeDoctor') }}" novalidate>
                            @csrf
                            <input type="hidden" name="role" required value="{{ user_roles('3')}}">
                            <input type="hidden" name="id" value="{{ $doctor['id'] ?? ''}}">

                            <div class="col-md-4">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" value="{{  $doctor['name'] ?? old('name') }}" class="form-control" id="name" required>
                                <div class="invalid-feedback">Please enter your name!</div>
                                @error('name')
                                <div class="alert-danger text-danger ">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" value="{{ $doctor['email'] ?? old('email') }}" class="form-control" id="email" required>
                                <div class="invalid-feedback">Please enter valid email!</div>
                                @error('email')
                                <div class="alert-danger text-danger ">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" {{ $doctor['id'] ?? 'required' }}>
                                <div class="invalid-feedback">Please enter password!</div>
                                @error('password')
                                <div class="alert-danger text-danger ">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- <div class="col-md-4">
                                <label for="speciality" class="form-label">speciality</label>
                                <input type="text" name="speciality" value="{{ $doctor['speciality'] ?? old('speciality') }}" class="form-control" id="speciality" required>
                                <div class="invalid-feedback">Please enter Sepcialization!</div>
                                @error('speciality')
                                <div class="alert-danger text-danger ">{{ $message }}</div>
                                @enderror
                            </div> -->

                            <div class="col-md-4">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="number" name="phone" value="{{  $doctor['phone'] ?? old('phone') }}" class="form-control" id="phone" required>
                                <div class="invalid-feedback">Please enter valid Phone No!</div>
                                @error('phone')
                                <div class="alert-danger text-danger ">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="city" class="form-label">City</label>
                                <input type="text" name="city" class="form-control" value="{{  $doctor['city'] ?? '' }}" id="city" required>
                                <div class="invalid-feedback">Please enter city name!</div>

                            </div>

                            <!-- <div class="col-md-4">
                                <label for="inputPassword5" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" id="inputPassword5">
                            </div> -->

                            <div class="col-md-8">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address" value="{{ $doctor['address'] ?? old('address') }}" class="form-control" id="address" placeholder="enter your addess" required>
                                <div class="invalid-feedback">Please enter address</div>
                                @error('address')
                                <div class="alert-danger text-danger ">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="zip_code" class="form-label">Zip</label>
                                <input type="text" name="zip_code" value="{{  $doctor['zip_code'] ?? '' }}" class="form-control" id="zip_code" required>
                                <div class="invalid-feedback">Please enter zip code.</div>
                            </div>

                            <div class="col-12">
                                <label for="short_bio" class="form-label">Short Bio</label>
                                <textarea rows="4" name="short_bio" class="form-control" id="short_bio" placeholder="write short bio">{{  $doctor['short_bio'] ?? '' }}</textarea>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form><!-- End Multi Columns Form -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main>
<!-- End #main -->

@stop

@pushOnce('scripts')
<script>

</script>
@endPushOnce