@extends ('layouts.master')

@section ('content')

    <div class="container">
        <a href="{{ route('admin') }}"><span class="label label-default">Back to Admin Panel</span></a><br>
        <table class="table table-bordered" id="myTable">
            <thead>
            <tr>
                <th>ID</th>
                <th>Status</th>
                <th>User</th>
                <th>User Details</th>
                <th>Products</th>
                <th>Date Created</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td><a href="{{ url('admin/order/' . $order->id) }}">{{ $order->id }}</a></td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->user ? $order->user : "unregistered" }}</td>
                    <td>{{ $order->user_details->phone_num }}</td>
                    <td>
                        @foreach($order->products as $product)
                            {{ $product->name }} X {{ $product->pivot->quantity }} <br>
                        @endforeach
                    </td>
                    <td>{{ $order->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
            <div class="text-center">{{ $orders->links() }}</div>
        </table>
    </div>

@endsection