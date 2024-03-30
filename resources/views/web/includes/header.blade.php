<!-- Body main wrapper start -->
<div class="body-wrapper">

    <!-- HEADER AREA START (header-3) -->
    <header class="ltn__header-area ltn__header-3 section-bg-6---">   
        <!-- ltn__header-top-area start -->
        <div class="ltn__header-top-area border-bottom top-area-color-white---">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ltn__top-bar-menu text-center">
                            <ul>
                                <li><a href="#" class="text-white font-weight-400"><i class="fas fa-comment-medical"  class="text-white"></i>Dispensed by Regulated UK Pharmacists</a></li>
                                <li><a href="#"  class="text-white"><i class="far fa-certificate"  class="text-white font-weight-400"></i> Registered Pharmacy: 9011972</a></li>
                                <li class="text-white"><a href="#"  class="text-white  pl-2">  Social Media Link:</a> <a href="https://www.facebook.com/Online-Pharmacy4U-114908691196467" class="top-social-links"><i class="fab fa-facebook-f"></i></a> <a href="https://twitter.com/4uPharmacy" class="top-social-links"><i class="fab fa-twitter"></i></a> <a href="https://www.linkedin.com/company/74292944" class="top-social-links"><i class="fab fa-linkedin-in"></i></a> <a href="https://www.tiktok.com/@online.pharmacy4u" class="top-social-links"><i class="fab fa-tiktok"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ltn__header-top-area end -->     
        <!-- ltn__header-middle-area start -->
        <div class="ltn__header-middle-area">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="site-logo">
                            <a href="/"><img src="{{ asset('img/logo.webp') }}" alt="Logo"></a>
                        </div>
                    </div>
                    <div class="col header-contact-serarch-column d-none d-xl-block">
                        <div class="header-contact-search">
                            <!-- header-feature-item -->
                            <div class="header-feature-item d-none">
                                <div class="header-feature-icon">
                                    <i class="icon-phone"></i>
                                </div>
                                <div class="header-feature-info">
                                    <h6>Phone</h6>
                                    <p><a href="tel:0123456789">+0123-456-789</a></p>
                                </div>
                            </div>
                            <!-- header-search-2 -->
                            <div class="header-search-2">
                                <form id="#123" method="get"  action="#">
                                    <input type="text" name="search" value="" placeholder="Search here..."/>
                                    <button type="submit">
                                        <span><i class="icon-search"></i></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <!-- header-options -->
                        <div class="ltn__header-options">
                            <ul>
                                <li class="d-none--- ">
                                    <!-- header-search-1 -->
                                    <div class="header-search-wrap d-block d-xl-none">
                                        <div class="header-search-1">
                                            <div class="search-icon">
                                                <i class="icon-search  for-search-show"></i>
                                                <i class="icon-cancel  for-search-close"></i>
                                            </div>
                                        </div>
                                        <div class="header-search-1-form">
                                            <form id="#" method="get"  action="#">
                                                <input type="text" name="search" value="" placeholder="Search here..."/>
                                                <button type="submit">
                                                    <span><i class="icon-search"></i></span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-none---"> 
                                    <!-- user-menu -->
                                    <div class="ltn__drop-menu user-menu">
                                        <ul>
                                            <li>
                                                <a href="#"><i class="icon-user"></i></a>
                                                <ul>
                                                    <li><a href="/login">Sign in</a></li>
                                                    <li><a href="/register">Register</a></li>
                                                    <li><a href="/account">My Account</a></li>
                                                </ul> 
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <!-- mini-cart 2 -->
                                    <div class="mini-cart-icon mini-cart-icon-2">
                                        <a href="#ltn__utilize-cart-menu" class="ltn__utilize-toggle">
                                            <span class="mini-cart-icon">
                                                <i class="icon-shopping-cart"></i>
                                                <sup>{{ Cart::count()}}</sup>
                                            </span>
                                            </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ltn__header-middle-area end -->
        
        

        <!-- MOBILE MENU START -->
        <div class="mobile-header-menu-fullwidth mb-20 d-block d-lg-none">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Mobile Menu Button -->
                        <div class="mobile-menu-toggle d-lg-none">
                            <span>MENU</span>
                            <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                                <svg viewBox="0 0 800 600">
                                    <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                    <path d="M300,320 L540,320" id="middle"></path>
                                    <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- MOBILE MENU END -->
        
        <!-- header-bottom-area start -->
        <div class="header-bottom-area ltn__border-top--- ltn__header-sticky  ltn__sticky-bg-white ltn__primary-bg---- menu-color-white---- d-none--- d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col--- header-menu-column justify-content-center---">
                            <div class="header-menu header-menu-2 text-start">
                                <nav>
                                    <div class="ltn__main-menu text-center">
                                        <ul>
                                            <li><a href="/">Home</a></li>
                                            @foreach ($menu_categories as $key => $val)
                                                <li class=""><a href="{{ route('web.collections', ['main_category' => $val['slug']]) }}">{{ $val['name'] }}</a>
                                                    <ul class="mega-menu">
                                                        @foreach($val['subcategory'] as $key1 => $val1)
                                                            <li><a href="{{ route('web.collections', ['main_category' => $val['slug'],'sub_category' => $val1['slug']]) }}">{{ $val1['name'] }}</a>
                                                                <ul>
                                                                    @foreach($val1['child_categories'] as $key2 => $val2)
                                                                    <li><a href="{{ route('category.products', ['main_category' => $val['slug'],'sub_category' => $val1['slug'], 'child_category' => $val2['slug']]) }}">{{ $val2['name'] }}</a></li>
                                                                    @endforeach
                                                                </ul>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach
                                            <li><a href="/howitworks">How its work</a></li>
                                            <li><a href="/contact">Contact</a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- header-bottom-area end -->

        <div class="ltn__header-bottom-area border-bottom top-area-color-white---  d-none">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ltn__top-bar-menu">
                            <ul>
                                <li><a href="#" class="text-white font-weight-400"><i class="fas fa-plus"></i><strong class="font-bold">Regulated</strong> Pharmacy </a></li>
                                <li><a href="#"  class="text-white"><i class="fas fa-box"></i><span class="text-black"><strong class="font-bold">Discreet</strong> Packaging </span></a></li>
                                <li><a href="#"  class="text-white"><i class="fas fa-truck"></i><span class="text-black"> <strong class="font-bold">Free Delivery</strong> on orders over £40* </span></a></li>
                                <li><a href="#"  class="text-white">Excellent<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half"></i><strong>4.4</strong> based on <strong>1,421</strong> reviews</a></li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- HEADER AREA END -->

    <!-- Utilize Cart Menu Start -->
    <div id="ltn__utilize-cart-menu" class="ltn__utilize ltn__utilize-cart-menu">
        <div class="ltn__utilize-menu-inner ltn__scrollbar">
            <div class="ltn__utilize-menu-head">
                <span class="ltn__utilize-menu-title">Cart</span>
                <button class="ltn__utilize-close">×</button>
            </div>
            <div class="mini-cart-product-area ltn__scrollbar">
                @if(!empty(Cart::content()))
                    @foreach(Cart::content() as $item)
                        <div class="mini-cart-item clearfix">
                            <div class="mini-cart-img">
                                <a href="#"><img src="{{ asset('storage/'.$item->options->productImage)}}" alt="Image"></a>
                                <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                            </div>
                            <div class="mini-cart-info">
                                <h6><a href="#">{{ $item->name }}</a></h6>
                                <span class="mini-cart-quantity">{{ $item->qty }} x {{ $item->price}}</span>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="mini-cart-footer">
                <div class="mini-cart-sub-total">
                    <h5>Subtotal: <span>£{{ Cart::subTotal() }}</span></h5>
                </div>
                <div class="btn-wrapper">
                    <a href="/cart" class="theme-btn-1 btn btn-effect-1">View Cart</a>
                    <a href="/checkout" class="theme-btn-2 btn btn-effect-2">Checkout</a>
                </div>
                {{-- <p>Free Shipping on All Orders Over $100!</p> --}}
            </div>

        </div>
    </div>
    <!-- Utilize Cart Menu End -->

    <!-- Utilize Mobile Menu Start -->
    <div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
        <div class="ltn__utilize-menu-inner ltn__scrollbar">
            <div class="ltn__utilize-menu-head">
                <div class="site-logo">
                    <a href="/"><img src="img/logo.webp" alt="Logo"></a>
                </div>
                <button class="ltn__utilize-close">×</button>
            </div>
            <div class="ltn__utilize-menu-search-form">
                <form action="#">
                    <input type="text" placeholder="Search...">
                    <button><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="ltn__utilize-menu">
                <ul>
                    <li><a href="/">Home</a></li>
                    @foreach ($menu_categories as $key => $val)
                        <li><a href="{{ route('category.products', ['main_category' => $val['slug']]) }}">{{$val['name']}}</a>
                            <ul class="sub-menu">
                                @foreach($val['subcategory'] as $key1 => $val1)
                                    <li><a href="{{ route('category.products', ['main_category' => $val['slug'],'sub_category' => $val1['slug']]) }}">{{$val1['name']}}</a>
                                        <ul class="sub-menu">
                                            @foreach($val1['child_categories'] as $key2 => $val2)
                                                <li><a href="{{ route('category.products', ['main_category' => $val['slug'],'sub_category' => $val1['slug'], 'child_category' => $val2['slug']]) }}">{{$val2['name']}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="ltn__utilize-buttons ltn__utilize-buttons-2">
                <ul>
                    <li>
                        <a href="account.html" title="My Account">
                            <span class="utilize-btn-icon">
                                <i class="far fa-user"></i>
                            </span>
                            My Account
                        </a>
                    </li>
                    <li>
                        <a href="cart.html" title="Shoping Cart">
                            <span class="utilize-btn-icon">
                                <i class="fas fa-shopping-cart"></i>
                                <sup>5</sup>
                            </span>
                            Shoping Cart
                        </a>
                    </li>
                </ul>
            </div>
            <div class="ltn__social-media-2">
                <ul>
                    <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                    <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Utilize Mobile Menu End -->

    



