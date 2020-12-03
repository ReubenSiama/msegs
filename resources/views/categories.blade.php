@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Categories</h1>
    <div class="card mb-4">
        <div class="card-header">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addCategory">Add</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Category Code</th>
                            <th>Category Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->code }}</td>
                            <td>{{ $category->name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<form action="/add-category" method="post">
    @csrf
  <!-- The Modal -->
  <div class="modal" id="addCategory">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Category</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
          <input type="text" name="name" id="name" class="form-control" placeholder="Category Name" required>
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Add</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
  
      </div>
    </div>
  </div>
</form>

@endsection