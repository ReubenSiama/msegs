@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Materials</h1>
    <div class="card mb-4">
        <div class="card-header">
            <a href="/materials/add" class="btn btn-primary btn-sm">Add</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Caterogy</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Working Status</th>
                            <th>Serial Number</th>
                            <th>Supplier</th>
                            <th>Allocated To</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($materials as $material)
                            <tr>
                                <td>{{ $material->category->name }}</td>
                                <td>{{ $material->name }}</td>
                                <td>{{ $material->material_code }}</td>
                                <td>{{ $material->working_status }}</td>
                                <td>{{ $material->serial_number }}</td>
                                <td>{{ $material->supplier()->exists() ? $material->supplier->name : '' }}</td>
                                <td>
                                    @if ($material->material_request_id != null)
                                        {{ $material->materialRequest->district->name }}
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="/materials/edit/{{ $material->id }}" class="btn btn-warning btn-sm" id="edit">Edit</a>
                                        <button class="btn btn-danger btn-sm delete-material" data-id="{{ $material->id }}" id="delete" data-toggle="modal" data-target="#deleteMaterial">Delete</button>
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

<form action="/delete-material" method="post">
    @csrf
    <input type="hidden" name="id" id="delete-id">
  <!-- The Modal -->
  <div class="modal" id="deleteMaterial">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Delete Material</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
            Are you sure you want to delete this material?
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
            $('.delete-material').on('click', function(){
                let id = $(this).data("id");
                $('#delete-id').val(id);
            });
        });
    </script>
@endsection