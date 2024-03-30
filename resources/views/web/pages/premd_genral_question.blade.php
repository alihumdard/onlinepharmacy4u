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
    .form-group{
        background-color: #15d3ea2e;
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
                    <input type="hidden" name="template" required value="{{$template}}">
                    <input type="hidden" name="product_id" required value="{{$product_id}}">

                    <div class="form-group px-4 pt-3 pb-2">
                        <div class="d-flex question align-items-start">
                            <p class="me-auto mb-2 pt-1" style="font-weight: 400;">{{$questions[0]['title'] ?? '' }}</p>
                            <label class="btn" style="padding: 0;">
                                <input type="radio" name="quest_1" class="btn-radio option" value="Yes" data-next_quest="skip" data-label="Yes" required>
                            </label>
                            <label class="btn" style="padding: 0;">
                                <input type="radio" name="quest_1" class="btn-radio option" value="No" data-next_quest="show" data-label="No" required>
                            </label>
                        </div>

                        <div class="question px-1" style="display:none;">
                            <hr class="my-3">
                            <div class="mb-0">
                                <label for="quest_2" class="form-label pr-2">{{$questions[1]['title'] ?? '' }}</label>
                                <textarea class="form-control" disabled id="quest_2" name="quest_2" rows="7" style="height: 135px; border-radius:15px; " placeholder="Please provide any additional details here" required=''></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group px-4 pt-3 pb-2">
                        <div class="d-flex question align-items-start">
                            <p class="me-auto mb-2 pt-1" style="font-weight: 400;">{{$questions[2]['title'] ?? '' }}</p>
                            <label class="btn" style="padding: 0;">
                                <input type="radio" name="quest_3" class="btn-radio option" value="Yes" data-next_quest="skip" data-label="Yes" required>
                            </label>
                            <label class="btn" style="padding: 0;">
                                <input type="radio" name="quest_3" class="btn-radio option" value="No" data-next_quest="show" data-label="No" required>
                            </label>
                        </div>

                        <div class="question px-1" style="display:none;">
                            <hr class="my-2">
                            <div class="mb-0 alert alert-danger bg-danger">
                                it is alert working fine how are you
                                it is alert working fine how are you
                                it is alert working fine how are you
                            </div>
                        </div>
                    </div>

                    <div class="form-group px-4 pt-3 pb-2">
                        <div class="d-flex question align-items-start">
                            <p class="me-auto mb-2 pt-1" style="font-weight: 400;">{{$questions[3]['title'] ?? '' }}</p>
                            <label class="btn" style="padding: 0;">
                                <input type="radio" name="quest_4" class="btn-radio option" value="Yes" data-next_quest="show" data-label="Yes" required>
                            </label>
                            <label class="btn" style="padding: 0;">
                                <input type="radio" name="quest_4" class="btn-radio option" value="No" data-next_quest="skip" data-label="No" required>
                            </label>
                        </div>

                        <div class="question px-1" style="display:none;">
                            <hr class="my-3">
                            <div class="mb-0 alert alert-warning ">
                                it is alert working fine how are you
                                it is alert working fine how are you
                                it is alert working fine how are you
                            </div>
                            <hr class="my-3">
                            <div class="mb-0">
                                <label for="quest_5" class="form-label pr-2">{{$questions[4]['title'] ?? '' }}</label>
                                <textarea class="form-control" disabled id="quest_5" name="quest_5" rows="7" style="height: 135px; border-radius:15px; " placeholder="Please provide any additional details here" required=''></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group px-4 pt-3 pb-2">
                        <div class="d-flex question align-items-start">
                            <p class="me-auto mb-2 pt-1" style="font-weight: 400;">{{$questions[5]['title'] ?? '' }}</p>
                            <label class="btn" style="padding: 0;">
                                <input type="radio" name="quest_6" class="btn-radio option" value="Yes" data-next_quest="show" data-label="Yes" required>
                            </label>
                            <label class="btn" style="padding: 0;">
                                <input type="radio" name="quest_6" class="btn-radio option" value="No" data-next_quest="skip" data-label="No" required>
                            </label>
                        </div>

                        <div class="question px-1" style="display:none;">
                            <hr class="my-3">
                            <div class="mb-0">
                                <label for="quest_7" class="form-label pr-2">{{$questions[6]['title'] ?? '' }}</label>
                                <textarea class="form-control" disabled id="quest_7" name="quest_7" rows="7" style="height: 135px; border-radius:15px; " placeholder="Please provide any additional details here" required=''></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group px-4 pt-3 pb-2">
                        <div class="d-flex question align-items-start">
                            <p class="me-auto mb-2 pt-1" style="font-weight: 400;">{{$questions[7]['title'] ?? '' }}</p>
                            <label class="btn" style="padding: 0;">
                                <input type="radio" name="quest_8" class="btn-radio option" value="Yes" data-next_quest="show" data-label="Yes" required>
                            </label>
                            <label class="btn" style="padding: 0;">
                                <input type="radio" name="quest_8" class="btn-radio option" value="No" data-next_quest="skip" data-label="No" required>
                            </label>
                        </div>

                        <div class="question px-1" style="display:none;">
                            <hr class="my-3">
                            <div class="mb-0">
                                <label for="quest_9" class="form-label pr-2">{{$questions[8]['title'] ?? '' }}</label>
                                <textarea class="form-control" disabled id="quest_9" name="quest_9" rows="7" style="height: 135px; border-radius:15px; " placeholder="Please provide any additional details here" required=''></textarea>
                            </div>
                        </div>
                    </div>


                    <div class="form-group px-4 pt-3 pb-2" >
                        <div class="d-flex question flex-column align-items-end">
                            <p class="me-auto">What is your height?</p>
                            <div class="d-flex justify-content-end" style="line-height: 0;">
                                <p class="me-2 align-self-end">Feet</p> &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                <p class="me-2 align-self-end">Inches</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-end mb-2">
                                <input type="text"   name="quest_10['feet']" class="me-2" placeholder="6">
                                <input type="text" name="quest_10['inches']" placeholder="6">
                            </div>
                        </div>
                    </div>
                    <div class="form-group px-4 pt-4 pb-2" >
                        <div class="d-flex question flex-column align-items-end" style="line-height: 0;">
                            <p class="me-auto">What is your weight?</p>
                            <div class="d-flex justify-content-end">
                                <p class="me-2 align-self-end">stone</p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <p class="me-2 align-self-end">pounds</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-end mb-2">
                                <input type="text" name="quest_11['stone']" class="me-2" placeholder="6">
                                <input type="text" name="quest_11['pounds']" placeholder="6">
                            </div>
                        </div>
                    </div>
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
    $(document).ready(function() {
        $('.btn-radio').change(function() {
            var questionDiv = $(this).closest('.form-group').find('.question');
            var nextQuest = $(this).data('next_quest');
            if (nextQuest === 'skip') {
                questionDiv.hide().find('textarea').val('').attr('disabled', true);
            } else if (nextQuest === 'show') {
                questionDiv.find('textarea').attr('disabled', false);
                questionDiv.slideDown('medium', function() {
                    $(this).find('textarea').val('');
                });
            }
        });
    });
</script>

@endPushOnce