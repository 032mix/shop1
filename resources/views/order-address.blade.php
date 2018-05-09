@extends ('layouts.master')

@section ('content')

    <div class="container">
        <fieldset>
            <legend class="text-center">Your order</legend>
            <table class="table table-bordered">
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                </tr>
                @foreach ($cart['products'] as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>${{ $product->price }} X {{ $product->cart_quantity }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td>Delivery</td>
                    <td>{{ $cart['total_price'] >= 30 ? 'FREE' : '$4' }}</td>
                </tr>
                <tr>
                    <td><h3>Total</h3></td>
                    <td><h3>${{ $cart['total_price'] >= 30 ? $cart['total_price'] : $cart['total_price'] + 4 }}</h3>
                    </td>
                </tr>
            </table>
        </fieldset>
        <div class="clearfix"></div>
        <fieldset>
            <legend class="text-center">Delivery details</legend>
            <form action="{{ url('order') }}" method="post" style="margin-left: 25%">
                {{ csrf_field() }}
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="fname">First Name</label>
                        <input class="form-control" name="fname" id="fname" required>
                    </div>
                    <div class="col-md-4">
                        <label for="lname">Last Name</label>
                        <input class="form-control" name="lname" id="lname" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="phone">Phone Number</label>
                        <input class="form-control" name="phone" id="phone" required>
                    </div>
                    <div class="col-md-4">
                        <label for="email">Email Adress</label>
                        <input class="form-control" name="email" id="email" value="{{ auth()->check() ? auth()->user()->email : "" }}" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-8">
                        <label for="address">Address</label>
                        <input class="form-control" name="address" id="address" required>
                    </div>
                </div>
                <div class="row form-group">
                    <button class="btn btn-primary" type="submit">Order</button>
                </div>
            </form>
        </fieldset>
    </div>

@endsection