<!-- All JS Plugins -->
{{-- <script src="js/plugins.js"></script> --}}
<script src="{{ asset('js/plugins.js') }}"></script>
<!-- Main JS -->
{{-- <script src="js/main.js"></script> --}}
<script src="{{ asset('js/main.js') }}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function addToCart(id) {
        var variantId = $('#variant_id').val();
        $.ajax({
            url: '{{ route("web.cart.add")}}',
            type: 'post',
            data: {
                id: id,
                variantId: variantId,
            },
            dataType: 'json',
            success: function(response) {
                if (response.status == true) {
                    $('#add_to_cart_modal').modal('show');
                    // window.loation.href = "{{ route('web.view.cart')}}";
                    $('.mini-cart-icon sup').text(response.count); 
                    $('.mini-cart-subtotal').text(response.subtotal); 
                    updateMiniCart(response.cartItems);
                } else {
                    alert(response.message);
                }
            }
        });
    }

    function updateMiniCart(cartItems) {
        var miniCartProductArea = $('.mini-cart-product-area');
        miniCartProductArea.empty();
        var image_src = "{{ asset('storage/') }}";
        $.each(cartItems, function(rowId, item) {
            var miniCartItem = $('<div class="mini-cart-item clearfix">' +
                                    '<div class="mini-cart-img">' +
                                        '<a href="#"><img src="' + image_src + '/' + item.options.productImage + '" alt="Image"></a>' +
                                        '<span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>' +
                                    '</div>' +
                                    '<div class="mini-cart-info">' +
                                        '<h6><a href="#">' + item.name + '</a></h6>' +
                                        '<span class="mini-cart-quantity">' + item.qty + ' x ' + item.price + '</span>' +
                                    '</div>' +
                                '</div>');
            miniCartProductArea.append(miniCartItem);
        });
    }
</script>