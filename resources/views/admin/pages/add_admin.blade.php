@extends('admin.layouts.default')
@section('title', 'Add Admin')
@section('content')
<!-- main stated -->
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Add Admin</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Pages</li>
                <li class="breadcrumb-item active">Add Admin</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card vh-100">
                    <div class="card-body">
                        <form class="row g-3 mt-3 needs-validation" method="post" action="{{ route('admin.storeAdmin') }}" novalidate>
                            @csrf
                            <input type="hidden" name="role" required value="{{ user_roles('2')}}">
                            <input type="hidden" name="id"  value="{{ $admin['id'] ?? ''}}">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" value="{{  $admin['name'] ?? old('name') }}" class="form-control" id="name" required >
                                <div class="invalid-feedback">Please enter your name!</div>
                                @error('name')
                                    <div class="alert-danger text-danger ">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" value="{{ $admin['email'] ?? old('email') }}" class="form-control" id="email" required>
                                <div class="invalid-feedback">Please enter valid email!</div>
                                @error('email')
                                    <div class="alert-danger text-danger ">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="number" name="phone" value="{{  $admin['phone'] ?? old('phone') }}" class="form-control" id="phone" required>
                                <div class="invalid-feedback">Please enter valid Phone No!</div>
                                @error('phone')
                                    <div class="alert-danger text-danger ">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" {{ $admin['id'] ?? 'required' }} >
                                <div class="invalid-feedback">Please enter password!</div>
                                @error('password')
                                    <div class="alert-danger text-danger ">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="city" class="form-label">City</label>
                                <input type="text" name="city" class="form-control" value="{{  $admin['city'] ?? '' }}" id="city" required>
                                <div class="invalid-feedback">Please enter city name!</div>

                            </div>

                            <div class="col-md-4">
                                <label for="state" class="form-label">State</label>
                                <select id="state" name="state" class="form-select">
                                    @foreach ($state_list as $value => $label)
                                        <option value="{{ $value }}" {{ (isset($admin['state']) && $admin['state'] == $value) ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Please select state!</div>
                            </div>
                            
                            <div class="col-md-2">
                                <label for="zip_code" class="form-label">Zip Code</label>
                                <input type="text" name="zip_code" value="{{  $admin['zip_code'] ?? '' }}" class="form-control" id="zip_code" required>
                                <div class="invalid-feedback">Please enter  zip code.</div>
                            </div>

                            <div class="col-12">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address" value="{{ $admin['address'] ?? old('address') }}" class="form-control" id="address" placeholder="enter your addess" required>
                                <div class="invalid-feedback">Please enter address</div>
                                @error('address')
                                    <div class="alert-danger text-danger ">{{ $message }}</div>
                                @enderror
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