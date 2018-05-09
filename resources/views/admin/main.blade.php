@extends ('layouts.master')

@section ('content')

    <div class="container" style="margin: 10em auto 10em auto">
        <h1>
            <a href="{{ url('/admin/categories') }}"><span class="label label-default">Categories</span></a><br>
            <a href="{{ url('/admin/createCategory') }}"><span class="label label-default">New Category</span></a><br>
            <a href="{{ url('/admin/createSubCategory') }}"><span class="label label-default">New SubCategory</span></a><br>
            <a href="{{ url('/admin/products') }}"><span class="label label-default">Products</span></a><br>
            <a href="{{ url('/admin/createProduct') }}"><span class="label label-default">New Product</span></a><br>
            <a href="{{ url('/admin/users') }}"><span class="label label-default">Users</span></a><br>
            <a href="{{ url('/admin/orders') }}"><span class="label label-default">Orders</span></a>
        </h1>
    </div>

@endsection