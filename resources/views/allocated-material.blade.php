@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Allocated Materials</h1>
    <div class="card mb-4">
        <div class="card-header">
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requestedMaterials as $material)
                            <tr>
                                <td>{{ $material->materialAllocatedInfo->category->name }}</td>
                                <td>{{ $material->materialAllocatedInfo->name }}</td>
                                <td>{{ $material->materialAllocatedInfo->material_code }}</td>
                                <td>{{ $material->materialAllocatedInfo->working_status }}</td>
                                <td>{{ $material->materialAllocatedInfo->serial_number }}</td>
                                <td>{{ $material->materialAllocatedInfo->supplier->name }}</td>
                                <td>
                                    <form action="/unallocate/{{ $material->id }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Complete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection