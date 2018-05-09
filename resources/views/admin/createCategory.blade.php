@extends ('layouts.master')

@section ('content')

    <div class="container">
        <a href="{{ route('admin') }}"><span class="label label-default">Back to Admin Panel</span></a><br>
        <h2>New Category</h2>
        <div class="panel panel-primary">
            <div class="panel-body">
                @include ('layouts.errors')
                <form action="{{ url('/admin/storeCategory') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-md-4">
                            <label for="name">Name:</label>
                            <input class="form-control" name="name" id="name" placeholder="Name">
                        </div>
                        <div class="col-md-4">
                            <label for="description">Description:</label>
                            <input class="form-control" name="description" id="description" placeholder="Description">
                        </div>
                        <div class="col-md-4">
                            <label for="img">Image:</label>
                            <input type="file" class="form-control" name="img" id="img" placeholder="Image">
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn" type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection