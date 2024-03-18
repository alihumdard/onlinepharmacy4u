@extends('admin.layouts.default')
@section('title', 'Add Category')
@section('content')
<!-- main stated -->
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Add Category</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Pages</li>
                <li class="breadcrumb-item active">Add Category</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card vh-100">
                    <div class="card-body">
                        <!-- Multi Columns Form -->
                        <form class="row g-3 mt-3 needs-validation" method="post" action="{{ route('admin.storeCategory') }}" novalidate>
                            @csrf
                            <input type="hidden" name="id" value="{{ $category['id'] ?? ''}}">

                            <div class="col-md-4">
                                <label for="selection" class="form-label">Selection</label>
                                <select id="selection" name="selection" class="form-select">
                                    <option {{ (isset($selection) && $selection == 1) ? 'selected' : '' }} value="1" >Main Category</option>
                                    <option {{ (isset($selection) && $selection == 2) ? 'selected' : '' }} value="2" >Sub Category</option>
                                    <option {{ (isset($selection) && $selection == 3) ? 'selected' : '' }} value="3" >Child Category</option>
                                </select>
                            </div>
                            <div class="col-md-8"></div>

                            <div class="col-md-8">
                                <label for="name" class="form-label">Category Name</label>
                                <input type="text" name="name" value="{{  $category['name'] ?? old('name') }}" class="form-control" id="name" required>
                                <div class="invalid-feedback">Please enter category name!</div>
                                @error('name')
                                <div class="alert-danger text-danger ">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="publish" class="form-label">Status</label>
                                <select id="publish" name="publish" class="form-select">
                                    <option {{ ($category['publish'] ?? NULL  == 'Publish') ? 'Selected' : ''}} value="Publish" >Publish</option>
                                    <option  {{ ($category['publish'] ?? NULL == 'Draft') ? 'Selected' : ''}} value="Draft" >Draft</option>
                                </select>
                            </div>

                            <div class="col-md-4 parent-div" @if(isset($selection) && $selection == 1) style="display: none" @endif;>
                                <label for="publish" class="form-label">Select Parent</label>
                                <select id="parent_id" name="parent_id" class="form-select">
                                    <option value="">Select</option>
                                    @foreach ($parents as $key => $value)
                                        <option value="{{ $value['id'] }}" @if ($value['id'] == $category['category_id']) selected @endif>{{ $value['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="desc" class="form-label">Short Description</label>
                                <textarea rows="4" name="desc" class="form-control" id="desc" placeholder="write short bio"> {{  $category['desc'] ?? old('name') }} </textarea>
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
    $(document).ready(function() {
        $('#selection').change(function() {
            var selectedOption = $(this).val();
            if (selectedOption == 1) {
                $('.parent-div').hide();
                $('#parent_id').val();
            } else {
                $('.parent-div').show();
                $('#parent_id').val();
                fetchParentCategories(selectedOption);
            }
        });

        function fetchParentCategories(selectedOption) {
            console.log(selectedOption);
            if(selectedOption == 2 || selectedOption == 3){
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
                        }
                        else{
                            console.error('Error:', response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }
            else{

            }
        }
    });


</script>
@endPushOnce