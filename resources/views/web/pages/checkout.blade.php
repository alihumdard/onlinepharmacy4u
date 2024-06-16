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
                                <li><a href="/"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span>
                                        Home</a></li>
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
            <form id="checkoutForm" action="{{ route('payment') }}" method="post">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ltn__checkout-inner">
                            <div class="ltn__checkout-single-content mt-50">
                                <h4 class="title-2">Billing Details</h4>
                                <!-- <p><label class="input-info-save mb-0"><input type="checkbox" name="agree"> use different billing address?</label></p> -->

                                <div class="ltn__checkout-single-content-info">
                                    @csrf
                                    @if (!empty(Cart::content()))
                                        @foreach (Cart::content() as $item)
                                            <input type="hidden" name="order_details[product_id][]"
                                                value="{{ $item->id }}">
                                            <input type="hidden" name="order_details[product_name][]"
                                                value="{{ $item->name }}">
                                            <input type="hidden" name="order_details[product_qty][]"
                                                value="{{ $item->qty }}">
                                            <input type="hidden" name="order_details[product_price][]"
                                                value="{{ $item->price }}">
                                        @endforeach
                                    @endif
                                    <input type="hidden" id="total_ammount" name="total_ammount"
                                        value="{{ str_replace(',', '', Cart::subTotal()) + 4.95 }}">
                                    <input type="hidden" id="shiping_cost" name="shiping_cost" value="4.95">
                                    <h6>Personal Information</h6>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-item input-item-name ltn__custom-icon">
                                                <input type="text" name="firstName"
                                                    style="margin-top: 20px !important; margin-bottom:0px !important;"
                                                    placeholder="First name" required>
                                                <div class="invalid-feedback">Please enter your first name.</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-item input-item-name ltn__custom-icon">
                                                <input type="text" name="lastName"
                                                    style="margin-top: 20px !important; margin-bottom:0px !important;"
                                                    placeholder="Last name" required>
                                                <div class="invalid-feedback">Please enter your last name.</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-item input-item-email ltn__custom-icon">
                                                <input type="email" name="email"
                                                    style="margin-top: 20px !important; margin-bottom:0px !important;"
                                                    placeholder="email address" required>
                                                <div class="invalid-feedback">Please enter your email.</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-item input-item-phone ltn__custom-icon">
                                                <input type="text" name="phone"
                                                    style="margin-top: 20px !important; margin-bottom:0px !important;"
                                                    placeholder="phone number" required>
                                                <div class="invalid-feedback">Please enter your phone No.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <h6>Address</h6>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-item">
                                                        <input type="text" name="address"
                                                            style="margin-top: 20px !important; margin-bottom:0px !important;"
                                                            placeholder="House number and street name" required>
                                                        <div class="invalid-feedback">Please enter your address.</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-item">
                                                        <input type="text" name="address2"
                                                            placeholder="Apartment, suite, unit etc. (optional)">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <h6>City</h6>
                                            <div class="input-item">
                                                <input type="text" id="cityInput" name="city"
                                                    style="margin-top: 20px !important; margin-bottom:0px !important;"
                                                    placeholder="City" required>
                                                <div class="invalid-feedback">Please enter your city.</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <h6>Postal Code</h6>
                                            <div class="input-item">
                                                <input type="text" name="zip_code" id="zip_code_input"
                                                    style="margin-top: 20px !important; margin-bottom:0px !important;"
                                                    placeholder="Postal Code" required>
                                                <div class="invalid-feedback">Please enter your postal code.</div>
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
                                    <input class="form-check-input" type="radio" name="shipping_method"
                                        id="express_delivery" value="express" checked data-ship="4.95" required>
                                    <label class="form-check-label" for="express_delivery">Royal Mail Tracked 24</label>
                                    <span class="float-right">£4.95</span>
                                </div>
                                <div class="ml-4 mb-2 small">(1-2 working days)</div>
                            </div>
                            <div class="form-check">
                                <div class="custom-control">
                                    <input class="form-check-input" type="radio" name="shipping_method"
                                        id="fast_delivery" value="fast" data-ship="3.95" required>
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
                                    @if (!empty(Cart::content()))
                                        @foreach (Cart::content() as $item)
                                            <tr>
                                                <td>{!! $item->name !!} {!! $item->options->variant_info ? $item->options->variant_info->new_var_info : '' !!} <strong>×
                                                        {{ $item->qty }}</strong></td>
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
                                        <td class="order_total">
                                            <strong>{{ str_replace(',', '', Cart::subTotal()) + 4.95 }}</strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <button id="placeOrderBtn" class="btn theme-btn-1 btn-effect-1 text-uppercase" type="button">Procceed To
                    Pay</button>
            </form>
            <div id="iframeContainer" class="vh-100 w-100 "></div>
        </div>
    </div>
    <!-- WISHLIST AREA START -->


@stop

@pushOnce('scripts')
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- jQuery UI for autocomplete -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script>
        $(document).ready(function() {
            // Array of cities in the United Kingdom
            var ukCities = [
                "London", "Birmingham", "Manchester", "Liverpool", "Glasgow", "Newcastle", "Sheffield", "Leeds",
                "Bristol",
                "Edinburgh", "Leicester", "Coventry", "Bradford", "Cardiff", "Belfast", "Nottingham",
                "Kingston upon Hull",
                "Plymouth", "Southampton", "Reading", "Aberdeen", "Portsmouth", "York", "Swansea",
                "Milton Keynes", "Derby",
                "Stoke-on-Trent", "Northampton", "Luton", "Wolverhampton", "Wigan", "Norwich", "Chester",
                "Cambridge",
                "Oxford", "Dundee", "Inverness", "Exeter", "Swindon", "Derry", "Lisburn", "Newry", "Armagh",
                "Londonderry", "Bangor", "Craigavon", "Ballymena", "Newtownabbey", "Coleraine", "Limavady",
                "Ballyclare",
                "Cookstown", "Strabane", "Holywood", "Warrenpoint", "Larne", "Banbridge", "Donaghadee",
                "Downpatrick",
                "Carrickfergus", "Portadown", "Lurgan", "Portrush", "Comber", "Ballymoney", "Crumlin",
                "Maghera",
                "Whitehead", "Enniskillen", "Dungannon", "Randalstown", "Moira", "Dromore", "Saintfield",
                "Kilkeel",
                "Ballycastle", "Rathfriland", "Killyleagh", "Crossgar", "Strangford", "Cullybackey", "Keady",
                "Bushmills",
                "Cushendall", "Greenisland", "Rostrevor", "Portaferry", "Glenavy", "Bessbrook", "Portstewart",
                "Clogher",
                "Donaghcloney", "Blackrock", "Belleek", "Castlederg", "Coalisland", "Carnlough", "Clough",
                "Waringstown",
                "Magherafelt", "Glenarm", "Loughbrickland", "Greyabbey", "Broughshane", "Ballyronan",
                "Millisle", "Gilford",
                "Ballygowan", "Castlewellan", "Portglenone", "Aughnacloy", "Gortin", "Eglinton", "Sion Mills",
                "Ballycarry",
                "Castlederg", "Ederney", "Irvinestown", "Ballinderry", "Macosquin", "Donaghmore", "Aghagallon",
                "Kilrea",
                "Ballygawley", "Portballintrae", "Cloughmills", "Cushendun", "Ballykelly", "Dunloy", "Aghalee",
                "Moneymore",
                "Tandragee", "Belleek", "Moy", "Garvagh", "Newtownhamilton", "Loughgall", "Lisnaskea",
                "Lisbellaw",
                "Ballinamallard", "Derrygonnelly", "Belcoo", "Antrim", "Crumlin", "Draperstown", "Dundrum",
                "Portaferry",
                "Comber", "Newtownards", "Saintfield", "Bangor", "Portaferry", "Dungiven", "Ederney", "Fintona",
                "Kesh",
                "Lisnaskea", "Macosquin", "Maghera", "Moneymore", "Portglenone", "Ballynure", "Greenisland",
                "Newtownabbey",
                "Holywood", "Ballynahinch", "Newcastle", "Annalong", "Hillsborough", "Moira", "Waringstown",
                "Richhill",
                "Keady", "Tandragee", "Markethill", "Cullybackey", "Broughshane", "Ahoghill", "Portglenone",
                "Cushendall",
                "Waterfoot", "Cullybackey", "Glenavy", "Crumlin", "Ballynure", "Greenisland", "Newtownabbey",
                "Holywood",
                "Ballynahinch", "Newcastle", "Annalong", "Hillsborough", "Moira", "Waringstown", "Richhill",
                "Keady",
                "Tandragee", "Markethill", "Cullybackey", "Broughshane", "Ahoghill", "Newtownards", "Portrush",
                "Rathlin Island",
                "Coleraine", "Castlerock", "Limavady", "Ballykelly", "Dungiven", "Maghera", "Kilrea",
                "Bushmills", "Portstewart",
                "Ballymoney", "Ballintoy", "Cushendun", "Carnlough", "Glenarm", "Larne", "Ballygally",
                "Islandmagee",
                "Whitehead", "Carrickfergus", "Newtownabbey", "Greenisland", "Antrim", "Crumlin", "Randalstown",
                "Ballyclare",
                "Larne", "Magherafelt", "Coagh", "Tamlaght", "Bellaghy", "Portglenone", "Glenarm", "Carnlough",
                "Ballymena",
                "Larne", "Ballyclare", "Randalstown", "Crumlin", "Antrim", "Ballymoney", "Coleraine",
                "Portstewart",
                "Portrush", "Limavady", "Dungiven", "Maghera", "Castledawson", "Toomebridge", "Moneymore",
                "Magherafelt",
                "Cookstown", "Coagh", "Tamlaght", "Bellaghy", "Moneymore", "Magherafelt", "Cookstown", "Coagh",
                "Tamlaght",
                "Bellaghy", "Portglenone", "Magherafelt", "Toomebridge", "Ballyronan", "Maghera", "Ballymena",
                "Ballymoney",
                "Bushmills", "Portstewart", "Portrush", "Limavady", "Dungiven", "Maghera", "Castledawson",
                "Toomebridge",
                "Moneymore", "Magherafelt", "Cookstown", "Coagh", "Tamlaght", "Bellaghy", "Moneymore",
                "Magherafelt",
                "Cookstown", "Coagh", "Tamlaght", "Bellaghy", "Moneymore", "Magherafelt", "Cookstown", "Coagh",
                "Tamlaght",
                "Bellaghy", "Portglenone", "Magherafelt", "Toomebridge", "Ballyronan", "Maghera", "Ballymena",
                "Ballymoney",
                "Bushmills", "Portstewart", "Portrush", "Limavady", "Dungiven", "Maghera", "Castledawson",
                "Toomebridge",
                "Moneymore", "Magherafelt", "Cookstown", "Coagh", "Tamlaght", "Bellaghy", "Moneymore",
                "Magherafelt",
                "Cookstown", "Coagh", "Tamlaght", "Bellaghy", "Moneymore", "Magherafelt", "Cookstown", "Coagh",
                "Tamlaght",
                "Bellaghy", "Portglenone", "Magherafelt", "Toomebridge", "Ballyronan", "Maghera", "Ballymena",
                "Ballymoney",
                "Bushmills", "Portstewart", "Portrush", "Limavady", "Dungiven", "Maghera", "Castledawson",
                "Toomebridge",
                "Moneymore", "Magherafelt", "Cookstown", "Coagh", "Tamlaght", "Bellaghy", "Moneymore",
                "Magherafelt",
                "Cookstown", "Coagh", "Tamlaght", "Bellaghy", "Moneymore", "Magherafelt", "Cookstown", "Coagh",
                "Tamlaght",
                "Bellaghy", "Portglenone", "Magherafelt", "Toomebridge", "Ballyronan", "Maghera", "Ballymena",
                "Ballymoney",
                "Bushmills", "Portstewart", "Portrush", "Limavady", "Dungiven", "Maghera", "Castledawson",
                "Toomebridge",
                "Moneymore", "Magherafelt", "Cookstown", "Coagh", "Tamlaght"
            ];

            $("#cityInput").autocomplete({
                source: ukCities
            });

            var ukPostalcode = [
                "AB10 1XG", "AB11 5QN", "AB12 3CD", "AB15 6YZ", "AB16 5EF", // Aberdeen
                "B1 1AA", "B1 2AB", "B2 3CD", "B4 5EF", "B5 6YZ", // Birmingham
                "BH1 1AA", "BH2 2AB", "BH3 3CD", "BH4 5EF", "BH5 6YZ", // Bournemouth
                "BS1 1AA", "BS2 2AB", "BS3 3CD", "BS4 5EF", "BS5 6YZ", // Bristol
                "CA1 1AA", "CA2 2AB", "CA3 3CD", "CA4 5EF", "CA5 6YZ", // Carlisle
                "CH1 1AA", "CH2 2AB", "CH3 3CD", "CH4 5EF", "CH5 6YZ", // Chester
                "CV1 1AA", "CV2 2AB", "CV3 3CD", "CV4 5EF", "CV5 6YZ", // Coventry
                "CR0 1AA", "CR2 2AB", "CR4 3CD", "CR7 5EF", "CR8 6YZ", // Croydon
                "DY1 1AA", "DY2 2AB", "DY4 3CD", "DY5 5EF", "DY8 6YZ", // Dudley
                "DA1 1AA", "DA2 2AB", "DA5 3CD", "DA7 5EF", "DA8 6YZ", // Dartford
                "DH1 1AA", "DH2 2AB", "DH3 3CD", "DH4 5EF", "DH5 6YZ", // Durham
                "EH1 1AA", "EH2 2AB", "EH3 3CD", "EH4 5EF", "EH5 6YZ", // Edinburgh
                "EN1 1AA", "EN2 2AB", "EN3 3CD", "EN4 5EF", "EN5 6YZ", // Enfield
                "FY1 1AA", "FY2 2AB", "FY4 3CD", "FY5 5EF", "FY6 6YZ", // Blackpool (FY)
                "GL1 1AA", "GL2 2AB", "GL3 3CD", "GL4 5EF", "GL5 6YZ", // Gloucester
                "G1 1AA", "G2 2AB", "G3 3CD", "G4 5EF", "G5 6YZ", // Glasgow
                "GU1 1AA", "GU2 2AB", "GU3 3CD", "GU4 5EF", "GU5 6YZ", // Guildford
                "HA0 1AA", "HA1 2AB", "HA2 3CD", "HA3 5EF", "HA4 6YZ", // Harrow
                "HD1 1AA", "HD2 2AB", "HD3 3CD", "HD4 5EF", "HD5 6YZ", // Huddersfield
                "IP1 1AA", "IP2 2AB", "IP3 3CD", "IP4 5EF", "IP5 6YZ", // Ipswich
                "KA1 1AA", "KA2 2AB", "KA3 3CD", "KA4 5EF", "KA5 6YZ", // Kilmarnock
                "KT1 1AA", "KT2 2AB", "KT3 3CD", "KT4 5EF", "KT5 6YZ", // Kingston upon Thames
                "L1 1AA", "L2 2AB", "L3 3CD", "L4 5EF", "L5 6YZ", // Liverpool
                "LE1 1AA", "LE2 2AB", "LE3 3CD", "LE4 5EF", "LE5 6YZ", // Leicester
                "LN1 1AA", "LN2 2AB", "LN3 3CD", "LN4 5EF", "LN5 6YZ", // Lincoln
                "LS1 1AA", "LS2 2AB", "LS3 3CD", "LS4 5EF", "LS5 6YZ", // Leeds
                "LU1 1AA", "LU2 2AB", "LU3 3CD", "LU4 5EF", "LU5 6YZ", // Luton
                "M1 1AA", "M2 2AB", "M3 3CD", "M4 5EF", "M5 6YZ", // Manchester
                "ME1 1AA", "ME2 2AB", "ME3 3CD", "ME4 5EF", "ME5 6YZ", // Medway
                "NE1 1AA", "NE2 2AB", "NE3 3CD", "NE4 5EF", "NE5 6YZ", // Newcastle upon Tyne
                "NG1 1AA", "NG2 2AB", "NG3 3CD", "NG4 5EF", "NG5 6YZ", // Nottingham
                "NP1 1AA", "NP2 2AB", "NP3 3CD", "NP4 5EF", "NP5 6YZ", // Newport
                "NR1 1AA", "NR2 2AB", "NR3 3CD", "NR4 5EF", "NR5 6YZ", // Norwich
                "OL1 1AA", "OL2 2AB", "OL3 3CD", "OL4 5EF", "OL5 6YZ", // Oldham
                "OX1 1AA", "OX2 2AB", "OX3 3CD", "OX4 5EF", "OX5 6YZ", // Oxford
                "PE1 1AA", "PE2 2AB", "PE3 3CD", "PE4 5EF", "PE5 6YZ", // Peterborough
                "PO1 1AA", "PO2 2AB", "PO3 3CD", "PO4 5EF", "PO5 6YZ", // Portsmouth
                "RG1 1AA", "RG2 2AB", "RG3 3CD", "RG4 5EF", "RG5 6YZ", // Reading
                "RH1 1AA", "RH2 2AB", "RH3 3CD", "RH4 5EF", "RH5 6YZ", // Redhill
                "S1 1AA", "S2 2AB", "S3 3CD", "S4 5EF", "S5 6YZ", // Sheffield
                "SM1 1AA", "SM2 2AB", "SM3 3CD", "SM4 5EF", "SM5 6YZ", // Sutton
                "SO14 1AA", "SO15 2AB", "SO16 3CD", "SO17 5EF", "SO18 6YZ", // Southampton
                "SP1 1AA", "SP2 2AB", "SP3 3CD", "SP4 5EF", "SP5 6YZ", // Salisbury
                "ST1 1AA", "ST2 2AB", "ST3 3CD", "ST4 5EF", "ST5 6YZ", // Stoke-on-Trent
                "SW1A 1AA", "SW1B 2AB", "SW1C 3CD", "SW1D 5EF", "SW1E 6YZ", // London (Westminster)
                "TN1 1AA", "TN2 2AB", "TN3 3CD", "TN4 5EF", "TN5 6YZ", // Tunbridge Wells
                "TS1 1AA", "TS2 2AB", "TS3 3CD", "TS4 5EF", "TS5 6YZ", // Teesside
                "TW1 1AA", "TW2 2AB", "TW3 3CD", "TW4 5EF", "TW5 6YZ", // Twickenham
                "WA1 1AA", "WA2 2AB", "WA3 3CD", "WA4 5EF", "WA5 6YZ", // Warrington
                "WF1 1AA", "WF2 2AB", "WF3 3CD", "WF4 5EF", "WF5 6YZ", // Wakefield
            ]
            $("#zip_code_input").autocomplete({
                source: ukPostalcode
            });


        });
    </script>
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
        $(document).ready(function() {
            function validateForm() {
                var isValid = true;
                var firstName = $('input[name="firstName"]').val().trim();
                if (firstName === '') {
                    isValid = false;
                    $('input[name="firstName"]').addClass('is-invalid');
                } else {
                    $('input[name="firstName"]').removeClass('is-invalid');
                }
                var lastName = $('input[name="lastName"]').val().trim();
                if (lastName === '') {
                    isValid = false;
                    $('input[name="lastName"]').addClass('is-invalid');
                } else {
                    $('input[name="lastName"]').removeClass('is-invalid');
                }
                var email = $('input[name="email"]').val().trim();
                var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (email === '' || !emailPattern.test(email)) {
                    isValid = false;
                    $('input[name="email"]').addClass('is-invalid');
                } else {
                    $('input[name="email"]').removeClass('is-invalid');
                }
                var phone = $('input[name="phone"]').val().trim();
                if (phone === '') {
                    isValid = false;
                    $('input[name="phone"]').addClass('is-invalid');
                } else {
                    $('input[name="phone"]').removeClass('is-invalid');
                }
                var address = $('input[name="address"]').val().trim();
                if (address === '') {
                    isValid = false;
                    $('input[name="address"]').addClass('is-invalid');
                } else {
                    $('input[name="address"]').removeClass('is-invalid');
                }
                var city = $('input[name="city"]').val().trim();
                if (city === '') {
                    isValid = false;
                    $('input[name="city"]').addClass('is-invalid');
                } else {
                    $('input[name="city"]').removeClass('is-invalid');
                }
                var postalCode = $('input[name="zip_code"]').val().trim();
                if (postalCode === '') {
                    isValid = false;
                    $('input[name="zip_code"]').addClass('is-invalid');
                } else {
                    $('input[name="zip_code"]').removeClass('is-invalid');
                }
                return isValid;
            }

            $('#placeOrderBtn').on('click', function() {
                if (validateForm()) {
                    $('#placeOrderBtn').html('<i class="fas fa-spinner fa-spin"></i> Processing...');
                    $.ajax({
                        url: $('#checkoutForm').attr('action'),
                        type: 'POST',
                        data: $('#checkoutForm').serialize(),
                        success: function(response) {


                            var redirectUrl = response.redirectUrl;
                            var iframe = $('<iframe>', {
                                src: redirectUrl,
                                frameborder: '0',
                                style: 'border: none; width: 100%; height: 100%;'
                            });
                            $('#checkoutForm').remove();
                            $('#iframeContainer').html(iframe);

                            var iframeTopPosition = $('#iframeContainer').offset().top;
                            $('html, body').animate({
                                scrollTop: iframeTopPosition
                            }, 'slow');
                        },
                        error: function(xhr, status, error) {
                            $('#placeOrderBtn').html('Proceed To Pay');
                        }
                    });
                }
            });

        });
    </script>
@endPushOnce
