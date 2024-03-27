@extends('web.layouts.default')
@section('title', 'Cart')
@section('content')

    
    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image "  data-bs-bg="img/bg/14.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner">
                        <h1 class="page-title">Cart</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="index.html"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                                <li>Cart</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- SHOPING CART AREA START -->
    <div class="liton__shoping-cart-area mb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if(isset($cart))
                        <div class="shoping-cart-inner">
                            <div class="shoping-cart-table table-responsive">
                                <table class="table">
                                    <!-- <thead>
                                        <th class="cart-product-remove">Remove</th>
                                        <th class="cart-product-image">Image</th>
                                        <th class="cart-product-info">Product</th>
                                        <th class="cart-product-price">Price</th>
                                        <th class="cart-product-quantity">Quantity</th>
                                        <th class="cart-product-subtotal">Subtotal</th>
                                    </thead> -->
                                    <tbody>
                                        @php
                                            $subTotal = 0;
                                        @endphp
                                        @foreach($cart as $key => $val)
                                            @php
                                                $subTotal = $subTotal + $val['quantity'] * $val['product_data']['price'];
                                            @endphp
                                            <tr>
                                                <td class="cart-product-remove">x</td>
                                                <td class="cart-product-image">
                                                    <a href="product-details.html"><img src="{{ asset('storage/'.$val['product_data']['main_image'])}}" alt="#"></a>
                                                </td>
                                                <td class="cart-product-info">
                                                    <h4><a href="{{ route('web.product', ['id' => $val['product_data']['id']]) }}">{{ $val['product_data']['title'] }}</a></h4>
                                                </td>
                                                <td class="cart-product-price">£{{ $val['product_data']['price'] }}</td>
                                                <td class="cart-product-quantity">
                                                    <div class="cart-plus-minus">
                                                        <input type="text" value="{{ $val['quantity'] }}" name="qtybutton" class="cart-plus-minus-box">
                                                    </div>
                                                </td>
                                                <td class="cart-product-subtotal">£{{ $val['quantity'] * $val['product_data']['price']}}</td>
                                            </tr>
                                        @endforeach
                                        <tr class="cart-coupon-row">
                                            <td colspan="6">
                                                <div class="cart-coupon">
                                                    <input type="text" name="cart-coupon" placeholder="Coupon code">
                                                    <button type="submit" class="btn theme-btn-2 btn-effect-2">Apply Coupon</button>
                                                </div>
                                            </td>
                                            <td>
                                                <button type="submit" class="btn theme-btn-2 btn-effect-2-- disabled">Update Cart</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="shoping-cart-total mt-50">
                                <h4>Cart Totals</h4>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Cart Subtotal</td>
                                            <td class="cart-subtotal">£{{ $subTotal }}</td>
                                        </tr>
                                        <tr>
                                            <td>Shipping and Handing</td>
                                            <td>£15.00</td>
                                        </tr>
                                        {{-- <tr>
                                            <td>Vat</td>
                                            <td>$00.00</td>
                                        </tr> --}}
                                        <tr>
                                            <td><strong>Order Total</strong></td>
                                            <td class="cart-total"><strong>£{{ $subTotal + 15}}</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="btn-wrapper text-right">
                                    <form class="needs-validation" action="" method="post">
                                        @csrf
                                        {{-- <input type="hidden" id="quantity" name="quantity" value="{{$cart['quantity']}}">
                                        <input type="hidden" name="variant_id" value="{{$cart['variant_id'] ?? ''}}">
                                        <input type="hidden" class="total-hidden" name="total" value="{{ $cart['total'] ?? 0}}">
                                        <input type="hidden" class="shiping_cost" name="cost" value="4.95">
                                        <input type="hidden" name="title" value="{{ $cart['title'] }}"> --}}

                                        <a href="checkout.html" class="theme-btn-1 btn btn-effect-1">Proceed to checkout</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- SHOPING CART AREA END -->


@stop

@pushOnce('scripts')
<script>
    $(document).delegate(".qtybutton", "click", function(e) {
        var price = parseFloat($(this).closest('tr').find('.cart-product-price').text().replace('£', ''));
        var quantity = parseFloat($(this).closest('tr').find('.cart-plus-minus-box').val());
        var subtotal = quantity * price;
        // $(this).closest('tr').find('.cart-product-subtotal').text('£' + subtotal.toFixed(2));
        $(this).closest('tr').find('.cart-product-subtotal').text('£' + subtotal);
        updateTotal();
    });

    function updateTotal() {
        var total = 0;
        $('.cart-product-subtotal').each(function() {
            total += parseFloat($(this).text().replace('£', ''));
        });
        $('.cart-subtotal').text('£' + total.toFixed(2));
        var sub_total = parseFloat($('.cart-subtotal').text().replace('£', ''));
        sub_total += 15;
        $('.cart-total').text('£' + sub_total.toFixed(2));
    }

</script>
@endPushOnce