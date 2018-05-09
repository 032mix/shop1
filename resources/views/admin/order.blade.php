@extends ('layouts.master')

@section ('content')

    <div class="container">
        <a href="{{ url('admin/orders') }}"><span class="label label-default">Back to Orders</span></a><br>

        Name: {{ $order->user_details->first_name }} {{ $order->user_details->last_name }} <br>
        Address: {{ $order->user_details->address }} <br>
        Phone Number: {{ $order->user_details->phone_num }} <br>
        Status: {{ $order->status }} <br>

        <table class="table table-bordered">
            <tr>
                <th>Product</th>
                <th>Quantity</th>
            </tr>
            @foreach ($order->products as $product)
                <tr>
                    <td><a href="{{ url('products/single/' . $product->name) }}">{{ $product->name }}</a></td>
                    <td>${{ $product->price }} X {{ $product->pivot->quantity }}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection
