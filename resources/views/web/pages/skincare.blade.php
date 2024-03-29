@extends('web.layouts.default')
@section('title', 'skincare')
@section('content')

<style>
    /* Custom card styles */
    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s;
    }

    .card:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card-img-top {
        border-top-left-radius: 0.5rem;
        border-top-right-radius: 0.5rem;
        max-height: 200px;
        object-fit: cover;
    }

    .card-body {
        padding: 1.5rem;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: bold;
        display: none;
    }

    .card-text {
        font-size: 1rem;
        color: #555;
    }

    .btn {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 15px;
        padding: 10px;
        transition: background-color 0.3s;
    }

    .btn:hover {
        background-color: #0056b3;
        color: #fff;
    }
</style>

<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image " data-bs-bg="img/allbanners/about.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title mt-5">SkinCare</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="index.html"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                            <li>SkinCare</li>
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
                        <h1 class="section-title">Start a FREE* 60 Seconds online consultation</h1>
                        <p>We have a comprehensive guide to a wide range of conditions & infections that we can provide treatments for. You can read all about these as well as view the medicines to treat them before you complete an online FREE* consultation and it only takes a few quick seconds!</p> <br>
                        <!-- <p>At Online Pharmacy4U, we prioritise your well-being, ensuring quick and secure delivery of prescriptions right to your doorstep. Our commitment to excellence extends beyond transactions; we're here to provide expert guidance, personalised support, and a user-centric experience. Trust us for a healthier, more accessible future in healthcare.</p> -->
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- ABOUT US AREA END -->

<div class="container pb-25">
    <div class="row m-2 mb-30">
        <!-- Card 1 -->
        <div class="col-md-3">
            <div class="card">
                <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Card Image">
                <div class="card-body">
                    <h5 class="card-title">Card Title 1</h5>
                    <p class="card-text">loremloremloremlorem</p>
                    <p class="price">£0.00</p>
                    <a href="#" class="btn">View </a>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-md-3">
            <div class="card">
                <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Card Image">
                <div class="card-body">
                    <h5 class="card-title">Card Title 2</h5>
                    <p class="card-text">loremloremloremlorem</p>
                    <p class="price">£0.00</p>
                    <a href="#" class="btn">View </a>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-3">
            <div class="card">
                <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Card Image">
                <div class="card-body">
                    <h5 class="card-title">Card Title 3</h5>
                    <p class="card-text">loremloremloremlorem</p>
                    <p class="price">£0.00</p>
                    <a href="#" class="btn">View </a>
                </div>
            </div>
        </div>
        <!-- Card 4 -->
        <div class="col-md-3">
            <div class="card">
                <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Card Image">
                <div class="card-body">
                    <h5 class="card-title">Card Title 3</h5>
                    <p class="card-text">loremloremloremlorem</p>
                    <p class="price">£0.00</p>
                    <a href="#" class="btn">View </a>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- ABOUT US AREA START -->
<div class="container-fluid mt-3 "  style="background: #def3f8;">
    <div class="ltn__about-us-area pt-5 mt-170 pb-50 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="about-us-info-wrap">
                        <div class="section-title-area ltn__section-title-2--- mb-30">
                            <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color d-none">About Us</h6>
                            <h5 class="section-title">In what order should I apply my skincare products?</h5>
                            <p>Regardless of whether your skincare routine contains two products or ten, it’s important to apply them in the right order so they work as they should.</p> <br>
                            <p>First things first, use your cleanser to wash your face before applying any other products, morning or night.</p>
                            <!-- <p>At Online Pharmacy4U, we prioritise your well-being, ensuring quick and secure delivery of prescriptions right to your doorstep. Our commitment to excellence extends beyond transactions; we're here to provide expert guidance, personalised support, and a user-centric experience. Trust us for a healthier, more accessible future in healthcare.</p> -->
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="about-us-img-wrap about-img-left">
                        <img src="img/allbanners/homepage2.webp" style="border-radius: 20px;" alt="About Us Image">
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
            <div class="col-lg-12">
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
                                        <a class="ltn__video-icon-2 ltn__video-icon-2-small ltn__video-icon-2-border----" href="https://www.youtube.com/embed/Cr4LFOgRGeo?autoplay=1&showinfo=0" data-rel="lightcase:myCollection">
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
            <div class="col-lg-6 d-none">
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