@extends ('layouts.master')

@section ('content')

    <div class="container">
        <a href="{{ route('admin') }}"><span class="label label-default">Back to Admin Panel</span></a><br>
        <table class="table table-bordered" id="myTable">
            <thead>
            <tr>
                <th>Image</th>
                <th>Category</th>
                <th>SubCategory</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td><img src="{{ asset('storage/' . $category->img) }}" style="max-width: 400px"></td>
                    <td rowspan="{{ count($category->subcategories) + 1 }}"
                        data-toggle="modal" data-target="#myModal"
                        onclick="editGetCategory({{ $category->id }})"
                        id="Category-name">{{ $category->name }}</td>
                </tr>
                @foreach($category->subcategories as $subCategory)
                    <tr>
                        <td data-toggle="modal" data-target="#myModal"
                            onclick="editGetSubCategory({{ $subCategory->id }})"
                            id="SubCategory-name">{{ $subCategory->name }}</td>
                    </tr>
                @endforeach
            @endforeach
            </tbody>
            <div class="text-center">{{ $categories->links() }}</div>
        </table>
    </div>

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editing <strong><span id="name"></span></strong></h4>
                </div>
                <div class="modal-body">
                    <label for="editName">Name:</label>
                    <input class="form-control" id="editName"><br>
                    <label for="editDesc">Description:</label>
                    <textarea class="form-control" id="editDesc"></textarea>
                    <input type="hidden" id="editType">
                    <input type="hidden" id="editId">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="edit()">Edit</button>
                </div>
            </div>

        </div>
    </div>
    <meta name="csrf-token" content="{!! csrf_token() !!}"/>
    <script>
        function editGetCategory(cid) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post("editCategory", {category: cid}, function (data) {
                $('#name').text(data.name);
                $('#editName').val(data.name);
                $('#editDesc').val(data.description);
                $('#editType').val('Category');
                $('#editId').val(cid);
            });
        }

        function editGetSubCategory(scid) {
            swal({
                text: 'Do you want to edit the subcategory or see its products?',
                closeOnClickOutside: false,
                closeOnEsc: false,
                buttons: {
                    edit: 'Edit',
                    products: 'Products'
                },
            }).then(button => {
                if (button == 'products') {
                    window.location.href = "/admin/products/" + scid
                }
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post("editSubCategory", {subcategory: scid}, function (data) {
                $('#name').text(data.name);
                $('#editName').val(data.name);
                $('#editDesc').val(data.description);
                $('#editType').val('SubCategory');
                $('#editId').val(scid);
            });
        }

        function edit() {
            let type = $('#editType').val();
            let id = $('#editId').val();
            let name = $('#editName').val();
            let desc = $('#editDesc').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post("update" + type, {id: id, name: name, desc: desc}, function () {
                $('#' + type + '-name').text(name);
            });
        }
    </script>
@endsection