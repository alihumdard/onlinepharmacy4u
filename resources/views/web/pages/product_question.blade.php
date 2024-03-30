@extends('web.layouts.default')
@section('title', 'Product Questions')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<style>
    .styled-radio {
        cursor: pointer;
        width: 20px;
        height: 20px;
        margin-right: 10px;
        border: 2px solid #0dcaf0;
        border-radius: 50%;
        outline: none;
    }

    .styled-radio:hover {
        outline: auto;
    }

    .styled-radio:checked {
        background-color: #0dcaf0;
        border: 2px solid #0dcaf0;
        box-shadow: none;
        outline: none;
    }


    .btn-radio {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        border: 1px solid #ced4da !important;
        border-radius: 0.25rem;
        padding: 7px 20px !important;
        cursor: pointer;
        outline: none;
        background-color: #ced4da;
        font-weight: 400;
    }

    .btn-radio:checked {
        background-color: #0dcaf0 !important;
        border: 2px solid #0dcaf0;
        color: #fff;
    }

    .btn-radio:focus {
        box-shadow: none;
    }

    .btn-radio:hover {
        background-color: #d8e5e8;
    }

    .btn-radio::before {
        content: attr(data-label);
    }

    /* Hide the actual radio input */
    .btn-radio input[type="radio"] {
        display: none;
    }

    /* Custom checkbox styles */
    .custom-checkbox {
        position: relative;
        display: inline-block;
        width: 26px;
        height: 29px;
        background-color: #fff;
        border: 2px solid #6c757d;
        border-radius: 5px;
        cursor: pointer;
    }

    .custom-checkbox::after {
        background-color: #03c4a5 !important;
        content: "";
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 12px;
        height: 12px;
        border-bottom: 2px solid #000;
        /* Changed border color to black */
        border-right: 2px solid #000;
        /* Changed border color to black */
        transform-origin: bottom right;
        opacity: 0;
        transition: opacity 0.2s ease;
    }

    /* Checkbox checked state */
    .custom-checkbox input:checked+.custom-checkbox::after {
        opacity: 1;
    }

    /* Change background color to green when checked */
    .custom-checkbox input:checked+.custom-checkbox {
        background-color: #03c4a5 !important;
        /* Green background color */
    }

    /* Hide the default checkbox */
    .custom-checkbox input[type="checkbox"] {
        opacity: 0;
        width: 0;
        height: 0;
        background-color: #03c4a5 !important;
    }

    .bnt-checkout:hover {
        background-color: #03c4a5;
        border-radius: 10px !important;
    }

    .bnt-checkout {
        border-radius: 10px !important;
    }
</style>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <div class="firstconsultationstart">
                <div class="text">
                    <h2>General Health Questions</h2>
                    <p>The information you provide us is treated with the utmost confidentiality and will be
                        reviewed by a GPhC
                        registered independent prescriber. The questions listed are to provide the prescriber
                        with
                        an appropriate
                        level of information to make an informed decision on whether the treatment is suitable
                        or
                        not.</p>
                </div>
                <form action="{{route('web.consultationStore')}}" method="post">
                    @csrf
                    <input type="hidden" name="template" required value="1">
                    <input type="hidden" name="product_id" required value="{{$product_id ?? ''}}">

                    @foreach($questions ?? [] as $key => $question)
                    @if($question['anwser_set'] == 'yes_no')
                    <div class="form-group px-3 question" >
                        <div class="d-flex align-items-start">
                            <p class="me-auto " style="font-weight: 400;">{{$question['title'] ?? '' }}</p>
                            <label class="btn" style="padding: 0;">
                                <input type="radio" name="quest_5" class="btn-radio" value="Yes" data-label="Yes" required>
                            </label>
                            <label class="btn" style="padding: 0;">
                                <input type="radio" name="quest_5" class="btn-radio" value="No" data-label="No" required>
                            </label>
                        </div>
                    </div>
                    @endif
                    @if($question['anwser_set'] == 'openbox')
                    <div class="form-group px-4 question" >
                        <div class="d-flex align-items-center">
                            <p class="m-0 fw-bold">{{$question['title'] ?? '' }}</p>
                        </div>
                        <div class="mt-3 mb-0">
                            <label for="quest_3" class="form-label">Additional Details:</label>
                            <textarea class="form-control" name="quest_3" id="quest_3" rows="7" style="height: 135px; border-radius:15px; " placeholder="Please provide any additional details here" required=''></textarea>
                        </div>
                    </div>
                    @endif
                    @if($question['anwser_set'] == 'mt_choice')
                    <div class="form-group px-4 question">
                        <div class="d-flex align-items-center">
                            <p class="m-0 fw-bold">{{$question['title'] ?? '' }}</p>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input styled-radio" type="radio" name="quest_1" id="quest_1_option1" value="Me" required>
                            <label class="form-check-label" for="quest_1_option1">Me</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input styled-radio" type="radio" name="quest_1" id="quest_1_option2" value="Myself & someone else" required>
                            <label class="form-check-label" for="quest_1_option2">Myself & someone else</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input styled-radio" type="radio" name="quest_1" id="quest_1_option3" value="Someone else" required>
                            <label class="form-check-label" for="quest_1_option3">Someone else </label>
                        </div>
                    </div>
                    @endif
                    @endforeach

                    <div class="form-group question" style=" background: none; padding:none; margin:none;">
                        <div class="d-flex align-items-center m-3 mb-5  ">
                            <button type="submit" class="btn btn-outline-success bnt-checkout fw-bold rounded-1" style="border:#ced4da 2xp solid; ">Proceed to Checkout</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- second div  -->
        <div class="col-md-4 bg-info mb-5">
            <div class="trackcompleted">
                <div class="text">
                    <h1>How it works</h1>
                    <hr>
                </div>
                <div class="q1complete">
                    <div class="mt-5" style="width: 30px; height: 30px; background: #00c4a3; color: #fff; text-align: center; border-radius: 10px; ">
                        &#49;</div> <span>Complete a consultation</span>
                    <p>You will need to begin by completing an ailment-based consultation. This will be a set of
                        questions related to your symptoms, medical history and any other information our
                        prescribers might need to be able to recommend a suitable treatment.</p>
                </div>
                <div class="q2complete">
                    <div class="mt-5" style="width: 30px; height: 30px; background: #00c4a3; color: #fff; text-align: center; border-radius: 10px; ">
                        &#50;</div> <span>Browse treatments</span>
                    <p>Explore our wide range of medications, diagnostic tools and over the counter treatments
                        to learn more about how they work, what they are used for and how much they cost.</p>
                </div>
                <div class="q3complete">
                    <div class="mt-5" style="width: 30px; height: 30px; background: #00c4a3; color: #fff; text-align: center; border-radius: 10px; ">
                        &#51;</div> <span>Wait for a prescriber to review your request</span>
                    <p>You can either wait on our website or you can leave the page and wait for a notification
                        from us to let you know that a prescriber has finished reviewing your consultation.</p>
                </div>
                <div class="q4complete">
                    <div class="mt-5" style="width: 30px; height: 30px; background: #00c4a3; color: #fff; text-align: center; border-radius: 10px; ">
                        &#52;</div> <span>Purchase treatment</span>
                    <p>From our selection of available prescription-only and over-the-counter products, the
                        prescriber will let you know which ones they have approved for your condition. From
                        here, you can select your chosen option and continue to payment to complete your order.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@pushOnce('scripts')
<script>
    $('.question').not(':first').hide();
    $(document).ready(function() {
        var currentQuestion = 0;
        var totalQuestions = $('.form-group').length;

        function showNextQuestion() {
            if (currentQuestion < totalQuestions - 1) {
                if (validateInput(currentQuestion)) {
                    $('.form-group').eq(currentQuestion + 1).slideDown('medium');
                    currentQuestion++;
                }
            }
        }

        function validateInput(questionIndex) {
            var valid = true;
            var radioGroups = {};

            $('.form-group').eq(questionIndex).find('input[type="radio"], input[type="checkbox"]').each(function() {
                if ($(this).is(':radio')) {
                    var groupName = $(this).attr('name');
                    if (!radioGroups[groupName]) {
                        radioGroups[groupName] = false;
                    }
                    if ($(this).is(':checked')) {
                        radioGroups[groupName] = true;
                    }
                } else if ($(this).is(':checkbox') && !$(this).is(':checked')) {
                    valid = false;
                    return false;
                }
            });

            $.each(radioGroups, function(key, value) {
                if (!value) {
                    valid = false;
                    return false;
                }
            });

            $('.form-group').eq(questionIndex).find('textarea').each(function() {
                if ($(this).val().trim() === '') {
                    valid = false;
                    return false;
                }
            });

            return valid;
        }


        $('input[type="radio"], input[type="checkbox"]').change(function() {
            showNextQuestion();
        });

        var textareaFocusCount = 0;
        $('textarea').on('input', function() {
            textareaFocusCount++;
            if (textareaFocusCount >= 2) {
                showNextQuestion();
            }
        });


    });
</script>

@endPushOnce