@extends('web.layouts.default')
@section('title', 'Home')
@section('content')



<!-- ============================
        Slider
    ============================== -->
    <section class="slider slider-centerd">
    <div class="slick-carousel m-slides-0 carousel-arrows-light carousel-dots-light" data-slick='{"slidesToShow": 1, "arrows": true, "dots": false, "speed": 700,"fade": true,"cssEase": "linear"}'>
        <div class="slide-item align-v-h">
            <div class="bg-img">
                <div class="overlay"></div>
                <img src="{{ asset('/assets/web/images/tsp/home-slider/5.png') }}" alt="slide img">
            </div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8 offset-xl-2">
                        <div class="slide__content">
                            <h2 class="slide__title color-white">Start the Journey to <br> Weight Loss Success!</h2>
                            <p class="slide__desc color-white"> Take a happy journey to better health! Set habits that will promote long-term health and vitality as you start on your weight-loss journey. </p>
                            <div class="d-flex flex-wrap justify-content-center align-items-center">
                                <a href="{{ route('web.aboutUs') }}" class="btn btn__white btn__rounded mr-30">
                                    <span>More About Us</span>
                                    <i class="icon-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="slide-item align-v-h">
            <div class="bg-img">
                <div class="overlay"></div> 
                <img src="{{ asset('/assets/web/images/tsp/home-slider/3.png') }}" alt="slide img">
            </div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8 offset-xl-2">
                        <div class="slide__content">
                            <h2 class="slide__title color-white">Start Your Journey <br> with Weight Loss!</h2>
                            <p class="slide__desc color-white">For a happier, more energetic life, start on a transformative weight-loss journey, choosing healthier habits and reaching your fitness objectives.</p>
                            <div class="d-flex flex-wrap justify-content-center align-items-center">
                                <a href="{{ route('web.aboutUs') }}" class="btn btn__white btn__rounded mr-30">
                                    <span>More About Us</span>
                                    <i class="icon-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ========================
       shop 
    =========================== -->
<section class="shop-grid"  >
    <div class="container" >
        <div class="row" >
            <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3 " >
                <div class="heading text-center ">
                    <!-- <h2 class="heading__subtitle">Low Priced Medical Supplies</h2> -->
                    <h2 class=" heading__title">Start Your Weightloss Journy Today</h2> <hr>
                    <h3 class="heading__subtitle" style="font-size: 16px; font-weight:700;">The Largest Selections Of Medical Products</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($products as $key => $value)
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="product-item">
                    <div class="product__img">
                        <a href="{{ route('web.product', ['id' => $value['id']]) }}">
                            <img src="{{ asset('storage/'.$value['main_image'])}}" alt="Product img" loading="lazy">
                        </a>
                        <div class="product__action">
                            <a href="{{ route('web.bmiForm')}}" class="btn btn__primary btn__rounded">
                                <!-- <i class="icon-cart"></i> <span>Add To Cart</span> -->
                                <i class="icon-calendar"></i> <span>Contsultations</span>
                            </a>
                        </div>
                    </div>
                    <div class="product__info">
                        <h4 class="product__title">
                            <a href="{{ route('web.product', ['id' => $value['id']]) }}">
                                {{ $value['title'] ?? ''}}
                            </a>
                        </h4>
                        <span class="product__price">£{{ $value['price'] ?? ''}}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <a href="{{ route('web.products') }}" class="btn btn__secondary btn__rounded">
                    <span>Learn More </span>
                    <i class="icon-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ========================
     Banner Layout 2
    =========================== -->
<section class="banner-layout2 py-0">
    <div class="bg-img"><img src="{{ asset('/assets/web/images/backgrounds/8.jpg') }}" alt="backgrounds"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="banner-text">
                    <div class="heading-layout2 heading-light">
                        <h2 class="heading__title">Committed To Build A Positive, Safe, Patient Focused Culture.</h2>
                        <p class="heading__desc mb-40"> Weight-loss offers access to the best weight-loss solutions available worldwide, along with a customised weight management program designed by medical professionals. Our team, trained in the newest methods of weight loss, offers online consultations to customise the best course of action for you. </p>
                    </div>
                    <ul class="list-items list-items-layout2 list-items-light list-horizontal list-unstyled mb-50">
                        <li>Fractures and dislocations</li>
                        <li>Health Assessments</li>
                        <li>Desensitisation injections</li>
                        <li>High Quality Care</li>
                    </ul>
                    <div class="d-flex flex-wrap">
                        <a href="doctors-timetable.html" class="btn btn__white btn__rounded mr-30">
                            <span>Start Free Consultation </span> <i class="icon-arrow-right"></i>
                        </a>
                        <a href="contact-us.html" class="btn btn__white btn__outlined btn__rounded">
                            Contact us
                        </a>
                    </div>
                </div><!-- /.banner-text -->
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 banner-img">
                <div class="bg-img">
                    <img src="{{ asset('/assets/web/images/tsp/home-section/1.png') }}" class="w-50 h-50" alt="backgrounds">
                </div>
            </div>
        </div>
    </div>
</section><!-- /.Banner Layout 2 -->

<!-- ======================
      Blog Grid
    ========================= -->
<section class="blog-grid pt-170 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
                <div class="heading text-center mb-40">
                    <h2 class="heading__subtitle">Resource Library</h2>
                    <h3 class="heading__title">Recent Articles</h3>
                </div><!-- /.heading -->
            </div>
        </div>
        <div class="row">
            <!-- Post Item #1 -->
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="post-item">
                    <div class="post__img">
                        <a href="blog-single-post.html">
                            <img src="https://i.ibb.co/Ycd4ZJx/weightloss1.jpg" alt="post image" loading="lazy">
                        </a>
                    </div><!-- /.post__img -->
                    <div class="post__body">
                        <div class="post__meta-cat">
                            <a href="#">Mental Health</a>
                        </div><!-- /.blog-meta-cat -->
                        <div class="post__meta d-flex">
                            <span class="post__meta-date">Jan 30, 2022</span>
                            <a class="post__meta-author" href="#">Martin King</a>
                        </div>
                        <h4 class="post__title"><a href="#"> Evaluation by Our Weight Loss Expert</a></h4>

                        <p class="post__desc">An experienced weight-management specialist from our team will go over your medical history and consultation.</p>
                        <a href="blog-single-post.html" class="btn btn__secondary btn__link btn__rounded">
                            <span>Read More</span>
                            <i class="icon-arrow-right"></i>
                        </a>
                    </div><!-- /.post__body -->
                </div><!-- /.post-item -->
            </div><!-- /.col-lg-4 -->
            <!-- Post Item #2 -->
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="post-item">
                    <div class="post__img">
                        <a href="blog-single-post.html">
                            <img src="{{ asset('/assets/web/images/tsp/recent-articles/1.png') }}" alt="post image" loading="lazy">
                        </a>
                    </div><!-- /.post__img -->
                    <div class="post__body">
                        <div class="post__meta-cat">
                            <a href="#">Infectious</a><a href="#">Tips</a>
                        </div><!-- /.blog-meta-cat -->
                        <div class="post__meta d-flex">
                            <span class="post__meta-date">Jan 30, 2022</span>
                            <a class="post__meta-author" href="#">John Ezak</a>
                        </div>
                        <h4 class="post__title"><a href="#">Get an Online Weight-loss Consultation</a></h4>
                        <p class="post__desc">Participate in an online weight-loss consultation to stay connected with our healthcare team and address any queries or concerns. </p>
                        <a href="blog-single-post.html" class="btn btn__secondary btn__link btn__rounded">
                            <span>Read More</span>
                            <i class="icon-arrow-right"></i>
                        </a>
                    </div><!-- /.post__body -->
                </div><!-- /.post-item -->
            </div><!-- /.col-lg-4 -->
            <!-- Post Item #3 -->
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="post-item">
                    <div class="post__img">
                        <a href="blog-single-post.html">
                            <img src="{{ asset('/assets/web/images/tsp/recent-articles/3.png') }}" alt="post image" loading="lazy">
                        </a>
                    </div><!-- /.post__img -->
                    <div class="post__body">
                        <div class="post__meta-cat">
                            <a href="#">Life Style</a><a href="#">Nutrition</a>
                        </div><!-- /.blog-meta-cat -->
                        <div class="post__meta d-flex">
                            <span class="post__meta-date">Jan 28, 2022</span>
                            <a class="post__meta-author" href="#">Saul Wade</a>
                        </div>
                        <h4 class="post__title"><a href="#">Ongoing Patient Care​ </a></h4>
                        <p class="post__desc">When your monthly treatment plan is about to expire, log into your dashboard to access the consultation for returning patients. </p>
                        <a href="blog-single-post.html" class="btn btn__secondary btn__link btn__rounded">
                            <span>Read More</span>
                            <i class="icon-arrow-right"></i>
                        </a>
                    </div><!-- /.post__body -->
                </div><!-- /.post-item -->
            </div><!-- /.col-lg-4 -->
        </div>
    </div>
</section><!-- /.blog Grid -->


@stop

@pushOnce('scripts')
<script>

</script>
@endPushOnce