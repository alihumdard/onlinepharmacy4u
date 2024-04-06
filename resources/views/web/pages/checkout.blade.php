@extends('web.layouts.default')
@section('title', 'Checkout')
@section('content')


<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image " data-bs-bg="img/bg/14.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">Checkout</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="index.html"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- WISHLIST AREA START -->
<div class="ltn__checkout-area mb-105">
    <div class="container">
        <form id action="{{route('payment')}}" method="post">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__checkout-inner">
                        <div class="ltn__checkout-single-content mt-50">
                            <h4 class="title-2">Billing Details</h4>
                            <!-- <p><label class="input-info-save mb-0"><input type="checkbox" name="agree"> use different billing address?</label></p> -->

                            <div class="ltn__checkout-single-content-info">
                                @csrf
                                @if(!empty(Cart::content()))
                                @foreach(Cart::content() as $item)
                                <input type="hidden" name="order_details[product_id][]" value="{{$item->id}}">
                                <input type="hidden" name="order_details[product_name][]" value="{{$item->name}}">
                                <input type="hidden" name="order_details[product_qty][]" value="{{$item->qty}}">
                                <input type="hidden" name="order_details[product_price][]" value="{{$item->price}}">
                                @endforeach
                                @endif
                                <input type="hidden" id="total_ammount" name="total_ammount" value="{{str_replace(',', '', Cart::subTotal()) + 4.95}}">
                                <input type="hidden" id="shiping_cost" name="shiping_cost" value="4.95">
                                <h6>Personal Information</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-item input-item-name ltn__custom-icon">
                                            <input type="text" name="firstName" placeholder="First name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-item input-item-name ltn__custom-icon">
                                            <input type="text" name="lastName" placeholder="Last name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-item input-item-email ltn__custom-icon">
                                            <input type="email" name="email" placeholder="email address" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-item input-item-phone ltn__custom-icon">
                                            <input type="text" name="phone" placeholder="phone number" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <h6>Address</h6>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-item">
                                                    <input type="text" name="address" placeholder="House number and street name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item">
                                                    <input type="text" name="address2" placeholder="Apartment, suite, unit etc. (optional)">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <h6>City</h6>
                                        <div class="input-item">
                                            <input type="text" name="city" placeholder="City" required>
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-4 col-md-6">
                                        <h6>Town</h6>
                                        <div class="input-item">
                                            <input type="text" name="state" placeholder="State" required>
                                        </div>
                                    </div> -->
                                    <div class="col-lg-4 col-md-6">
                                        <h6>Postal Code</h6>
                                        <div class="input-item">
                                            <input type="text" name="zip_code" placeholder="Postal Code" required>
                                        </div>
                                    </div>
                                </div>
                                <h6>Order Notes (optional)</h6>
                                <div class="input-item input-item-textarea ltn__custom-icon">
                                    <textarea name="note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ltn__checkout-payment-method mt-50">
                        <h4 class="title-2">Shipping Method</h4>
                        <div class="form-check">
                            <div class="custom-control">
                                <input class="form-check-input" type="radio" name="shipping_method" id="express_delivery" value="express" checked data-ship="4.95" required>
                                <label class="form-check-label" for="express_delivery">Royal Mail Tracked 24</label>
                                <span class="float-right">£4.95</span>
                            </div>
                            <div class="ml-4 mb-2 small">(1-2 working days)</div>
                        </div>
                        <div class="form-check">
                            <div class="custom-control">
                                <input class="form-check-input" type="radio" name="shipping_method" id="fast_delivery" value="fast" data-ship="3.95" required>
                                <label class="form-check-label" for="fast_delivery">Royal Mail Tracked 48</label>
                                <span class="float-right">£3.95</span>
                            </div>
                            <div class="ml-4 mb-2 small">(3-5 working days)</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping-cart-total mt-50">
                        <h4 class="title-2">Cart Totals</h4>
                        <table class="table">
                            <tbody>
                                @if(!empty(Cart::content()))
                                @foreach(Cart::content() as $item)
                                <tr>
                                    <td>{{ $item->name }} <strong>× {{ $item->qty }}</strong></td>
                                    <td>£{{ $item->subtotal }}</td>
                                </tr>
                                @endforeach
                                @endif
                                <tr>
                                    <td>Shipping and Handing</td>
                                    <td class="shipping_cost" data-shipping="4.95">£4.95</td>
                                </tr>
                                <tr>
                                    <td><strong>Order Total</strong></td>
                                    <td class="order_total"><strong>{{str_replace(',', '', Cart::subTotal()) + 4.95}}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Place order</button>
        </form>
    </div>
</div>
<!-- WISHLIST AREA START -->


@stop

@pushOnce('scripts')
<script>
    $('input[name="shipping_method"]').change(function() {
        var shippingCost = parseFloat($('input[name="shipping_method"]:checked').data('ship')) || 0;
        var subTotal = parseFloat(@json(strval(Cart::subTotal())).replace(',', '')) || 0;
        var granTotal = (shippingCost + subTotal).toFixed(2);
        $('.shipping_cost').text('£ ' + shippingCost.toFixed(2));
        $('.order_total').text('£ ' + granTotal);
        $('#total_ammount').val(granTotal);
        $('#shiping_cost').val(shippingCost.toFixed(2));
    });
</script>
@endPushOnce