@extends('web.layouts.default')
@section('title', 'Blogs')
@section('content')
<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image " data-bs-bg="img/bg/14.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">Blog Grid</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="/"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                            <li>Blog Grid</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- BLOG AREA START -->
<div class="ltn__blog-area ltn__blog-item-3-normal mb-100">
    <div class="container">
        <div class="row">
            <!-- Blog Item -->
            <div class="col-lg-4 col-sm-6 col-12">
                <div class="ltn__blog-item ltn__blog-item-3">
                    <div class="ltn__blog-img">
                        <a href="{{ route('web.blog-details') }}"><img src="img/blog/2.png" alt="#"></a>
                    </div>
                    <div class="ltn__blog-brief">
                        <div class="ltn__blog-meta">
                            <ul>
                                <li class="ltn__blog-author">
                                    <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                </li>
                                <li class="ltn__blog-tags">
                                    <a href="#"><i class="fas fa-tags"></i>Services</a>
                                </li>
                            </ul>
                        </div>
                        <h3 class="ltn__blog-title"><a href="{{ route('web.blog-details') }}">What must you do if poor health affects your driving?</a></h3>
                        <div class="ltn__blog-meta-btn">
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>June 24, 2020</li>
                                </ul>
                            </div>
                            <div class="ltn__blog-btn">
                            <a href="{{ route('web.blog-details') }}">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Blog Item -->
            <div class="col-lg-4 col-sm-6 col-12">
                <div class="ltn__blog-item ltn__blog-item-3">
                    <div class="ltn__blog-img">
                        <a href="{{ route('web.blog-details') }}"><img src="img/blog/3.png" alt="#"></a>
                    </div>
                    <div class="ltn__blog-brief">
                        <div class="ltn__blog-meta">
                            <ul>
                                <li class="ltn__blog-author">
                                    <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                </li>
                                <li class="ltn__blog-tags">
                                    <a href="#"><i class="fas fa-tags"></i>Services</a>
                                </li>
                            </ul>
                        </div>
                        <h3 class="ltn__blog-title"><a href="{{ route('web.blog-details') }}">Why Confidentiality Is Important In Health And Social Care</a></h3>
                        <div class="ltn__blog-meta-btn">
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>July 23, 2020</li>
                                </ul>
                            </div>
                            <div class="ltn__blog-btn">
                            <a href="{{ route('web.blog-details') }}">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Blog Item -->
            <div class="col-lg-4 col-sm-6 col-12">
                <div class="ltn__blog-item ltn__blog-item-3">
                    <div class="ltn__blog-img">
                        <a href="{{ route('web.blog-details') }}"><img src="img/blog/4.png" alt="#"></a>
                    </div>
                    <div class="ltn__blog-brief">
                        <div class="ltn__blog-meta">
                            <ul>
                                <li class="ltn__blog-author">
                                    <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                </li>
                                <li class="ltn__blog-tags">
                                    <a href="#"><i class="fas fa-tags"></i>Services</a>
                                </li>
                            </ul>
                        </div>
                        <h3 class="ltn__blog-title"><a href="{{ route('web.blog-details') }}">What Is Effective Practice In Health And Social Care?</a></h3>
                        <div class="ltn__blog-meta-btn">
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>August 22, 2020</li>
                                </ul>
                            </div>
                            <div class="ltn__blog-btn">
                            <a href="{{ route('web.blog-details') }}">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Blog Item -->
            <div class="col-lg-4 col-sm-6 col-12">
                <div class="ltn__blog-item ltn__blog-item-3">
                    <div class="ltn__blog-img">
                        <a href="{{ route('web.blog-details') }}"><img src="img/blog/5.png" alt="#"></a>
                    </div>
                    <div class="ltn__blog-brief">
                        <div class="ltn__blog-meta">
                            <ul>
                                <li class="ltn__blog-author">
                                    <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                </li>
                                <li class="ltn__blog-tags">
                                    <a href="#"><i class="fas fa-tags"></i>Products</a>
                                </li>
                            </ul>
                        </div>
                        <h3 class="ltn__blog-title"><a href="{{ route('web.blog-details') }}">How to stop anxiety about health | Online Pharmacy4u</a></h3>
                        <div class="ltn__blog-meta-btn">
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>June 24, 2020</li>
                                </ul>
                            </div>
                            <div class="ltn__blog-btn">
                                <a href="{{ route('web.blog-details') }}">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__pagination-area text-center">
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
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BLOG AREA END -->

@stop

@pushOnce('scripts')
<script>

</script>
@endPushOnce