@extends('web.layouts.default')
@section('title', 'faq')
@section('content')


    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image "  data-bs-bg="img/allbanners/about.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner">
                        <h1 class="page-title mt-5">Frequently Asked Question</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="index.html"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                                <li>Frequently Asked Question</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- ABOUT US AREA START -->
    <div class="ltn__about-us-area pt-25--- pb-120 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="about-us-img-wrap about-img-left">
                        <img src="img/allbanners/About Us page video section.png" alt="About Us Image">
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="about-us-info-wrap">
                        <div class="section-title-area ltn__section-title-2--- mb-30">
                            <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color d-none">About Us</h6>
                            <h1 class="section-title">Lorem ipsum dolor sit amet,</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Scelerisque eleifend donec pretium vulputate sapien nec sagittis. Proin libero nunc consequat interdum. Condimentum lacinia quis vel eros donec ac.</p> <br>
                            <!-- <p>At Online Pharmacy4U, we prioritise your well-being, ensuring quick and secure delivery of prescriptions right to your doorstep. Our commitment to excellence extends beyond transactions; we're here to provide expert guidance, personalised support, and a user-centric experience. Trust us for a healthier, more accessible future in healthcare.</p> -->
                        </div>
                        <ul class="ltn__list-item-1 ltn__list-item-1-before--- clearfix d-none">
                            <li><i class="fas fa-check-circle"></i>Fast and Simple.</li>
                        </ul>
                        <div class="about-author-info-2 border-top mt-10 d-none">
                            <p>Our online FREE* consultation only takes a few quick seconds, fast, simple & easy to complete. Our short few questions are similar as those that would be asked at your GP appointment.</p>
                            <!-- <ul>
                                <li>
                                    <div class="about-author-info-2-brief  d-flex">
                                        <div class="author-img">
                                        <img src="img/blog/author.jpg" alt="#">
                                        </div>
                                        <div class="author-name-designation">
                                            <h4 class="mb-0">Jerry Henson</h4>
                                            <small>Medical Specialist</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="about-author-info-2-contact  d-flex">
                                        <div class="about-contact-icon d-flex align-self-center mr-10">
                                            <i class="icon-call"></i>
                                        </div>
                                        <div class="about-author-info-2-contact-info">
                                            <small>Get Support</small>
                                            <h6 class="mb-0">123-456-789-10</h6>
                                        </div>
                                    </div>
                                </li>
                            </ul> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ABOUT US AREA END -->

    
    <!-- FAQ AREA START (faq-2) (ID > accordion_2) -->
    <div class="ltn__faq-area pt-115 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2 text-center">
                        <h1 class="section-title white-color---">Some Questions</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="ltn__faq-inner ltn__faq-inner-2">
                        <div id="accordion_2">
                            <!-- card -->
                            <div class="card">
                                <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse" data-bs-target="#faq-item-2-1" aria-expanded="true">
                                    How to buy a product?
                                </h6>
                                <div id="faq-item-2-1" class="collapse show" data-bs-parent="#accordion_2">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Scelerisque eleifend donec pretium vulputate sapien nec sagittis. Proin libero nunc consequat interdum. Condimentum lacinia quis vel eros donec ac.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- card -->
                            <div class="card">
                                <h6 class="ltn__card-title" data-bs-toggle="collapse" data-bs-target="#faq-item-2-2" aria-expanded="false"> 
                                    How can i make refund from your website?
                                </h6>
                                <div id="faq-item-2-2" class="collapse " data-bs-parent="#accordion_2">
                                    <div class="card-body">
                                        <div class="ltn__video-img alignleft">
                                            <img src="img/bg/17.jpg" alt="video popup bg image">
                                            <a class="ltn__video-icon-2 ltn__video-icon-2-small ltn__video-icon-2-border----" href="https://www.youtube.com/embed/Cr4LFOgRGeo?autoplay=1&showinfo=0"  data-rel="lightcase:myCollection">
                                                <i class="fa fa-play"></i>
                                            </a>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Scelerisque </p>
                                    </div>
                                </div>
                            </div>                          
                            <!-- card -->
                            <div class="card">
                                <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse" data-bs-target="#faq-item-2-3" aria-expanded="false">
                                    I am a new user. How should I start?
                                </h6>
                                <div id="faq-item-2-3" class="collapse" data-bs-parent="#accordion_2">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Scelerisque eleifend donec pretium vulputate sapien nec sagittis. Proin libero nunc consequat interdum. Condimentum lacinia quis vel eros donec ac.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- card -->
                            <div class="card">
                                <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse" data-bs-target="#faq-item-2-4" aria-expanded="false">
                                    Returns and refunds
                                </h6>
                                <div id="faq-item-2-4" class="collapse" data-bs-parent="#accordion_2">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Scelerisque eleifend donec pretium vulputate sapien nec sagittis. Proin libero nunc consequat interdum. Condimentum lacinia quis vel eros donec ac.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- card -->
                            <div class="card">
                                <h6 class="collapsed ltn__card-title" data-bs-toggle="collapse" data-bs-target="#faq-item-2-5" aria-expanded="false">
                                    Are my details secured?
                                </h6>
                                <div id="faq-item-2-5" class="collapse" data-bs-parent="#accordion_2">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Scelerisque eleifend donec pretium vulputate sapien nec sagittis. Proin libero nunc consequat interdum. Condimentum lacinia quis vel eros donec ac.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <aside class="about-us-img-wrap about-img-right">
                        <img src="img/allbanners/faq600x600.png" alt="Banner Image">
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- FAQ AREA START -->

@stop

@pushOnce('scripts')
<script>

</script>
@endPushOnce