@extends('admin.layouts.default')
@section('title', 'Assign Question')
@section('content')
<style>
    .hide{
        display: none;
    }
</style>
<!-- main stated -->
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Assign Question</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Pages</li>
                <li class="breadcrumb-item active">Assign Question</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <form class="row g-3 mt-3 needs-validation" method="post" action="{{ route('admin.qustionMapping') }}" novalidate>
                            @csrf
                            <input type="hidden" name="id" value="{{ $row['id'] ?? ''}}">

                            <div class="row mb-3 mt-3">
                                <label for="category_id" class="col-sm-2 col-form-label">Select Category</label>
                                <div class="col-sm-10">
                                    <select id="category_id" name="category_id" class="form-select assign-question-cat">
                                        <option value="" selected disabled>Choose...</option>
                                        @foreach ($categories as $key => $value)
                                        <option value="{{ $value['id'] ?? '' }}" @selected(session('category_id')==$value['id'])>{{ $value['name'] ?? '' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <label for="question_id" class="col-sm-2 col-form-label">Choose Question</label>
                                <div class="col-sm-10">
                                    <select id="question_id" class="form-select select2" name="question_id">
                                    </select>
                                </div>
                                <div id="message" class="text-danger"></div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <label for="question_id" class=" text-center  col-form-label fw-bold btn text-secordary">
                                        Q1. What is you problem here . is my problem?
                                    </label>
                                </div>
                                <div class="col-md-2">
                                    <label for="question_id" class=" text-center px-5 col-form-label fw-bold btn text-danger">
                                        Option...
                                    </label>
                                </div>
                                <div class="col-md-10 mt-choice">
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <label for="optionA" class=" text-center px-5 col-form-label fw-bold btn btn-outline-secondary" onclick="focusDropdown('optionA')">
                                                Option A
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <select id="optionA" class="form-select" name="optA">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <label for="optionB" class=" text-center px-5 col-form-label fw-bold btn btn-outline-secondary" onclick="focusDropdown('optionB')">
                                                Option B
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <select id="optionB" class="form-select" name="optB">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <label for="optionC" class=" text-center px-5 col-form-label fw-bold btn btn-outline-secondary" onclick="focusDropdown('optionC')">
                                                Option C
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <select id="optionC" class="form-select" name="optC">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <label for="optionD" class=" text-center px-5 col-form-label fw-bold btn btn-outline-secondary" onclick="focusDropdown('optionD')">
                                                Option D
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <select id="optionD" class="form-select" name="optD">
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                {{-- yes no --}}
                                <div class="col-md-10 yes-no hide">
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <label for="optionYes" class=" text-center px-5 col-form-label fw-bold btn btn-outline-secondary" onclick="focusDropdown('optionYes')">
                                                YES
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <select id="optionYes" class="form-select" name="optY">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <label for="optionNo" class=" text-center px-5 col-form-label fw-bold btn btn-outline-secondary" onclick="focusDropdown('optionNo')">
                                                NO
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <select id="optionNo" class="form-select" name="optN">
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                {{-- openbox --}}
                                <div class="col-md-10 open-box hide">
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <label for="openBox" class=" text-center px-5 col-form-label fw-bold btn btn-outline-secondary" onclick="focusDropdown('openBox')">
                                                Next Question
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <select id="openBox" class="form-select" name="openBox">
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                {{-- file --}}
                                <div class="col-md-10 file hide">
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <label for="file" class=" text-center px-5 col-form-label fw-bold btn btn-outline-secondary" onclick="focusDropdown('file')">
                                                Next Question
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <select id="file" class="form-select" name="file">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>


                            {{-- <div class="question">

                            </div>

                            <div class="row my-3">
                                <div class="col-sm-4 mx-auto">
                                    <label for="question_id" id="add_new_question" class=" text-center  col-form-label fw-bold btn btn-outline-success">+ Add New Question</label>
                                </div>
                            </div> --}}
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form><!-- End Horizontal Form -->

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
        var categoryId = $('#category_id').val();
        if (categoryId) {
            get_questions(categoryId);
        }

        $('#question_id').on('change', function() {
            var questionId = $('#question_id').val();
            if(questionId){
                get_question_detail(questionId);
            }
        });

        $('#category_id').on('change', function() {
            $('#message').text('');
            categoryId = $(this).val();
            get_questions(categoryId)
        });

        function get_questions(categoryId) {
            // Make AJAX request
            $('#question_id').empty();
            $.ajax({
                url: '{{ route("admin.getAssignQuestion") }}',
                type: 'GET',
                data: {
                    id: categoryId
                },
                success: function(response) {
                    if (response.status === 'success') {
                        if (Object.keys(response.questions).length > 0) {
                            $.each(response.questions, function(key, value) {
                                $('#question_id').append($('<option>', {
                                    value: key,
                                    text: value
                                }));
                            });
                            $('#question_id').prepend($('<option>', {
                                value: '',
                                text: 'Select Question',
                                selected: true, 
                                disabled: true
                            }));
                        } else {
                            $('#message').text('No questions available for this category.');
                        }
                    } else {
                        console.error('Error:', response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }

        function get_question_detail(questionId) {
            // Make AJAX request
            $.ajax({
                url: '{{ route("admin.qustionDetail") }}',
                type: 'GET',
                data: {
                    id: questionId,
                    categoryId: categoryId
                },
                success: function(response) {
                    var reply_option = response.result.detail.anwser_set;

                    $('#optionA').empty();
                    $('#optionB').empty();
                    $('#optionC').empty();
                    $('#optionD').empty();
                    $('#optionYes').empty();
                    $('#optionNo').empty();
                    $('#openBox').empty();
                    $('#file').empty();

                    if(reply_option == 'mt_choice'){
                        $('.mt-choice').removeClass('hide');
                        $('.yes-no').addClass('hide');
                        $('.open-box').addClass('hide');
                        $('.file').addClass('hide');
                        $.each(response.result.other_qstn, function(key, value) {
                            $('#optionA').append($('<option>', {
                                value: key,
                                text: value
                            }));
                            $('#optionB').append($('<option>', {
                                value: key,
                                text: value
                            }));
                            $('#optionC').append($('<option>', {
                                value: key,
                                text: value
                            }));
                            $('#optionD').append($('<option>', {
                                value: key,
                                text: value
                            }));
                        });
                    }
                    else if(reply_option == 'yes_no'){
                        $('.mt-choice').addClass('hide');
                        $('.open-box').addClass('hide');
                        $('.yes-no').removeClass('hide');
                        $('.file').addClass('hide');
                        
                        $.each(response.result.other_qstn, function(key, value) {
                            $('#optionYes').append($('<option>', {
                                value: key,
                                text: value
                            }));
                            $('#optionNo').append($('<option>', {
                                value: key,
                                text: value
                            }));
                        });
                    }
                    else if(reply_option == 'openbox'){
                        $('.mt-choice').addClass('hide');
                        $('.yes-no').addClass('hide');
                        $('.open-box').removeClass('hide');
                        $('.file').addClass('hide');

                        $.each(response.result.other_qstn, function(key, value) {
                            $('#openBox').append($('<option>', {
                                value: key,
                                text: value
                            }));

                        });
                    }
                    else if(reply_option == 'file'){
                        $('.mt-choice').addClass('hide');
                        $('.yes-no').addClass('hide');
                        $('.open-box').addClass('hide');
                        $('.file').removeClass('hide');

                        $.each(response.result.other_qstn, function(key, value) {
                            $('#file').append($('<option>', {
                                value: key,
                                text: value
                            }));

                        });
                    }
                    $('#optionA, #optionB, #optionC, #optionD, #optionYes, #optionNo, #openBox, #file').prepend($('<option>', {
                            value: '',
                            text: 'Select Question',
                            selected: true, 
                        }));
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }
    });

    function focusDropdown(id) {
        var element = document.getElementById(id);
        $(element).trigger('open');
    }
</script>
@endPushOnce