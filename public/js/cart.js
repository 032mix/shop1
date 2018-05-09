function addToCart(name, price, qtty = 1) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.post("/addToCart/" + name, function () {
        $('#total_price').text(parseInt($('#total_price').text()) + (price * qtty));
        $('#total_qtty').text(parseInt($('#total_qtty').text()) + qtty);
    });
}

function removeFromCart(name, price, qtty, id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.post("/removeFromCart/" + name, function () {
        $('.rem' + id).fadeOut('slow', function () {
            if (parseInt($('#total_qtty').text()) - qtty == 0) {
                location.reload();
            } else {
                $('#total_price').text(parseInt($('#total_price').text()) - (price * qtty));
                $('#total_qtty').text(parseInt($('#total_qtty').text()) - qtty);
                $('#checkout_total_price').text(parseInt($('#checkout_total_price').text()) - (price * qtty));
                $('#checkout_total_qtty').text(parseInt($('#checkout_total_qtty').text()) - qtty);
                $('#basket-product-' + id).remove();
                $('.rem' + id).remove();
            }
        });
    });
}
