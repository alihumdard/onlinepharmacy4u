@extends('web.layouts.default')
@section('title', 'Product Detail')
@section('content')
<style>
    .variant_tag {
        font-size: 14px;
        line-height: 1;
        text-transform: capitalize;
        padding: 7px 15px;
        border-radius: 20px;
        border: 1px solid #e6e8eb;
        transition: all 0.4s ease;
        border-color: #21cdc0;
        background-color: #fff;
        color: var(--ltn__heading-color);
    }

    .variant_tag_active {
        font-size: 14px;
        line-height: 1;
        text-transform: capitalize;
        padding: 7px 15px;
        border-radius: 20px;
        border: 1px solid #e6e8eb;
        transition: all 0.4s ease;
        border-color: #21cdc0;
        background-color: #0ab9ad;
        color: #fff;
    }

    .btn.out-of-stock {
        background-color: #6c757d;
        border-color: #6c757d;
        color: #ffffff;
        pointer-events: none;
        cursor: not-allowed;
    }

    .btn.out-of-stock i {
        margin-right: 5px;
    }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image" data-bs-bg="img/bg/14.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">Product Details</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="/"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                            <li>Product Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- SHOP DETAILS AREA START -->
<div class="ltn__shop-details-area pb-85">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="ltn__shop-details-inner mb-60">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="ltn__shop-details-img-gallery">
                                <div class="ltn__shop-details-large-img">
                                    <div class="single-large-img">
                                        <a href="{{ asset('storage/'.$product->main_image)}}" data-rel="lightcase:myCollection">
                                            <img class="img-fluid" src="{{ asset('storage/'.$product->main_image)}}" alt="Image" id="product_img">
                                        </a>
                                    </div>
                                </div>

                                <div class="ltn__shop-details-small-img slick-arrow-2">
                                    @foreach($product->variants ?? [] as $key => $val)
                                    <div class="single-small-img variant_img_{{$val->id}}" style="height: 145px !important; width: 145px !important;">
                                        @php
                                        $src = ($val->image) ? $val->image : '';
                                        @endphp
                                        @if($src)
                                        <img class="img-fluid  variant_no_{{$val->id}}" src="{{ asset('storage/'.$src)}}" alt="Image" data-variant_id="{{$val->id ?? ''}}" data-variant_data="{{ json_encode($val) }}" data-main_image="{{ $product->main_image }}">
                                        @endif
                                    </div>
                                    @endforeach
                                    @foreach($product->productAttributes ?? [] as $key => $val1)
                                    <div class="single-small-img }" style="height: 145px !important; width: 145px !important;">
                                        @php
                                        $src = ($val1->image) ? $val1->image : '';
                                        @endphp
                                        @if($src)
                                        <img class="img-fluid  " src="{{ asset('storage/'.$src)}}" alt="Image">
                                        @endif
                                    </div>
                                    @endforeach


                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="modal-product-info shop-details-info pl-0">
                                <div class="product-ratting d-none">
                                    <ul>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                        <li><a href="#"><i class="far fa-star"></i></a></li>
                                        <li class="review-total"> <a href="#"> ( 95 Reviews )</a></li>
                                    </ul>
                                </div>
                                <h3>{{ $product->title }}</h3>
                                <div class="product-price">
                                    <span id="product_price">{{ '£'.$product->price }}</span>
                                    <del id="product_cut_price">{{ $product->cut_price ? '£'.$product->cut_price : NULL}}</del>
                                    <input type="hidden" name="variant_id" id="variant_id" value="">
                                </div>
                                <div class="modal-product-meta ltn__product-details-menu-1">
                                    <ul>
                                        <li>
                                            <strong>Categories:</strong>
                                            <span>
                                                <a href="{{ route('category.products', ['main_category' => $product->category->slug]) }}">{{ $product->category->name}}</a>
                                                @if($product->sub_category)
                                                <a href="{{ route('category.products', ['main_category' => $product->category->slug,'sub_category' => $product->sub_cat->slug]) }}">{{ $product->sub_cat->name}}</a>
                                                @endif
                                                @if($product->child_category)
                                                <a href="{{ route('category.products', ['main_category' => $product->category->slug,'sub_category' => $product->sub_cat->slug, 'child_category' => $product->child_cat->slug]) }}">{{ $product->child_cat->name}}</a>
                                                @endif
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="ltn__product-details-menu-2">
                                    <ul>
                                        <li>
                                            <div class="cart-plus-minus">
                                                <input type="text" value="1" name="qtybutton" class="cart-plus-minus-box">
                                            </div>
                                        </li>
                                        <li>
                                            @if($product->stock_status == 'IN')
                                            @if($product->product_template == config('constants.PRESCRIPTION_MEDICINE') && $pre_add_to_cart == 'yes')
                                            <a href="javascript:void(0)" onclick="addToCart(@json($product->id));" class="theme-btn-1 btn btn-effect-1" title="Add to Cart">
                                                <i class="fas fa-shopping-cart"></i>
                                                <span>ADD TO CART</span>
                                            </a>
                                            @elseif($product->product_template == config('constants.PHARMACY_MEDECINE') && isset(session('consultations')[$product->id]))
                                            <a href="javascript:void(0)" onclick="addToCart(@json($product->id));" class="theme-btn-1 btn btn-effect-1" title="Add to Cart">
                                                <i class="fas fa-shopping-cart"></i>
                                                <span>ADD TO CART</span>
                                            </a>
                                            @elseif($product->product_template == 1)
                                            <form action="{{ route('web.consultationForm') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="template" value="{{ config('constants.PHARMACY_MEDECINE') }}">
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <button type="submit" class="theme-btn-1 btn btn-effect-1" title="Add to Cart">
                                                    <i class="fas fa-shopping-cart"></i>
                                                    <span>Start Consultation</span>
                                                </button>
                                            </form>
                                            @elseif ($product->product_template == 2)
                                            <form action="{{ route('category.products', ['main_category' => $product->category->slug ?? NULL,'sub_category' => $product->sub_cat->slug ?? NULL, 'child_category' => $product->child_cat->slug ?? NULL]) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <button type="submit" class="theme-btn-1 btn btn-effect-1" title="Add to Cart">
                                                    <span>Start Consultation</span>
                                                </button>
                                            </form>
                                            @elseif ($product->product_template == 3)
                                            <a href="javascript:void(0)" onclick="addToCart({{ $product->id }});" class="theme-btn-1 btn btn-effect-1" title="Add to Cart">
                                                <i class="fas fa-shopping-cart"></i>
                                                <span>ADD TO CART</span>
                                            </a>
                                            @endif
                                            @else
                                            <a class="btn btn-secondary disabled" title="Out of Stock" aria-disabled="true">
                                                <i class="fas fa-exclamation-circle"></i>
                                                <span> Out of Stock</span>
                                            </a>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                                <div class="ltn__product-details-menu-3 ">
                                    <ul>
                                        @if(!$product['variants']->isEmpty())
                                        <li>
                                            <div style="padding: 20px;" class="widget widget-tags">
                                                @foreach($varints_selectors as $key => $selector)
                                                <h5 class="widget__title" style="margin-bottom: 1px !important; margin-top: 20px;"><span id="product_title">{{ $selector ?? ''}} :</span></h5>
                                                <div class="widget-content">
                                                    <ul class="list-unstyled">
                                                        @if(isset($variants_tags[$selector]))
                                                        @foreach($variants_tags[$selector] as $key => $vrr)
                                                        <li style="cursor: pointer;">
                                                            <a class="variants @if($loop->first) variant_tag_active @else variant_tag @endif selector_{{ str_replace(' ', '_', $selector) }}" data-selector="selector_{{ str_replace(' ', '_', $selector) }}" data-variant_val="{{$vrr}}" data-main_image="{{ $product->main_image }}">
                                                                {{ $vrr }}
                                                            </a>
                                                        </li>
                                                        @endforeach
                                                        @endif
                                                    </ul>
                                                </div>
                                                @endforeach
                                            </div>
                                        </li>
                                        @endif
                                        <li class="d-none">
                                            <a href="#" class="" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                                <i class="far fa-heart"></i>
                                                <span>Add to Wishlist</span>
                                            </a>
                                        </li>
                                        <li class="d-none">
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
                                <hr>
                                <div class="ltn__safe-checkout d-none">
                                    <h5>Guaranteed Safe Checkout</h5>
                                    <img src="img/icons/payment-2.png" alt="Payment Image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" ltn__shop-details-tab-inner ltn__shop-details-tab-inner-2">
                    <div class="ltn__shop-details-tab-menu">
                        <div class="nav">
                            <a class="active show" data-bs-toggle="tab" href="#liton_tab_details_1_1">Description</a>
                            @if($faqs)
                            <a data-bs-toggle="tab" href="#liton_tab_details_1_2" class="">FAQ's</a>
                            @endif
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="liton_tab_details_1_1">
                            <div class="ltn__shop-details-tab-content-inner">
                                <h4 class="title-2">{{ $product->title }}</h4>
                                <p>{!! $product->desc !!}</p>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="liton_tab_details_1_2">
                            <div class="accordion mt-2" id="accordionPanelsStayOpenExample">
                                @foreach($faqs ?? [] as $key => $faq)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-heading{{$faq['id']}}">
                                        <button class="accordion-button{{ $loop->first ? '' : ' collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse{{$faq['id']}}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="panelsStayOpen-collapse{{$faq['id']}}">
                                            Q. {{ ++$key}} {{ $faq['title'] }}
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapse{{$faq['id']}}" class="accordion-collapse collapse{{ $loop->first ? ' show' : '' }}" aria-labelledby="panelsStayOpen-heading{{$faq['id']}}">
                                        <div class="accordion-body">
                                            {!! $faq['desc'] !!}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- SHOP DETAILS AREA END -->

<!-- PRODUCT SLIDER AREA START -->
<div class="ltn__product-slider-area ltn__product-gutter pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area ltn__section-title-2">
                    <h4 class="title-2">Related Products<span>.</span></h1>
                </div>
            </div>
        </div>
        <div class="row ltn__related-product-slider-one-active slick-arrow-1">
            <!-- ltn__product-item -->
            @foreach ($related_products as $related_product)
            <div class="col-lg-12">
                <div class="ltn__product-item ltn__product-item-3 text-center">
                    <div class="product-img">
                        <a href="{{ route('web.product', ['id' => $related_product->slug]) }}"><img src="{{ asset('storage/'.$related_product->main_image) }}" alt="image"></a>
                        <div class="product-badge">
                            <ul>
                                <li class="sale-badge">New</li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-info">
                        <h2 class="product-title"><a href="{{ route('web.product', ['id' => $related_product->slug]) }}">{{ $related_product->title }}</a></h2>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- PRODUCT SLIDER AREA END -->


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
                                            <a href="{{route('web.checkout')}}" class="theme-btn-2 btn btn-effect-2">Checkout</a>
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
    $(document).ready(function() {
        function updateVariant() {
            var variantData = @json($variants ?? []);
            var variant_selector = $(this).data('selector');
            $('.' + variant_selector).removeClass('variant_tag_active').addClass('variant_tag');
            $(this).removeClass('variant_tag').addClass('variant_tag_active');
            var combinedVariantVal = '';
            $('.variant_tag_active').each(function() {
                var variantValue = $(this).data('variant_val');
                variantValue = variantValue.replace(/;/g, '').replace(/ /g, '_');
                combinedVariantVal += variantValue;
            });
            var current_variant = variantData[combinedVariantVal];

            // update url according to variant start
            var current_variant_slug = current_variant.slug;
            var currentUrl = window.location.href;
            var newUrl = updateUrlParameter(currentUrl, 'variant', current_variant_slug);
            history.pushState({}, '', newUrl);
            // update url according to variant end

            var mainImage = $(this).data('main_image');
            var image_src = "{{ asset('storage/') }}";
            $('#variant_id').val(current_variant.id);

            if (current_variant.image) {
                $('#product_img').attr('src', image_src + '/' + current_variant.image);
            } else {
                $('#product_img').attr('src', image_src + '/' + mainImage);
            }
            $('#product_price').text('£ ' + current_variant.price)

            if (current_variant.cut_price) {
                $('#product_cut_price').text('£ ' + current_variant.cut_price)
            } else {
                $('#product_cut_price').text('');
            }
        }

        $(document).on('click', '.variants', updateVariant);

        // Call the function on page load
        var activeVariant = $('.variants.variant_tag_active').first();
        if (activeVariant.length) {
            updateVariant.call(activeVariant);
        }
    });

    function updateUrlParameter(url, key, value) {
        // function for update url when variant change
        var urlParts = url.split('?');
        if (urlParts.length >= 2) {
            var prefix = encodeURIComponent(key) + '=';
            var params = urlParts[1].split(/[&;]/g);

            for (var i = 0; i < params.length; i++) {
                if (params[i].startsWith(prefix)) {
                    params[i] = prefix + encodeURIComponent(value);
                    return urlParts[0] + '?' + params.join('&');
                }
            }
            url += '&' + prefix + encodeURIComponent(value);
        } else {
            url += '?' + encodeURIComponent(key) + '=' + encodeURIComponent(value);
        }
        return url;
    }
</script>
@endPushOnce