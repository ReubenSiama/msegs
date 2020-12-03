@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Supplier</h1>
    <div class="card mb-4">
        <div class="card-header">
            <a href="/supplier/add" class="btn btn-primary btn-sm">Add</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Postal Code</th>
                            <th>Contact</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suppliers as $supplier)
                            <tr>
                                <td>{{ $supplier->code }}</td>
                                <td>{{ $supplier->name }}</td>
                                <td>{{ $supplier->address_1 }} {{ $supplier->address_2 != null ? ', '.$supplier->address_2 : '' }}</td>
                                <td>{{ $supplier->postal_code }}</td>
                                <td>{{ $supplier->contact_no }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="/edit-supplier/{{ $supplier->id }}" class="btn btn-warning btn-sm">Edit</a>
                                        <button class="btn btn-danger btn-sm delete-supplier" data-id="{{ $supplier->id }}" data-toggle="modal" data-target="#deleteSupplier">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<form action="/delete-supplier" method="post">
    @csrf
    <input type="hidden" name="id" id="delete-id">
  <!-- The Modal -->
  <div class="modal" id="deleteSupplier">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Delete Supplier</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
            Are you sure you want to delete this supplier?
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-success">Yes</button>
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">No</button>
        </div>
  
      </div>
    </div>
  </div>
</form>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('.delete-supplier').on('click', function(){
                let id = $(this).data('id');
                $('#delete-id').val(id);
            });
        });
    </script>
@endsection
