@extends('admin.layouts.default')
@section('title', 'Add Question')
@section('content')
<style>
    .select2-selection__rendered {
        line-height: 35px !important;
    }

    .select2-container .select2-selection--single {
        height: 40px !important;
    }

    .select2-selection__arrow {
        height: 40px !important;
    }

    .btn_theme {
        background: #03bd8d;
        border: #03bd8d 1px solid;
    }
</style>
<!-- main stated -->
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Add Question</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Pages</li>
                <li class="breadcrumb-item active">Add Question</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <!-- Multi Columns Form -->
                        <form class="row g-3 mt-3 needs-validation" method="post" action="{{ route('admin.storeQuestion') }}" novalidate>
                            @csrf
                            <input type="hidden" name="id" value="{{ $question['id'] ?? ''}}">
                            <div class="col-md-12 d-block">
                                <label for="category_id" class="form-label fw-bold">Select Category</label>
                                <select id="category_id" name="category_id" class="form-select select2" data-placeholder="choose categories ..." required>
                                    <option value=""></option>
                                    @foreach ($categories as $key => $value)
                                    <option {{ (isset($question['category_id']) && $value['id'] == $question['category_id']) ? 'selected' : '' }} {{ ($value['id'] == old('category_id')) ? 'selected' : '' }} value="{{ $value['id'] ?? '' }}">{{ $value['name'] ?? '' }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Please enter question title!</div>
                                @error('category_id')
                                <div class="alert-danger text-danger ">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="name" class="form-label fw-bold">Title</label>
                                <input type="text" name="title" value="{{  $question['title'] ?? old('title') }}" class="form-control" id="title" required>
                                <div class="invalid-feedback">Please enter question title!</div>
                                @error('name')
                                <div class="alert-danger text-danger ">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="desc" class="form-label fw-bold">Description <small>(Optional)</small></label>
                                <textarea name="desc" class="form-control tinymce-editor" cols="10" rows="3" id="desc"> {!! $question['desc'] ?? old('desc') !!} </textarea>
                                @error("desc")
                                <div class="alert-danger text-danger ">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-5 ">
                                <label for="anwser_set" class="form-label fw-bold">Anwser Set</label>
                                <select class="form-select" name="anwser_set" id="anwser_set" required>
                                    <option value="mt_choice" {{ ($question['anwser_set'] ?? old('anwser_set')) == 'mt_choice' ? 'selected' : '' }}>Multiple Choice</option>
                                    <option value="yes_no" {{ (($question['anwser_set'] ?? old('anwser_set')) == 'yes_no') ? 'selected' : '' }}>Yes or No</option>
                                    <option value="openbox" {{ ($question['anwser_set'] ?? old('anwser_set')) == 'openbox' ? 'selected' : '' }}>Input Box</option>
                                    <option value="file" {{ ($question['anwser_set'] ?? old('anwser_set')) == 'file' ? 'selected' : '' }}>File</option>
                                </select>
                                <div class="invalid-feedback">Please select anser Set!</div>
                                @error('anwser_set')
                                <div class="alert-danger text-danger ">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-5 ">
                                <label for="type" class="form-label fw-bold">Type</label>
                                <select class="form-select" name="type" id="type" required>
                                    <option value="non_dependent" {{ (($question['tyoe'] ?? old('non_dependent')) == 'non_dependent') ? 'selected' : '' }}>Non Dependent</option>
                                    <option value="dependent" {{ ($question['type'] ?? old('dependent')) == 'dependent' ? 'selected' : '' }}>Dependent</option>
                                </select>
                                <div class="invalid-feedback">Please select question type!</div>
                                @error('anwser_set')
                                <div class="alert-danger text-danger ">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-2 order {{ ($question['type'] ?? old('dependent')) == 'dependent' ? 'd-none' : '' }}">
                                <label for="order" class="form-label fw-bold">Order</label>
                                <input type="text" name="order" value="{{  $question['order'] ?? old('order') }}" class="form-control" id="order" required>
                                <div class="invalid-feedback">Please enter question order!</div>
                                @error('order')
                                <div class="alert-danger text-danger ">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="ansewers row  my-3"></div>

                            <div class="text-center mt-4 mb-3 d-flex justify-content-center ">
                                <button type="reset" class="btn btn-secondary px-5 py-2 mx-2 fw-bold">Reset</button>
                                <button type="submit" class="btn btn-success px-5 py-2 btn_theme fw-bold">Submit</button>
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
        var anserset = $('#anwser_set').val();
        getoptions(anserset);

        $('#type').on('change', function() {
            let type = $(this).val();
            if (type === 'dependent') {
                $('.order').addClass('d-none');
                $('#order').removeAttr('required').val('');
            } else {
                $('.order').removeClass('d-none');
                $('#order').prop('required', true).val('');
            }
        });


        $('#anwser_set').on('change', function() {
            anserset = $(this).val();
            getoptions(anserset);
        });

        function getoptions(anserset = 'mt_choice') {
            let optAValue = "{{ $question['optA'] ?? old('optA') }}";
            let optBValue = "{{ $question['optB'] ?? old('optB') }}";
            let optCValue = "{{ $question['optC'] ?? old('optC') }}";
            let optDValue = "{{ $question['optD'] ?? old('optD') }}";
            let yesLableValue = "{{ $question['yes_lable'] ?? old('yes_lable') }}";
            let noLableValue = "{{ $question['no_lable'] ?? old('no_lable') }}";
            if (anserset == 'mt_choice') {
                $('.ansewers').html('<div class="col-md-6 mb-3">' +
                    '<label for="optA" class="form-label fw-semibold ">Option A</label>' +
                    '<input type="text" name="optA" value="' + optAValue + '" class="form-control" id="optA" required>' +
                    '<div class="invalid-feedback">Please enter option A title!</div>' +
                    '@error("optA")' +
                    '<div class="alert-danger text-danger ">{{ $message }}</div>' +
                    '@enderror' +
                    '</div>' +

                    '<div class="col-md-6 mb-3">' +
                    '<label for="optB" class="form-label fw-semibold">Option B</label>' +
                    '<input type="text" name="optB" value="' + optBValue + '" class="form-control" id="optB" required>' +
                    '<div class="invalid-feedback">Please enter option B!</div>' +
                    '@error("optB")' +
                    '<div class="alert-danger text-danger ">{{ $message }}</div>' +
                    '@enderror' +
                    '</div>' +

                    '<div class="col-md-6 mb-3">' +
                    '<label for="optC" class="form-label fw-semibold">Option C</label>' +
                    '<input type="text" name="optC" value="' + optCValue + '" class="form-control" id="optC" required>' +
                    '<div class="invalid-feedback">Please enter option C!</div>' +
                    '@error("optC")' +
                    '<div class="alert-danger text-danger ">{{ $message }}</div>' +
                    '@enderror' +
                    '</div>' +

                    '<div class="col-md-6 mb-3">' +
                    '<label for="optD" class="form-label fw-semibold">Option D</label>' +
                    '<input type="text" name="optD" value="' + optDValue + '" class="form-control" id="optD" required>' +
                    '<div class="invalid-feedback">Please enter option D!</div>' +
                    '@error("optD")' +
                    '<div class="alert-danger text-danger ">{{ $message }}</div>' +
                    '@enderror' +
                    '</div>');
            } else if (anserset == 'yes_no') {
                $('.ansewers').html('<div class="col-md-6 mb-3">' +
                    '<label for="yes_lable" class="form-label fw-semibold">Yes Answer Label</label>' +
                    '<input type="text" name="yes_lable" value="' + yesLableValue + '" class="form-control" id="yes_lable" required>' +
                    '<div class="invalid-feedback">Please write Yes label!</div>' +
                    '@error("yes_lable")' +
                    '<div class="alert-danger text-danger ">{{ $message }}</div>' +
                    '@enderror' +
                    '</div>' +

                    '<div class="col-md-6 mb-3">' +
                    '<label for="no_lable" class="form-label fw-semibold">No Answer Label</label>' +
                    '<input type="text" name="no_lable" value="' + noLableValue + '" class="form-control" id="no_lable" required>' +
                    '<div class="invalid-feedback">Please write No label!</div>' +
                    '@error("no_lable")' +
                    '<div class="alert-danger text-danger ">{{ $message }}</div>' +
                    '@enderror' +
                    '</div>');
            } else if (anserset == 'openbox') {
                $('.ansewers').html('');
            } else if (anserset == 'file') {
                $('.ansewers').html('');
            } else {
                alert('Select the correct answer set');
            }
        }
    });
</script>
@endPushOnce