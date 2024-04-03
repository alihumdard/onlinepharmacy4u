@extends('web.layouts.default')
@section('title', 'Shop')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="ltn__utilize-overlay"></div>

<!-- clinic online -->
<section class="clinic-main">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6">
                <div class="erctile-img">
                    <img src="/img/product/eritile.webp" alt="...">
                </div>
            </div>
            <div class="col-md-6">
                <div class="erectile-content">
                    <h2>{{ $category_detail->name }}</h2>
                    <h2>(Impotence)</h2>
                    <p>{!! $category_detail->desc !!}</p>
                    @if (! session()->has('consultations'))
                    <form id="start_consultation_from" action="{{ route('web.consultationForm') }}" method="POST">
                        @csrf
                        <input type="hidden" name="template" value="{{ config('constants.PRESCRIPTION_MEDICINE') }}">
                        <input type="hidden" name="product_id" value="{{ $product_id }}">
                    </form>
                    @endif

                    <button form="start_consultation_from" type="submit" class="btn btn-primary my-3 btn-large">Start ({{ $category_detail->name }}) Consultation</button>
                    <button form="start_consultation_from" type="submit" class="btn btn-primary my-3 small-btn">Start Consultation </button>
                    <button class="btn btn-outline-danger view-btn">View Treatments </button>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="treatment my-5 py-5">
    <div class="container">
        <h4 class="text-center pb-4">{{ $category_detail->name }}</h4>
        <div class="row">
            @foreach($products as $key => $val)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Card title</h5>
                        <img src="{{ asset('storage/'.$val->main_image)}}" class="card-img-top mb-2" alt="...">
                        @if($val->product_template == config('constants.COUNTER_MEDICINE'))
                        <a href="javascript:void(0)" onclick="addToCart(@json($val->id));" title="Add to Cart" class="btn btn-outline-danger w-100">Add To Cart</a>
                        @else
                        <a href="{{ route('web.product', ['id' => $val->id]) }}" class="btn btn-outline-danger w-100">Select Treatment </a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="explain my-5 py-5">
    <div class="container">
        <h4 class="text-center pt-4 pb-5">Easy Steps for your Medicine</h4>
        <div class="row">
            <div class="col-md-4">
                <div class="explain-step text-center">
                    <img src="/img/product/ban-1.png" width="220px" alt="...">
                    <h4 class="mt-2 mb-0 ">Complete a consultation.</h4>
                    <p>With complete privacy and confidentiality your form is checked by a pharmacist independent prescriber.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="explain-step text-center d-block">
                    <img src="/img/product/ban-2.png" width="220px" alt="...">
                    <h4 class="mt-2 mb-0">Choose your treatment.</h4>
                    <p>From the list approved by the prescriber, choose your preferred treatment and then wait for it to be dispensed by UK Meds online pharmacy.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="explain-step text-center">
                    <img src="/img/product/ban-3.png" width="220px" alt="...">
                    <h4 class="mt-2 mb-0">Receive your delivery.</h4>
                    <p>With next day delivery options available, you can have your treatment sent out to you discreetly within hours.</p>
                </div>
            </div>
        </div>
        <div class="import-btn text-center mt-4">
            <button form="start_consultation_from" type="submit" class="btn btn-danger large-scr">Start ({{ $category_detail->name }} )</button>
            <button  form="start_consultation_from" type="submit" class="btn btn-primary my-3 small-btn">Start Consultation </button>
        </div>
        <div class="small-scr">
            <button  form="start_consultation_from" type="submit" class="btn btn-danger start">Start consultation</button>
        </div>
    </div>
</section>



@stop

@pushOnce('scripts')
<script>

</script>
@endPushOnce