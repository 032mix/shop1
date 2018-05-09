@extends ('layouts.master')

@section ('content')

    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="{{ route('home') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a>
                </li>
                <li class="active">Checkout Page</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- checkout -->
    <div class="checkout">
        <div class="container">
            <h3 class="animated wow slideInLeft" data-wow-delay=".5s">Your shopping cart contains:
                <span id="checkout_total_qtty">{{ $cart['total_qtty'] }}</span> Products</h3>
            @if (count($cart['products']) > 0)
                <div class="checkout-right animated wow slideInRight" data-wow-delay=".5s">
                    <table class="timetable_sub">
                        <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Product Name</th>
                            <th>Single Price</th>
                            <th>Remove</th>
                        </tr>
                        </thead>
                        @foreach($cart['products'] as $product)
                            <tr class="rem{{ $product->id }}">
                                <td class="invert">{{ $product->id }}</td>
                                <td class="invert-image"><a href="{{ url('products/single/' . $product->name) }}"><img
                                                src="img/22.jpg" alt=" " class="img-responsive"/></a>
                                </td>
                                <td class="invert">
                                    <div class="quantity">
                                        <div class="quantity-select">
                                            <div class="entry value-minus">&nbsp;</div>
                                            <div class="entry value"><span>{{ $product->cart_quantity }}</span></div>
                                            <div class="entry value-plus active">&nbsp;</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="invert">{{ $product->name }}</td>
                                <td class="invert">${{ $product->price }}</td>
                                <td class="invert">
                                    <div class="rem">
                                        <div class="close1"
                                             onclick="removeFromCart('{{ $product->name }}', {{ $product->price }}, {{ $product->cart_quantity }}, {{ $product->id }})"></div>
                                    </div>
                                </td>
                            </tr>
                    @endforeach
                    <!--quantity-->
                        <script>
                            $('.value-plus').on('click', function () {
                                var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10) + 1;
                                divUpd.text(newVal);
                            });

                            $('.value-minus').on('click', function () {
                                var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10) - 1;
                                if (newVal >= 1) divUpd.text(newVal);
                            });
                        </script>
                        <!--quantity-->
                    </table>
                </div>
                <div class="checkout-left">
                    <div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
                        <h4>Continue to basket</h4>
                        <ul>
                            @foreach ($cart['products'] as $product)
                                <li id="basket-product-{{ $product->id }}">{{ $product->name }} <i>-</i>
                                    <span>${{ $product->price }} X {{ $product->cart_quantity }} </span></li>
                            @endforeach
                            <li>Total <i>-</i> $<span id="checkout_total_price">{{ $cart['total_price'] }}</span></li>
                        </ul>
                    </div>
                    <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
                        <a href="{{ url('order') }}">Proceed to order&nbsp; &nbsp;<span
                                    class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
                    </div>
                    <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
                        <a href="{{ route('home') }}">
                            <span class="glyphicon glyphicon-menu-left" aria-hidden="true">
                            </span>Continue Shopping</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            @endif
        </div>
    </div>
    <meta name="csrf-token" content="{!! csrf_token() !!}"/>
    <script src="{{ asset('js/cart.js') }}"></script>
    <!-- //checkout -->
@endsection