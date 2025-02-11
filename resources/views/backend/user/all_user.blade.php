@extends('admin_dashboard')

@section('admin')
<div class="content">
    <div class="container-fluid">
       
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signup-modal">Add</button>
                        </ol>
                    </div>
                    <h4 class="page-title">Employees</h4>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Position</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td> 
                                        <td>{{ $item->first_name }}</td>
                                        <td>{{ $item->last_name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <a href="{{ route('edit.category', $item->id) }}" class="btn btn-blue rounded-pill waves-effect waves-light edit-btn" 
                                               data-id="{{ $item->id }}" data-name="{{ $item->name }}" 
                                               data-bs-toggle="modal" data-bs-target="#edit">Edit</a>
                                            <a href="{{ route('delete.category', $item->id) }}" class="btn btn-danger rounded-pill waves-effect waves-light">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>


<div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form class="px-3" method="post" action="{{ route('user.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="user_email" class="form-label">Email</label>
                        <input class="form-control" type="text" name="email" placeholder="Add Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="user_position" class="form-label">Position</label>
                        <input class="form-control" type="text" name="position" placeholder="Add Position" required>
                    </div>
                    
                    <div class="mb-3 text-center">
                        <button class="btn btn-primary" type="submit">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form class="px-3" method="post" action="{{ route('category.update') }}">
                    @csrf
                    <input type="hidden" name="id" value="" id="edit-category-id">
                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i>Edit Category</h5>
                    <div class="mb-3">
                        <label for="category_name" class="form-label">Name</label>
                        <input type="text" name="category_name" class="form-control" value="" id="edit-category-name" required>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i>Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).on('click', '.edit-btn', function() {
        var categoryId = $(this).data('id');
        var categoryName = $(this).data('name');
        
        $('#edit-category-id').val(categoryId);
        $('#edit-category-name').val(categoryName);
    });
</script>

@endsection
