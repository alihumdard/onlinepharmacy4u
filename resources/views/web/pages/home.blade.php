@extends('web.layouts.default', ['menu_categories' => $menu_categories])
@section('title', 'Home')
@section('content')

<!-- CUSTOM SLIDER START HERE--  -->








<div class="slider">
    <!-- Slides -->
    <div class="slide" id="slide1">
        <img src="img/slider/NHS_perscriptions_Desktop_1920x.webp" alt="Image 1">
    </div>
    <div class="slide" id="slide2">
        <img src="img/slider/Pharmacy4u_Banner_4_Desktop_Size-01_1920x.webp" alt="Image 2">
    </div>
    <div class="slide" id="slide3">
        <img src="img/slider/Pharmacy4u_Banner_1_Desktop_Size-01_1_1920x.webp" alt="Image 3">
    </div>

    <!-- Navigation dots -->
    <div class="dots">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>
</div>
<script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let slides = document.getElementsByClassName("slide");
        let dots = document.getElementsByClassName("dot");
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        for (let i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        setTimeout(showSlides, 5000); // Change image every 2 seconds
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }
</script>




<!-- CUSTOM SLIDER END HERE--  -->



<!-- SLIDER AREA START (slider-3) -->
<div class="ltn__slider-area ltn__slider-3  section-bg-1 display-none">
    <div class="ltn__slide-one-active slick-slide-arrow-1 slick-slide-dots-1">
        <!-- ltn__slide-item -->
        <div class="ltn__slide-item ltn__slide-item-2  ltn__slide-item-3-normal--- ltn__slide-item-3 bg-image " br data-bs-bg="img/slider/home-slider-one.png">
            <div class="ltn__slide-item-inner  text-left">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 align-self-center">
                            <div class="slide-item-info">
                                <div class="slide-item-info-inner ltn__slide-animation">
                                    <h6 class="slide-sub-title white-color--- animated text-black"><span><i class="fas fa-syringe"></i></span> 100% genuine Products</h6>
                                    <h1 class="slide-title animated text-black">Just a Click Away <br> Online Pharmacy4U!</h1>
                                    <div class="slide-brief animated">
                                        <p class=" text-black">As the fast-expanding Online Pharmacy in the UK, our commitment to prioritising customer needs underscores our service. With a paramount focus on health and well-being, we guarantee complimentary delivery of all your medications.</p>
                                    </div>
                                    <div class="btn-wrapper animated">
                                        <a href="shop.html" class="theme-btn-1 btn btn-effect-1">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ltn__slide-item -->
        <div class="ltn__slide-item ltn__slide-item-2 ltn__slide-item-3-normal--- ltn__slide-item-3 bg-image" data-bs-bg="img/slider/home-slider-2.png">
            <div class="ltn__slide-item-inner text-left">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 align-self-center">
                            <div class="slide-item-info">
                                <div class="slide-item-info-inner ltn__slide-animation">
                                    <div class="slide-video mb-50 d-none">
                                        <a class="ltn__video-icon-2 ltn__video-icon-2-border" href="https://www.youtube.com/embed/tlThdr3O5Qo" data-rel="lightcase:myCollection">
                                            <i class="fa fa-play"></i>
                                        </a>
                                    </div>
                                    <h6 class="slide-sub-title white-color--- animated text-black"><span><i class="fas fa-syringe"></i></span> 100% genuine Products</h6>
                                    <h1 class="slide-title animated text-black">Your Trusted Path to Wellness, Where Convenience Meets Care!</h1>
                                    <div class="slide-brief animated">
                                        <p class="text-black">Experience convenient healthcare with Online Pharmacy4U. Browse a vast selection of medications, health products, and expert advice. Your well-being matters, and we swiftly and reliably deliver quality healthcare to your doorstep.</p>
                                    </div>
                                    <div class="btn-wrapper animated">
                                        <a href="shop.html" class="theme-btn-1 btn btn-effect-1">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ltn__slide-item -->
        <div class="ltn__slide-item ltn__slide-item-2  ltn__slide-item-3-normal--- ltn__slide-item-3  bg-image" data-bs-bg="img/slider/home-slider-3.png">
            <div class="ltn__slide-item-inner  text-left">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 align-self-center">
                            <div class="slide-item-info">
                                <div class="slide-item-info-inner ltn__slide-animation">
                                    <h6 class="slide-sub-title white-color--- animated  text-black"><span><i class="fas fa-syringe"></i></span> 100% genuine Products</h6>
                                    <h1 class="slide-title animated  text-black">Prescriptions made simple, <br>proud to serve you!</h1>
                                    <div class="slide-brief animated">
                                        <p class="text-black">At Online Pharmacy4U, we take pride in serving you, ensuring simplicity and efficiency in every prescription, and fostering your well-being with care.</p>
                                    </div>
                                    <div class="btn-wrapper animated">
                                        <a href="shop.html" class="theme-btn-1 btn btn-effect-1">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  -->
    </div>
</div>
<!-- SLIDER AREA END -->


<!-- Featured Offers area start  -->
<div class="featured-offers-area pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="feature-offer-heading">
                    <h1 class="text-white">Featured Offers</h1>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card card-radius">
                    <img src="img/product/sample-image.webp" class="card-img-top card-radius" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Skincare</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <!-- <a href="#" class="btn btn-primary button-radius">Buy Now</a> -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-radius">
                    <img src="img/product/sample-image.webp" class="card-img-top card-radius" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Sleep</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <!-- <a href="#" class="btn btn-primary button-radius">Buy Now</a> -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-radius">
                    <img src="img/product/sample-image.webp" class="card-img-top card-radius" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Diabetes</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <!-- <a href="#" class="btn btn-primary button-radius">Buy Now</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Featured Offers area end  -->


<!-- CATEGORY AREA START -->
<div class="ltn__category-area section-bg-1-- pt-50 pb-90">
    <div class="container">
        <div class="row ltn__category-slider-active-six slick-arrow-1 border-bottom">
            <div class="col-12">
                <div class="ltn__category-item ltn__category-item-6 text-center">
                    <div class="ltn__category-item-img">
                        <a href="shop.html">
                            <i class="fas fa-notes-medical"></i>
                        </a>
                    </div>
                    <div class="ltn__category-item-name">
                        <h6><a href="shop.html">Best Deals</a></h6>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="ltn__category-item ltn__category-item-6 text-center">
                    <div class="ltn__category-item-img">
                        <a href="shop.html">
                            <i class="fas fa-box-tissue"></i>
                        </a>
                    </div>
                    <div class="ltn__category-item-name">
                        <h6><a href="shop.html">Germs Pads</a></h6>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="ltn__category-item ltn__category-item-6 text-center">
                    <div class="ltn__category-item-img">
                        <a href="shop.html">
                            <i class="fas fa-pump-medical"></i>
                        </a>
                    </div>
                    <div class="ltn__category-item-name">
                        <h6><a href="shop.html">Accessories</a></h6>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="ltn__category-item ltn__category-item-6 text-center">
                    <div class="ltn__category-item-img">
                        <a href="shop.html">
                            <i class="fas fa-bong"></i>
                        </a>
                    </div>
                    <div class="ltn__category-item-name">
                        <h6><a href="shop.html">Medicine Cap</a></h6>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="ltn__category-item ltn__category-item-6 text-center">
                    <div class="ltn__category-item-img">
                        <a href="shop.html">
                            <i class="fas fa-tooth"></i>
                        </a>
                    </div>
                    <div class="ltn__category-item-name">
                        <h6><a href="shop.html">Dental Item</a></h6>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="ltn__category-item ltn__category-item-6 text-center">
                    <div class="ltn__category-item-img">
                        <a href="#">
                            <i class="fas fa-microscope"></i>
                        </a>
                    </div>
                    <div class="ltn__category-item-name">
                        <h6><a href="shop.html">Best Deals</a></h6>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="ltn__category-item ltn__category-item-6 text-center">
                    <div class="ltn__category-item-img">
                        <a href="shop.html">
                            <i class="fas fa-syringe"></i>
                        </a>
                    </div>
                    <div class="ltn__category-item-name">
                        <h6><a href="shop.html">All Products</a></h6>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="ltn__category-item ltn__category-item-6 text-center">
                    <div class="ltn__category-item-img">
                        <a href="shop.html">
                            <i class="fas fa-stethoscope"></i>
                        </a>
                    </div>
                    <div class="ltn__category-item-name">
                        <h6><a href="shop.html">Germs Pads</a></h6>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="ltn__category-item ltn__category-item-6 text-center">
                    <div class="ltn__category-item-img">
                        <a href="shop.html">
                            <i class="fas fa-hand-holding-medical"></i>
                        </a>
                    </div>
                    <div class="ltn__category-item-name">
                        <h6><a href="shop.html">Accessories</a></h6>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="ltn__category-item ltn__category-item-6 text-center">
                    <div class="ltn__category-item-img">
                        <a href="shop.html">
                            <i class="fas fa-procedures"></i>
                        </a>
                    </div>
                    <div class="ltn__category-item-name">
                        <h6><a href="shop.html">Medicine Cap</a></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CATEGORY AREA END -->

<!-- ABOUT US AREA START -->
<div class="ltn__about-us-area pt-25 pb-120 ">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="about-us-img-wrap about-img-left">
                    <img src="img/others/9.webp" alt="About Us Image" class="image-radius">
                </div>
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="about-us-info-wrap">
                    <div class="section-title-area ltn__section-title-2--- mb-30">
                        <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color d-none">About Us</h6>
                        <h1 class="section-title">Our Online Pharmacy 4U <br> Healthcare Professionals </h1>
                        <p>Our Healthcare Professionals here at Online Pharmacy 4U get asked hundreds of questions regards symptoms and treatments daily, visit out A to Z Conditions & Treatments finder to find what your looking for.</p>
                    </div>
                    <ul class="ltn__list-item-1 ltn__list-item-1-before--- clearfix">
                        <li><i class="fas fa-check-square"></i> Watch our explainer video</li>
                        <li><i class="fas fa-check-square"></i> Helps explain some of the</li>
                        <li><i class="fas fa-check-square"></i> common conditions</li>
                        <li><i class="fas fa-check-square"></i> Watch ''how we work'' Video!</li>
                        <li><a href="https://www.youtube.com/@onlinepharmacy4u468" class="btn theme-btn-1">Our YouTube Channel</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ABOUT US AREA END -->

<!-- BANNER AREA START -->
<div class="ltn__banner-area mt-120---">
    <div class="container">
        <div class="row ltn__custom-gutter--- justify-content-center">
            <div class="col-lg-4 col-sm-6">
                <div class="ltn__banner-item">
                    <div class="ltn__banner-img">
                        <a href="#"><img src="img/banner/new_banner2_1.webp" alt="Banner Image" class="image-radius"></a>
                    </div>
                </div>
                <h4 class="text-center">Select your medication.</h4>
                <p class="text-center">Simply select the medication you wish to purchase by searching for it directly or by browsing the categories using the top navigation bar. It's easy!</p>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="ltn__banner-item">
                    <div class="ltn__banner-img">
                        <a href="#"><img src="img/banner/new_banner3_1.webp" alt="Banner Image" class="image-radius"></a>
                    </div>
                </div>
                <h4 class="text-center">Quick 60 secs FREE consultation.</h4>
                <p class="text-center">Once you have selected your medication, you will need to complete a FREE 1-minute consultation. Our panel of GPhC approved prescribers will check your consultation and once approved, your prescription will be dispensed by Online Pharmacy4U.</p>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="ltn__banner-item">
                    <div class="ltn__banner-img">
                        <a href="#"><img src="img/banner/new_banner4_1.webp" alt="Banner Image" calss="image-radius"></a>
                    </div>
                </div>
                <h4 class="text-center">Receive your Express delivery</h4>
                <p class="text-center">With our next-day delivery option, you can have your medications delivered to your door within hours in discreet packaging.</p>
            </div>
        </div>
    </div>
</div>
<!-- BANNER AREA END -->

<!-- PRODUCT AREA START (product-item-3) -->
<div class="ltn__product-area ltn__product-gutter  no-product-ratting pt-85 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area ltn__section-title-2 text-center">
                    <h1 class="section-title">Featured Products</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12 col-sm-6">
                        <div class="ltn__banner-item">
                            <div class="ltn__banner-img">
                                <a href="shop.html"><img src="img/banner/banner11.png" alt="Banner Image"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-6">
                        <div class="ltn__banner-item">
                            <div class="ltn__banner-img">
                                <a href="shop.html"><img src="img/banner/12.webp" alt="Banner Image"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row ltn__tab-product-slider-one-active--- slick-arrow-1">
                    <!-- ltn__product-item -->
                    @if($products)
                    @foreach ($products as $key => $val)
                    <div class="col-lg-3--- col-md-4 col-sm-6 col-6">
                        <div class="ltn__product-item ltn__product-item-2 text-left">
                            <div class="product-img">
                                {{-- <a href="product-details.html">
                                            <img src="{{ asset('storage/'.$val['main_image']) }}" alt="#">
                                </a> --}}
                                <img src="{{ asset('storage/'.$val['main_image']) }}" alt="image">
                                <div class="product-badge">
                                    <ul>
                                        <li class="sale-badge">New</li>
                                    </ul>
                                </div>
                                <div class="product-hover-action">
                                    <ul>
                                        @if($val['product_template'] == config('constants.COUNTER_MEDICINE'))
                                        <li>
                                            <a href="{{ route('web.product', ['id' => $val['id']]) }}">
                                                <i class="far fa-eye"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                                <i class="fas fa-shopping-cart"></i>
                                            </a>
                                        </li>
                                        @else
                                        <li>
                                            <a href="#" title="You have to answer some question">
                                                <i class="fas fa-plus"></i>
                                            </a>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <h2 class="product-title"><a href="{{ route('web.product', ['id' => $val['id']]) }}">{{ $val['title'] }}</a></h2>
                                <div class="product-price">
                                    <span>£{{ $val['price'] }}</span>
                                    <del>{{ $val['cut_price'] ? '£'.$val['cut_price'] : NULL}}</del>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    <!--  -->
                </div>
            </div>
        </div>
        <div class="text-center">
            <a href="{{route('shop')}}" class="theme-btn-1 btn btn-effect-3 card-radius">
                <!-- <i class="fas fa-shopping-cart"></i> -->
                <span> View All Products</span>
            </a>
        </div>

    </div>
</div>
<!-- PRODUCT AREA END -->


<!-- COUNTDOWN AREA START -->
<div class="ltn__call-to-action-area section-bg-1 countdown-section pt-20 pb-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 pb-5">
                <div class="conunt-heading pt-5 ">
                    <h4 class="pt-4">Once weekly weight loss injection</h4>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
                </div>
                <a href="#" class="theme-btn-1 btn">Once weekly weight loss injection</a>
            </div>
            <div class="col-lg-7">
                <img src="img/banner/mounjaro_1024x1024@2x.webp" class=" border-radius">
            </div>
        </div>
    </div>
</div>
<!-- COUNTDOWN AREA END -->

<!-- ABOUT US AREA START -->
<div class="ltn__about-us-area section-bg-1 bg-image-left-before pt-115 pb-115 d-none">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="about-us-img-wrap about-img-left--- " data-bs-bg="img/allbanners/homepage2.webp">
                    <!-- <img src="img/allbanners/homepage2.webp" alt="About Us Image"> -->
                </div>
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="about-us-info-wrap">
                    <div class="section-title-area ltn__section-title-2--- mb-20">
                        <h6 class="section-subtitle section-subtitle-2--- ltn__secondary-color">N95 Facial Covering Mask</h6>
                        <h1 class="section-title">Grade A Safety Masks
                            For Sale. Haurry Up!</h1>
                        <p>Over 39,000 people work for us in more than 70 countries all over the
                            This breadth of global coverage, combined with specialist services</p>
                    </div>
                    <ul class="ltn__list-item-half clearfix">
                        <li>
                            <i class="flaticon-home-2"></i>
                            Activated Carbon
                        </li>
                        <li>
                            <i class="flaticon-mountain"></i>
                            Breathing Valve
                        </li>
                        <li>
                            <i class="flaticon-heart"></i>
                            6 Layer Filteration
                        </li>
                        <li>
                            <i class="flaticon-secure"></i>
                            Rewashes & Reusable
                        </li>
                    </ul>
                    <div class="btn-wrapper animated">
                        <a href="service.html" class="ltn__secondary-color text-uppercase text-decoration-underline">View Products</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ABOUT US AREA END -->

<!-- ABOUT US AREA START -->
<div class="ltn__about-us-area bg-overlay-white-90--- bg-image pt-115 pb-110 display-none">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="about-us-img-wrap about-img-left">
                    <img src="img/allbanners/home3.png" alt="About Us Image">
                </div>
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="about-us-info-wrap">
                    <div class="section-title-area ltn__section-title-2--- mb-20">
                        <h6 class="section-subtitle section-subtitle-2--- ltn__secondary-color">N95 Facial Covering Mask</h6>
                        <h1 class="section-title">Grade A Safety Masks
                            For Sale. Haurry Up!</h1>
                        <p>Over 39,000 people work for us in more than 70 countries all over the
                            This breadth of global coverage, combined with specialist services</p>
                    </div>
                    <ul class="ltn__list-item-half clearfix">
                        <li>
                            <i class="flaticon-home-2"></i>
                            Activated Carbon
                        </li>
                        <li>
                            <i class="flaticon-mountain"></i>
                            Breathing Valve
                        </li>
                        <li>
                            <i class="flaticon-heart"></i>
                            6 Layer Filteration
                        </li>
                        <li>
                            <i class="flaticon-secure"></i>
                            Rewashes & Reusable
                        </li>
                    </ul>
                    <div class="btn-wrapper animated">
                        <a href="service.html" class="ltn__secondary-color text-uppercase text-decoration-underline">View Products</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ABOUT US AREA END -->



<!-- BANNER AREA START -->
<div class="ltn__banner-area mt-120--- mt-5">
    <div class="container">
        <div class="row ltn__custom-gutter--- justify-content-center">
            <div class="col-lg-4 col-sm-6">
                <div class="ltn__banner-item">
                    <div class="ltn__banner-img">
                        <a href="#"><img src="img/banner/Men_s_Health_400x.webp" alt="Banner Image"></a>
                        <h4 class="text-center mt-3">Men Health</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="ltn__banner-item">
                    <div class="ltn__banner-img">
                        <a href="shop.html"><img src="img/banner/Women_s_Health_400x.webp" alt="Banner Image"></a>
                        <h4 class="text-center  mt-3">Women Health</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="ltn__banner-item">
                    <div class="ltn__banner-img">
                        <a href="shop.html"><img src="img/banner/General_Health_400x.webp" alt="Banner Image"></a>
                        <h4 class="text-center mt-3">General Health</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BANNER AREA END -->



<!-- BLOG AREA START (blog-3) -->
<div class="ltn__blog-area pt-115 pb-45">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area ltn__section-title-2--- text-center">
                    <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color d-none">News & Blogs</h6>
                    <h1 class="section-title">Leatest Blogs</h1>
                </div>
            </div>
        </div>
        <div class="row  ltn__blog-slider-one-active slick-arrow-1 ltn__blog-item-3-normal">
            <!-- Blog Item -->
            <div class="col-lg-12">
                <div class="ltn__blog-item ltn__blog-item-3">
                    <div class="ltn__blog-img">
                        <a href="blog-details.html"><img src="img/blog/1.png" alt="#"></a>
                    </div>
                    <div class="ltn__blog-brief">
                        <div class="ltn__blog-meta">
                            <ul>
                                <li class="ltn__blog-author">
                                    <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                </li>
                                <li class="ltn__blog-tags">
                                    <a href="#"><i class="fas fa-tags"></i>Decorate</a>
                                </li>
                            </ul>
                        </div>
                        <h3 class="ltn__blog-title"><a href="blog-details.html">10 Brilliant Ways To Decorate Your Home</a></h3>
                        <div class="ltn__blog-meta-btn">
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>June 24, 2021</li>
                                </ul>
                            </div>
                            <div class="ltn__blog-btn">
                                <a href="blog-details.html">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Blog Item -->
            <div class="col-lg-12">
                <div class="ltn__blog-item ltn__blog-item-3">
                    <div class="ltn__blog-img">
                        <a href="blog-details.html"><img src="img/blog/2.png" alt="#"></a>
                    </div>
                    <div class="ltn__blog-brief">
                        <div class="ltn__blog-meta">
                            <ul>
                                <li class="ltn__blog-author">
                                    <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                </li>
                                <li class="ltn__blog-tags">
                                    <a href="#"><i class="fas fa-tags"></i>Interior</a>
                                </li>
                            </ul>
                        </div>
                        <h3 class="ltn__blog-title"><a href="blog-details.html">The Most Inspiring Interior Design Of 2021</a></h3>
                        <div class="ltn__blog-meta-btn">
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>July 23, 2021</li>
                                </ul>
                            </div>
                            <div class="ltn__blog-btn">
                                <a href="blog-details.html">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Blog Item -->
            <div class="col-lg-12">
                <div class="ltn__blog-item ltn__blog-item-3">
                    <div class="ltn__blog-img">
                        <a href="blog-details.html"><img src="img/blog/3.png" alt="#"></a>
                    </div>
                    <div class="ltn__blog-brief">
                        <div class="ltn__blog-meta">
                            <ul>
                                <li class="ltn__blog-author">
                                    <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                </li>
                                <li class="ltn__blog-tags">
                                    <a href="#"><i class="fas fa-tags"></i>Estate</a>
                                </li>
                            </ul>
                        </div>
                        <h3 class="ltn__blog-title"><a href="blog-details.html">Recent Commercial Real Estate Transactions</a></h3>
                        <div class="ltn__blog-meta-btn">
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>May 22, 2021</li>
                                </ul>
                            </div>
                            <div class="ltn__blog-btn">
                                <a href="blog-details.html">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Blog Item -->
            <div class="col-lg-12">
                <div class="ltn__blog-item ltn__blog-item-3">
                    <div class="ltn__blog-img">
                        <a href="blog-details.html"><img src="img/blog/4.jpg" alt="#"></a>
                    </div>
                    <div class="ltn__blog-brief">
                        <div class="ltn__blog-meta">
                            <ul>
                                <li class="ltn__blog-author">
                                    <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                </li>
                                <li class="ltn__blog-tags">
                                    <a href="#"><i class="fas fa-tags"></i>Room</a>
                                </li>
                            </ul>
                        </div>
                        <h3 class="ltn__blog-title"><a href="blog-details.html">Renovating a Living Room? Experts Share Their Secrets</a></h3>
                        <div class="ltn__blog-meta-btn">
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>June 24, 2021</li>
                                </ul>
                            </div>
                            <div class="ltn__blog-btn">
                                <a href="blog-details.html">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Blog Item -->
            <div class="col-lg-12">
                <div class="ltn__blog-item ltn__blog-item-3">
                    <div class="ltn__blog-img">
                        <a href="blog-details.html"><img src="img/blog/5.jpg" alt="#"></a>
                    </div>
                    <div class="ltn__blog-brief">
                        <div class="ltn__blog-meta">
                            <ul>
                                <li class="ltn__blog-author">
                                    <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                </li>
                                <li class="ltn__blog-tags">
                                    <a href="#"><i class="fas fa-tags"></i>Trends</a>
                                </li>
                            </ul>
                        </div>
                        <h3 class="ltn__blog-title"><a href="blog-details.html">7 home trends that will shape your house in 2021</a></h3>
                        <div class="ltn__blog-meta-btn">
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>June 24, 2021</li>
                                </ul>
                            </div>
                            <div class="ltn__blog-btn">
                                <a href="blog-details.html">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
        </div>
    </div>
</div>
<!-- BLOG AREA END -->

<!-- BRAND LOGO AREA START -->
<div class="container-fluid p-0 m-0 home-page-last-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="footer-branding-section">
                    <h1 class="text-center">Helping you feel better for less</h1>
                    <p class="text-center">Everyone deserves access to health and wellness in the simplest, most convenient and affordable way.</p>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="footer-cards ">
                    <div class="row">
                        <div class="col-md-2">
                            <h3 class="text-white"><i class="fas fa-heart"></i></h3>
                        </div>
                        <div class="col-md-10">
                            <h3 class="text-white">Value</h3>
                        </div>
                        <div class="col-md-12">
                            <p class="text-white">The nation's favourite brands at a price you'll love. </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-cards ">
                    <div class="row">
                        <div class="col-md-2">
                            <h3 class="text-white"><i class="fas fa-truck"></i></h3>
                        </div>
                        <div class="col-md-10">
                            <h3 class="text-white">Convenience</h3>
                        </div>
                        <div class="col-md-12">
                            <p class="text-white">Prescriptions delivered free together with your health.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-cards ">
                    <div class="row">
                        <div class="col-md-2">
                            <h3 class="text-white"><i class="fas fa-box-open"></i></h3>
                        </div>
                        <div class="col-md-10">
                            <h3 class="text-white">Choice</h3>
                        </div>
                        <div class="col-md-12">
                            <p class="text-white">Wide range of health & wellness products & services.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-cards ">
                    <div class="row">
                        <div class="col-md-2">
                            <h3 class="text-white"><i class="fas fa-shield-alt"></i></h3>
                        </div>
                        <div class="col-md-10">
                            <h3 class="text-white">Empathy</h3>
                        </div>
                        <div class="col-md-12">
                            <p class="text-white">We're here to help you feel better for less.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BRAND LOGO AREA END -->

    <!-- Custom call to action section start-->

    <!-- Custom call to action section end-->

    <!-- PRODUCT AREA START (product-item-3) -->
    <div class="ltn__product-area ltn__product-gutter pt-85 pb-70 d-none">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2 text-center">
                        <h1 class="section-title">Featured Products</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ltn__banner-item">
                                <div class="ltn__banner-img">
                                    <a href="shop.html"><img src="img/banner/13.jpg" alt="Banner Image"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="ltn__banner-item">
                                <div class="ltn__banner-img">
                                    <a href="shop.html"><img src="img/banner/12.jpg" alt="Banner Image"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row ltn__tab-product-slider-one-active--- slick-arrow-1">
                        <!-- ltn__product-item -->
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="ltn__product-item ltn__product-item-2 text-left">
                                <div class="product-img">
                                    <a href="product-details.html"><img src="img/product/1.png" alt="#"></a>
                                    <div class="product-badge">
                                        <ul>
                                            <li class="sale-badge">New</li>
                                        </ul>
                                    </div>
                                    <div class="product-hover-action">
                                        <ul>
                                            <li>
                                                <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                                    <i class="far fa-heart"></i></a>
                                            </li>
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
                                    <h2 class="product-title"><a href="product-details.html">Antiseptic Spray</a></h2>
                                    <div class="product-price">
                                        <span>$32.00</span>
                                        <del>$46.00</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ltn__product-item -->
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="ltn__product-item ltn__product-item-2 text-left">
                                <div class="product-img">
                                    <a href="product-details.html"><img src="img/product/2.png" alt="#"></a>
                                    <div class="product-hover-action">
                                        <ul>
                                            <li>
                                                <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                                    <i class="far fa-heart"></i></a>
                                            </li>
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
                                    <h2 class="product-title"><a href="product-details.html">Digital Stethoscope</a></h2>
                                    <div class="product-price">
                                        <span>$25.00</span>
                                        <del>$35.00</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ltn__product-item -->
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="ltn__product-item ltn__product-item-2 text-left">
                                <div class="product-img">
                                    <a href="product-details.html"><img src="img/product/3.png" alt="#"></a>
                                    <div class="product-badge">
                                        <ul>
                                            <li class="sale-badge">New</li>
                                        </ul>
                                    </div>
                                    <div class="product-hover-action">
                                        <ul>
                                            <li>
                                                <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                                    <i class="far fa-heart"></i></a>
                                            </li>
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
                                    <h2 class="product-title"><a href="product-details.html">Cosmetic Containers</a></h2>
                                    <div class="product-price">
                                        <span>$75.00</span>
                                        <del>$92.00</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ltn__product-item -->
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="ltn__product-item ltn__product-item-2 text-left">
                                <div class="product-img">
                                    <a href="product-details.html"><img src="img/product/4.png" alt="#"></a>
                                    <div class="product-badge">
                                        <ul>
                                            <li class="sale-badge">New</li>
                                        </ul>
                                    </div>
                                    <div class="product-hover-action">
                                        <ul>
                                            <li>
                                                <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                                    <i class="far fa-heart"></i></a>
                                            </li>
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
                                    <h2 class="product-title"><a href="product-details.html">Cosmetic Containers</a></h2>
                                    <div class="product-price">
                                        <span>$78.00</span>
                                        <del>$85.00</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ltn__product-item -->
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="ltn__product-item ltn__product-item-2 text-left">
                                <div class="product-img">
                                    <a href="product-details.html"><img src="img/product/5.png" alt="#"></a>
                                    <div class="product-badge">
                                        <ul>
                                            <li class="sale-badge">New</li>
                                        </ul>
                                    </div>
                                    <div class="product-hover-action">
                                        <ul>
                                            <li>
                                                <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                                    <i class="far fa-heart"></i></a>
                                            </li>
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
                                    <h2 class="product-title"><a href="product-details.html">Blue Hand Gloves</a></h2>
                                    <div class="product-price">
                                        <span>$150.00</span>
                                        <del>$180.00</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ltn__product-item -->
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="ltn__product-item ltn__product-item-2 text-left">
                                <div class="product-img">
                                    <a href="product-details.html"><img src="img/product/6.png" alt="#"></a>
                                    <div class="product-badge">
                                        <ul>
                                            <li class="sale-badge">New</li>
                                        </ul>
                                    </div>
                                    <div class="product-hover-action">
                                        <ul>
                                            <li>
                                                <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                                    <i class="far fa-heart"></i></a>
                                            </li>
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
                                    <h2 class="product-title"><a href="product-details.html">Thermometer Gun</a></h2>
                                    <div class="product-price">
                                        <span>$150.00</span>
                                        <del>$180.00</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ltn__product-item -->
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="ltn__product-item ltn__product-item-2 text-left">
                                <div class="product-img">
                                    <a href="product-details.html"><img src="img/product/7.png" alt="#"></a>
                                    <div class="product-badge">
                                        <ul>
                                            <li class="sale-badge">New</li>
                                        </ul>
                                    </div>
                                    <div class="product-hover-action">
                                        <ul>
                                            <li>
                                                <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                                    <i class="far fa-heart"></i></a>
                                            </li>
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
                                    <h2 class="product-title"><a href="product-details.html">Cosmetic Containers</a></h2>
                                    <div class="product-price">
                                        <span>$75.00</span>
                                        <del>$92.00</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ltn__product-item -->
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="ltn__product-item ltn__product-item-2 text-left">
                                <div class="product-img">
                                    <a href="product-details.html"><img src="img/product/8.png" alt="#"></a>
                                    <div class="product-badge">
                                        <ul>
                                            <li class="sale-badge">New</li>
                                        </ul>
                                    </div>
                                    <div class="product-hover-action">
                                        <ul>
                                            <li>
                                                <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                                    <i class="far fa-heart"></i></a>
                                            </li>
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
                                    <h2 class="product-title"><a href="product-details.html">Cosmetic Containers</a></h2>
                                    <div class="product-price">
                                        <span>$78.00</span>
                                        <del>$85.00</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT AREA END -->

    <!-- PRODUCT AREA START (product-item-3) -->
    <div class="ltn__product-area ltn__product-gutter pt-85 pb-70 d-none">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2 text-center">
                        <h1 class="section-title">Featured Products</h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__tab-product-slider-one-active--- slick-arrow-1">
                <!-- ltn__product-item -->
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="ltn__product-item ltn__product-item-3 text-center">
                        <div class="product-img">
                            <a href="product-details.html"><img src="img/product/1.png" alt="#"></a>
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badge">New</li>
                                </ul>
                            </div>
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                            <i class="fas fa-shopping-cart"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                            <i class="far fa-heart"></i></a>
                                    </li>
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
                            <h2 class="product-title"><a href="product-details.html">Antiseptic Spray</a></h2>
                            <div class="product-price">
                                <span>$32.00</span>
                                <del>$46.00</del>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ltn__product-item -->
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="ltn__product-item ltn__product-item-3 text-center">
                        <div class="product-img">
                            <a href="product-details.html"><img src="img/product/2.png" alt="#"></a>
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                            <i class="fas fa-shopping-cart"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                            <i class="far fa-heart"></i></a>
                                    </li>
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
                            <h2 class="product-title"><a href="product-details.html">Digital Stethoscope</a></h2>
                            <div class="product-price">
                                <span>$25.00</span>
                                <del>$35.00</del>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ltn__product-item -->
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="ltn__product-item ltn__product-item-3 text-center">
                        <div class="product-img">
                            <a href="product-details.html"><img src="img/product/3.png" alt="#"></a>
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badge">New</li>
                                </ul>
                            </div>
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                            <i class="fas fa-shopping-cart"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                            <i class="far fa-heart"></i></a>
                                    </li>
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
                            <h2 class="product-title"><a href="product-details.html">Cosmetic Containers</a></h2>
                            <div class="product-price">
                                <span>$75.00</span>
                                <del>$92.00</del>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ltn__product-item -->
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="ltn__product-item ltn__product-item-3 text-center">
                        <div class="product-img">
                            <a href="product-details.html"><img src="img/product/4.png" alt="#"></a>
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badge">New</li>
                                </ul>
                            </div>
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                            <i class="fas fa-shopping-cart"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                            <i class="far fa-heart"></i></a>
                                    </li>
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
                            <h2 class="product-title"><a href="product-details.html">Cosmetic Containers</a></h2>
                            <div class="product-price">
                                <span>$78.00</span>
                                <del>$85.00</del>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ltn__product-item -->
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="ltn__product-item ltn__product-item-3 text-center">
                        <div class="product-img">
                            <a href="product-details.html"><img src="img/product/5.png" alt="#"></a>
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badge">New</li>
                                </ul>
                            </div>
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                            <i class="fas fa-shopping-cart"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                            <i class="far fa-heart"></i></a>
                                    </li>
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
                            <h2 class="product-title"><a href="product-details.html">Blue Hand Gloves</a></h2>
                            <div class="product-price">
                                <span>$150.00</span>
                                <del>$180.00</del>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ltn__product-item -->
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="ltn__product-item ltn__product-item-3 text-center">
                        <div class="product-img">
                            <a href="product-details.html"><img src="img/product/6.png" alt="#"></a>
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badge">New</li>
                                </ul>
                            </div>
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                            <i class="fas fa-shopping-cart"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                            <i class="far fa-heart"></i></a>
                                    </li>
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
                            <h2 class="product-title"><a href="product-details.html">Thermometer Gun</a></h2>
                            <div class="product-price">
                                <span>$150.00</span>
                                <del>$180.00</del>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ltn__product-item -->
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="ltn__product-item ltn__product-item-3 text-center">
                        <div class="product-img">
                            <a href="product-details.html"><img src="img/product/7.png" alt="#"></a>
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badge">New</li>
                                </ul>
                            </div>
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                            <i class="fas fa-shopping-cart"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                            <i class="far fa-heart"></i></a>
                                    </li>
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
                            <h2 class="product-title"><a href="product-details.html">Cosmetic Containers</a></h2>
                            <div class="product-price">
                                <span>$75.00</span>
                                <del>$92.00</del>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ltn__product-item -->
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="ltn__product-item ltn__product-item-3 text-center">
                        <div class="product-img">
                            <a href="product-details.html"><img src="img/product/8.png" alt="#"></a>
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badge">New</li>
                                </ul>
                            </div>
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                            <i class="fas fa-shopping-cart"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                            <i class="far fa-heart"></i></a>
                                    </li>
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
                            <h2 class="product-title"><a href="product-details.html">Cosmetic Containers</a></h2>
                            <div class="product-price">
                                <span>$78.00</span>
                                <del>$85.00</del>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
            </div>
        </div>
    </div>
    <!-- PRODUCT AREA END -->

    <!-- CALL TO ACTION START (call-to-action-6) -->
    <div class="ltn__call-to-action-area call-to-action-6 before-bg-bottom d-none" data-bs-bg="img/1.jpg--">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="call-to-action-inner call-to-action-inner-6 ltn__secondary-bg position-relative text-center---">
                        <div class="coll-to-info text-color-white">
                            <h1>Buy medical disposable face mask <br> to protect your loved ones</h1>
                        </div>
                        <div class="btn-wrapper">
                            <a class="btn btn-effect-3 btn-white" href="shop.html">Explore Products <i class="icon-next"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CALL TO ACTION END -->



    <!-- MODAL AREA START (Quick View Modal) -->
    <div class="ltn__modal-area ltn__quick-view-modal-area">
        <div class="modal fade" id="quick_view_modal" tabindex="-1">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <!-- <i class="fas fa-times"></i> -->
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="ltn__quick-view-modal-inner">
                            <div class="modal-product-item">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="modal-product-img">
                                            <img src="img/product/4.png" alt="#">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="modal-product-info">
                                            <div class="product-ratting">
                                                <ul>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                                    <li class="review-total"> <a href="#"> ( 95 Reviews )</a></li>
                                                </ul>
                                            </div>
                                            <h3><a href="product-details.html">Digital Stethoscope</a></h3>
                                            <div class="product-price">
                                                <span>$15.00</span>
                                                <del>$25.00</del>
                                            </div>
                                            <hr>
                                            <div class="modal-product-brief">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos repellendus repudiandae incidunt quidem pariatur expedita, quo quis modi tempore non.</p>
                                            </div>
                                            <div class="modal-product-meta ltn__product-details-menu-1 d-none">
                                                <ul>
                                                    <li>
                                                        <strong>Categories:</strong>
                                                        <span>
                                                            <a href="#">Parts</a>
                                                            <a href="#">Car</a>
                                                            <a href="#">Seat</a>
                                                            <a href="#">Cover</a>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="ltn__product-details-menu-2 d-none">
                                                <ul>
                                                    <li>
                                                        <div class="cart-plus-minus">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="theme-btn-1 btn btn-effect-1" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                                            <i class="fas fa-shopping-cart"></i>
                                                            <span>ADD TO CART</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- <hr> -->
                                            <div class="ltn__product-details-menu-3">
                                                <ul>
                                                    <li>
                                                        <a href="#" class="" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                                            <i class="far fa-heart"></i>
                                                            <span>Add to Wishlist</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="" title="Compare" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                                            <i class="fas fa-exchange-alt"></i>
                                                            <span>Compare</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <hr>
                                            <div class="ltn__social-media">
                                                <ul>
                                                    <li>Share:</li>
                                                    <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                                    <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>

                                                </ul>
                                            </div>
                                            <label class="float-end mb-0"><a class="text-decoration" href="product-details.html"><small>View Details</small></a></label>
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
                                        <div class="modal-product-img">
                                            <img src="img/product/1.png" alt="#">
                                        </div>
                                        <div class="modal-product-info">
                                            <h5><a href="product-details.html">Digital Stethoscope</a></h5>
                                            <p class="added-cart"><i class="fa fa-check-circle"></i> Successfully added to your Cart</p>
                                            <div class="btn-wrapper">
                                                <a href="cart.html" class="theme-btn-1 btn btn-effect-1">View Cart</a>
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

    <!-- MODAL AREA START (Wishlist Modal) -->
    <div class="ltn__modal-area ltn__add-to-cart-modal-area">
        <div class="modal fade" id="liton_wishlist_modal" tabindex="-1">
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
                                        <div class="modal-product-img">
                                            <img src="img/product/7.png" alt="#">
                                        </div>
                                        <div class="modal-product-info">
                                            <h5><a href="product-details.html">Digital Stethoscope</a></h5>
                                            <p class="added-cart"><i class="fa fa-check-circle"></i> Successfully added to your Wishlist</p>
                                            <div class="btn-wrapper">
                                                <a href="wishlist.html" class="theme-btn-1 btn btn-effect-1">View Wishlist</a>
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

    @stop

    @pushOnce('scripts')
    <script>

    </script>
    @endPushOnce