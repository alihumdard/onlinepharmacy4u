@extends('admin.layouts.default')
@section('title', "Add SOP")
@section('content')
<!-- main stated -->
<main id="main" class="main">

    <div class="pagetitle">
        <h1><a href="javascript:void(0);" onclick="window.history.back();" class="btn btn-primary-outline fw-bold "><i class="bi bi-arrow-left"></i> Back</a> | {{ $title }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item">Pages</li>
                <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                @if (isset($category))
                <h6 class="text-danger fw-bold">Reminder: Changing the category type will also update all associated products to the new category.</h6>
                <h6 class="text-danger fw-bold">Important: Once changed, there is no way to revert back.</h6>
                @endif

                <div class="card vh-100">
                    <div class="card-body">
                        <!-- Multi Columns Form -->
                        <form class="row g-3 mt-3 needs-validation" method="post" action="{{ route('admin.storeCategory') }}" novalidate enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ $category['id'] ?? ''}}">
                            <input type="hidden" name="old_id" value="{{ $category['id'] ?? ''}}">
                            <input type="hidden" name="old_category_type" id="old_category_type" value="{{ $selection ?? ''}}">
                            {{-- <input type="hidden" name="cat_type" id="cat_type" value="1"> --}}
                            <input type="hidden" name="change_type" id="change_type" value="1">

                            @php
                            $path = url('assets/admin/img/upload_btn.png');
                            if($category['image'] ?? NULL){
                            $path = asset('storage/'.$category['image']);
                            }

                            $path_icon = url('assets/admin/img/upload_btn.png');
                            if($category['icon'] ?? NULL){
                                $path_icon = asset('storage/'.$category['icon']);
                            }
                            @endphp
                            <div class="col-md-6">
                                <label for="name" class="form-label">File Name</label>
                                <input type="text" name="name" value="{{  $category['name'] ?? old('name') }}" class="form-control" id="name">
                                <div class="invalid-feedback">Please enter category name!</div>
                                @error('name')
                                <div class="alert-danger text-danger ">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-6 mt-2 image">
                                <label for="image" class="form-label">Upload File</label>
                                <div class="d-flex align-items-center" style="gap: 20px; justify-content: space-between;">
                                    <input type="file" class="form-control w-100" id="image" name="image" value="{{ ($category['image'] ?? NULL) ? 'required' : '' }}" {{ (isset($category) && $category['image']) ? '' : 'required' }} onchange="previewMainImage(this)">
                                    <label for="image" class=" d-block ">
                                        <img id="image_preview" src="{{  $path ?? '' }}" class="rounded-circle" alt="no image" style="width: 45px; height: 45px;  cursor:pointer;   object-fit: cover;">
                                    </label>
                                    <div class="invalid-feedback">* Upload Image!</div>
                                    @error('image')
                                    <div class="alert-danger text-danger ">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                      

                            <div class="col-md-6 parent-div" @if(isset($selection) && $selection==1) style="display: none" @endif;>
                                <label for="publish" class="form-label">Select</label>
                                <select id="parent_id" name="parent_id" class="form-select" @if(isset($selection) && $selection !=1) required @endif>
                                    <option value="">Select</option>
                                    <option value="">Only For Despensery</option>
                                    <option value="">Only For Doctor</option>
                                    <option value="">Both</option>
                            
                                </select>
                            </div>

                      
                      

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary bg-primary">Submit</button>
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
    $(document).ready(function() {
        var old_cat_type = $('#old_category_type').val();
        var is_edit = $('#id').val();

        $('#selection').change(function() {
            var selectedOption = $(this).val();
            if (selectedOption == 1) {
                $('.parent-div').hide();
                $('#parent_id').val();
            } else {
                $('.parent-div').show();
                $('#parent_id').val();
                $('#parent_id').prop('required', true);
                fetchParentCategories(selectedOption);
            }

            if (is_edit) {
                if (old_cat_type == selectedOption) {
                    $('#change_type').val(1);
                } else {
                    $('#change_type').val(2);
                }
            }
        });

        function fetchParentCategories(selectedOption) {
            console.log(selectedOption);
            if (selectedOption == 2 || selectedOption == 3) {
                $.ajax({
                    url: '{{ route("admin.getParentCategory") }}',
                    type: 'GET',
                    data: {
                        selection: selectedOption
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            $('#parent_id').empty();
                            $.each(response.parents, function(key, value) {
                                $('#parent_id').append($('<option>', {
                                    value: key,
                                    text: value
                                }));
                            });
                            $('#parent_id').prepend($('<option>', {
                                value: '',
                                text: 'Select Parent',
                                selected: true,
                                disabled: true
                            }));
                        } else {
                            console.error('Error:', response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }
        }


        function previewMainImage(input) {
            var preview = $('#image_preview');
            var file = input.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                preview.attr('src', e.target.result);
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        }

        
        function previewIconImage(input) {
            var preview = $('#image_icon_preview');
            var file = input.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                preview.attr('src', e.target.result);
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        }

    });
</script>
@endPushOnce