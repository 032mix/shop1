@extends ('layouts.master')

@section ('content')

    <div class="container">
        <a href="{{ route('admin') }}"><span class="label label-default">Back to Admin Panel</span></a><br>
        <h2>New Product</h2>
        <div class="panel panel-primary">
            <div class="panel-body">
                @include ('layouts.errors')
                <form action="{{ url('/admin/storeProduct') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-md-4">
                            <label for="subcategory">SubCategory:</label>
                            <select class="form-control" name="subcategory" id="subcategory">
                                @foreach($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="name">Name:</label>
                            <input class="form-control" name="name" id="name" placeholder="Name">
                        </div>
                        <div class="col-md-4">
                            <label for="description">Description:</label>
                            <input class="form-control" name="description" id="description" placeholder="Description">
                        </div>
                        <div class="col-md-4">
                            <label for="price">Price:</label>
                            <input class="form-control" name="price" id="price" placeholder="Price" type="number">
                        </div>
                        <div class="col-md-4">
                            <label for="quantity">Quantity:</label>
                            <input class="form-control" name="quantity" id="quantity" placeholder="Quantity"
                                   type="number">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <br>
                        <div class="form-group">
                            <button class="btn" type="submit">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection