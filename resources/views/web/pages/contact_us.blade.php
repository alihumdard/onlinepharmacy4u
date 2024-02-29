@extends('web.layouts.default')
@section('title', 'Contact Us')
@section('content')


<!-- ========================= 
            Google Map
    =========================  -->
<!-- <section class="google-map py-0">
    <iframe frameborder="0" height="500" width="100%" src="https://maps.google.com/maps?q=Suite%20100%20San%20Francisco%2C%20LA%2094107%20United%20States&amp;t=m&amp;z=10&amp;output=embed&amp;iwloc=near"></iframe>
</section> -->
<!-- /.GoogleMap -->

<section class="page-title page-title-layout1">
    <div class="bg-img"><img src="{{ asset('/assets/web/images/tsp/home-slider/2.png') }}" alt="background"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5">
                <h1 class="pagetitle__heading">Feel Free Contact</h1>
                <p class="pagetitle__desc">We are Weight-Loss – a dedicated team of professionals specialising in weight management. Meet our expert who will help you in your weight loss journey. </p>
                <div class="d-flex flex-wrap align-items-center">
                    <a href="#" class="btn btn__primary btn__rounded mr-30">
                        <span>Contact</span>
                        <i class="icon-arrow-right"></i>
                    </a>

                </div>
            </div><!-- /.col-xl-5 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.page-title -->

<!-- section of contact card  -->

<section>
    <div class="container">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card bg-light h-100">
                <div class="card-body d-flex align-items-center justify-content-center">
                    <img src="https://i.ibb.co/8MJWXJV/icons8-phone-32.png" alt="" class="mr-1">
                    <div>
                        <label for="phone">Phone Number:</label>
                        <span id="phone">01623 572757</span><br>
                        <a href="#">Click here</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card bg-light h-100">
                <div class="card-body d-flex align-items-center justify-content-center">
                    <img src="https://i.ibb.co/ZGCkSfW/icons8-email-32.png" alt="" class="mr-1">
                    <div>
                        <label for="email">E-mail:</label>
                        <span id="email">info@myweightlosscentre.co.uk</span><br>
                        <a href="#"><span>Click here</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card bg-light h-100">
                <div class="card-body d-flex align-items-center justify-content-center">
                    <img src="https://i.ibb.co/NL1tqNZ/icons8-location-32.png" alt="" class="mr-1">
                    <div>
                        <span>My WeightLoss Centre Unit 2, Mansfield Woodhouse Station Gateway</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>
</section>




<!-- ==========================
        contact layout 1
    =========================== -->
<section class="contact-layout1 pt-0 mt--50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="contact-panel d-flex flex-wrap">
                    <form class="contact-panel__form" method="post" action="{{ asset('/assets/web/php/contact.php') }}" id="contactForm">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="contact-panel__title">How Can We Help? </h4>
                                <p class="contact-panel__desc mb-30">Welcome to our Weight-Loss Support Centre! We're here to assist you on your wellness journey and provide the support you need. Our dedicated customer care team is available to help you from Monday to Friday between 8:00 am and 7:00 pm. Whether you have questions about our products, need guidance on your weight-loss plan, or require assistance with your order, we're here for you.
                                </p>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <i class="icon-user form-group-icon"></i>
                                    <input type="text" class="form-control" placeholder="Name" id="contact-name" name="contact-name" required>
                                </div>
                            </div><!-- /.col-lg-6 -->
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <i class="icon-email form-group-icon"></i>
                                    <input type="email" class="form-control" placeholder="Email" id="contact-email" name="contact-email" required>
                                </div>
                            </div><!-- /.col-lg-6 -->
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <i class="icon-phone form-group-icon"></i>
                                    <input type="text" class="form-control" placeholder="Phone" id="contact-Phone" name="contact-phone" required>
                                </div>
                            </div><!-- /.col-lg-6 -->
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <i class="icon-news form-group-icon"></i>
                                    <select class="form-control">
                                        <option value="0">Subject</option>
                                        <option value="1">Subject 1</option>
                                        <option value="2">Subject 1</option>
                                    </select>
                                </div>
                            </div><!-- /.col-lg-6 -->
                            <div class="col-12">
                                <div class="form-group">
                                    <i class="icon-alert form-group-icon"></i>
                                    <textarea class="form-control" placeholder="Message" id="contact-message" name="contact-message"></textarea>
                                </div>
                                <button type="submit" class="btn btn__secondary btn__rounded btn__block btn__xhight mt-10">
                                    <span>Submit Request</span> <i class="icon-arrow-right"></i>
                                </button>
                                <div class="contact-result"></div>
                            </div><!-- /.col-lg-12 -->
                        </div><!-- /.row -->
                    </form>
                    <div class="contact-panel__info d-flex flex-column justify-content-between bg-overlay bg-overlay-primary-gradient">
                        <div class="bg-img"><img src="{{ asset('/assets/web/images/banners/1.jpg') }}" alt="banner"></div>
                        <div>
                            <h4 class="contact-panel__title color-white">Quick Contacts</h4>
                            <p class="contact-panel__desc font-weight-bold color-white mb-30"> Feel free to reach out to us through the provided contact number, and our knowledgeable and friendly team will be more than happy to assist you on your weight-loss journey. Thank you for choosing us as your partner in achieving your health and wellness goals. </p>
                        </div>
                        <div>
                            <ul class="contact__list list-unstyled mb-30">
                                <li>
                                    <i class="icon-phone"></i><a href="tel:+5565454117">Emergency Line:01623 572757</a>
                                </li>
                                <li>
                                    <i class="icon-location"></i><a href="#">Location: My WeightLoss Centre
                                        Unit 2, Mansfield Woodhouse Station Gateway, Signal Way
                                        off Debdale Way,
                                        Nottinghamshire
                                        NG19 9QH,
                                        United Kingdom </a>
                                </li>
                                <li>
                                    <i class="icon-clock"></i><a href="contact-us.html">Mon - Fri: 8:00 am - 7:00 pm</a>
                                </li>
                            </ul>
                            <a href="#" class="btn btn__white btn__rounded btn__outlined">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.contact layout 1 -->

<!-- ========================= 
      Testimonials layout 2
      =========================  -->
<section class="testimonials-layout2 pt-40 pb-40">
    <div class="container">
        <div class="testimonials-wrapper">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-5">
                    <div class="heading-layout2">
                        <h3 class="heading__title">Inspiring Stories!</h3>
                    </div><!-- /.heading -->
                </div><!-- /.col-lg-5 -->
                <div class="col-sm-12 col-md-12 col-lg-7">
                    <div class="slider-with-navs">
                        <!-- Testimonial #1 -->
                        <div class="testimonial-item">
                            <h3 class="testimonial__title">“Their doctors include highly qualified practitioners who come from a
                                range of backgrounds and bring with them a diversity of skills and special interests. They also have
                                registered nurses on staff who are available to triage any urgent matters, and the administration
                                and support staff all have exceptional people skills”
                            </h3>
                        </div><!-- /. testimonial-item -->
                        <!-- Testimonial #2 -->
                        <div class="testimonial-item">
                            <h3 class="testimonial__title">“Their doctors include highly qualified practitioners who come from a
                                range of backgrounds and bring with them a diversity of skills and special interests. They also have
                                registered nurses on staff who are available to triage any urgent matters, and the administration
                                and support staff all have exceptional people skills”
                            </h3>
                        </div><!-- /. testimonial-item -->
                        <!-- Testimonial #3 -->
                        <div class="testimonial-item">
                            <h3 class="testimonial__title">“Their doctors include highly qualified practitioners who come from a
                                range of backgrounds and bring with them a diversity of skills and special interests. They also have
                                registered nurses on staff who are available to triage any urgent matters, and the administration
                                and support staff all have exceptional people skills”
                            </h3>
                        </div><!-- /. testimonial-item -->
                    </div><!-- /.slick-carousel -->
                    <div class="slider-nav mb-60">
                        <div class="testimonial__meta">
                            <div class="testimonial__thmb">
                                <img src="{{ asset('/assets/web/images/testimonials/thumbs/1.png') }}" alt="author thumb">
                            </div><!-- /.testimonial-thumb -->
                            <div>
                                <h4 class="testimonial__meta-title">Sami Wade</h4>
                                <p class="testimonial__meta-desc">7oroof Inc</p>
                            </div>
                        </div><!-- /.testimonial-meta -->
                        <div class="testimonial__meta">
                            <div class="testimonial__thmb">
                                <img src="{{ asset('/assets/web/images/testimonials/thumbs/2.png') }}" alt="author thumb">
                            </div><!-- /.testimonial-thumb -->
                            <div>
                                <h4 class="testimonial__meta-title">Ahmed</h4>
                                <p class="testimonial__meta-desc">Web Inc</p>
                            </div>
                        </div><!-- /.testimonial-meta -->
                        <div class="testimonial__meta">
                            <div class="testimonial__thmb">
                                <img src="{{ asset('/assets/web/images/testimonials/thumbs/3.png') }}" alt="author thumb">
                            </div><!-- /.testimonial-thumb -->
                            <div>
                                <h4 class="testimonial__meta-title">Sonia Blake</h4>
                                <p class="testimonial__meta-desc">Web Inc</p>
                            </div>
                        </div><!-- /.testimonial-meta -->
                    </div><!-- /.slider-nav -->
                </div><!-- /.col-lg-7 -->
            </div><!-- /.row -->
        </div><!-- /.testimonials-wrapper -->
    </div><!-- /.container -->
</section><!-- /.testimonials layout 2 -->

<!-- ========================
     gallery
    =========================== -->
<section class="gallery pt-0 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="slick-carousel" data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "autoplay": true, "arrows": true, "dots": false, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 2}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
                    <a class="popup-gallery-item" href="{{ asset('/assets/web/images/gallery/1.jpg') }}">
                        <img src="{{ asset('/assets/web/images/gallery/1.jpg') }}" alt="gallery img">
                    </a>
                    <a class="popup-gallery-item" href="{{ asset('/assets/web/images/gallery/2.jpg') }}">
                        <img src="{{ asset('/assets/web/images/gallery/2.jpg') }}" alt="gallery img">
                    </a>
                    <a class="popup-gallery-item" href="{{ asset('/assets/web/images/gallery/3.jpg') }}">
                        <img src="{{ asset('/assets/web/images/gallery/3.jpg') }}" alt="gallery img">
                    </a>
                    <a class="popup-gallery-item" href="{{ asset('/assets/web/images/gallery/4.jpg') }}">
                        <img src="{{ asset('/assets/web/images/gallery/4.jpg') }}" alt="gallery img">
                    </a>
                    <a class="popup-gallery-item" href="{{ asset('/assets/web/images/gallery/5.jpg') }}">
                        <img src="{{ asset('/assets/web/images/gallery/5.jpg') }}" alt="gallery img">
                    </a>
                    <a class="popup-gallery-item" href="{{ asset('/assets/web/images/gallery/6.jpg') }}">
                        <img src="{{ asset('/assets/web/images/gallery/6.jpg') }}" alt="gallery img">
                    </a>
                </div><!-- /.gallery-images-wrapper -->
            </div><!-- /.col-xl-5 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.gallery 2 -->


@stop

@pushOnce('scripts')
<script>

</script>
@endPushOnce