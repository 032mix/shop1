$(function () {
    $("#slider-range").slider({
        range: true,
        min: 0,
        max: 2500,
        values: [0, 2500],
        slide: function (event, ui) {
            $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
        },
        stop: function (event, ui) {
            getProducts(1);
        }
    });
    $("#amount").val("$" + $("#slider-range").slider("values", 0) +
        " - $" + $("#slider-range").slider("values", 1));
});

$(window).on('hashchange', function () {
    if (window.location.hash) {
        var page = window.location.hash.replace('#', '');
        if (page == Number.NaN || page <= 0) {
            return false;
        } else {
            getProducts(page);
        }
    }
});

$(document).ready(function () {
    $(document).on('click', '.pagination a', function (e) {
        getProducts($(this).attr('href').split('page=')[1]);
        e.preventDefault();
    });
});

function getProducts(page) {
    $.ajax({
        url: '?page=' + page + '&min=' + $("#slider-range").slider("values", 0) + '&max=' + $("#slider-range").slider("values", 1) +
        '&sort=' + $('#sort').val() + '&sort_direction=' + $('#sort_direction').val(),
        dataType: 'json',
    }).done(function (data) {
        $('.products-ajax').html(data);
        location.hash = page;
    }).fail(function () {
        swal('Products could not be loaded.');
    });
}