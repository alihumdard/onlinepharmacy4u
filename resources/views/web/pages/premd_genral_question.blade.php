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
        padding: 6px 20px !important;
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

    .btn-radio input[type="radio"] {
        display: none;
    }

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
        border-right: 2px solid #000;
        transform-origin: bottom right;
        opacity: 0;
        transition: opacity 0.2s ease;
    }

    .custom-checkbox input:checked+.custom-checkbox::after {
        opacity: 1;
    }

    .custom-checkbox input:checked+.custom-checkbox {
        background-color: #03c4a5 !important;
    }

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

    .form-group {
        background-color: #15d3ea2e;
    }
</style>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <div class="firstconsultationstart">
                <div class="text">
                    <h2>General Health Questions</h2>
                    <p class="mb-3">The information you provide us is treated with the utmost confidentiality and will be reviewed by a GPhC registered independent prescriber. The questions listed are to provide the prescriber with an appropriate level of information to make an informed decision on whether the treatment is suitable or not.</p>
                </div>
                <form id="pmed_generic_question" action="{{ route('web.consultationStore') }}" method="post">
                    @csrf
                    <input type="hidden" name="template" required value="{{ $template }}">
                    <input type="hidden" name="product_id" required value="{{ $product_id }}">

                    @foreach ($questions as $index => $question)
                        <div class="form-group question px-4" id="question_{{ $index }}" style="display: {{ $index === 0 ? 'block' : 'none' }};">
                            <div class="d-flex align-items-center">
                                <p class="m-0 fw-bold">{{ $question['title'] ?? '' }}</p>
                            </div>
                            @if ($question['anwser_set'] == 'yes_no')
                                <div class="form-check">
                                    <input class="form-check-input styled-radio" type="radio" name="quest_{{ $index }}" id="quest_{{ $index }}_option1" value="Yes" required>
                                    <label class="form-check-label" for="quest_{{ $index }}_option1">{{ $question['yes_lable'] ?? 'Yes' }}</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input styled-radio" type="radio" name="quest_{{ $index }}" id="quest_{{ $index }}_option2" value="No" required>
                                    <label class="form-check-label" for="quest_{{ $index }}_option2">{{ $question['no_lable'] ?? 'No' }}</label>
                                </div>
                            @elseif ($question['anwser_set'] == 'mt_choice')
                                <div class="form-check">
                                    <input class="form-check-input styled-radio" type="radio" name="quest_{{ $index }}" id="quest_{{ $index }}_optionA" value="A" required>
                                    <label class="form-check-label" for="quest_{{ $index }}_optionA">{{ $question['optA'] ?? 'Option A' }}</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input styled-radio" type="radio" name="quest_{{ $index }}" id="quest_{{ $index }}_optionB" value="B" required>
                                    <label class="form-check-label" for="quest_{{ $index }}_optionB">{{ $question['optB'] ?? 'Option B' }}</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input styled-radio" type="radio" name="quest_{{ $index }}" id="quest_{{ $index }}_optionC" value="C" required>
                                    <label class="form-check-label" for="quest_{{ $index }}_optionC">{{ $question['optC'] ?? 'Option C' }}</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input styled-radio" type="radio" name="quest_{{ $index }}" id="quest_{{ $index }}_optionD" value="D" required>
                                    <label class="form-check-label" for="quest_{{ $index }}_optionD">{{ $question['optD'] ?? 'Option D' }}</label>
                                </div>
                            @elseif ($question['anwser_set'] == 'openbox')
                                <div class="mt-3 mb-0">
                                    <label for="quest_{{ $index }}" class="form-label">Additional Details:</label>
                                    <textarea class="form-control" name="quest_{{ $index }}" id="quest_{{ $index }}" rows="7" style="height: 135px; border-radius:15px;" placeholder="Please provide any additional details here" required></textarea>
                                </div>
                            @endif
                        </div>
                    @endforeach

                    <div class="form-group px-3" id="submit_section" style="display: none;">
                        <div class="d-flex align-items-center m-3 mb-5">
                            <button type="submit" class="btn btn-outline-success bnt-checkout fw-bold rounded-1">Proceed to Checkout</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- second div  -->
        <div class="col-md-4 bg-info mb-5 rounded-3" style="border-radius: 25px !important;">
            <div class="trackcompleted mb-4">
                <div class="text">
                    <h1>How it works</h1>
                    <hr class="my-3">
                </div>
                <div class="q1complete">
                    <div class="mt-4 d-flex gap-2">
                        <span style="width: 29px; height: 29px; background: #00c4a3; color: #fff; text-align: center; border-radius: 50%;">&#49;</span>
                        <span>Complete a consultation</span>
                    </div>
                    <p>You will need to begin by completing an ailment-based consultation. This will be a set of questions related to your symptoms, medical history and any other information our prescribers might need to be able to recommend a suitable treatment.</p>
                </div>
                <div class="q2complete">
                    <div class="mt-3 d-flex gap-2">
                        <span style="width: 29px; height: 29px; background: #00c4a3; color: #fff; text-align: center; border-radius: 50%;">&#50;</span>
                        <span>Choose your treatment</span>
                    </div>
                    <p>Once you have completed your consultation, you will be presented with the suitable treatments available for your condition.</p>
                </div>
                <div class="q3complete">
                    <div class="mt-3 d-flex gap-2">
                        <span style="width: 29px; height: 29px; background: #00c4a3; color: #fff; text-align: center; border-radius: 50%;">&#51;</span>
                        <span>Delivery</span>
                    </div>
                    <p>Our UK pharmacy will then dispense and dispatch your medicine to your chosen address.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var currentQuestion = 0;
        var totalQuestions = $('.question').length;

        $('input[type="radio"], textarea').change(function() {
            showNextQuestion();
        });

        function showNextQuestion() {
            let currentElem = $('#question_' + currentQuestion);
            let isValid = validateInput(currentElem);
            if (isValid) {
                if (currentQuestion < totalQuestions - 1) {
                    currentQuestion++;
                    $('#question_' + currentQuestion).show();
                } else {
                    $('#submit_section').show();
                }
            }
        }

        function validateInput(elem) {
            var isValid = true;
            elem.find('input[type="radio"]').each(function() {
                if ($(this).prop('required') && !$('input[name="' + $(this).attr('name') + '"]:checked').length) {
                    isValid = false;
                    return false;
                }
            });
            elem.find('textarea').each(function() {
                if ($(this).prop('required') && !$(this).val().trim()) {
                    isValid = false;
                    return false;
                }
            });
            return isValid;
        }

        $('#pmed_generic_question').submit(function() {
            if ($('#attention_modal').is(':visible')) {
                $('#attention_modal').modal("show");
                return false;
            }
            return true;
        });
    });
</script>
@endsection
