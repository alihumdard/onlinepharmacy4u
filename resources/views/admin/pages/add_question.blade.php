@extends('admin.layouts.default')
@section('title', 'Add Question')
@section('content')
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

                            <div class="col-md-12">
                                <label for="category_id" class="form-label">Select Category</label>
                                <select id="category_id" name="category_id[]" class="form-select select2" data-placeholder="choose categories ..." multiple="multiple">
                                    <option value="all">all</option>

                                    @foreach ($categories as $key => $value)
                                    <option {{ (in_array($value['id'],$question['assignments'])) ? 'selected' : '' }} value="{{ $value['id'] ?? '' }}">{{ $value['name'] ?? '' }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="name" class="form-label">Question Title</label>
                                <input type="text" name="title" value="{{  $question['title'] ?? old('title') }}" class="form-control" id="title" required>
                                <div class="invalid-feedback">Please enter question title!</div>
                                @error('name')
                                <div class="alert-danger text-danger ">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="openbox" class="form-label">Question Description? </label>
                                <textarea name="openbox" class="form-control" cols="10" rows="3" id="openbox"> {{ $question['openbox'] ?? old('openbox') }} </textarea>
                                @error("openbox")
                                <div class="alert-danger text-danger ">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 ">
                                <label for="anwser_set" class="form-label">Anwser Set</label>
                                <select class="form-select" name="anwser_set" id="anwser_set" required>
                                    <option value="mt_choice" {{ ($question['anwser_set'] ?? old('anwser_set')) == 'mt_choice' ? 'selected' : '' }}>Multiple Choice</option>
                                    <option value="yes_no" {{ (($question['anwser_set'] ?? old('anwser_set')) == 'yes_no') ? 'selected' : '' }}>Yes or No</option>
                                    <option value="openbox" {{ ($question['anwser_set'] ?? old('anwser_set')) == 'openbox' ? 'selected' : '' }}>Input Box</option>
                                    <option value="file" {{ ($question['anwser_set'] ?? old('anwser_set')) == 'file' ? 'selected' : '' }}>File</option>
                                </select>
                                <div class="invalid-feedback">Please enter anser Set!</div>
                                @error('anwser_set')
                                <div class="alert-danger text-danger ">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="ansewers row my-2"></div>

                            <div class="text-center mt-3">
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
        var anserset = $('#anwser_set').val();
        getoptions(anserset);

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
                $('.ansewers').html('<div class="col-md-6">' +
                    '<label for="optA" class="form-label">Option A</label>' +
                    '<input type="text" name="optA" value="' + optAValue + '" class="form-control" id="optA" required>' +
                    '<div class="invalid-feedback">Please enter option A title!</div>' +
                    '@error("optA")' +
                    '<div class="alert-danger text-danger ">{{ $message }}</div>' +
                    '@enderror' +
                    '</div>' +

                    '<div class="col-md-6">' +
                    '<label for="optB" class="form-label">Option B</label>' +
                    '<input type="text" name="optB" value="' + optBValue + '" class="form-control" id="optB" required>' +
                    '<div class="invalid-feedback">Please enter option B!</div>' +
                    '@error("optB")' +
                    '<div class="alert-danger text-danger ">{{ $message }}</div>' +
                    '@enderror' +
                    '</div>' +

                    '<div class="col-md-6">' +
                    '<label for="optC" class="form-label">Option C</label>' +
                    '<input type="text" name="optC" value="' + optCValue + '" class="form-control" id="optC" required>' +
                    '<div class="invalid-feedback">Please enter option C!</div>' +
                    '@error("optC")' +
                    '<div class="alert-danger text-danger ">{{ $message }}</div>' +
                    '@enderror' +
                    '</div>' +

                    '<div class="col-md-6">' +
                    '<label for="optD" class="form-label">Option D</label>' +
                    '<input type="text" name="optD" value="' + optDValue + '" class="form-control" id="optD" required>' +
                    '<div class="invalid-feedback">Please enter option D!</div>' +
                    '@error("optD")' +
                    '<div class="alert-danger text-danger ">{{ $message }}</div>' +
                    '@enderror' +
                    '</div>');
            } else if (anserset == 'yes_no') {
                $('.ansewers').html('<div class="col-md-6">' +
                    '<label for="yes_lable" class="form-label">Yes Answer Label</label>' +
                    '<input type="text" name="yes_lable" value="' + yesLableValue + '" class="form-control" id="yes_lable" required>' +
                    '<div class="invalid-feedback">Please write Yes label!</div>' +
                    '@error("yes_lable")' +
                    '<div class="alert-danger text-danger ">{{ $message }}</div>' +
                    '@enderror' +
                    '</div>' +

                    '<div class="col-md-6">' +
                    '<label for="no_lable" class="form-label">No Answer Label</label>' +
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