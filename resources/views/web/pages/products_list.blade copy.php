@extends('web.layouts.default')
@section('title', 'Shop')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="ltn__utilize-overlay"></div>

<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image " data-bs-bg="img/bg/14.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">{{ $category_detail->name }}</h1>
                    <div class="ltn__breadcrumb-list">
                        {{-- <ul>
                            <li><a href="index.html"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                            <li>Online Pharmacy 4U Shop</li>
                        </ul> --}}
                        @if (! session()->has('consultations'))
                        <form action="{{ route('web.consultationForm') }}" method="POST">
                            @csrf
                            <input type="hidden" name="template" value="{{ config('constants.PRESCRIPTION_MEDICINE') }}">
                            <input type="hidden" name="product_id" value="{{ session('product_id') }}">
                            <button type="submit" class="theme-btn-1 btn" title="Add to Cart">
                                {{-- <i class="fas fa-shopping-cart"></i> --}}
                                <span>Start Consultation</span>
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- PRODUCT DETAILS AREA START -->
<div class="ltn__product-area ltn__product-gutter mb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 order-lg-2 mb-120">
                <div class="ltn__shop-options">
                    <ul>
                        <li>
                            <div class="ltn__grid-list-tab-menu ">
                                <div class="nav">
                                    {{-- <a class="active show" data-bs-toggle="tab" href="#liton_product_grid"><i class="fas fa-th-large"></i></a> --}}
                                    {{-- <a data-bs-toggle="tab" href="#liton_product_list"><i class="fas fa-list"></i></a> --}}
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="showing-product-number text-right">
                                {{-- <span>Showing 1–12 of 18 results</span> --}}
                            </div>
                        </li>
                        <li>
                            <div class="short-by text-center">
                                <select class="nice-select">
                                    <option>Default Sorting</option>
                                    <option>Sort by popularity</option>
                                    <option>Sort by new arrivals</option>
                                    <option>Sort by price: low to high</option>
                                    <option>Sort by price: high to low</option>
                                </select>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="liton_product_grid">
                        <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                            <div class="row">
                                <!-- ltn__product-item -->
                                @foreach($products as $key => $val)
                                <div class="col-xl-4 col-sm-6 col-6">
                                    <div class="ltn__product-item ltn__product-item-3 text-center">
                                        <div class="product-img">
                                            <a href="product-details.html"><img src="{{ asset('storage/'.$val->main_image)}}" alt="#"></a>
                                            {{-- <div class="product-badge">
                                                    <ul>
                                                        <li class="sale-badge">New</li>
                                                    </ul>
                                                </div> --}}
                                            <div class="product-hover-action">
                                                <ul>
                                                    @if($val->product_template == config('constants.COUNTER_MEDICINE'))
                                                    <li>
                                                        <a href="{{ route('web.product', ['id' => $val->id]) }}">
                                                            <i class="far fa-eye"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        {{-- <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                                            <i class="fas fa-shopping-cart"></i>
                                                        </a> --}}
                                                        <a href="javascript:void(0)" onclick="addToCart({{ $val->id }});" title="Add to Cart">
                                                            <i class="fas fa-shopping-cart"></i>
                                                        </a>
                                                    </li>
                                                    @else
                                                    <li>
                                                        <a href="#" title="You have to answer some question" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                                            <i class="fas fa-plus"></i>
                                                        </a>
                                                    </li>
                                                    @endif
                                                    {{-- <li>
                                                            <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart"></i></a>
                                                        </li> --}}
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <div class="product-ratting">
                                                <ul>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h2 class="product-title"><a href="{{ route('web.product', ['id' => $val->id]) }}">{{ $val->title }}</a></h2>
                                            @if($val->product_template == config('constants.PRESCRIPTION_MEDICINE'))
                                            <a href="{{ route('web.product', ['id' => $val->id]) }}" class="theme-btn-1 btn btn-effect-1" title="Start">
                                                <span>Learn More</span>
                                            </a>
                                            @else
                                            <div class="product-price">
                                                <span>£{{ $val->price }}</span>
                                                <del>{{ $val->cut_price ? '£'.$val->cut_price : NULL }}</del>
                                            </div>
                                            @endif
                                            @if($is_add_to_cart == 'yes')
                                            <div class="add_cart">
                                                <a href="javascript:void(0)" onclick="addToCart({{$val->id}});" class="btn btn-outline-primary">Add to Cart </a>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- ltn__product-item -->
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="ltn__pagination-area text-center">
                    <div class="ltn__pagination">
                        <ul>
                            <li><a href="#"><i class="fas fa-angle-double-left"></i></a></li>
                            <li><a href="#">1</a></li>
                            <li class="active"><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">...</a></li>
                            <li><a href="#">10</a></li>
                            <li><a href="#"><i class="fas fa-angle-double-right"></i></a></li>
                        </ul>
                    </div>
                </div> --}}
            </div>
            <div class="col-lg-4  mb-120">
                <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar">
                    <!-- Category Widget -->
                    <div class="widget ltn__menu-widget">
                        <h4 class="ltn__widget-title ltn__widget-title-border">Product categories</h4>
                        <ul>
                            @foreach($categories_list as $key => $val)
                            <li><a href="{{ route('category.products', ['main_category' => $val->slug]) }}">{{$val->name}} <span><i class="fas fa-long-arrow-alt-right"></i></span></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Price Filter Widget -->
                    <div class="widget ltn__price-filter-widget d-none">
                        <h4 class="ltn__widget-title ltn__widget-title-border">Filter by price</h4>
                        <div class="price_filter">
                            <div class="price_slider_amount">
                                <input type="submit" value="Your range:" />
                                <input type="text" class="amount" name="price" placeholder="Add Your Price" />
                            </div>
                            <div class="slider-range"></div>
                        </div>
                    </div>
                    <!-- Top Rated Product Widget -->
                    <div class="widget ltn__top-rated-product-widget d-none">
                        <h4 class="ltn__widget-title ltn__widget-title-border">Top Rated Product</h4>
                        <ul>
                            <li>
                                <div class="top-rated-product-item clearfix">
                                    <div class="top-rated-product-img">
                                        <a href="product-details.html"><img src="img/product/1.png" alt="#"></a>
                                    </div>
                                    <div class="top-rated-product-info">
                                        <div class="product-ratting">
                                            <ul>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <h6><a href="product-details.html">Mixel Solid Seat Cover</a></h6>
                                        <div class="product-price">
                                            <span>$49.00</span>
                                            <del>$65.00</del>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="top-rated-product-item clearfix">
                                    <div class="top-rated-product-img">
                                        <a href="product-details.html"><img src="img/product/2.png" alt="#"></a>
                                    </div>
                                    <div class="top-rated-product-info">
                                        <div class="product-ratting">
                                            <ul>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <h6><a href="product-details.html">Thermometer Gun</a></h6>
                                        <div class="product-price">
                                            <span>$49.00</span>
                                            <del>$65.00</del>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="top-rated-product-item clearfix">
                                    <div class="top-rated-product-img">
                                        <a href="product-details.html"><img src="img/product/3.png" alt="#"></a>
                                    </div>
                                    <div class="top-rated-product-info">
                                        <div class="product-ratting">
                                            <ul>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                                <li><a href="#"><i class="far fa-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <h6><a href="product-details.html">Coil Spring Conversion</a></h6>
                                        <div class="product-price">
                                            <span>$49.00</span>
                                            <del>$65.00</del>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- Search Widget -->
                    <div class="widget ltn__search-widget d-none">
                        <h4 class="ltn__widget-title ltn__widget-title-border">Search Objects</h4>
                        <form action="#">
                            <input type="text" name="search" placeholder="Search your keyword...">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <!-- Tagcloud Widget -->
                    <div class="widget ltn__tagcloud-widget d-none">
                        <h4 class="ltn__widget-title ltn__widget-title-border">Popular Tags</h4>
                        <ul>
                            <li><a href="#">Body</a></li>
                            <li><a href="#">Doctor</a></li>
                            <li><a href="#">Drugs</a></li>
                            <li><a href="#">Eye</a></li>
                            <li><a href="#">Face</a></li>
                            <li><a href="#">Hand</a></li>
                            <li><a href="#">Mask</a></li>
                            <li><a href="#">Medicine</a></li>
                            <li><a href="#">Price</a></li>
                            <li><a href="#">Sanitizer</a></li>
                            <li><a href="#">Virus</a></li>
                        </ul>
                    </div>


                    <!-- Banner Widget -->
                    <div class="widget ltn__banner-widget">
                        <a href="shop.html"><img src="img/banner/banner-2.jpg" alt="#"></a>
                    </div>

                </aside>
            </div>
        </div>
    </div>
</div>
<!-- PRODUCT DETAILS AREA END -->

<!-- MODAL AREA START (Add To Cart Modal) -->
<div class="ltn__modal-area ltn__add-to-cart-modal-area">
    <div class="modal fade" id="add_to_cart_modal" tabindex="-1">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="ltn__quick-view-modal-inner">
                        <div class="modal-product-item">
                            <div class="row">
                                <div class="col-12">
                                    {{-- <div class="modal-product-img">
                                        <img src="img/product/1.png" alt="#">
                                    </div> --}}
                                    <div class="modal-product-info">
                                        <h5><a href="product-details.html"></a></h5>
                                        <p class="added-cart"><i class="fa fa-check-circle"></i> Successfully added to your Cart</p>
                                        <div class="btn-wrapper">
                                            <a href="{{route('web.view.cart')}}" class="theme-btn-1 btn btn-effect-1">View Cart</a>
                                            <a href="checkout.html" class="theme-btn-2 btn btn-effect-2">Checkout</a>
                                        </div>
                                    </div>
                                    <!-- additional-info -->
                                    <div class="additional-info d-none">
                                        <p>We want to give you <b>10% discount</b> for your first order, <br> Use discount code at checkout</p>
                                        <div class="payment-method">
                                            <img src="img/icons/payment.png" alt="#">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL AREA END -->

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
                        <input type="hidden" name="product_id" value="{{ session('product_id') }}">
                    </form>
                    @endif

                    <button form="start_consultation_from" class="btn btn-primary my-3 btn-large">Start Erectile Dysfunction (Impotence) Consultation </button>
                    <button class="btn btn-primary my-3 small-btn">Start Consultation </button>
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
                        <img src="{{ asset('storage/'.$val->main_image)}}" class="card-img-top" alt="...">
                        @if($val->product_template == config('constants.COUNTER_MEDICINE'))
                        <a href="javascript:void(0)" onclick="addToCart(@json($val->id));" title="Add to Cart" class="btn btn-outline-danger w-100">Add To Cart</a>
                        @else
                        <a href="{{ route('web.product', ['id' => $val->id]) }}" class="btn btn-outline-danger w-100">Learn more</a>
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
                    <img src="img/product/ban-1.png" width="220px" alt="...">
                    <h4 class="mt-2 mb-0 ">Complete a consultation.</h4>
                    <p>With complete privacy and confidentiality your form is checked by a pharmacist independent prescriber.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="explain-step text-center d-block">
                    <img src="img/product/ban-2.png" width="220px" alt="...">
                    <h4 class="mt-2 mb-0">Choose your treatment.</h4>
                    <p>From the list approved by the prescriber, choose your preferred treatment and then wait for it to be dispensed by UK Meds online pharmacy.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="explain-step text-center">
                    <img src="img/product/ban-3.png" width="220px" alt="...">
                    <h4 class="mt-2 mb-0">Receive your delivery.</h4>
                    <p>With next day delivery options available, you can have your treatment sent out to you discreetly within hours.</p>
                </div>
            </div>
        </div>
        <div class="import-btn text-center mt-4">
            <button class="btn btn-danger large-scr">Start Your Erectile Dysfunction (Impotence) consultation</button>
            <button class="btn btn-primary my-3 small-btn">Start Consultation </button>
        </div>
        <div class="small-scr">
            <button class="btn btn-danger start">Start consultation</button>
        </div>
    </div>
</section>



@stop

@pushOnce('scripts')
<script>

</script>
@endPushOnce